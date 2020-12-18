<?php

include_once("../db/pdoconn.php");

session_start();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    echo "Welcome to the member's area !";
} else {
    echo "<script>
            alert('Please log in first to see this page.');
            window.location.href='../index.html';
            </script>";
}


if (isset($_POST['btnlogout'])) {


    session_start();
    unset($_SESSION["loggedinAdmin"]);
    header("Location:../index.html");
}