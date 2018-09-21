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
$query = "SELECT * FROM client c join property p on c.client_id=p.seller_id join type t on p.property_type=t.type_id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$query2 = "Select * from authenticate";
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();

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
        </div>

        <div class="col-sm" align="center">
            <!--        class="agent-details"-->
            <p> <h4><u>Contact Agent:</u></h4></p><br/>
            <h4><?php echo $row2["given_name"]; ?><?php echo $row2["family_name"]; ?></h4></br>
            <button class="btn btn-info btn-lg">Email Agent</button>

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
    <div class="property-features">
        <h4><u>Property Features:</u></h4>
        <form method="post" action="view-property.php?property_id=<?php echo $_GET["property_id"]; ?>">
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
                $query3 = "SELECT * FROM feature ORDER BY feature_name";
                $result3 = $conn->query($query3);
                $property_id = $_GET["property_id"];

                while ( $row3 = $result3->fetch_assoc()) {
                    $query4 = "SELECT * FROM property_feature WHERE property_id =".$property_id." AND feature_id =".$row3["feature_id"];
                    $result4 = $conn->query($query4);
                    $pf = $result4->fetch_assoc();
                    ?>
                    <tr>
                    <td><?php echo $row3["feature_name"] ?></td>
                    <td><input type="text" name="feature_desc" class="form-control"
                               value="<?php echo $pf["feature_desc"] ?>"</td>
                    <?php
                        if($pf["feature_desc"] == ''){
                            ?>
                            <td align="center"><input type="checkbox" name="check[]" value="<?php echo $row3["feature_id"]; ?>"></td>
                            <?php
                        }else{
                            ?>
                            <td align="center"><input type="checkbox" name="check[]" checked value="<?php echo $row3["feature_id"]; ?>"></td>
                        <?php
                            }
                } ?></tr>
                </tbody>
            </table>
            </br>
            <input type="submit" value="Update Feature/s" class="btn btn-primary"/>
        </form>
        <?php
        } else {
            if (isset($_POST["submit"])) {
                $query5 = "delete * from property_feature where property_id =".$_GET["property_id"];
                $result5 = $conn->query($query5);
                foreach ($_POST["check"] as $feature_id) {
                    $query6 = "Insert into property_feature set feature_desc='$_POST[feature_desc]' WHERE feature_id = $feature_id";
                    $conn->query($query6);
                    echo "Property number '$feature_id' has successfully updated features<br/>";
                }

            }

            ?>
            <input type="button" value="Return to List" class="btn btn-secondary" OnClick="window.location='view-property.php'"><br/>
        <?php }
        ?>
    </div>

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
