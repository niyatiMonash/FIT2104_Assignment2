<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:30 AM
 */

include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * from client where client_mailinglist='Y'";
$result = mysqli_query($conn, $query);

?>

<?php
$recipient = "mail@example.com";
$subject = "Subject of your email";
$message = "Thank you for subscribing to our mailing list! Make sure you keep updated!";

mail($recipient, $subject, $message);
?>
