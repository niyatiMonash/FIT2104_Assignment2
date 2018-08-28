<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 24/8/18
 * Time: 12:29 PM
 */

$servername = "130.194.7.82";
$username = "s29765706";
$password = "monash00";
$dbname = "S29765706";

$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
// add comment testing
//add my comment