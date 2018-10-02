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
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="documentation.php">Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">

<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 5/9/18
 * Time: 11:24 AM
 */


ob_start();
include("session.php");
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM feature  WHERE feature_id =".$_GET["feature_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();

switch($_GET["Action"]){
    case "Delete":
        ?>

        Confirm deletion of the property feature record <br />
        <table>
            <tr>
                <td><b>Feature Id:</b></td>
                <td><?php echo $row["feature_id"]; ?></td>
            </tr>
            <tr>
                <td><b>Feature Name:</b></td>
                <td><?php echo $row["feature_name"]; ?></td> </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td>
                    <input type="button" value="Confirm"  class="btn btn-primary" OnClick="confirm_delete();"></td>
                <td>
                    <input type="button" value="Cancel" class="btn btn-secondary"  OnClick="window.location='edit-feature.php'">
                </td>
            </tr>
        </table>

        <script language = "javascript">
            function confirm_delete()
            {
                window.location='update-feature.php?feature_id= <?php echo $_GET["feature_id"];?> &Action=ConfirmDelete';
            }
        </script>
        <?php
        break;

    case "ConfirmDelete":
        $query="DELETE FROM feature WHERE feature_id =".$_GET["feature_id"];
        if($conn->query($query))
        {
            ?>
            The following type record has been successfully deleted<br />
            <?php echo "Feature no.".$row["feature_id"] ." ".$row["feature_name"]." ";
        }
        else{
            echo "Error deleting property feature record";
        }
        echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-feature.php\"'>";
        break;

    case "Update": ?>
        <form method="post" action="update-feature.php?feature_id=<?php echo $_GET["feature_id"]; ?>&Action=ConfirmUpdate">
            <div class="grid second-nav">
                <div class="column-xs-12">
                    <nav>
                        <ol class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="edit-feature.php">Property Feature</a></li>
                            <li class="breadcrumb-item active">Update Property Feature</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h1 align="center">Update Property Feature</h1>
            <table align="center" cellpadding="3">
                <div>
                    Feature Id:
                    <?php echo $row["feature_id"]; ?>
                </div>
                <div class="form-group">
                    <label><b>Feature Name:</b></label>
                    <input type="text" name="feature_name" size="30" class="form-control"
                           value="<?php echo $row["feature_name"]; ?>">
                </div>

                <input type="submit" value="Update Feature" class="btn btn-primary">
                <input type="button" value="Return to List" class="btn btn-secondary"
                       OnClick="window.location='edit-feature.php'">
            </table>
        </form>
        <?php
        break;

    case "ConfirmUpdate":
        $query="UPDATE feature set feature_name='$_POST[feature_name]'
                WHERE feature_id =".$_GET["feature_id"];
        $result= $conn->query($query);
        header("Location: edit-feature.php");
        break;
}
?>
    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=update-feature.php'>Update/Delete Feature</a><br/>
    </button>
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