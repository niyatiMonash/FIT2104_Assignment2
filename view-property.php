<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 11/9/18
 * Time: 10:05 AM
 */
include("session.php");
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM client c join property p on c.client_id=p.seller_id join type t on p.property_type=t.type_id where property_id =" . $_GET["property_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();
$query2 = "Select * from authenticate";
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();
$query3 = "select * from property_feature p join feature f on p.feature_id=f.feature_id where property_id =" . $_GET["property_id"];
$result3 = $conn->query($query3);
$row3 = $result3->fetch_assoc();
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

    <style>
        <?php include('stylesheets/bread-crumbs.css'); ?>
    </style>
    <title>Add Properties</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ruthless Real Estate</a>
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
                    <a class="nav-link" href="property-search.php">Properties</a>
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
                    <a class="nav-link" href="documentation.php">Documentation</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="property-search.php">Properties</a></li>
                    <li class="breadcrumb-item active"><?php echo $row["property_street"] ?> </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--    display property specific details-->
    <div class="text-center">
        <img src="property_images/<?php echo $row["image_name"]; ?>" alt="property-image"
             class="img-fluid rounded">
    </div>
    </br>
    </br>
    <div class="row">
        <div class="col-sm">
            <!--        class="property-details"-->
            <h4><u>Address:</u></h4>
            <p>
            <h3><?php echo $row["property_street"]; ?>,
                <br/><?php echo $row["property_suburb"]; ?> <?php echo $row["property_state"]; ?> <?php echo $row["property_pc"]; ?>
            </h3></p>
            <h4><u>Description:</u></h4>
            <p>  <h5><?php echo $row["property_desc"]; ?></h5> </p>
            <h4><u>Property Features:</u></h4>
            <p> <h5><?php echo $row3["feature_name"]; ?>: <?php echo $row3["feature_desc"]; ?></h5> </p>
        </div>

        <div class="col-sm" align="center">
            <!--        class="agent-details"-->
            <p> <h4><u>Contact Agent:</u></h4></p><br/>
            <h4><?php echo $row2["given_name"]; ?><?php echo $row2["family_name"]; ?></h4></br>
            <button class="btn btn-outline-secondary btn-lg"><a
                        href="mailto:enquiry@ruthlessrealestate.com?Subject=Property%20Enquiry" target="_top"> Email
                    Agent</a></button>

        </div>

        <div class="col-sm" align="center">
            <!--        class="property-listing"-->
            <h4><u>Price:</u></h4>
            <p>
            <h1>$<?php echo $row["listing_price"]; ?></h1> </p></br>
            <p><h5><u>Date listed:</u> <?php echo $row["listing_date"]; ?></h5></p>

        </div>
    </div>
    </br>
    </br>

    <h4>Similar Properties:</h4>
    <div class="row">

        <div class="col portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Goldcoast, Queensland</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Surfer's Paradise, Queensland</a>
                    </h4>

                </div>
            </div>
        </div>

        <div class="col portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Stretton, Brisbane</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Betau Bay, Brisbane</a>
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=view-property.php'>View Property</a><br/>
    </button>
    </br>
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
