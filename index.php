<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 7:34 PM
 */


?>

<html>
<style>
    <?php include('stylesheets/welcome.css'); ?>
</style>

<head>
    <title>Welcome </title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
</head>

<body>
<!--This is the nav bar to be used for all pages-->
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
                    <a class="nav-link" href="all-images.php">Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="documentation.php">Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="stockImages/architecture-beautiful-exterior-106399.jpg"
                     alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="stockImages/architecture-brick-building-209315.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="stockImages/architecture-building-facade-164516.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="stockImages/architecture-bungalow-country-463996.jpg"
                     alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--3 content section-->
    <div class="row three-section-content">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Top 10 best interior designs of 2018</a>
                    </h4>
                    <p class="card-text">A new year means a new start, so why not begin in the home? When it comes to
                        the fixtures, art, and materials that are trending in 2018, there are no better experts to ask,
                        than the designers, architects, decorators, and artists working with these very items
                        today. </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Creating an Australian Dream</a>
                    </h4>
                    <p class="card-text">The origin of the Australian Dream dates back to the period of reconstruction
                        following World War II. The dream flowered in the 1950s and 1960s due chiefly to the expansion
                        of Australian manufacturing, low unemployment rates, the baby boom and the removal of rent
                        controls.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Why Melbourne is the best place to live in</a>
                    </h4>
                    <p class="card-text">Whether it's relaxing, dining, people watching or shopping, Melbourne seems to
                        have it all in a colorful and artistic heritage environment. Melbourne has a diverse environment
                        with people coming from all walks of life. In no particular order, here are 50 reasons Melbourne
                        fans think it's the best place in the world to live. </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>