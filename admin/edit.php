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
        <div class="banner bannerAdmin">
            <h2>Edit a Car</h2>
        </div>

        <div class="bannerNoteCheckout">
            <i class="material-icons">reply</i>
            <a href="./cars.php">Go back (Cars)</a>
        </div>

        <img class="imgUpload" src="../img/upload.svg" />


        <?php
        // include_once("../db/pdoconn.php");

        $ID = $_GET['id'];
        $fromlocation = $_SESSION['fromlocation'];

        $stmt = $pdo->prepare("SELECT * FROM cars where id='$ID'");
        $stmt->execute();
        for ($i = 0; $row = $stmt->fetch(); $i++) {
            $id = $row['id'];

        ?>

            <div class="formUpload">
                <!-- <form method="POST" action="../backend/update.php <?php echo '?id=' . $id; ?>" -->
                <form method="POST" action="../backend/update.php <?php echo '?id=' . $id; ?>" enctype="multipart/form-data">
                    <div class="formUploadGroup">
                        <label>Car Name</label>
                        <input type="text" name="carname" class="form-control" required value=<?php echo $row['carname']; ?>>
                    </div>

                    <div class="formUploadGroup">
                        <label>Price Per Day</label>
                        <input type="number" name="price" class="form-control" required value=<?php echo $row['price']; ?>>
                    </div>

                    <div class="formUploadGroup">
                        <label>Location</label><br /><br />
                        <span class="locationDropdown locationDropdownAdmin">
                            <select name="location" required>
                                <option selected hidden><?php echo $fromlocation ?></option>
                                <option>Velana International Airport (Hulhule)</option>
                                <option>Airport Ferry Terminal (Male)</option>
                                <option>HulhuMale Ferry Terminal (Male)</option>
                                <option>Hulhumale Ferry Terminal (Hulhumale)</option>
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
                            <input type="date" name="fromdtime" class="formDate" required="required">
                        </div>

                        <div class="formUploadGroup-date">
                            <label>Available To</label>
                            <input type="date" name="totime" class="formDate" required="required">
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
                        Update
                    </button>
                </form>
            <?php } ?>
            </div>
    </main>
</body>

<footer class="footer">
    <div class="footerContainer">
        <p class="footerNote">Copyright &copy; Maldives Travel Company 2020</p>
    </div>
</footer>

</html>