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
            <a href="../index.php">Sign In</a>
        </button> -->

        <img class="imgCarHome1" src="../img/cars/CarHome1.png" />
        <hr class="hr1" />
        <img class="imgCarHome2" src="../img/cars/CarHome2.png" />

        <div class="bannerSearch">
            <h2>Search for a Car</h2>
        </div>

        <!-- Search -->
        <div class="searchBox">
            <div class="formSearch">
                <form action="../admin/cars.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails1">Pick-up details</p>
                        <p class="searchDetails searchDetails2">Drop off details</p>
                    </div>
                    <div class="rowSearch">
                        <span class="locationDropdown inputSearch">
                            <select name="fromlocation" required>
                                <option value="" selected disabled hidden>Select a Location</option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Terminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>
                        <span class="locationDropdown inputSearch" required>
                            <select name="tolocation">
                                <option value="" selected disabled hidden>Select a Location</option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Terminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>
                    </div>
                    <div class="rowSearch">
                        <input class="inputSearch" type="date" name="fromdate" required="required" />
                        <input class="inputSearch" type="date" name="todate" required="required" />

                    </div>
                    <div class="rowSearch">
                        <input class="inputSearch" type="time" name="fromtime" required="required" />
                        <input class="inputSearch" type="time" name="totime" required="required" />

                    </div>
                    <button type="submit" name="btnSearchCar" class="btnSearch">Search</button>
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