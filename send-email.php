<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:58 AM
 */
include("connection.php");

$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT client_id, client_email from client where client_mailinglist='Y' and client_id=".$_GET["client_id"];
$email_receipt = "niyati.srinivasan@gmail.com"; //$row["client_email"]; // to be changed TODO: Change default e-mail
$result = mysqli_query($conn, $query);

$recipient = "mail@example.com";
$subject = "Welcome to this month's issue of our newsletter";
$message = "This month we have 10 new properties for purchase! Go down to our website to check them out!"; //TODO: change this text
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Ruthless Real Estate <nsri0001@student.monash.edu>'  . "\r\n"; //TODO: to create another email address and change this.
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



switch($_GET["Action"]) {
    case "SendEmail":
        mail($email_receipt, $subject, $message, $headers);
        ?>
        <script>
                alert("Email sent!"); //TODO: alert box should popup only when mail sends successfully
        </script>
<?php

}
?>


