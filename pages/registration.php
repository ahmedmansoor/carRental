<?php

include_once("../db/pdoconn.php");
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();

?>

<html lang="en">

<head>
    <title>Car Rental Maldives</title>
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
                    <li class="home"><a href="home.php">Cars</a></li>
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
        <div class="loginBox">
            <div class="formLogin">
                <form action="../backend/auth.php" method="POST">
                    <h2>Hello there!</h2>
                    <div>
                        <div class="welcomeNote">
                            <p>Enter details to create an account.</p>
                        </div>
                        <h4>Register</h4>
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="text" name="email" placeholder="Email address" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <!-- <div class="options">
                <select name="options">
                  <option>Admin</option>
                  <option>User</option>
                  <option>Customer</option>
                </select>
              </div> -->
                        <button type="submit" name="btnRegister" class="btnRegister">
                            Create Account
                        </button>
                    </div>
                    <p>Already have an account?</p>
                    <div>
                        <button class="btnSignIn2" onclick="location.href='../signin.php'">
                            Sign In
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