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
                <a href="home.html">Car Rentals</a>
            </h3>
            <div>
                <ul class="tabs">
                    <li class="home">
                        <a href="home.html">Home</a>
                    </li>
                    <li class="home"><a href="cars.html" class="active">Cars</a></li>
                    <li class="about"><a href="about.html">About</a></li>
                    <li class="contact">
                        <a href="contact.html">Contact</a>
                    </li>
                    <button type="button" class="btnSignIn1">
                        <a href="./profile.html">Profile</a>
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
            <a href="./upload.html">Add Car</a>
        </button>

        <div class="bannerNoteCar">
            <p>
                Browse all our cars online, and once you have narrowed down your
                search and would like to book a car, simply click the 'Book now'
                button and complete the payment for booking confirmation.
            </p>
        </div>

        <img class="imgBooking" src="../img/booking.svg" />

        <!-- Search -->
        <!-- <div class="searchBoxCar">
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

        <div class="row"> -->
        <!-- card1 -->
        <!-- <div class="cardCover">
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
            </div> -->

        <!-- card2 -->
        <!-- <div class="cardCover">
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
            </div> -->

        <!-- card3 -->
        <!-- <div class="cardCover">
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
    </main> -->


        <div class="cardCover">
            <div class="card">
                <div class="imgContainer">
                    <img class="imgCar" src="../img/cars/Aston Martin DBS Superleggera.jpg" />
                </div>
                <div class="cardTextCover">
                    <p class="carName" value>Audi RS6 Avant/RS7</p>
                    <p class="carPrice">MVR 1000</p>
                    <p class="perday">per day</p>
                    <button type="button" class="btnBook">
                        <a href="/user/checkout.html">Book now</a>
                    </button>
                </div>
            </div>
        </div>
        </div>

        <?php

        require_once "../db/pdoconn.php";

        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

        class TableRows extends RecursiveIteratorIterator
        {
            function __construct($it)
            {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current()
            {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
            }

            function beginChildren()
            {
                echo "<tr>";
            }

            function endChildren()
            {
                echo "</tr>" . "\n";
            }
        }

        try {
            $stmt = $pdo->prepare("SELECT * FROM cars");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $pdo = null;
        echo "</table>";

        ?>;

        <!-- </body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html> -->