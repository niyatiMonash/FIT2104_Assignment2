<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 10:57 AM
 */

include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM type";
$result = mysqli_query($conn, $query);


while ($row = $result->fetch_array()) {
    ?>


    <table>
        <tr>
            <td><?php echo $row["type_name"] ?> </td>
            <td>
                <a href="update-type.php?type_id= <?php echo $row["type_id"]; ?> &Action=Delete">Delete</a>
            </td>
            <td>
                <a href="update-type.php?type_id= <?php echo $row["type_id"]; ?> &Action=Update">Update</a>
            </td>
        </tr>
    </table>

    <?php

}
?>