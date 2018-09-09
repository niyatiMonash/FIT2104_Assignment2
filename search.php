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
    $sql = "select * from property p join type t on p.property_type = t.type_id 
            where p.property_suburb like '%$search%' or 
            t.type_name like '%$search%'";

} else {
    $sql = "select * from property p join type t on p.property_type = t.type_id 
            order by property_id";
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Street</th>
     <th>Suburb</th>
     <th>State</th>
     <th>Postal Code</th>
     <th>Type</th>
     <th>Listing Price</th>
    </tr>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tr>
    <td>' . $row["property_street"] . '</td>
    <td>' . $row["property_suburb"] . '</td>
    <td>' . $row["property_state"] . '</td>
    <td>' . $row["property_pc"] . '</td>
    <td>' . $row["type_name"] . '</td>
    <td>' . $row["listing_price"] . '</td>
   </tr>
  ';
    }
    echo $output;
} else {
    echo "No results found";
}
