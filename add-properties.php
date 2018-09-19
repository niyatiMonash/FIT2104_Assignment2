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
$query2 = "SELECT * FROM client order by client_fname, client_lname";
$result = mysqli_query($conn, $query);
$results = mysqli_query($conn, $query2);
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">

    <style>
        <?php include('stylesheets/bread-crumbs.css'); ?>
    </style>

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
                    <a class="nav-link" href="property-search.php">Search Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script type="text/javascript">
    function val() {
        if (form.seller_id.selectedIndex == 0){
            alert('Please select a Seller');
            form.seller_id.focus();
            return false;
        }
        if (form.property_type.selectedIndex==0) {
            alert('Please select a Property Type');
            form.seller_id.focus();
            return false;

        }
        return true;
    }
</script>
<div class="alert alert-info" role="alert">
    Please enter property details
</div>
<div class="container-fluid">
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="edit-properties.php">Properties</a></li>
                    <li class="breadcrumb-item active">Add Property</li>
                </ol>
            </nav>
        </div>
    </div>
    <form name="form" method="POST" Action="properties.php" enctype="multipart/form-data" >
        <p>Please enter your property details below </p>
        <div>

            Select Seller<br/>
            <select name="seller_id" >
                <option value="">Select Seller</option>
                <?php
                while ($row = $results->fetch_array()) {
                    ?>
                    <option value="<?php echo $row["client_id"]; ?>"><?php echo $row["client_fname"]." ".$row["client_lname"];
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            Street <input type="text" name="property_street" class="form-control" required
                          onInvalid="this.setCustomValidity('Please enter your street.')"
                          onInput="this.setCustomValidity('')">
            Suburb <input type="text" name="property_suburb" class="form-control" required
                          onInvalid="this.setCustomValidity('Please enter your suburb.')"
                          onInput="this.setCustomValidity('')">
            State <input type="text" name="property_state" class="form-control" required
                         onInvalid="this.setCustomValidity('Please enter your state.')"
                         onInput="this.setCustomValidity('')">
            Postal Code <input type="text" name="property_pc" class="form-control" required
                               onInvalid="this.setCustomValidity('Please enter your postcode.')"
                               onInput="this.setCustomValidity('')">
        </div>
        <div>

            Select Property Type<br/>
            <select name="property_type">
                <option value="">Select Type </option>
                <?php
                while ($row = $result->fetch_array()) {
                    ?>

                    <option value="<?php echo $row["type_id"]; ?>" required
                            onInvalid="this.setCustomValidity('Please select a type.')"
                            onInput="this.setCustomValidity('')"><?php echo $row["type_name"];
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            Property Description <textarea name="property_desc" class="form-control"> </textarea>
            Listing Date <input type="date" name="listing_date" class="form-control" required
                                onInvalid="this.setCustomValidity('Please enter the listing date for the property.')"
                                onInput="this.setCustomValidity('')">
            Listing Price <input type="number" name="listing_price" class="form-control" required
                                 onInvalid="this.setCustomValidity('Please enter the listing price for the property.')"
                                 onInput="this.setCustomValidity('')">
        </div>
        <div class="form-group">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <div id="thumbnail"></div>
        </div>
        <button type="submit" Value="Submit" class="btn btn-primary" onclick="return val();">Add Property</button>
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
