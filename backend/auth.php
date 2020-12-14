<?php

// var_dump($_POST);


include_once("../db/pdoconn.php");


// foreach ($pdo->query('SELECT * from users') as $row) {
//     echo '<pre>';
//     print_r($row);
//     echo '</pre>';
// }

if (isset($_POST['btnRegister'])) {

    // $password = md5($password);

    $sql = "INSERT INTO users (fullName, email, password) VALUES(:fullName,:email,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'fullName' => $_POST['fullname'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    echo "<script>
            alert('Registration Successful!');
            window.location.href='../user/home.html';
            </script>";
}


// if (isset($_POST['btnLogin'])) {

//     if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['options'])) {
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         $role = $_POST['options'];
//         if ($username == "ahmed" && $password == "ahmed123") {
//             session_start();
//             $_SESSION["username"] = $username;
//             $_SESSION["usertype"] = $role;
//             header("Location: ..//pages/home.php");
//         } else {
//             //do not start a session is the user is not logged in
//             //use something else
//             session_start();
//             $_SESSION["return"] = "fail";
//             header("Location: ../index.php");
//         }
//     } else {
//         echo ("<p>Incorrect Data</p>");
//     }
// }

// if (isset($_POST['btnLogin'])) {
//     $firstname = $_POST['email'];
//     $password = $_POST['password'];
//     $role = $_POST['role'];



//     $results = $pdo->query("SELECT * FROM users WHERE email = '.$email.' AND role = '.$role' AND password = '.$password.'");

//     if (count((is_countable($results) ? $results : [])) > 0) {
//         echo "<p>it works</p>";
//     } else {
//         echo "<p>it doesnt work</p>";
//     }
// }


echo '<pre>';
var_dump($_POST);
echo '<pre>';