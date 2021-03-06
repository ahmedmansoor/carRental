<?php

// Create database connection
require_once "../db/pdoconn.php";

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    // echo "Welcome to the member's area !";
} else {
    echo "<script>
            alert('Please log in first to see this page.');
            window.location.href='../index.php';
            </script>";
}



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
// if (file_exists($target_file)) {
//     echo "<pre> Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["image"]["size"] > 1000000) {
    echo "<script>
            alert('Sorry, your file is too large..');
             window.location.href='../admin/cars.php';
            </script>";
    $uploadOk = 0;
}

// only image files
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    echo "<script>
            alert('Sorry, only JPG, JPEG & PNG files are allowed.');
             window.location.href='../admin/cars.php';
            </script>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>
            alert('Sorry, car was not uploaded.');
             window.location.href='../admin/cars.php';
            </script>";

    // try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

        $sql = "INSERT INTO cars (carname, price, location, image, fromdate, todate) 
                VALUES(:carname,:price, :location, :target_file, :fromdate, :todate)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'carname' => $_POST['carname'],
            'price' => $_POST['price'],
            'location' => $_POST['location'],
            'target_file' => $target_file,
            // 'location' => $_POST['location'],
            'fromdate' => $_POST['fromdate'],
            'todate' => $_POST['todate'],
        ]);

        echo "<script>
            alert('Car added successfully.');
            window.location.href='../admin/add.php';
            </script>";
    } else {
        echo "<script>
            alert('Sorry, there was an error uploading your file.');
             window.location.href='../admin/add.php';
            </script>";
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