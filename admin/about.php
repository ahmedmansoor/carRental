<?php
include_once("../db/pdoconn.php");

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
} else {
    echo "<script>
            alert('Must be an Admin to view this page');
            window.location.href='../index.php';
            </script>";
}

?>

<html lang="en">

<head>
    <title>Car Rental Maldives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <header>
        <nav class="navBar">
            <h3 class="logo">
                <a href="home.php">Car Rentals</a>
            </h3>
            <div>
                <ul class="tabs">
                    <li class="home">
                        <a href="home.php">Home</a>
                    </li>
                    <li class="home"><a href="cars.php">Cars</a></li>
                    <li class="about"><a href="about.php" class="active">About</a></li>
                    <li class="contact">
                        <a href="contact.php">Contact</a>
                    </li>
                    <button type="button" class="btnSignIn1">
                        <a href="./profile.php">Profile</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="banner">
            <h2>Our Company</h2>
        </div>

        <div class="bannerNote bannerNoteAbout">
            <p>
                Founded in 2010, Male’ Transport Company (MTC) provides car-rental
                service in Male’. MTC owns a collection of 200 cars of 30 different
                brands, and we offer its rental service within the Maldives. MTC’s
                mission is to make it easier for everyone to experience the Maldives.
                <br />
                <br />
                With the official release of Car Rental Maldives in 2020, the company
                aims to help all its customers to check for available cars for any
                required time and book them from anywhere in the world.
            </p>
        </div>
        <img class="imgAbout" src="../img/team.svg" />
    </main>
</body>
<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>