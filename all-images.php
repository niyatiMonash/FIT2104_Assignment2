<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 17/9/18
 * Time: 3:06 PM
 */
include("connection.php");
include("session.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT image_name, property_id FROM property where image_name != 'NULL'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
    <title>Images</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="welcome.php">Ruthless Real Estate</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="edit-clients.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-properties.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="multiple-properties.php">Property Prices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-type.php">Property Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-feature.php">Property Feature</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="property-search.php">Search Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
if (empty($_POST["check"])) {


//$directory = "property_images/";
//$images = glob("$directory/*.{jpg,png,gif}", GLOB_BRACE);
////             {$directory}*.jpeg, {$directory}*..gif, {$directory}*.svg\")
//
//foreach($images as $image) {
//    echo '<img src="'.$image.'" /><br />';
//}
?>

<div class="container-fluid">
    <h1 align="center">List of Images</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Property No.</th>
            <th scope="col">Image</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <form method="post" action="all-images.php">
            <?php
            while ($row = $result->fetch_array()) {
                ?>
                <tr>
                    <td>Belongs to property No.<?php echo $row["property_id"] ?></td>
                    <td><img src="property_images/<?php echo $row["image_name"]; ?>" alt="property-image"
                             class="img-thumbnail rounded "></td>
                    <td><input type="checkbox" name="check[]" value="<?php echo $row["image_name"]; ?>"></td>
                </tr>

                <?php

            } ?>

        </tbody>
    </table>
    <br/>
    <input type="submit" value="Delete Images" class="btn btn-primary"/>
    </form>
    <?php
    } else {

            ?>
            <input type="button" value="Return to List" OnClick="window.location='all-images.php'"
                   class="btn btn-secondary"><br/>
            <?php
            // Loop to store and display values of individual checked checkbox.
            foreach ($_POST['check'] as $selectedPropertyId) {
                if (count($selectedPropertyId) > 0) {
                    $image_url = "property_images/$selectedPropertyId";
                    if (file_exists($image_url)) {
                        //   code to delete image to be here
                        //  delete image name from property table
                        $query2 = "UPDATE property SET image_name = NULL WHERE image_name = '$selectedPropertyId'";

                        // delete image from property_images/ folder as well
                        chmod($image_url, 0644);
                        unlink("property_images/$selectedPropertyId");
                        $conn->query($query2);
                        echo '<div class="alert alert-success">Image has successfully been deleted </div>';
                    } else {
                        die('<div class="alert alert-danger">Sorry there was an error deleting the image. Please try again.</div>');
                    }
                }
                else {
                    die('<div class="alert alert-danger">Sorry there was an error deleting  the image. Please try again.</div>');}
            }
        }

    ?>

    <br/>
    <!-- Footer to be used in all main pages-->
    <footer class="py-5 bg-danger">
        <div class="container-fluid">
            <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
        </div>
    </footer>
</div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
