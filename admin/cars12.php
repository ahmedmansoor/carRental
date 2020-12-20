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

        <div class="searchBoxCar">
            <div class="formSearchCar">
                <form action="cars12.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails3">Pick-up details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown">
                            <select name="fromlocation">
                                <option>No Location Selected</option>
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
                        <input class="inputSearch" type="date" name="fromdate" placeholder="date" required />
                    </div>
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails4">Drop off details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown" require>
                            <select name="tolocation">
                                <option>No Location Selected</option>
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

                        <input class="inputSearch" type="date" name="todate" placeholder="date" required />

                    </div>
                    <button type="submit" name="btnSearchCar" class=" btnSearchCar">Search</button>
                </form>
            </div>
        </div>

        <img class="imgBookingAdmin" src="../img/booking.svg" />


        <div class="row">
            <?php
            // $stmt = $pdo->query("SELECT * FROM cars");
            // while ($row = $stmt->fetch()) :
            ?>

            <?php
            // $fromlocation = $fromdate = $tolocation = $todate = '';

            if (isset($_POST['btnSearchCar'])) {
                $fromlocation = $_POST['fromlocation'];
                $fromdate = $_POST['fromdate'];
                $tolocation = $_POST['tolocation'];
                $todate = $_POST['todate'];


                // echo ($fromlocation);
                // echo '<pre>';
                // var_dump($_POST);
                // echo '<pre>';

                // $result = $pdo->prepare("SELECT * FROM cars");
                $result = $pdo->prepare("SELECT * FROM cars 
                WHERE location = '$fromlocation' 
                AND fromdate BETWEEN '$fromdate' AND '$todate' 
                AND todate BETWEEN '$fromdate' AND '$todate'");
                // $result = $pdo->prepare("SELECT * FROM cars WHERE location = '$fromlocation' AND fromdate BETWEEN '2020-12-01' AND '2020-12-10'");
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
                        <p class="carName" value=><?php echo $row['carname'] ?></p>
                        <p class="mvr">MVR</p>
                        <p class="carPrice" value=><?php echo $row['price'] ?></p>
                        <p class="perday">per day</p>

                        <form action="checkout.php<?php echo '?id=' . $id; ?>" method="POST">
                            <button type="sumbit" class="btnBookAdmin">
                                <a> Book now</a>
                            </button>
                        </form>

                        <div class="editdelete">
                            <form method="POST" action="edit.php<?php echo '?id=' . $id; ?>">
                                <button type="sumbit" class="btnEdit" class=" btnEdit">
                                    <a> Edit</a>
                                </button>
                            </form>

                            <form action="../backend/delete.php<?php echo '?id=' . $id; ?>" method="POST">
                                <button type="sumbit" name="btnDelete" class=" btnDelete">
                                    <a> Delete</a>
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
                echo
                    "<script>
            alert('An Error occured.');
            </script>";
            }
            ?>
            <?php
            // endwhile;
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