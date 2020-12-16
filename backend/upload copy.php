<?php

// Create database connection
require_once "../db/pdoconn.php";

if (isset($_POST['btnUpload'])) {
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';

    $sql = "INSERT INTO cars (carname, price, image, fromdate, todate) 
                VALUES(:carname,:price, :image, :fromdate, :todate)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'carname' => $_POST['carname'],
        'price' => $_POST['price'],
        'image' => $_FILES['image'],
        'fromdate' => $_POST['fromdate'],
        'todate' => $_POST['todate'],
    ]);
} else {
    echo ('not uploaded');
}

// newtest
// if (isset($_POST['btnUpload'])) {

//     $name = $_FILES['file']['name'];
//     $target_dir = "../upload/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);

//     // Select file type
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//     // Valid file extensions
//     $extensions_arr = array("jpg", "jpeg", "png", "gif");

//     // Check extension
//     if (in_array($imageFileType, $extensions_arr)) {

//         // Convert to base64 
//         $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
//         $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
//         // Insert record
//         $query = "insert into images(image) values('" . $image . "')";
//         mysqli_query($con, $query);



//     try {
//         $carname = $_FILES['carname'];
//         $price = $_FILES['price'];
//         $image = $_FILES['image'];
//         $fromdate = $_FILES['fromdate'];
//         $todate = $_FILES['todate'];

//         move_uploaded_file($temp, "../upload/" . $image);
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
//         // Upload file
//         move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
//     }
// }