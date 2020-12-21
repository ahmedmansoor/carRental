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
        <div class="banner bannerAdmin">
            <h2>Add a Car</h2>
        </div>

        <div class="bannerNoteCheckout">
            <i class="material-icons">reply</i>
            <a href="./cars.php">Go back (Cars)</a>
        </div>

        <img class="imgUpload" src="../img/upload.svg" />

        <div class="formUpload">
            <form method="POST" action="../backend/upload.php" enctype="multipart/form-data">
                <div class="formUploadGroup">
                    <label>Car Name</label>
                    <input type="text" name="carname" class="form-control" placeholder="Enter car name"
                        required="required" />
                </div>

                <div class="formUploadGroup">
                    <label>Price Per Day</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter price per day"
                        required="required" />
                </div>

                <div class="formUploadGroup">
                    <label>Locations</label><br /><br />
                    <span class="locationDropdown locationDropdownAdmin">
                        <select name="location">
                            <option>No Location Selected</option>
                            <option>Velana International Airport (Hulhule)</option>
                            <option>Airport Ferry Terminal (Male)</option>
                            <option>Hulhumalé Ferry Terminal (Male)</option>
                            <option>Hulhumale Ferry Ferminal (Hulhumale)</option>
                            <option>Villingili Ferry Terminal (Male)</option>
                            <option>Jetty Number 1 (Male)</option>
                            <option>Jetty Number 2 (Male)</option>
                            <option>Jetty Number 3 (Male)</option>
                            <option>Jetty Number 4 (Male)</option>
                            <option>Jetty Number 5 (Male)</option>
                            <option>Jetty Number 6 (Male)</option>
                        </select>
                    </span>
                </div>

                <div class="formUploadDate">
                    <div class="formUploadGroup-date">
                        <label>Available From</label>
                        <input type="date" name="fromdate" class="formDate" required="required" />
                    </div>

                    <div class="formUploadGroup-date">
                        <label>Available To</label>
                        <input type="date" name="todate" class="formDate" required="required" />
                    </div>
                </div>

                <div class="formUploadGroup">
                    <label>Upload Image</label>
                    <input type="hidden" name="size" value="100000" />
                    <div>
                        <input type="file" class="fileImage" name="image" required="required" />
                    </div>
                </div>
                <button name="btnUpload" class="btnUpload" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>