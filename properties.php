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

<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 29/8/18
 * Time: 11:34 AM
 */
include("session.php");
$target_dir = "property_images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$upload_ok = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (empty($_POST["property_street"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["property_suburb"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["property_state"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["property_pc"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["property_type"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["listing_date"])) {
    echo "Need to enter required fields";
} elseif (empty($_POST["property_desc"])) {
    echo "Need to enter required fields";
} else {
    include("connection.php");
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die("Couldn't log on to database");


// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $upload_ok = 1;
        } else {
            echo "File is not an image.";
            $upload_ok = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $upload_ok = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $upload_ok is set to 0 by an error
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $fileName = $_FILES["fileToUpload"]["name"];
            $query = "INSERT INTO property (property_street, property_suburb, property_state, property_pc, property_type, seller_id, listing_date, listing_price, sale_date, sale_price, property_desc, image_name)
            VALUES('$_POST[property_street]', '$_POST[property_suburb]', '$_POST[property_state]', '$_POST[property_pc]', '$_POST[property_type]','$_POST[seller_id]',
            '$_POST[listing_date]', '$_POST[listing_price]', '$_POST[sale_date]', '$_POST[sale_price]', '$_POST[property_desc]', '$fileName')";

            $conn->query($query);

            echo "Successfully Added Property";
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}
?>
<input type="button" value="Return to List" class="btn btn-secondary"
       OnClick="window.location='property-search.php'">


</html>