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
$query = "SELECT * FROM property p 
          join client c on p.seller_id=c.client_id 
          join type t on p.property_type=t.type_id WHERE property_id =" . $_GET["property_id"];

$result = $conn->query($query);
$row = $result->fetch_assoc();
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <!--    display property specific details-->
    <img src="property_images/<?php echo $row["image_name"]; ?>" alt="property-image"
         class="img-thumbnail rounded ">
    <div class="property-details">
        <h1> <?php echo $row["property_street"]; ?>, <?php echo $row["property_suburb"]; ?></h1>
        <h2> <?php echo $row["property_state"]; ?><?php echo $row["property_pc"]; ?></h2>
        <p>  <?php echo $row["property_desc"]; ?></p>
    </div>

    <div class="agent-details">
        <p> Agent Details</p>
    </div>
    <div class="property-listing">
        <p> <?php echo $row["listing_price"]; ?></p>
        <p> <?php echo $row["listing_date"]; ?></p>
    </div>

    <div class="property-features">
        <form method="post" action="view-property.php">
            <table>
                <thead>
                <tr>
                    <th>Feature Name</th>
                    <th>Feature Description</th>
                    <th>CheckBox</th>
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
                    <br>
                    <td><?php echo $row["feature_name"] ?></td>
                    <td><input type="text" name="feature_desc" value="<?php echo $pf["feature_desc"] ?>"</td>
                    <?php
                    if (isset($pf["feature_desc"])) {
                        ?>
                        <td><input type="checkbox" name="check" checked value="<?php echo $row["property_id"]; ?>"></td>
                        <br/>
                        <?php
                    } else {
                        ?>
                        <td><input type="checkbox" name="check" value="<?php echo $row["property_id"]; ?>"></td><br/>
                        <?php
                    }
                    ?>

                    </tr>

                    <?php
                } ?>
                </tbody>
            </table>
            <input type="submit" value="Update" class="btn btn-primary"/>
        </form>
    </div>
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
