<?php

include_once("../db/pdoconn.php");

session_start();


// if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
// } else {
//     echo "<script>
//             alert('Please log in first to see this page.');
//             window.location.href='../signin.php';
//             </script>";
// }


if (isset($_POST['btnlogout'])) {


    session_start();
    unset($_SESSION["loggedinAdmin"]);
    unset($_SESSION["loggedinUser"]);
    header("Location:../index.php");
}