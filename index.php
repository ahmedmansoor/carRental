<?php

include_once("./db/pdoconn.php");
session_start();


if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] == true) {
    header("Location:../admin/home.php");
} else {
    if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
        header("Location:../user/home.php");
    } else {
    }
}

?>
<html lang="en">

<head>
    <title>Car Rental Maldives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <nav class="navBar">
            <h3 class="logo">
                <a href="/pages/home.html">Car Rentals</a>
            </h3>
            <div>
                <ul class="tabs">
                    <li class="home">
                        <a href="pages/home.html">Home</a>
                    </li>
                    <li class="home"><a href="pages/cars.html">Cars</a></li>
                    <li class="about"><a href="pages/about.html">About</a></li>
                    <li class="contact"><a href="pages/contact.html">Contact</a></li>
                    <button type="button" class="btnSignIn1">
                        <a href="index.php">Sign In</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="loginBox">
            <div class="formLogin">
                <form action="backend/auth.php" method="POST">
                    <h2>Welcome Back!</h2>
                    <div>
                        <!-- <br> -->
                        <div class="welcomeNote">
                            <p>Enter your login details to continue.</p>
                        </div>
                        <h4>Sign In</h4>
                        <!-- <label>Username</label> -->
                        <input type="username" name="username" placeholder="Username" required />
                        <!-- <input
                type="text"
                name="email"
                placeholder="Email address"
                required
              /> -->

                        <!-- <label>Password</label> -->
                        <input type="password" name="password" placeholder="Password" required />
                        <div>
                            <a href="pages/resetpassword.html" class="reset">Forgot Password?</a>
                        </div>
                        <!-- <div class="options">
                <select name="role">
                  <option>Admin</option>
                  <option>User</option>
                </select>
              </div> -->

                        <!-- <br> -->
                        <!-- <input type="hidden" name="form_submitted" value="1" /> -->
                        <!-- <input type="submit" value="Login" name="btnLogin"> -->
                        <button type="submit" name="btnLogin" class="btnSignIn2">
                            Sign In
                        </button>
                    </div>
                    <p>Don't have an account?</p>
                    <div>
                        <button class="btnRegister" onclick="location.href='pages/registration.html'">
                            Create Account
                        </button>
                    </div>
                </form>
                <!-- <form method="GET" action="pages/registration.html">
          <button class="btnRegister" type="submit">Create account</button>
        </form> -->
            </div>
        </div>
        <!-- <div class="formRegister">
        <h2>Registration Form</h2>
        <form action="pages/registration.php" method="POST">
            <label>First Name</label>
            <input type="text" placeholder="First Name" name="firstname">
            <br>

            <label>Last Name</label>
            <input type="text" placeholder="Last Name" name="lastname">

            <input type="hidden" name="form_submitted" value="1" />
            <br>
            <input type="submit" value="Submit" name="btnSubmit">
        </form>
    </div> -->
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>