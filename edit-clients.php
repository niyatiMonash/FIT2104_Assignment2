<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 30/8/18
 * Time: 9:15 PM
 */
include("connection.php");
include("session.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM client";
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
                <li class="nav-item active">
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
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <h2>Clients</h2>
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                    <li class="breadcrumb-item">Clients</a></li>
                </ol>
            </nav>
        </div>
    </div>

<a role="button" href="add-clients.php" class="btn btn-outline-primary float-right">Add Clients</a>
<a role="button" href="pdf-client.php" class="btn btn-outline-primary float-right">Export to .pdf file</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Last Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Street</th>
        <th scope="col">Suburb</th>
        <th scope="col">State</th>
        <th scope="col">Postal Code</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Delete Row</th>
        <th scope="col">Update Row</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_array()) {
        ?>

            <tr>
                <td><?php echo $row["client_lname"]; ?></td>
                <td><?php echo $row["client_fname"]; ?></td>
                <td><?php echo $row["client_street"]; ?></td>
                <td><?php echo $row["client_suburb"]; ?></td>
                <td><?php echo $row["client_state"]; ?></td>
                <td><?php echo $row["client_pc"]; ?></td>
                <td><?php echo $row["client_email"]; ?></td>
                <td><?php echo $row["client_mobile"]; ?></td>
                <td>
                    <a href="update-clients.php?client_id= <?php echo $row["client_id"]; ?> &Action=Delete">Delete</a>
                </td>
                <td>
                    <a href="update-clients.php?client_id= <?php echo $row["client_id"]; ?> &Action=Update">Update</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=edit-clients.php'>Client</a><br/>
    </button>
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

