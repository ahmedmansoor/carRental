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
                        <a href="home.php" class="active">Home</a>
                    </li>
                    <li class="home"><a href="cars.php">Cars</a></li>
                    <li class="about"><a href="about.php">About</a></li>
                    <li class="contact"><a href="contact.php">Contact</a></li>
                    <button type="button" class="btnSignIn1">
                        <a href="./profile.php">Profile</a>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="banner">
            <h2>
                Rent a car in the Maldives. <br />
                At least someone will be waiting <br />for you in the airport.
            </h2>
        </div>

        <div class="bannerNote bannerNoteHome">
            <p>
                More than 10 years of experience, <br />making money from people from
                you.
            </p>
        </div>

        <button type="button" class="btnBookHome">
            <a href="../admin/cars.php">Find a Car</a>
        </button>
        <!-- <button type="button" class="btnSignIn3">
            <a href="../index.html">Sign In</a>
        </button> -->

        <img class="imgCarHome1" src="../img/cars/CarHome1.png" />
        <hr />
        <img class="imgCarHome2" src="../img/cars/CarHome2.png" />

        <div class="bannerSearch">
            <h2>Search for a Car</h2>
        </div>

        <!-- Search -->
        <div class="searchBox">
            <div class="formSearch">
                <form action="backend/auth.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails1">Pick-up details</p>
                        <p class="searchDetails searchDetails2">Drop off details</p>
                    </div>
                    <div class="rowSearch">
                        <input class="inputSearch" type="text" name="location" placeholder="Select a Location"
                            required />
                        <input class="inputSearch" type="text" name="location" placeholder="Select a Location"
                            required />
                    </div>
                    <div class="rowSearch">
                        <input class="inputSearch" type="date" name="date" placeholder="date" required />
                        <input class="inputSearch" type="date" name="date" placeholder="date" required />
                    </div>
                    <!-- <div class="rowSearch">
                        <input class="inputSearch" type="time" name="time" placeholder="time" required />
                        <input class="inputSearch" type="time" name="time" placeholder="time" required />
                    </div> -->
                    <button type="submit" class="btnSearch">Search</button>
                </form>
            </div>
        </div>

        <!-- Steps -->
        <div class="rowHome">
            <div class="contentHome">
                <div class="number">
                    <h1>1</h1>
                </div>
                <div class="step">
                    <h4 class="stepHeader"><b>Select trip infomation</b></h4>
                </div>
                <p class="stepNote">
                    Select pick-up and return locations, time and date.
                </p>
            </div>

            <div class="contentHome">
                <div class="number">
                    <h1>2</h1>
                </div>
                <div class="step">
                    <h4 class="stepHeader"><b>Search for availabe cars</b></h4>
                </div>
                <p class="stepNote">
                    Search for cars availabe for the selected location, time and date.
                </p>
            </div>

            <div class="contentHome">
                <div class="number">
                    <h1>3</h1>
                </div>
                <div class="step">
                    <h4 class="stepHeader"><b>Book your car</b></h4>
                </div>
                <p class="stepNote">Select an available car and book.</p>
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