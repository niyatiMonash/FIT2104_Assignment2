<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 11:35 AM
 */
include("session.php");
if (empty($_POST["type_name"]))
{
    "Invalid error";
}
else
{
    include("connection.php");
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die("Couldn't log on to database");
    $query="INSERT INTO type (type_name)
            VALUES('$_POST[type_name]')";

    $conn->query($query);
}