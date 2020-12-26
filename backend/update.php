<?php
include_once("../db/pdoconn.php");
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();


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
    echo "<script>
            alert('Sorry, your file is too large..');
             window.location.href='../admin/cars.php';
            </script>";

    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    echo "<script>
            alert('Sorry, only JPG, JPEG & PNG files are allowed.');
             window.location.href='../admin/cars.php';
            </script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script>
            alert('Sorry, car was not uploaded.');
             window.location.href='../admin/cars.php';
            </script>";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        $get_id = $_REQUEST['id'];

        $carname = $_POST['carname'];
        $price = $_POST['price'];
        $location = $_POST['location'];
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        $sql = "UPDATE cars SET carname ='$carname', price ='$price', location ='$location', fromdate ='$fromdate', 
todate ='$todate', image ='$target_file' WHERE id = '$get_id' ";

        $pdo->exec($sql);
        echo "<script>alert('Car details updated.'); window.location='../admin/cars.php'</script>";
    } else {
        echo "<script>
            alert('Sorry, there was an error uploading your file.');
             window.location.href='../admin/upload.html';
            </script>";
    }
}