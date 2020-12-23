<?php
include_once("../db/pdoconn.php");

session_start();

if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
} else {
    echo "<script>
            alert('Must be an Admin to view this page');
            window.location.href='../index.php';
            </script>";
}


$get_id = $_GET['id'];


$sql = "DELETE FROM bookings WHERE id = $get_id";

// use exec() because no results are returned
$pdo->exec($sql);
echo "<script>alert('Car Deleted'); 
window.location='../admin/profile.php'
</script>";