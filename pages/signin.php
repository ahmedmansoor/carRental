<?php

include_once("../db/pdoconn.php");
session_start();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    header("Location:../admin/home.php");
} else {
    if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
        header("Location:../user/home.php");
    } else {

        if (isset($_POST['btnBook'])) {
            echo
                "<script>
                alert('Need to be signed in to make a booking.');
                </script>";
        }
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
                        <a href="signin.php">Sign In</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="loginBox">
            <div class="formLogin">
                <form action="../backend/auth.php" method="POST">
                    <h2>Welcome Back!</h2>
                    <div>
                        <div class="welcomeNote">
                            <p>Enter your login details to continue.</p>
                        </div>
                        <h4>Sign In</h4>
                        <input type="username" name="username" placeholder="Username" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <div>
                            <a href="resetpassword.html" class="reset">Forgot Password?</a>
                        </div>
                        <button type="submit" name="btnLogin" class="btnSignIn2">
                            Sign In
                        </button>
                    </div>
                    <p>Don't have an account?</p>
                    <div>
                        <button class="btnRegister" onclick="location.href='registration.php'">
                            Create Account
                        </button>
                    </div>
                </form>
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