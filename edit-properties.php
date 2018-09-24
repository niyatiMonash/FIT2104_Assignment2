<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 7/9/18
 * Time: 11:13 PM
 */

include("connection.php");
include("session.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM property p join client c on p.seller_id=c.client_id join type t on p.property_type=t.type_id";
$result = mysqli_query($conn, $query);


?>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">

    <style>
        <?php include('stylesheets/bread-crumbs.css'); ?>
    </style>
</head>

</head>
<body class="container-fluid">
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
                <li class="nav-item active">
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

<div class="grid second-nav">
    <div class="column-xs-12">
        <nav>
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                <li class="breadcrumb-item">Properties</a></li>
            </ol>
        </nav>
    </div>
</div>
<h1 align="center">Properties</h1>
<a role="button" href="add-properties.php" class="btn btn-outline-primary float-right">Add Property</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Seller</th>
        <th scope="col">Address</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col">Listing Date</th>
        <th scope="col">Listing Price</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Sale Price</th>
        <th scope="col">Image Name</th>
        <th scope="col">Delete Row</th>
        <th scope="col">Update Row</th>
        <th scope="col">View Property</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_array()) {
        ?>

        <tr>

            <td><?php echo $row["client_fname"]." ".$row["client_lname"]; ?></td>
            <td><?php echo $row["property_street"]."<br/> ".$row["property_suburb"]." ".$row["property_state"]. "<br/>".$row["property_pc"];?></td>
            <td><?php echo $row["type_name"]; ?></td>
            <td><?php echo $row["property_desc"]; ?></td>
            <td><?php echo date("d/m/Y",strtotime($row["listing_date"])); ?></td>
            <td>$<?php echo $row["listing_price"]; ?></td>
            <td><?php echo date("d/m/Y",strtotime($row["sale_date"])); ?></td>
            <td>$<?php echo $row["sale_price"]; ?></td>
            <td><?php echo $row["image_name"]; ?></td>
            <td>
                <a href="update-properties.php?property_id= <?php echo $row["property_id"]; ?> &Action=Delete">Delete</a>
            </td>
            <td>
                <a href="update-properties.php?property_id= <?php echo $row["property_id"]; ?> &Action=Update">Update</a>
            </td>
            <td>
                <a href="view-property.php?property_id= <?php echo $row["property_id"]; ?> &Action=Get">View</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<button class="btn btn-outline-primary">
    <a href='display-source.php?filename=edit-properties.php'>Property</a><br/>
</button>
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

