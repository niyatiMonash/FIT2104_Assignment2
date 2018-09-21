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
                    <li class="breadcrumb-item active">Update Property</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    /**
     * Created by PhpStorm.
     * User: stephanietran
     * Date: 8/9/18
     * Time: 7:15 PM
     */


    ob_start();
    include("session.php");
    include("connection.php");
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $query = "SELECT * FROM property WHERE property_id =" . $_GET["property_id"];
    $query2 = "SELECT * FROM type t join property p on t.type_id = p.property_type where property_id =".$_GET["property_id"];
    $query3 = "Select * from type";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $results = $conn->query($query2);
    $row2 = $results->fetch_assoc();
    $result3 = $conn->query($query3);


    switch ($_GET["Action"]) {
    case "Delete":
        ?>

        Confirm deletion of the property record <br/>
        <table>
            <tr>
                <td><b>Property no.</b></td>
                <td><?php echo $row["property_id"]; ?></td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td><?php echo $row["property_street"] . "</br>" . $row["property_suburb"] . ", " . $row["property_state"] . " " . $row["property_pc"]; ?></td>
            </tr>
        </table>
    <br/>
        <table>
            <tr>
                <td>
                    <input type="button" value="Confirm" class="btn btn-primary" OnClick="confirm_delete();"></td>
                <td>
                    <input type="button" value="Cancel" class="btn btn-secondary"
                           OnClick="window.location='edit-properties.php'">
                </td>
            </tr>
        </table>

        <script language="javascript">
            function confirm_delete() {
                window.location = 'update-properties.php?property_id= <?php echo $_GET["property_id"];?> &Action=ConfirmDelete';
            }
        </script>
    <?php
    break;

    case "ConfirmDelete":
    $query = "DELETE FROM property WHERE property_id =" . $_GET["property_id"];
    if ($conn->query($query)) {
    ?>
        The following property record has been successfully deleted<br/>
    <?php echo "Property no: " . $row["property_id"] . " " . $row["property_street"] . "</br>" . $row["property_suburb"] . ", " . $row["property_state"] . " " . $row["property_pc"];
    } else {
        echo "Error deleting customer record";
    }
    echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-properties.php\"'>";
    break;

    case "Update": ?>
        <form name="form" method="post" enctype="multipart/form-data"
              action="update-properties.php?property_id=<?php echo $_GET["property_id"]; ?>&Action=ConfirmUpdate">
            <h1 align="center">Update Property</h1><br/>
            <table>
                <div>
                    Property Id
                    <?php echo $row["property_id"]; ?>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Street:</label>
                        <input type="text" name="property_street" size="30" class="form-control"
                               value="<?php echo $row["property_street"]; ?>">
                    </div>
                </div>
            <div class="row">
                    <div class="form-group col-6">
                        <label>Suburb:</label>
                        <input type="text" name="property_suburb" size="30" class="form-control"
                               value="<?php echo $row["property_suburb"]; ?>">
                    </div>
                    <div class="form-group col-3">
                        <label>State:</label>
                        <input type="text" name="property_state" size="30" class="form-control"
                               value="<?php echo $row["property_state"]; ?>">
                    </div>
                    <div class="form-group col-3">
                        <label>Postcode:</label>
                        <input type="text" name="property_pc" size="30" class="form-control"
                               value="<?php echo $row["property_pc"]; ?>">
                    </div>
                </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Select Property Type:</label><br/>
                            <select name="property_type" class="form-control">
                                <option value="<?php echo $row2["type_id"]; ?>"><?php echo $row2["type_name"]; ?></option>
                                <?php
                                while ($row3 = $result3->fetch_array()) {
                                    ?>
                                    <option name="property_type"
                                            value="<?php echo $row3["type_id"]; ?>"><?php echo $row3["type_name"]; ?>

                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-2">
                        <label>Sale Date:</label>
                        <input type="date" name="sale_date" class="form-control"
                               value="<?php echo $row["sale_date"]; ?>">
                        </input>

                    </div>

                    <div class="form-group col-2">
                        <label>Sale Price:</label>
                        <input type="number" name="sale_price" class="form-control"
                               value="<?php echo $row["sale_price"]; ?>">
                        </input>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label>Listing Date:</label>
                            <input type="date" name="listing_date" size="30" class="form-control"
                                   value="<?php echo $row["listing_date"]; ?>">
                            </input>

                        </div>
                        <div class="form-group col-2">
                            <label>Listing Price:</label>
                            <input type="number" name="listing_price" size="30" class="form-control"
                                   value="<?php echo $row["listing_price"]; ?>">
                            </input>
                        </div>
                    </div>
                    <div class="form-group">
                        <figure class="figure">
                            <img src="property_images/<?php echo $row["image_name"]; ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="property-image">
                            <figcaption class="figure-caption"><?php echo $row["image_name"]; ?></figcaption>
                        </figure>
                    </div>
                    <div class="form-group">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload"
                               value="<?php echo $row["image_name"]; ?>">
                    </div>
                </div>

                <input type="submit" value="Update Property" class="btn btn-primary" onclick="val()">
                <input type="button" value="Return to List" class="btn btn-secondary"
                       OnClick="window.location='edit-properties.php'">
            </table>
        </form>
        <?php
        break;

        case "ConfirmUpdate":
            $target_dir = "property_images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $upload_ok = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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
            if ($imageFileType == '') {
                $upload_ok = 1;
            }

            // Check if $upload_ok is set to 0 by an error
            if ($upload_ok == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $fileName = $_FILES["fileToUpload"]["name"];
                    if ($_POST["sale_date"] == '' and $_POST["sale_price"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date=NULL, sale_price=NULL, property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]', image_name='$fileName'
                WHERE property_id =" . $_GET["property_id"];
                    } elseif ($_POST["sale_date"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date=NULL, sale_price='$_POST[sale_price]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]', image_name='$fileName'
                WHERE property_id =" . $_GET["property_id"];
                    } elseif ($_POST["sale_price"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date='$_POST[sale_date]', sale_price=NULL, property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]', image_name='$fileName'
                WHERE property_id =" . $_GET["property_id"];
                    } else {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date='$_POST[sale_date]', sale_price='$_POST[sale_price]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]', image_name='$fileName'
                WHERE property_id =" . $_GET["property_id"];
                    }

                    $result = $conn->query($query);
                    echo $query;
                    header("Location: edit-properties.php");
                } else {
                    if ($_POST["sale_date"] == '' and $_POST["sale_price"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date=NULL, sale_price=NULL, property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
                    } elseif ($_POST["sale_date"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date=NULL, sale_price='$_POST[sale_price]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
                    } elseif ($_POST["sale_price"] == '') {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date='$_POST[sale_date]', sale_price=NULL, property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
                    } else {
                        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', sale_date='$_POST[sale_date]', sale_price='$_POST[sale_price]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
                    }
                    $result = $conn->query($query);
                    echo $query;
                    header("Location: edit-properties.php");
                }
            }


    }
    ?>
    <!-- Footer to be used in all main pages-->
    <footer class="py-5 bg-danger">
        <div class="container-fluid">
            <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>



