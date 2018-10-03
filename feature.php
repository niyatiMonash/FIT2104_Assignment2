<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 5/9/18
 * Time: 11:14 AM
 */

if (empty($_POST["feature_name"])) {
    echo "Unable to add this feature, either it already exists or not able to accept. ";
} else {
    include("connection.php");
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die("Couldn't log on to database");
    $query = "INSERT INTO feature (feature_name)
            VALUES('$_POST[feature_name]')";

    $conn->query($query);

    echo "Successfully added the feature";
}