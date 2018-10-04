<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 3/10/18
 * Time: 8:53 PM
 */
include("session.php");
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM property WHERE property_id =" . $_GET["property_id"];
$query2 = "SELECT * FROM type t join property p on t.type_id = p.property_type where property_id =" . $_GET["property_id"];
$query3 = "Select * from type";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$results = $conn->query($query2);
$row2 = $results->fetch_assoc();
$result3 = $conn->query($query3);
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
<body>
<form name="form" method="POST">
    <div class="property-features">
        <h4><u>Property Features:</u></h4>
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

            while ($row3 = $result3->fetch_assoc()) {
                $feature_idd = $row3["feature_id"];
                $query4 = "SELECT * FROM property_feature WHERE feature_id = '$feature_idd' AND property_id =" . $_GET["property_id"];
                $result4 = $conn->query($query4);
                $pf = $result4->fetch_assoc();
                ?>

                <tr>
                    <td><?php echo $row3["feature_name"] ?></td>
                    <td><input type="text" name="<?php echo $row3["feature_id"]; ?>" class="form-control"
                               value="<?php echo $pf["feature_desc"] ?>"></td>
                    <?php if ($pf["feature_desc"] == '') {
                        ?>
                        <td align="center">
                            <input type="checkbox" name="check[]"
                                   value="<?php echo $row3["feature_id"]; ?> ">
                        </td>
                        <?php

                    } else {
                        ?>
                        <td align="center">
                            <input type="checkbox" name="check[]" checked
                                   value="<?php echo $row3["feature_id"]; ?>">
                        </td>
                        <?php
                    } ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </br>
    </div>
    <input type="submit" value="Update Property Feature" class="btn btn-primary" onclick="val()">
    <input type="button" value="Return to List" class="btn btn-secondary"
           OnClick="window.location='property-search.php'">
</form>

<?php

    if (!empty($_POST['check'])) {
//        $query5 = "DELETE FROM property_feature where property_id =" . $_GET["property_id"];
//        $conn->query($query5);
        $checkboxes = isset($_POST['check']) ? $_POST['check'] : array();
        foreach ($checkboxes as $feature_id) {
            $propertyId = $_GET["property_id"];
            $query6 = "UPDATE property_feature set feature_desc = '$_POST[$feature_id]' WHERE property_id = '$propertyId' AND feature_id = '$feature_id'";
//            $query6 = "INSERT INTO property_feature(property_id, feature_id, feature_desc)s
//                       VALUES ('$_GET[property_id]', '$feature_id', '$_POST[$feature_id]')";
            echo $query6;
            $conn->query($query6);

        }
    }

?>

<!-- Footer to be used in all main pages-->
<footer class="py-5 bg-danger">
    <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
    </div>
</footer>
</body>
</html>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
