<?php
include_once("../db/pdoconn.php");

session_start();


if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
} else {
    echo "<script>
            alert('Please log in first to see this page.');
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
                    <li class="home"><a href="cars.php" class="active">Cars</a></li>
                    <li class="about"><a href="about.php">About</a></li>
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
            <h2>
                Complete your travel plans by <br />
                booking your car rental.
            </h2>
        </div>

        <div class="bannerNote">
            <p>
                Browse all our cars online, and once you have narrowed down your
                search and would like to book a car, simply click the 'Book now'
                button and complete the payment for booking confirmation.
            </p>
        </div>

        <img class="imgBooking" src="../img/booking.svg" />

        <!-- Search -->
        <div class="searchBoxCar">
            <div class="formSearchCar">
                <form action="backend/auth.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails3">Pick-up details</p>
                    </div>
                    <div class="rowSearchCar">
                        <input class="inputSearch" type="text" name="location" placeholder="Select a Location"
                            required />
                        <input class="inputSearch" type="date" name="date" placeholder="date" required />
                        <input class="inputSearch" type="time" name="time" placeholder="time" required />
                    </div>
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails4">Drop off details</p>
                    </div>
                    <div class="rowSearchCar">
                        <input class="inputSearch" type="text" name="location" placeholder="Select a Location"
                            required />

                        <input class="inputSearch" type="date" name="date" placeholder="date" required />

                        <input class="inputSearch" type="time" name="time" placeholder="time" required />
                    </div>
                    <button type="submit" class="btnSearchCar">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            <!-- card1 -->
            <div class="cardCover">
                <div class="card">
                    <div class="imgContainer">
                        <img class="imgCar" src="../img/cars/Aston Martin DBS Superleggera.jpg" />
                    </div>
                    <div class="cardTextCover">
                        <p class="carName">Audi RS6 Avant/RS7</p>
                        <p class="carPrice">MVR 1000</p>
                        <p class="perday">per day</p>
                        <button type="button" class="btnBook">
                            <a href="../backend/checkout.php">Book now</a>
                        </button>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="cardCover">
                <div class="card">
                    <div class="imgContainer">
                        <img class="imgCar" src="../img/cars/Aston Martin DBS Superleggera.jpg" />
                    </div>
                    <div class="cardTextCover">
                        <p class="carName">Audi RS6 Avant/RS7</p>
                        <p class="carPrice">MVR 1000</p>
                        <p class="perday">per day</p>
                        <button type="button" class="btnBook">
                            <a href="/user/checkout.html">Book now</a>
                        </button>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="cardCover">
                <div class="card">
                    <div class="imgContainer">
                        <img class="imgCar" src="../img/cars/Aston Martin DBS Superleggera.jpg" />
                    </div>
                    <div class="cardTextCover">
                        <p class="carName">Audi RS6 Avant/RS7</p>
                        <p class="carPrice">MVR 1000</p>
                        <p class="perday">per day</p>
                        <button type="button" class="btnBook">
                            <a href="/user/checkout.html">Book now</a>
                        </button>
                    </div>
                </div>
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