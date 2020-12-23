<?php

include_once("./db/pdoconn.php");
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    header("Location:../admin/home.php");
} else {
    if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
        header("Location:../user/home.php");
    } else {

        if (isset($_POST['btnBook'])) {
            echo
                "<script>
                alert('Need to be signed in to make a booking.');
                </script>";
        }
        header("Location: pages/signin.php");
    }
}