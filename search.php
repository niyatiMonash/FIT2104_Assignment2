<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 7/9/18
 * Time: 8:27 AM
 */
include("connection.php");
$conn = new mysqli($servername, $username, $password, $dbname);
$output = '';



if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);

    if($_POST["selection"] == "suburb"){
        $sql = "select * from property p join type t on p.property_type = t.type_id 
                where p.property_suburb like '%$search%'";
    }
    elseif($_POST["selection"] == "type"){
        $sql = "select * from property p join type t on p.property_type = t.type_id 
                where t.type_name like '%$search%'";
    }
    else{
        $sql = "select * from property p join type t on p.property_type = t.type_id 
            order by property_id";
    }

} else {
    $sql = "select * from property p join type t on p.property_type = t.type_id 
            order by property_id";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>

    <div class="table-responsive">
    <table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Address</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col">Listing Date</th>
        <th scope="col">Listing Price</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Sale Price</th>
        <th scope="col">Image Name</th>
        <th scope="col">View Property</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_array()) {
        ?>

        <tr>

        <td><?php echo $row["property_street"] . "<br/> " . $row["property_suburb"] . " " . $row["property_state"] . "<br/>" . $row["property_pc"]; ?></td>
        <td><?php echo $row["type_name"]; ?></td>
        <td><?php echo $row["property_desc"]; ?></td>
        <td><?php echo $row["listing_date"]; ?></td>
        <td><?php echo $row["listing_price"]; ?></td>
        <td><?php echo $row["sale_date"]; ?></td>
        <td><?php echo $row["sale_price"]; ?></td>
        <td><?php echo $row["image_name"]; ?></td>
        <td>
            <a href="view-property.php?property_id= <?php echo $row["property_id"]; ?> &Action=Get">View</a>
        </td>
        <?php
    }
    echo $output;
} else {
    echo "No results found";
}
