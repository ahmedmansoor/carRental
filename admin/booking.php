<?php
include_once("../db/pdoconn.php");

session_start();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
} else {
    echo "<script>
            alert('Must be an Admin to view this page');
            window.location.href='../index.php';
            </script>";
}


// $result = $pdo->prepare("SELECT * FROM users");
// $result->execute();
// for ($i = 0; $row = $result->fetch(); $i++) {
//     $id = $row['id'];
// }

// echo '<pre>';
// var_dump($_GET);
// echo '<pre>';

// $ID = $_GET['id'];
// $result = $pdo->prepare("SELECT * FROM users where id='$ID'");
// $result->execute();
// for ($i = 0; $row = $result->fetch(); $i++) {
//     $id = $row['id'];


//     try {
//         $sql = "INSERT INTO bookings (uid) 
//                 VALUES(:id)";

//         $stmt = $pdo->prepare($sql);
//         $stmt->execute([
//             'id' => $id,
//         ]);
//     } catch (PDOException $e) {
//         echo "Error : " . $e->getMessage();
//     }
// }


$ID = $_GET['id'];

$result = $pdo->prepare("SELECT * FROM cars where id='$ID'");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id'];

    try {
        $sql = "INSERT INTO bookings (carid) 
                VALUES(:id)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}