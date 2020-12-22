<?php
include_once("../db/pdoconn.php");

session_start();
// echo $_SESSION['uid'];

$uid = $_SESSION['uid'];



if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
} else {
    echo "<script>
            alert('Must be an Admin to view this page');
            window.location.href='../index.php';
            </script>";
}


$get_id = $_GET['id'];


$sql = "DELETE FROM bookings WHERE carid = '$get_id' && uid = $uid";

// use exec() because no results are returned
$pdo->exec($sql);
echo "<script>alert('Car Deleted'); 
window.location='../admin/profile.php'
</script>";