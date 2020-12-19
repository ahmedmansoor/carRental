<?php
include_once("../db/pdoconn.php");

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
                <form action="backend/auth.php" method="POST">
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails3">Pick-up details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown">
                            <select name="location">
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
                        <input class="inputSearch" type="date" name="date" placeholder="date" required />
                    </div>
                    <div class="rowDetails">
                        <p class="searchDetails searchDetails4">Drop off details</p>
                    </div>
                    <div class="rowSearchCar">
                        <span class="locationDropdown" require>
                            <select>
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

                        <input class="inputSearch" type="date" name="date" placeholder="date" required />

                    </div>
                    <button type="submit" class="btnSearchCar">Search</button>
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
                        <p class="carName" value=><?php echo $row['carname'] ?></p>
                        <p class="mvr">MVR</p>
                        <p class="carPrice" value=><?php echo $row['price'] ?></p>
                        <p class="perday">per day</p>

                        <form action="checkout.php" method="POST">
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

                            <form action="delete.php" method="POST">
                                <button type="sumbit" name="btnDelete" class=" btnDelete">
                                    <a> Delete</a>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
            <?php
            // endwhile;
            ?>
        </div>

    </main>

</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>

<!-- <?php
        // $stmt = $pdo->query("SELECT * FROM cars");
        // while ($row = $stmt->fetch()) {
        //     echo $row['carname'] . "<br />\n";
        //     echo $row['image'] . "<br />\n";
        //     echo $row['price'] . "<br />\n";
        //     echo $row['location'] . "<br />\n";
        //     echo $row['fromdate'] . "<br />\n";
        //     echo $row['todate'] . "<br />\n";
        // }

        // echo "<table 'class='cardCover';'>";
        // echo "<tr><th>Id</th><th>Carname</th><th>Image</th><th>Price</th><th>Location</th><th>ToDate</th><th>FromDate</th></tr>";

        // class TableRows extends RecursiveIteratorIterator
        // {
        //     function __construct($it)
        //     {
        //         parent::__construct($it, self::LEAVES_ONLY);
        //     }

        //     function current()
        //     {
        //         return "<td 'class='cardCover';'>" . parent::current() . "</td>";
        //     }

        //     function beginChildren()
        //     {
        //         echo "<tr>";
        //     }

        //     function endChildren()
        //     {
        //         echo "</tr>" . "\n";
        //     }
        // }

        // try {
        //     $stmt = $pdo->prepare("SELECT * FROM cars");
        //     $stmt->execute();

        //     // set the resulting array to associative
        //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //     foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
        //         echo $v;
        //     }
        // } catch (PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        // }
        // $pdo = null;
        // echo "</table>";

        ?>

                <?php

                // $stmt = $pdo->query("SELECT * FROM cars");
                // while ($row = $stmt->fetch()) {
                //     echo $row['carname'] . "<br />\n";
                //     echo $row['image'] . "<br />\n";
                //     echo $row['price'] . "<br />\n";
                //     echo $row['location'] . "<br />\n";
                //     echo $row['fromdate'] . "<br />\n";
                //     echo $row['todate'] . "<br />\n";

                ?>