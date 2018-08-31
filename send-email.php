<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:58 AM
 */
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT client_id, client_email from client where client_mailinglist='Y'";
$result = mysqli_query($conn, $query);
?>

<?php
$recipient = "SELECT client_email from client where client_mailinglist='Y'";
$subject = "Welcome Message";
$message = "Thank you for subscribing to our mailing list.. Make sure to keep updated!";

mail($recipient, $subject, $message);
?>