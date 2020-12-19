<?php
include_once("../db/pdoconn.php");

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["btnUpload"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($_FILES["image"]["size"] > 1000000) {
    echo "<pre> Sorry, your file is too large.";
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo " <pre> Your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        $get_id = $_REQUEST['id'];

        $carname = $_POST['carname'];
        $price = $_POST['price'];
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        $sql = "UPDATE cars SET carname ='$carname', price ='$price', fromdate ='$fromdate', 
todate ='$todate', image ='$target_file' WHERE id = '$get_id' ";

        $pdo->exec($sql);
        echo "<script>alert('Car details updated.'); window.location='../admin/cars2.php'</script>";
    } else {
        echo "<script>
            alert('Sorry, there was an error uploading your file.');
             window.location.href='../admin/upload.html';
            </script>";
    }
}