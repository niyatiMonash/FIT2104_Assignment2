<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 7/9/18
 * Time: 8:27 AM
 */
include("connection.php");
$conn = new mysqli($servername, $username, $password, $dbname);
$search_value = $_POST["query"];
$sql = "select * from property p join type t on p.property_type = t.type_id 
            where p.property_suburb like '%$search_value%' or 
            t.type_name like '%$search_value%'";

$result = mysqli_query($conn, $sql);
?>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
</head>
<?php
    if(mysqli_num_rows($result) > 0 ){
?>
<body>
<div class="container-fluid">
<div class="list-group">
    <?php
    while ($row = $result->fetch_array()) {
        ?>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $row["property_street"], $row["property_suburb"], $row["property_state"] ?></h5>
                <small><?php echo $row["type_name"]; ?></small>
            </div>
            <p class="mb-1"><?php echo $row["property_desc"]; ?></p>
        </a>

        <?php
    }
    }
    else{
        echo "No results found";
    }
    ?>
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
