<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 24/9/18
 * Time: 11:02 AM
 */
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
        <a class="navbar-brand" href="index.php">Ruthless Real Estate</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
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
                    <a class="nav-link" href="all-images.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item active">
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
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Documentation</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <h1> FIT 2104: WEB DATABASE INTERFACE </h1>

    <h2> Assignment 2, Application Development and Implementation. </h2>

    <h3> Niyati Srinivasan 29765706 & Stephanie Tran 27805247</h3>
    <h3> Supervisor: Janet Fraser</h3>
    <h3> Date of Submission: 5th October 2018 </h3>

    <p><u> To login: </u></p>
    <p><b>Username</b>: niyatiS</p>
    <p><b>Password</b>: test123 </p>


    <p><u> Database Credentials: </u></p>
    <p> $servername = "130.194.7.82"; </p>
    <p> $username = "s29765706"; </p>
    <p> $password = "monash00";</p>
    <p> $dbname = "s29765706"; </p>

    <p><u> To login to Triton: </u></p>
    <p><b>Username</b>: s29765706</p>
    <p><b>Password</b>: mymonashuniversity </p>

    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=script.sql'>SQL Script</a><br/>
    </button>
    </br>

    <button class="btn btn-outline-primary">
        <a href='https://docs.google.com/document/d/1qtvXRpxt-AU869of0RP_9YYpTPyECCdh4hvO8vR0-FU/edit?usp=sharing'>Assignment
            Task Allocation</a>

    </button>

    <button class="btn btn-outline-primary">
        <a href='data-in-database.php'>Data in Database</a><br/>
    </button>
</div>
</body>
</html>