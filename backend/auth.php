<?php

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';


include_once("../db/pdoconn.php");

// foreach ($pdo->query('SELECT * from users') as $row) {
//     echo '<pre>';
//     print_r($row);
//     echo '</pre>';
// }

if (isset($_POST['btnRegister'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user) {
        echo "<script>
            alert('Sorry, username already exists! Please try again.');
            window.location.href='../pages/registration.html';
            </script>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES(:username,:email,:password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),

        ]);
        echo "<script>
                    alert('Account Created! Please log in.');
                    window.location.href='../index.php';
                    </script>";
    }
}

session_start();

if (isset($_POST['btnLogin'])) {
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);
    if ($username != "" && $password != "") {
        try {
            $sql = "SELECT * from users where username =:username  AND password =:password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['username']   = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['uid'] = $row['uid'];

                if ($_SESSION['username'] == "admin") {
                    $_SESSION['loggedinAdmin'] = true;
                    $_SESSION['uid'] = $row['uid'];
                    header("Location:../admin/home.php");
                } else {
                    $_SESSION['loggedinUser'] = true;
                    $_SESSION['uid'] = $row['uid'];
                    header("Location:../user/home.php");
                }
            } else {
                echo
                    "<script>
                    alert('Incorrect username or password');
                    window.location.href='../index.php';
                    </script>";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
} else {
    echo
        "<script>
            alert('An Error occured.');
            window.location.href='../index.php';
            </script>";
}