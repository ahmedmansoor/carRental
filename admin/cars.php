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
        <button type="button" class="btnUploadCar">
            <a href="add.php">Add Car</a>
        </button>

        <div class="bannerNoteCar">
            <p>
                Browse all our cars online, and once you have narrowed down your
                search and would like to book a car, simply click the 'Book now'
                button and complete the payment for booking confirmation.
            </p>
        </div>

        <?php
        if (isset($_POST['btnSearchCar'])) {
            $fromlocation = $_POST['fromlocation'];
            $tolocation = $_POST['tolocation'];

            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];

            $fromtime = $_POST['fromtime'];
            $totime = $_POST['totime'];

            $_SESSION['fromlocation']   = $fromlocation;
            $_SESSION['tolocation'] = $tolocation;

            $_SESSION['fromdate'] = $fromdate;
            $_SESSION['todate'] = $todate;

            $_SESSION['fromtime'] = $fromtime;
            $_SESSION['totime'] = $totime;
        ?>

        <div class="searchBoxCar">
            <div class="formSearchCar">
                <form action="cars.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails3">Pick-up details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown locationDropdownCar">
                            <select name="fromlocation" required>
                                <option selected disabled hidden><?php echo $fromlocation ?></option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Ferminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>
                        <input class="inputSearch" type="date" name="fromdate" required="required"
                            value="<?php echo $fromdate ?>" />
                        <input class="inputSearch" type="time" name="fromtime" required="required"
                            value="<?php echo $fromtime ?>" />
                    </div>
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails4">Drop off details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown locationDropdownCar">
                            <select name="tolocation" required>
                                <option selected disabled hidden><?php echo $tolocation ?></option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Ferminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>

                        <input class="inputSearch" type="date" name="todate" required="required"
                            value="<?php echo $todate ?>" />
                        <input class="inputSearch" type="time" name="totime" required="required"
                            value="<?php echo $totime ?>" />

                    </div>
                    <button type="submit" name="btnSearchCar" class=" btnSearchCar">Search</button>
                </form>
            </div>
        </div>

        <?php
        } else {

        ?>

        <div class="searchBoxCar">
            <div class="formSearchCar">
                <form action="cars.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails3">Pick-up details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown locationDropdownCar">
                            <select name="fromlocation" required>
                                <option selected disabled hidden>No Location Selected</option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Ferminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>
                        <input class="inputSearch" type="date" name="fromdate" required="required" />
                        <input class="inputSearch" type="time" name="fromtime" required="required" />
                    </div>
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails4">Drop off details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown locationDropdownCar" required>
                            <select name="tolocation">
                                <option selected disabled hidden>No Location Selected</option>
                                <option>Velana International Airport (Hulhulé)</option>
                                <option>Airport Ferry Terminal (Malé)</option>
                                <option>Hulhumalé Ferry Terminal (Malé)</option>
                                <option>Hulhumale Ferry Ferminal (Hulhumalé)</option>
                                <option>Villingili Ferry Terminal (Malé)</option>
                                <option>Jetty Number 1 (Malé)</option>
                                <option>Jetty Number 2 (Malé)</option>
                                <option>Jetty Number 3 (Malé)</option>
                                <option>Jetty Number 4 (Malé)</option>
                                <option>Jetty Number 5 (Malé)</option>
                                <option>Jetty Number 6 (Malé)</option>
                            </select>
                        </span>

                        <input class="inputSearch" type="date" name="todate" required="required" />
                        <input class="inputSearch" type="time" name="totime" required="required" />

                    </div>
                    <button type="submit" name="btnSearchCar" class=" btnSearchCar">Search</button>
                </form>
            </div>
        </div>

        <?php
        }

        ?>
        <img class="imgBookingAdmin" src="../img/booking.svg" />


        <div class="row">
            <?php
            // $fromlocation = $fromdate = $tolocation = $todate = '';

            if (isset($_POST['btnSearchCar'])) {
                $fromlocation = $_POST['fromlocation'];
                $tolocation = $_POST['tolocation'];

                $fromdate = $_POST['fromdate'];
                $todate = $_POST['todate'];

                $fromtime = $_POST['fromtime'];
                $totime = $_POST['totime'];

                $_SESSION['fromlocation']   = $fromlocation;
                $_SESSION['tolocation'] = $tolocation;

                $_SESSION['fromdate'] = $fromdate;
                $_SESSION['todate'] = $todate;

                $_SESSION['fromtime'] = $fromtime;
                $_SESSION['totime'] = $totime;

                $fromdatefomat = date("d-m-Y", strtotime($fromdate));
                $todatefomat = date("d-m-Y", strtotime($todate));

            ?>

            <div class="searchResultsCover">
                <p class="searchResults">
                    Showing available cars for location <span class="resultsTxt">"<?php echo $fromlocation ?>"</span>
                    from <span class="resultsTxt"> <?php echo $fromdatefomat ?> </span>
                    to <span class="resultsTxt"><?php echo $todatefomat ?> </span>
                    <br><br>
                </p>
            </div>

            <hr class="hr2" />

            <?php

                // $result = $pdo->prepare("SELECT * FROM cars");
                $result = $pdo->prepare("SELECT * FROM cars 
                WHERE location = '$fromlocation' 
                AND fromdate BETWEEN '$fromdate' AND '$todate' 
                AND todate BETWEEN '$fromdate' AND '$todate'");

                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    $id = $row['id'];


                ?>

            <div class="cardCover">
                <div class="card">
                    <div class="imgContainer">
                        <img class="imgCar" src="<?php echo $row['image'] ?>" />
                    </div>
                    <div class=" cardTextCover">
                        <p class="location" value=><?php echo $row['location'] ?></p>
                        <p class="carName" value=><?php echo $row['carname'] ?></p>
                        <p class="mvr">MVR</p>
                        <p class="carPrice" value=><?php echo $row['price'] ?></p>
                        <p class="perday">per day</p>

                        <form action="checkout.php<?php echo '?id=' . $id; ?>" method="POST">
                            <button type="sumbit" name="btnBook" class=" btnBookAdmin">
                                <a>Book now</a>
                            </button>
                        </form>

                        <div class="editdelete">
                            <form method="POST" action="edit.php<?php echo '?id=' . $id; ?>">
                                <button type="sumbit" class="btnEdit" class=" btnEdit">
                                    <a>Edit</a>
                                </button>
                            </form>

                            <form action="../backend/delete.php<?php echo '?id=' . $id; ?>" method="POST">
                                <button type="sumbit" name="btnDelete" class=" btnDelete">
                                    <a>Delete</a>
                                </button>
                            </form>
                            <!-- <div class="dropdown">
                                <button onclick="myFunction()" class="btnDelete1">Delete</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <form action="../backend/delete.php<?php echo '?id=' . $id; ?>" method="POST"
                                        class="btnDeleteConfirm">
                                        <button>
                                            <a>Confirm</a>
                                        </button>
                                    </form>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                $result = $pdo->prepare("SELECT * FROM cars");
                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    $id = $row['id'];
                ?>
            <div class="cardCover">
                <div class="card">
                    <div class="imgContainer">
                        <img class="imgCar" src="<?php echo $row['image'] ?>" />
                    </div>
                    <div class=" cardTextCover">
                        <p class="location" value=><?php echo $row['location'] ?></p>
                        <p class="carName" value=><?php echo $row['carname'] ?></p>
                        <p class="mvr">MVR</p>
                        <p class="carPrice" value=><?php echo $row['price'] ?></p>
                        <p class="perday">per day</p>

                        <form action="checkout.php<?php echo '?id=' . $id; ?>" method="POST">
                            <button type="sumbit" name="btnBook" class="btnBookAdmin">
                                <a>Book now</a>
                            </button>
                        </form>

                        <div class="editdelete">
                            <form method="POST" action="edit.php<?php echo '?id=' . $id; ?>">
                                <button type="sumbit" class="btnEdit" class=" btnEdit">
                                    <a>Edit</a>
                                </button>
                            </form>

                            <form action="../backend/delete.php<?php echo '?id=' . $id; ?>" method="POST">
                                <button type="sumbit" name="btnDelete" class=" btnDelete">
                                    <a>Delete</a>
                                </button>
                            </form>
                            <!-- <div class="dropdown">
                                <button onclick="myFunction()" class="btnDelete1">Delete</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <form action="../backend/delete.php<?php echo '?id=' . $id; ?>" method="POST"
                                        class="btnDeleteConfirm">
                                        <button>
                                            <a>Confirm</a>
                                        </button>
                                    </form>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>


        <!-- <div class="dropdown">
            <button onclick="myFunction()" class="btnDelete1">Delete</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#home">Confirm</a>
            </div>
        </div> -->
        <!-- 
        <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.btnDelete1')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        </script> -->

    </main>

</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>