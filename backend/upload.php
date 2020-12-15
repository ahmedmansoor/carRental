<?php

// Create database connection
include_once("../db/pdoconn.php");

if (isset($_POST['btnUpload'])) {
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';

    // return $cars[$key] ?? null;

    $sql = "INSERT INTO cars (carname, price,  fromdate, todate) 
                VALUES(:carname,:price, :fromdate, :todate)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'carname' => $_POST['carname'],
        'price' => $_POST['price'],
        // 'image' => $_POST['image'],
        'fromdate' => $_POST['fromdate'],
        'todate' => $_POST['todate'],
    ]);
} else {
    echo ('not uploaded');
}