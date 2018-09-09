<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 9/9/18
 * Time: 6:26 PM
 */

include("connection.php");
include("session.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT property_id, property_state, property_street, property_suburb, property_pc, listing_price FROM property";
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
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Property ID</th>
        <th scope="col">Address</th>
        <th scope="col">Checkbox</th>
        <th scope="col">Listing Price</th>


    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_array()) {
        ?>

        <tr>
            <td><?php echo $row["property_id"]?></td>
            <td><?php echo $row["property_street"] . "<br/> " . $row["property_suburb"] . " " . $row["property_state"] . "<br/>" . $row["property_pc"]; ?></td>
            <td><input type="checkbox" name="check[]" value="<?php echo $row["property_id"]; ?>"></td>
            <td><input type="text" size="20" name="<?php echo $row["property_id"]; ?>"
                   value="<?php echo $row["listing_price"]; ?>"></td>
        </tr>
    </tbody>
        <?php
    }
    ?>
</table>
<button type="Submit" Value="Submit" class="btn btn-primary">Update</button>
</body>
</html>