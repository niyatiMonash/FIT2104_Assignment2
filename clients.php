<html>
<head>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">

    <style>
        <?php include('stylesheets/bread-crumbs.css'); ?>
    </style>
</head>

<?php
if (empty($_POST["client_lname"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_fname"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_street"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_suburb"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_state"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_email"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_mobile"]))
{
    echo "Need to enter required fields";
}
elseif (empty($_POST["client_mailinglist"]))
{
    echo "Need to enter required fields";
}

else {
    include("connection.php");
    include("session.php");
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die("Couldn't log on to database");
    $query = "INSERT INTO client (client_lname, client_fname, client_street, client_suburb, client_state, client_pc, client_email, client_mobile, client_mailinglist)
VALUES('$_POST[client_lname]', '$_POST[client_fname]', '$_POST[client_street]', '$_POST[client_suburb]', '$_POST[client_state]', '$_POST[client_pc]', '$_POST[client_email]', '$_POST[client_mobile]', '$_POST[client_mailinglist]')";

    $conn->query($query);

    echo "Successfully added client";
}
?>

<input type="button" value="Return to List" class="btn btn-secondary"
       OnClick="window.location='edit-clients.php'">


</html>
