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

    // $password = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES(:username,:email,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    echo "<script>
            alert('Registration Successful!');
            window.location.href='../user/home.html';
            </script>";
}

// if (isset($_POST['btnLogin'])) {
//     $username = trim($_POST['username']);
//     $role = trim($_POST['role']);
//     $password = trim($_POST['password']);
//     if ($username != "" && $password != "") {
//         try {
//             $sql = "SELECT * from users where username =:username AND role =:role AND password =:password";
//             $stmt = $pdo->prepare($sql);
//             $stmt->bindParam('username', $username, PDO::PARAM_STR);
//             $stmt->bindParam('role', $role, PDO::PARAM_STR);
//             $stmt->bindValue('password', $password, PDO::PARAM_STR);
//             $stmt->execute();
//             $count = $stmt->rowCount();
//             $row   = $stmt->fetch(PDO::FETCH_ASSOC);
//             if ($count == 1 && !empty($row)) {
//                 $_SESSION['username']   = $row['username'];
//                 $_SESSION['role']   == $row['role'];
//                 $_SESSION['password'] = $row['password'];

//                 echo "<script>
//             alert('Login Successful! Welcome back Admin.');
//             window.location.href='../admin/home.html';
//             </script>";
//             } elseif (isset($_POST['btnLogin'])) {
//                 $username = trim($_POST['username']);
//                 $password = trim($_POST['password']);
//                 if ($username != "" && $password != "") {
//                     try {
//                         $sql = "SELECT * from users where username =:username AND password =:password";
//                         $stmt = $pdo->prepare($sql);
//                         $stmt->bindParam('username', $username, PDO::PARAM_STR);
//                         // $stmt->bindParam('role', $role, PDO::PARAM_STR);A
//                         $stmt->bindValue('password', $password, PDO::PARAM_STR);
//                         $stmt->execute();
//                         $count = $stmt->rowCount();
//                         $row   = $stmt->fetch(PDO::FETCH_ASSOC);
//                         if ($count == 1 && !empty($row)) {
//                             $_SESSION['username']   = $row['username'];
//                             $_SESSION['password'] = $row['password'];

//                             echo "<script>
//                                 alert('Login Successful! Welcome back!');
//                                 window.location.href='../user/home.html';
//                                 </script>";
//                         } else {
//                             echo ("Invalid username or password!");
//                         }
//                     } catch (PDOException $e) {
//                         echo "Error : " . $e->getMessage();
//                     }
//                 } else {
//                     echo ("An Error Occured");
//                 }
//             }
//         } catch (PDOException $e) {
//             echo "Error : " . $e->getMessage();
//         }
//     } else {
//         $msg = "Not an Admin";
//     }
// } else {
//     echo ("An Error Occured");
// }
session_start();

if (isset($_POST['btnLogin'])) {
    $username = trim($_POST['username']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);
    if ($username != "" && $password != "") {
        try {
            $sql = "SELECT * from users where username =:username AND role =:role AND password =:password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindParam('role', $role, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['username']   = $row['username'];
                $_SESSION['role']   == $row['role'];
                $_SESSION['password'] = $row['password'];

                if ($_SESSION['role'] == "Admin") {
                    echo "<script>
            alert('Login Successful! Welcome back Admin.');
            window.location.href='../admin/home.html';
            </script>";
                    // header('location:../admin/home.html');
                }
                //     else if ($_SESSION['role'] == "User") {
                //         echo "<script>
                // alert('Login Successful! Welcome back');
                // window.location.href='../user/home.html';
                // </script>";
                //     }
                else {
                    echo
                        "<script>
            alert('An Error occured.');
            </script>";
                }
            } else {
                echo
                    "<script>
                    alert('Incorrect username or password');
                    window.location.href='../pages/home.html';
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
            window.location.href='../pages/home.html';
            </script>";
}

// if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
//     echo "<script>
//             alert('Login Successful! Welcome back Admin.');
//             window.location.href='../admin/home.html';
//             </script>";
// } else {
//     echo "<script>
//             alert('Login Successful! Welcome back user.');
//             window.location.href='../user/home.html';
//             </script>";
// }

// working user login
// if (isset($_POST['btnLogin'])) {
//     $username = trim($_POST['username']);
//     $password = trim($_POST['password']);
//     if ($username != "" && $password != "") {
//         try {
//             $sql = "SELECT * from users where username =:username AND password =:password";
//             $stmt = $pdo->prepare($sql);
//             $stmt->bindParam('username', $username, PDO::PARAM_STR);
//             $stmt->bindValue('password', $password, PDO::PARAM_STR);
//             $stmt->execute();
//             $count = $stmt->rowCount();
//             $row   = $stmt->fetch(PDO::FETCH_ASSOC);
//             if ($count == 1 && !empty($row)) {
//                 $_SESSION['username']   = $row['username'];
//                 $_SESSION['password'] = $row['password'];

//                 echo "<script>
//             alert('Registration Successful!');
//             window.location.href='../user/home.html';
//             </script>";
//             } else {
//                 echo ("Invalid username or password!");
//             }
//         } catch (PDOException $e) {
//             echo "Error : " . $e->getMessage();
//         }
//     } else {
//         echo ("An Error Occured");
//     }
// }


// if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
//     echo '<pre>';
//     var_dump($_POST);
//     echo '<pre>';
//     echo "<script>
//             alert('Login Successful! Welcome back Admin.');
//             window.location.href='../admin/home.html';
//             </script>";
// } else {
//     echo "<script>
//             alert('Login Successful! Welcome back user.');
//             window.location.href='../user/home.html';
//             </script>";
// }