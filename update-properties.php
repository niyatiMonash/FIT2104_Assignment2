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
<script type="text/javascript">
    function val() {
        if (form.property_type.selectedIndex==0) {
            alert('Please select a Property Type');
            form.seller_id.focus();
            return false;

        }
        return true;
    }
</script>
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
    $query = "SELECT * FROM property";
    $query2 = "SELECT * FROM type";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $results = $conn->query($query2);



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
        <form name="form" method="post"
              action="update-properties.php?property_id=<?php echo $_GET["property_id"]; ?>&Action=ConfirmUpdate">
            <h1>Property Amendment</h1><br/>
            <table>
                <div>
                    Property Id
                    <?php echo $row["property_id"]; ?>
                </div>
                <div class="form-group">
                    <label>Street:</label>
                    <input type="text" name="property_street" size="30" class="form-control"
                           value="<?php echo $row["property_street"]; ?>">
                </div>
                <div class="form-group">
                    <label>Suburb:</label>
                    <input type="text" name="property_suburb" size="30" class="form-control"
                           value="<?php echo $row["property_suburb"]; ?>">
                </div>
                <div class="form-group">
                    <label>State:</label>
                    <input type="text" name="property_state" size="30" class="form-control"
                           value="<?php echo $row["property_state"]; ?>">
                </div>
                <div class="form-group">
                    <label>Postcode:</label>
                    <input type="text" name="property_pc" size="30" class="form-control"
                           value="<?php echo $row["property_pc"]; ?>">
                </div>
                <div class="form-group">
                    <label>Select Property Type:</label><br/>
                    <select name="property_type" class="form-control">
                        <option value="">Select Type</option>
                        <?php
                        while ($row2 = $results->fetch_array()) {
                            ?>
                            <option name="property_type"
                                    value="<?php echo $row2["type_id"]; ?>"><?php echo $row2["type_name"]; ?>

                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Listing Date:</label>
                    <input type="date" name="listing_date" size="30" class="form-control"
                           value="<?php echo $row["listing_date"]; ?>">
                    </input>

                </div>
                <div class="form-group">
                    <label>Listing Price:</label>
                    <input type="number" name="listing_price" size="30" class="form-control"
                           value="<?php echo $row["listing_price"]; ?>">
                    </input>
                </div>
                <div class="form-group">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row["image_name"];?>>
                    <div id="thumbnail"></div>
                </div>

                <input type="submit" value="Update Property" class="btn btn-primary" onclick="val()">
                <input type="button" value="Return to List" class="btn btn-secondary"
                       OnClick="window.location='edit-properties.php'">
            </table>
        </form>
        <?php
        break;

        case "ConfirmUpdate":
            $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
            $result = $conn->query($query);
            header("Location: edit-properties.php");
            break;
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



