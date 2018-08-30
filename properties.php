<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 29/8/18
 * Time: 11:34 AM
 */
//$pStreet = $_POST["property_street"];
//$pSuburb = $_POST["property_suburb"];
//$pState = $_POST["property_state"];
//$pPostalCode = $_POST["property_pc"];
//$pDescription = $_POST["property_desc"];
//$pListingDate = $_POST["listing_date"];

//$sql = "INSERT INTO property (property_street, property_suburb, property_state, property_pc, property_desc, listing_date)
//VALUES('$_POST[property_street]', '$_POST[property_suburb]', '$_POST[property_state]', '$_POST[property_pc]', '$_POST[property_desc]', '$_POST[listing_date]')";

//$conn = new mysqli($servername, $username, $password, $dbname)


if (empty($_POST["property_street"]))
{
     "Invalid error";
}
else
{   include("connection.php");
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die("Couldn't log on to database");
    $query="INSERT INTO property (property_street, property_suburb, property_state, property_pc, property_desc, listing_date)
            VALUES('$_POST[property_street]', '$_POST[property_suburb]', '$_POST[property_state]', '$_POST[property_pc]', '$_POST[property_desc]', '$_POST[listing_date]')";

    $conn->query($query);
}



