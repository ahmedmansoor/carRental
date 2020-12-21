<?php
include_once("../db/pdoconn.php");


$get_id = $_GET['id'];


$sql = "DELETE FROM cars WHERE id = '$get_id'";

// use exec() because no results are returned
$pdo->exec($sql);
echo "<script>alert('Car Deleted'); window.location='../admin/cars.php'</script>";