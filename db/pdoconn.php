<?php

$dbServername = "root";
$dbPassword = "";

try {

    $pdo = new PDO('mysql:host=localhost;dbname=cardb', $dbServername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}