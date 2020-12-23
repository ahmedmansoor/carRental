<?php
include_once("../db/pdoconn.php");

session_start();
// echo $_SESSION['uid'];



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
            <h2>Checkout</h2>
        </div>

        <div class="bannerNoteCheckout">
            <i class="material-icons">reply</i>
            <a href="./cars.php">Go back (Cars)</a>
        </div>


        <?php
        include_once("../db/pdoconn.php");


        function dateDiffInDays($date1, $date2)
        {
            // Calculating the difference in timestamps 
            $diff = strtotime($date2) - strtotime($date1);

            // 1 day = 24 hours 
            // 24 * 60 * 60 = 86400 seconds 
            return abs(round($diff / 86400));
        }

        // Start date 
        $date1 = $_SESSION['fromdate'];

        // End date 
        $date2 = $_SESSION['todate'];

        // Function call to find date difference 
        $days = dateDiffInDays($date1, $date2);



        // Display the result 
        // printf("Difference between two dates: "
        //     . $dateDiff . " Days ");

        $ID = $_GET['id'];

        $fromlocation = $_SESSION['fromlocation'];
        $tolocation = $_SESSION['tolocation'];

        $fromdate = $_SESSION['fromdate'];
        $todate = $_SESSION['todate'];

        $fromtime = $_SESSION['fromtime'];
        $totime = $_SESSION['totime'];
        $_SESSION['days'] = $days;


        $result = $pdo->prepare("SELECT * FROM cars where id='$ID'");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
            $id = $row['id'];

            $total = $days * $row['price'];
        ?>


        <div class="rowCheckout">
            <!-- card1 -->
            <div class="cardCoverCheckout">
                <div class="imgContainerCheckout">
                    <img class="imgCar" src="<?php echo $row['image'] ?>" />
                </div>
                <div class="cardTextCoverCheckout">
                    <div class="carName"><?php echo $row['carname'] ?></div>
                    <!-- <p class="mvrCheckout">MVR</p>
                    <h2 class="carPrice"><?php echo $row['price'] ?></h2>
                    <p class="perdayCheckout">per day</p> -->
                </div>
            </div>

            <div class="cardCoverCheckout2">
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Pickup</div>
                        <p>Location:
                            <span class="highlight">
                                <?php echo ($_SESSION['fromlocation']) ?>
                            </span>
                        </p>
                        <p>Date:
                            <span class="highlight">
                                <?php echo ($_SESSION['fromdate']) ?>
                            </span>
                        </p>
                        <p>Time:
                            <span class="highlight">
                                <?php echo ($_SESSION['fromtime']) ?>
                            </span>
                        </p>
                        <br />
                    </div>
                </div>
                <div class="cardCheckout-text">
                    <div class="cardTextCoverCheckout">
                        <div class="carPrice">Return</div>
                        <p>Location:
                            <span class="highlight">
                                <?php echo ($_SESSION['tolocation']) ?>
                            </span>
                        </p>
                        <p>Date:
                            <span class="highlight">
                                <?php echo ($_SESSION['todate']) ?>
                            </span>
                        </p>
                        <p>Time:
                            <span class="highlight">
                                <?php echo ($_SESSION['totime']) ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- </div>

        <div class="rowCheckoutPay"> -->
            <div class="paymentCover">
                <!-- card2 -->
                <div class="cardCoverCheckout">
                    <div class="cardCheckout-text2">
                        <div class="cardTextCoverCheckout">
                            <div class="carPrice">Summary of charges</div>
                            <p>
                                <span class="highlight">MVR
                                    <?php echo $row['price'] ?>
                                </span>
                                per day
                            </p>

                            <p>No. of days: <span class="highlight">
                                    <?php echo $days ?>
                                </span>
                            </p>
                            <br />
                            <br />
                            <div>Total</div>
                            <p>
                                <span class="carPrice carPriceTotal">
                                    MVR <?php echo $total ?>
                                </span>
                            </p>
                        </div>
                        <form method="POST" action="../backend/booking.php<?php echo '?id=' . $id; ?>">
                            <button name="btnPay" type="sumbit" class="btnPay">
                                <a>Confirm Payment</a>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>