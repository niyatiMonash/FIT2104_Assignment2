<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 7/9/18
 * Time: 8:27 AM
 */
include("connection.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo 'Connection Failed: ' . $conn->connect_error;
} else {
    $search_value = isset($_POST["query"]);
    $sql = "select * from property p join type t on p.property_type = t.type_id 
            where property_suburb like '%$search_value%' or 
            t.type_name like '%$search_value%'";

    $res = $conn->query($sql);
    ?>
<table class="table table-striped">
<?php
    while ($row = $res->fetch_array()) {
        ?>
            <tbody>
            <tr>
                <td><?php echo $row["property_street"]; ?></td>
                <td><?php echo $row["property_suburb"]; ?></td>
                <td><?php echo $row["property_state"]; ?></td>
                <td><?php echo $row["type_name"]; ?></td>
            </tr>
            </tbody>

        <?php
    }
    ?>
</table>
<?php
}
?>