<?php

if (empty($_POST["client_lname"]))
{
"Invalid error";
}
else
{include("connection.php");
$conn = new mysqli($servername, $username, $password, $dbname)
or die("Couldn't log on to database");
$query="INSERT INTO client (client_lname, client_fname, client_street, client_suburb, client_state, client_pc, client_email, client_mobile, client_mailinglist)
VALUES('$_POST[client_lname]', '$_POST[client_fname]', '$_POST[client_street]', '$_POST[client_suburb]', '$_POST[client_state]', '$_POST[client_pc]', '$_POST[client_pc]',  '$_POST[client_email]', '$_POST[client_mobile]', '$_POST[client_mailinglist]')";

$conn->query($query);
}