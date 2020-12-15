<?php



include_once("../db/pdoconn.php");
// $carname = $price = $carimg = $fromdate = $todate = '';


if (isset($_POST['btnUpload'])) {
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';


    $sql = "INSERT INTO cars (carname, price, fromdate, todate) 
                VALUES(:carname,:price, :fromdate, :todate)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'carname' => $_POST['carname'],
        'price' => $_POST['price'],
        // 'carimg' => $_POST['carimg'],
        'fromdate' => $_POST['fromdate'],
        'todate' => $_POST['todate'],
    ]);
} else {
    echo ('not uploaded');
}