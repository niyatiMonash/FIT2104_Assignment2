<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 6/9/18
 * Time: 6:13 PM
 */

include("connection.php");
include("session.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM type ORDER BY type_name";
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

    <form method="POST" Action="properties.php" >
        <p>Please enter your property details below </p>
        <div class="form-group">
            First Name <input type="text" name="client_fname" class="form-control">
            Last Name <input type="text" name="client_lname" class="form-control">
            Street <input type="text" name="property_street" class="form-control">
            Suburb <input type="text" name="property_suburb" class="form-control">
            State <input type="text" name="property_state" class="form-control">
            Postal Code <input type="text" name="property_pc" class="form-control">
        </div>
        <div>

                Select Property Type<br/>
                <select name="property_type">
                    <?php
                    while ($row = $result->fetch_array()) {
                        ?>
                        <option value="<?php echo $row["type_id"]; ?>"><?php echo $row["type_name"];
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

        </div>
        <div class="form-group">
            Property Description <textarea name="property_desc" class="form-control"> </textarea>
            Listing Date <input type="date" name="listing_date" class="form-control">
            Listing Price <input type="number" name="listing_price" class="form-control">
        </div>
        <div class="form-group">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" class="btn btn-default" value="Upload Image" name="submit">
        </div>
        <button type="Submit" Value="Submit" class="btn btn-primary">Submit</button>
        <button type="Reset" Value="Clear Form Fields" class="btn btn-secondary">Reset Values</button>
    </form>

</div>
</body>
<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
