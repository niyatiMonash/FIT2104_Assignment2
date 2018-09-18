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
$query = "SELECT image_name, property_id FROM property";
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
    <title>Add Properties</title>
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    while ($row = $result->fetch_array()) {
        ?>
        <img src="property_images/<?php echo $row["image_name"]; ?>" alt="property-image"
             class="img-thumbnail rounded ">
        <div>
            <p>This image belongs to <?php echo $row["property_id"] ?></p>
            <input type="checkbox" name="check[]" value="<?php echo $row["property_id"]; ?>">
        </div>
        <button class="btn btn-outline-danger" name="delete">delete image</button>
        <?php
    }
    if (!empty($_POST['check'])) {
        // Loop to store and display values of individual checked checkbox.
        foreach ($_POST['check'] as $selectedPropertyId) {
            if (count($selectedPropertyId) > 0) {
//                $query2 = "SELECT image_name from property where property_id =" . $selectedPropertyId;
//                code to delete image to be here
//                delete image name from property table
//                delete image from property_images/ folder as well
//                unlink()
                echo '<div class="alert alert-success">Image has successfully been deleted </div>';
            } else {
                echo '<div class="alert alert-danger">Sorry there was an error deleting the image. Please try again later</div>';
            }
        }
    }
    ?>
</div>

</body>
</html>
