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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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
        <div class="bannerCheckout">
            <h2>User Name</h2>
        </div>
        <form action="../backend/logout.php" method="POST">
            <button name="btnlogout" class="btnSignOut">Log Out</button>
        </form>

        <div class="profileBookingHeader">
            <h2>Booking Information</h2>
        </div>

        <?php
        // include_once("../db/pdoconn.php");

        $ID = $_GET['id'];

        $result = $pdo->prepare("SELECT * FROM cars where id='$ID'");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
            $id = $row['id'];
        ?>

        <div class="rowCheckout">
            <!-- card1 -->
            <div class="cardCoverCheckout">
                <div class="imgContainerCheckout">
                    <img class="imgCar" src="<?php echo $row['image'] ?>" />
                </div>
                <div class="cardTextCoverCheckout">
                    <div class="carName"><?php echo $row['carname'] ?></div>
                    <p class="mvrCheckout">MVR</p>
                    <h2 class="carPrice"><?php echo $row['price'] ?></h2>
                    <p class="perdayCheckout">per day</p>
                </div>
            </div>

            <div class="cardCoverCheckout">
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Pickup</div>
                        <p>Male' International Airport</p>
                        <p>16th October 2020</p>
                        <p>15:20</p>
                        <br />
                        <div class="carPrice">Return</div>
                        <p>Male' International Airport</p>
                        <p>12th October 2020</p>
                        <p>15:20</p>
                    </div>
                </div>
            </div>


            <?php } ?>

            <div class="paymentCover">
                <!-- card2 -->
                <div class="cardCoverCheckout">
                    <div class="cardCheckout-text2">
                        <div class="cardTextCoverCheckout2">
                            <div class="carPriceCheckout">Summary of charges</div>
                            <p>Perday: MVR 1000</p>
                            <p>No. of days: 4</p>
                            <br />
                            <div class="carPrice">Total</div>
                            <p>MVR 4000</p>
                        </div>
                        <button type="button" class="btnPay">
                            <a href="/admin/profile.php">Confirm Booking</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="profilePaymentCover">
            <div class="cardCoverCheckout">
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Payment</div>
                        <p>Perday: MVR 1000</p>
                        <p>No. of days: 4</p>
                        <br />
                        <div class="carPrice">Total paid</div>
                        <p>MVR 4000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rowProfileBooking">
            <!-- card2 -->
            <div class="cardCoverCheckout">
                <div class="cardCheckout-car">
                    <div class="imgContainerCheckout">
                        <img class="imgCar" src="../img/cars/Aston Martin DBS Superleggera.jpg" />
                    </div>
                    <div class="cardTextCoverCheckout">
                        <div class="carName">Audi RS6 Avant/RS7</div>
                    </div>
                </div>
            </div>

            <div class="cardCoverCheckout">
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Pickup</div>
                        <p>Male' International Airport</p>
                        <p>16th October 2020</p>
                        <p>15:20</p>
                        <br />
                        <div class="carPrice">Return</div>
                        <p>Male' International Airport</p>
                        <p>12th October 2020</p>
                        <p>15:20</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="profilePaymentCover">
            <div class="cardCoverCheckout">
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Payment</div>
                        <p>Perday: MVR 1000</p>
                        <p>No. of days: 4</p>
                        <br />
                        <div class="carPrice">Total paid</div>
                        <p>MVR 4000</p>
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