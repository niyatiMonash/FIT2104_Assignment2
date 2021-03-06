<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 17/9/18
 * Time: 10:09 PM
 */
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Property Feature</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
    <style>
        <?php include('stylesheets/bread-crumbs.css'); ?>
    </style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ruthless Real Estate</a><div>Welcome <?php echo $_SESSION['login_user'] ?></div>
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
                <li class="nav-item active">
                    <a class="nav-link" href="edit-feature.php">Property Feature</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all-images.php">Images</a>
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
                    <li class="breadcrumb-item"><a href="edit-feature.php">Feature</a></li>
                    <li class="breadcrumb-item active">Add Feature</li>
                </ol>
            </nav>
        </div>
    </div>
    <h1 align="center">Add New Feature</h1>
    <div class="alert alert-info" role="alert">
        Please enter feature details
    </div>
    <form method="post" Action="feature.php">
        <div class="form-group">
            <p>Add a property feature </p>
            Type Name <input type="text" name="feature_name" class="form-control" required
                             onInvalid="this.setCustomValidity('Please enter the property feature.')"
                             onInput="this.setCustomValidity('')">
        </div>

        <input type="Submit" Value="Add Feature" class="btn btn-primary">
        <input type="Reset" Value="Clear Form Fields" class="btn btn-secondary">
    </form>

</div>
</body>
<br/>
<button class="btn btn-outline-primary">
    <a href='display-source.php?filename=add-feature.php'>Add Feature</a><br/>
</button>
<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
