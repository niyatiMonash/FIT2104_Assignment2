<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 17/9/18
 * Time: 9:59 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Clients</title>
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
<div class="container-fluid">
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="edit-clients.php">Clients</a></li>
                    <li class="breadcrumb-item active">Add Clients</li>
                </ol>
            </nav>
        </div>
    </div>
    <form method="post" Action="clients.php">
        <div class="alert alert-info" role="alert">
    Please enter client details
</div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> Last Name </label> <input type="text" name="client_lname" class="form-control" required
                                                  onInvalid="this.setCustomValidity('Please enter your last name.')"
                                                  onInput="this.setCustomValidity('')">
            </div>
            <div class="form-group col-md-6">
                <label>First Name </label> <input type="text" name="client_fname" class="form-control" required
                                                  onInvalid="this.setCustomValidity('Please enter your first name.')"
                                                  onInput="this.setCustomValidity('')">
            </div>

            <div class="form-group col-md-6">
                <label>Street </label> <input type="text" name="client_street" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Suburb </label> <input type="text" name="client_suburb" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>State </label> <input type="text" name="client_state" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Postal Code </label> <input type="text" name="client_pc" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="inputEmail4">Email </label> <input type="text" name="client_email" class="form-control"
                                                               id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label>Mobile </label> <input type="text" name="client_mobile" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <p> Subscribe to our mailing list?</p>
            <div class="form-check form-check-inline">
                <input type="radio" name="client_mailinglist" value="Y" checked class="form-check-input" >
                <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="client_mailinglist" value="N" class="form-check-input">
                <label class="form-check-label">No</label>
            </div>
        </div>

        <button type="Submit" Value="Submit" class="btn btn-primary">Add Client</button>
        <button type="Reset" Value="Clear Form Fields" class="btn btn-secondary">Reset Values</button>
    </form>
</div>

<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>