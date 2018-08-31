<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:30 AM
 */

include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT client_id, client_email from client where client_mailinglist='Y'";
$result = mysqli_query($conn, $query);

?>
<table border="1px solid black">
    <tr>
        <th>Client ID</th>
        <th>Client Email</th>
        <th>Button</th>
    </tr>
    <?php
    while ($row = $result->fetch_array()) {
        ?>

        <tr>
            <td><?php echo $row["client_id"]; ?></td>

            <td><?php echo $row["client_email"]; ?></td>

            <td>
                <button><a href="send-email.php?client_id= <?php echo $row["client_id"]; ?> &Action=SendEmail"> Send
                        Email to user </a></button>
            </td>
        </tr>
        <?php
    }
    ?>
</table>