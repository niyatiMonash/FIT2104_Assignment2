
<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
    <?php include('stylesheets/property-search.css'); ?>
    <?php include('stylesheets/bread-crumbs.css'); ?>
</style>
<head>
    <title>Search</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
                    <a class="nav-link" href="Logout.php">Logout</a>
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
                    <li class="breadcrumb-item">Property Search</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <h1 align="center"> Search Properties</h1>
    <form action="search.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="query" id="search_text" class="form-control"
                   placeholder="Search properties based on suburb or property type"
                   aria-label="Search properties based on suburb or property type" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
        <div class="form-group">
            <p> Search By:</p>
            <div class="form-check form-check-inline">
                <input type="radio" name="selection" value="suburb" checked class="form-check-input" >
                <label class="form-check-label">Suburb</label>
            </div>
            <div class="form-check form-check-inline" >
                <input  type="radio" name="selection" value="type" class="form-check-input">
                <label class="form-check-label">Property Type</label>
            </div>

        </div>
    </form>
    <div id="result"></div>
</div>
</body>
<button class="btn btn-outline-primary">
    <a href='display-source.php?filename=property-search.php'>Property Search</a><br/>
</button>
<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {

        load_data();

        function load_data(query, selection) {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {query: query, selection: selection},
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }


        $('#search_text').keyup(function () {
            var search = $(this).val();
            var selected =  document.querySelector('input[name="selection"]:checked').value;
            if (search != '') {
                load_data(search, selected);
            }
            else {
                load_data();
            }
        });

    });
</script>

</html>