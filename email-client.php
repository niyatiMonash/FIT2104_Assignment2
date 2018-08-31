<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:30 AM
 */

include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT client_id, client_email from client where client_mailinglist='Y'";
$result = mysqli_query($conn, $query);

?>
<table>
<?php
while ($row = $result-->fetch_array()) {

?>

    <tr>
        <td><?php echo $row["client_id"] ?></td>
        <td><?php echo $row["client_email"] ?></td>
        <td><a href="send-email.php?client_id= <?php echo $row["client_id"]; ?> &Action=SendEmail"></a>
        </td>
    </tr>


</table>

<?php
}
$recipient = "mail@example.com";
$subject = "Subject of your email";
$message = "Thank you for subscribing to our mailing list! Make sure you keep updated!";

mail($recipient, $subject, $message);
?>
