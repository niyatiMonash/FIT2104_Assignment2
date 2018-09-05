<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 5/9/18
 * Time: 11:20 AM
 */

include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM feature";
$result = mysqli_query($conn, $query);
?>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
</head>

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="welcome.php">Ruthless Real Estate</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="add-clients.html">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add-properties.html">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-type.php">Property Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-feature.php">Property Feature</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="email-client.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Property Features</h2>
<a><button type="button" href="add-feature.html" class="btn btn-outline-primary">Add Feature</button></a>
<table border="1">

    <?php
    //connection, query and execute statements
    while ($row = $result->fetch_array()) {
        ?>



            <tr>
                <td><?php echo $row["feature_name"] ?> </td>
                <td>
                    <a href="update-feature.php?type_id= <?php echo $row["feature_id"]; ?> &Action=Delete">Delete</a>
                </td>
                <td>
                    <a href="update-feature.php?type_id= <?php echo $row["feature_id"]; ?> &Action=Update">Update</a>
                </td>
            </tr>


        <?php

    }
    ?>

</table>
<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
