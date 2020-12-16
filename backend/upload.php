<?php

// Create database connection
require_once "../db/pdoconn.php";



$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// echo ($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["btnUpload"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        // echo "File is not an image. ";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<pre> Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "<pre> Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " <pre> Your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        echo ($target_file);



        $sql = "INSERT INTO cars (carname, price, image, fromdate, todate) 
                VALUES(:carname,:price, $target_file, :fromdate, :todate)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'carname' => $_POST['carname'],
            'price' => $_POST['price'],
            // 'image' => $_POST['target_file'],
            target_file => $target_file,
            'fromdate' => $_POST['fromdate'],
            'todate' => $_POST['todate'],
        ]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// $sql = "INSERT INTO cars (carname, price, image, fromdate, todate) 
//                 VALUES(:carname,:price, :target_file, :fromdate, :todate)";


// if (isset($_POST["btnUpload"])) {
//     echo '<pre>';
//     var_dump($_POST);
//     echo '<pre>';

//     $sql = "INSERT INTO cars (carname, price, fromdate, todate) 
//                 VALUES(:carname,:price, :fromdate, :todate)";

//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([
//         'carname' => $_POST['carname'],
//         'price' => $_POST['price'],
//         'image' => $_FILES['image'],
//         'fromdate' => $_POST['fromdate'],
//         'todate' => $_POST['todate'],

//     ]);
//     echo ('<pre>uploaded to db');
// } else {
//     echo ('<pre>not uploaded to db');
// }