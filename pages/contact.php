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
    header("Location:../admin/contact.php");
} else {
    if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
        header("Location:../user/contact.php");
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
                    <li class="contact">
                        <a href="contact.php" class="active">Contact</a>
                    </li>
                    <button type="button" class="btnSignIn1">
                        <a href="../signin.php">Sign In</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div>
                <div class="banner">
                    <h2>We'd love to hear from you</h2>
                </div>
                <p class="bannerNote">
                    We're here to help and answer any question you might have. <br />For
                    booking queries and support you may send us an email.
                </p>
                <div class="contentContact">
                    <div class="contentContactHeader">
                        <h1>Contact Information</h1>
                    </div>
                    <a href="mailto:ahmadh.mansoor@gmail.com" class="contactNum">ahmadh.mansoor@gmail.com</a>
                    <br />
                    <a href="tel:+960 9134183" class="contactNum">+960 913 4183</a>
                </div>
            </div>
        </section>

        <div class="formContactBody">
            <div id="formContact">
                <h3 class="formContact-h3">Contact us via email</h3>
                <form id="formContact-form-id" class="formContact-form-class" method="post" action="contact-form-process.php">
                    <div class="formContact-form-group">
                        <label for="Name" class="formContact-label">Your name</label>
                        <div class="formContact-input-group">
                            <input type="text" id="Name" name="Name" class="formContact-form-control" required />
                        </div>
                    </div>

                    <div class="formContact-form-group">
                        <label for="Email" class="formContact-label">Your email address</label>
                        <div class="formContact-input-group">
                            <input type="email" id="Email" name="Email" class="formContact-form-control" required />
                        </div>
                    </div>

                    <div class="formContact-form-group">
                        <label for="Message" class="formContact-label">Your message</label>
                        <div class="formContact-input-group">
                            <textarea id="Message" name="Message" class="formContact-form-control" rows="6" maxlength="3000" required></textarea>
                        </div>
                    </div>

                    <div class="formContact-form-group">
                        <button type="submit" id="formContact-button" class="formContact-btn formContact-btn-primary formContact-btn-lg formContact-btn-block">
                            Send Message
                        </button>
                    </div>

                    <!-- <div class="formContact-credit" id="formContact-credit">
        Simple HTML email form provided by: <a href="https://www.freecontactform.com" target="_blank">FreeContactForm.com</a>
        </div> -->
                </form>
            </div>
        </div>

        <img class="imgContact" src="../img/contact.svg" />
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>