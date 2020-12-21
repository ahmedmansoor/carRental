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

        <!-- Search -->
        <!-- <div class="searchBoxCar">
        <div class="formSearchCar">
          <form action="backend/auth.php" method="POST">
            <div class="rowDetails">
              <p class="searchDetails searchDetails3">Pick-up details</p>
            </div>
            <div class="rowSearchCar">
              <input
                class="inputSearch"
                type="text"
                name="location"
                placeholder="Select a Location"
                required
              />
              <input
                class="inputSearch"
                type="date"
                name="date"
                placeholder="date"
                required
              />
              <input
                class="inputSearch"
                type="time"
                name="time"
                placeholder="time"
                required
              />
            </div>
            <div class="rowDetails">
              <p class="searchDetails searchDetails4">Drop off details</p>
            </div>
            <div class="rowSearchCar">
              <input
                class="inputSearch"
                type="text"
                name="location"
                placeholder="Select a Location"
                required
              />

              <input
                class="inputSearch"
                type="date"
                name="date"
                placeholder="date"
                required
              />

              <input
                class="inputSearch"
                type="time"
                name="time"
                placeholder="time"
                required
              />
            </div>
            <button type="submit" class="btnSearchCar">Search</button>
          </form>
        </div>
      </div> -->

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
        $dateDiff = dateDiffInDays($date1, $date2);

        // Display the result 
        // printf("Difference between two dates: "
        //     . $dateDiff . " Days ");

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
                        <p><?php echo ($_SESSION['fromlocation']) ?></p>
                        <p><?php echo ($_SESSION['fromdate']) ?></p>
                        <p><?php echo ($_SESSION['fromtime']) ?></p>
                        <br />
                        <div class="carPrice">Return</div>
                        <p><?php echo ($_SESSION['tolocation']) ?></p>
                        <p><?php echo ($_SESSION['todate']) ?></p>
                        <p><?php echo ($_SESSION['totime']) ?></p>
                    </div>
                </div>
            </div>

            <div class="paymentCover">
                <!-- card2 -->
                <div class="cardCoverCheckout">
                    <div class="cardCheckout-text2">
                        <div class="cardTextCoverCheckout2">
                            <div class="carPriceCheckout">Summary of charges</div>
                            <p>MVR <?php echo $row['price'] ?></p>
                            <p><?php echo $dateDiff ?> days</p>
                            <br />
                            <div class="carPrice">Total</div>
                            <p>MVR 4000</p>
                        </div>
                        <form method="POST" action="booking.php<?php echo '?id=' . $id; ?>">
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