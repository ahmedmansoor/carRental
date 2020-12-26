<?php
include_once("../db/pdoconn.php");

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();

$get_id = $_GET['id'];


$sql = "DELETE FROM cars WHERE id = '$get_id'";

// use exec() because no results are returned
$pdo->exec($sql);
echo "<script>alert('Car Deleted'); window.location='../admin/cars.php'</script>";