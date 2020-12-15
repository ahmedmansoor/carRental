<?php

var_dump($_POST);


include_once("../db/conn.php");

// works

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
} else {
    echo "Connected Succesfully <br>";
}

if (isset($_POST['btnRegister'])) {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $newPass = md5($password);
    $results = "INSERT INTO users (fullName, email, password) VALUES(?,?,?)";
    $query = $conn->prepare($results);
    $query->bind_param('sss', $fullName, $email, $newPass);
    // $query->execute();

    if ($rc = $query->execute()) {
        echo ("Registration Complete");
    } else {
        echo ("Registration Error");
    }

    if (false === $rc) {
        die('execute() failed: ' . htmlspecialchars($query->error));
    }
}