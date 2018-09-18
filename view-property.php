<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 11/9/18
 * Time: 10:05 AM
 */
include("session.php");
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM property p join client c on p.seller_id=c.client_id join type t on p.property_type=t.type_id WHERE p.property_id =" . $_GET["property_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();
$query2 ="Select * from authenticate";
$results = $conn->query($query2);
$rows = $results->fetch_assoc();

if (empty($_POST["check"])) {
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
                    <li class="breadcrumb-item"><a href="edit-properties.php">Properties</a></li>
                    <li class="breadcrumb-item active"><?php echo $row["property_street"]?> </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--    display property specific details-->
    <div>
    <img src="property_images/<?php echo $row["image_name"]; ?>" alt="property-image"
         class="img-fluid rounded " width="100%" height="auto">
    </div>
    </br>
    </br>
<div class="row">
    <div  class="col-sm" >
<!--        class="property-details"-->
        <h4><u>Address:</u></h4>
        <p> <h3><?php echo $row["property_street"]; ?>, <br/><?php echo $row["property_suburb"]; ?> <?php echo $row["property_state"]; ?> <?php echo $row["property_pc"]; ?> </h3></p>
        <h4><u>Description:</u></h4>
        <p>  <h5><?php echo $row["property_desc"]; ?></h5> </p>
    </div>

    <div  class="col-sm" align="center">
<!--        class="agent-details"-->
        <p> <h4><u>Contact Agent:</u></h4></p><br/>
        <h4><?php echo $rows["given_name"];?> <?php echo $rows["family_name"];?></h4></br>
        <button class="btn btn-info btn-lg">Email Agent</button>

    </div>

    <div class="col-sm" align="center">

<!--        class="property-listing"-->
        <h4><u>Price:</u></h4>
        <p><h1>$<?php echo $row["listing_price"]; ?></h1> </p></br>
        <p><h5><u>Date listed:</u> <?php echo $row["listing_date"]; ?></h5></p>

    </div>
</div>
    </br>
    </br>
    <div class="property-features">
        <h4><u>Property Features:</u></h4>
        <form method="post" action="view-property.php">
            <table border="1" cellpadding="10">
                <thead>
                <tr>
                    <th scope="col">Feature Name</th>
                    <th scope="col">Feature Description</th>
                    <th scope="col">CheckBox</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query2 = "SELECT * FROM feature ORDER BY feature_name";

                $result = $conn->query($query2);
                while ($row = $result->fetch_assoc()) {
                    $query3 = "SELECT * FROM property_feature 
                               WHERE property_id =" . $_GET["property_id"] . " AND feature_id =" . $row["feature_id"];
                    $result2 = $conn->query($query3);
                    $pf = $result2->fetch_assoc();
                    ?>
                    <td><?php echo $row["feature_name"] ?></td>
                    <td  ><input type="text" name="feature_desc" class="form-control" value="<?php echo $pf["feature_desc"] ?>"</td>
                    <?php
                    if (isset($pf["feature_desc"])) {
                        ?>
                        <td align="center"><input type="checkbox" name="check" checked value="<?php echo $row["property_id"]; ?>"></td>

                        <?php
                    } else {
                        ?>
                        <td align="center"><input type="checkbox" name="check" value="<?php echo $row["property_id"]; ?>"></td>
                        <?php
                    }
                    ?>
                    </tr>

                    <?php
                } ?>
                </tbody>
            </table>
        </br>
            <input type="submit" value="Update" class="btn btn-primary"/>
<!--            <input type="button" value="Delete" class="btn btn-primary" OnClick="confirm_delete();">-->
        </form>
        <?php
        } else
            foreach ($_POST["check"] as $feature_id) {
                $query2 = "UPDATE property_feature set feature_id = $_POST[feature_id] WHERE feature_id = $feature_id";
                $conn->query($query2);

                echo "Feature number '$feature_id' has been successfully updated<br/>";

            }
        ?>
    </div>
</div>
</br>
</br>
</br>
<h4>Similar Properties:</h4>
</br>
<div class="row">

    <div class="col portfolio-item" >
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
</div>
<button class="btn btn-outline-primary" >
    <a href='display-source.php?filename=view-property.php'>Property Feature</a><br/>
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
