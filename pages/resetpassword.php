<?php

include_once("../db/pdoconn.php");
session_start();

if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    header("Location:../index.php");
} else {
    if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
        header("Location:..index.php");
    } else {
    }
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
                    <li class="about"><a href="about.php">About</a></li>
                    <li class="contact"><a href="contact.php">Contact</a></li>
                    <button type="button" class="btnSignIn1">
                        <a href="../signin.php">Sign In</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="banner">
            <h2>Reset password</h2>
        </div>

        <div class="bannerNote">
            <div class="bannerNoteReset">
                <p>
                    Enter the email address you used when you joined and we’ll send you
                    instructions to reset your password.
                    <br /><br />
                    For security reasons, we do NOT store your password. So rest assured
                    that we will never send your password via email.
                </p>
            </div>
        </div>
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>