<?php

$username = "";
session_start();

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
// exit;



// Welcome Option Name
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $role = $_SESSION["usertype"];
    if ($username == null) {

        header("Location: ./index.php");
    } else {
        switch ($role) {
            case "Admin":
                echo ("<h3> Welcome Admin</h3>");
                header(
                    "Location: pages/regiatration.php"
                );
                break;
            case "User":
                echo ("<h3> Welcome User</h3>");
                break;
            case "Customer":
                echo ("<h3> Welcome Customer</h3>");
                break;
                // default:
                // 	echo ("<h3> Welcome " . $username . "</h3>");
                // 	break;
        }
        //echo ("<p> Role: " . $role . "</p>");
    }
} else {
    echo ("<h2>Invalid Login</h2>");
}