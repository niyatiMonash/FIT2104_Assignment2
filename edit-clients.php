<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 30/8/18
 * Time: 9:15 PM
 */
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM client";
$result = mysqli_query($conn, $query);

?>
<table>
<?php
//connection, query and execute statements
while ($row = $result->fetch_array()) {
    ?>

    <tr>
        <td><?php echo $row["client_lname"]; ?></td>
        <td><?php echo $row["client_fname"]; ?></td>
        <td><?php echo $row["client_street"]; ?></td>
        <td><?php echo $row["client_suburb"]; ?></td>
        <td><?php echo $row["client_state"]; ?></td>
        <td><?php echo $row["client_pc"]; ?></td>
        <td><?php echo $row["client_email"]; ?></td>
        <td><?php echo $row["client_mobile"]; ?></td>
        <td>
            <a href="update-clients.php?client_id= <?php echo $row["client_id"]; ?> &Action=Delete">Delete</a>
        </td>
    </tr>
 <?php
}
?>
</table>

