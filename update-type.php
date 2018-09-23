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

<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 11:01 AM
 */

ob_start();
include("session.php");
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM type WHERE type_id =".$_GET["type_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();

 switch($_GET["Action"]){
    case "Delete":
    ?>

    Confirm deletion of the property type record <br />
    <table>
        <tr>
            <td><b>Type Id:</b></td>
            <td><?php echo $row["type_id"]; ?></td>
        </tr>
        <tr>
            <td><b>Property Type:</b></td>
            <td><?php echo $row["type_name"]; ?></td> </tr>
    </table>
    <br/>
    <table >
        <tr>
            <td>
                <input type="button" value="Confirm" class="btn btn-primary" OnClick="confirm_delete();"></td>
            <td>
                <input type="button" value="Cancel" class="btn btn-secondary" OnClick="window.location='edit-type.php'">
            </td>
        </tr>
    </table>

    <script language = "javascript">
        function confirm_delete()
        {
            window.location='update-type.php?type_id= <?php echo $_GET["type_id"];?> &Action=ConfirmDelete';
        }
    </script>
<?php
break;

case "ConfirmDelete":
$query="DELETE FROM type WHERE type_id =".$_GET["type_id"];
if($conn->query($query))
{
    ?>
    The following type record has been successfully deleted<br />
    <?php echo "Type no.".$row["type_id"] ." ".$row["type_name"]." ";
}
else{
    echo "Error deleting property type record";
}
echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-type.php\"'>";
break;

case "Update": ?>

     <form method="post" action="update-type.php?type_id=<?php echo $_GET["type_id"]; ?>&Action=ConfirmUpdate">
         <div class="grid second-nav">
             <div class="column-xs-12">
                 <nav>
                     <ol class="breadcrumb-list">
                         <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                         <li class="breadcrumb-item"><a href="edit-type.php">Property Type</a></li>
                         <li class="breadcrumb-item active">Update Property Type</li>
                     </ol>
                 </nav>
             </div>
         </div>
         <h1 align="center">Update Property Type</h1>
         <table align="center" cellpadding="3">
             <div>
                 Type ID:
                 <?php echo $row["type_id"]; ?>
             </div>
             <div class="form-group">
                 <label>Type Name:</label>
                 <input type="text" name="type_name" size="30" class="form-control"
                        value="<?php echo $row["type_name"]; ?>">
             </div>
             <input type="submit" value="Update Type" class="btn btn-primary">
             <input type="button" value="Return to List" class="btn btn-secondary"
                    OnClick="window.location='edit-type.php'">
         </table>
     </form>
<?php
break;

case "ConfirmUpdate":
$query="UPDATE type set type_name='$_POST[type_name]'
                WHERE type_id =".$_GET["type_id"];
$result= $conn->query($query);
header("Location: edit-type.php");
break;
}
?>
    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=update-type.php'>Update/Delete Type</a><br/>
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