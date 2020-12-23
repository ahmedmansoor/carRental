<?php
include_once("../db/pdoconn.php");

session_start();



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

if (isset($_POST['btnPay'])) {
    // $fromlocation = $_POST['fromlocation'];
    // $tolocation = $_POST['tolocation'];

    // $fromdate = $_POST['fromdate'];
    // $todate = $_POST['todate'];

    // $fromtime = $_POST['fromtime'];
    // $totime = $_POST['totime'];

    $fromlocation = $_SESSION['fromlocation'];
    $tolocation = $_SESSION['tolocation'];

    $fromdate = $_SESSION['fromdate'];
    $todate = $_SESSION['todate'];

    $fromtime = $_SESSION['fromtime'];
    $totime = $_SESSION['totime'];

    $uid = $_SESSION['uid'];
    $id = $_GET['id'];

    $days = $_SESSION['days'];


    // echo $_SESSION['uid'];

    // $location = $_POST['location'];

    // $fromdate = $_POST['fromdate'];
    // $todate = $_POST['todate'];

    // $fromtime = $_POST['fromtime'];
    // $totime = $_POST['totime'];



    // $result = $pdo->prepare("SELECT * FROM cars where id='$ID'");
    // $result->execute();
    // for ($i = 0; $row = $result->fetch(); $i++) {
    //     $id = $row['id'];

    try {
        $sql = "INSERT INTO bookings (uid, carid, fromlocation, tolocation, fromdate, todate, fromtime, totime, days) 
                VALUES(:uid, :id, :fromlocation, :tolocation, :fromdate, :todate, :fromtime, :totime, :days)";

        // $sql = "INSERT INTO bookings (uid, id, fromlocation, tolocation, fromtime, totime) 
        //         VALUES(:uid, :id, :fromlocation, :tolocation, :fromtime, :totime)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'uid' => $uid,
            'id' => $id,

            'fromlocation' => $fromlocation,
            'tolocation' => $tolocation,

            'fromdate' => $fromdate,
            'todate' => $todate,

            'fromtime' => $fromtime,
            'totime' => $totime,
            'days' => $days,

        ]);
        if ($_SESSION['username'] == "admin") {
            $_SESSION['loggedinAdmin'] = true;
            echo "<script>
            alert('Booking Confirmed!');
            window.location.href='../admin/profile.php';
            </script>";
        } else {
            $_SESSION['loggedinUser'] = true;
            echo "<script>
            alert('Booking Confirmed!');
            window.location.href='../user/profile.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
    // }
} else {
    echo "<script>
            alert('An error occured');
            window.location.href='../admin/checkout.php';
            </script>";
}