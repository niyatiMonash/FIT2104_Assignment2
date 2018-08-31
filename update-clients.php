<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 30/8/18
 * Time: 9:18 PM
 */
ob_start();
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM client WHERE client_id =".$_GET["client_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();


switch($_GET["Action"]){
    case "Delete":
?>

    Confirm deletion of the customer record <br />
<table>
    <tr>
        <td><b>Client no.</b></td>
        <td><?php echo $row["client_id"]; ?></td>
    </tr>
    <tr>
        <td><b>Name</b></td>
        <td><?php echo $row["client_lname"]. " ".$row["client_fname"]; ?></td> </tr>
</table>
<br/>
    <table align="center">
        <tr>
            <td>
                <input type="button" value="Confirm" OnClick="confirm_delete();"></td>
            <td>
                <input type="button" value="Cancel" OnClick="window.location='edit-clients.php'">
            </td>
        </tr>
    </table>

        <script language = "javascript">
            function confirm_delete()
            {
                window.location='update-clients.php?client_id= <?php echo $_GET["client_id"];?> &Action=ConfirmDelete';
            }
        </script>
<?php
break;

case "ConfirmDelete":
$query="DELETE FROM client WHERE client_id =".$_GET["client_id"];
if($conn->query($query))
{
    ?>
    The following client record has been successfully deleted<br />
<?php echo "Client no.".$row["client_id"] ." ".$row["client_lname"]." ". $row["client_fname"];
}
else{
    echo "Error deleting customer record";
}
echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-clients.php\"'>";
break;

case "Update": ?>
<form method="post" action="update-clients.php?client_id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmUpdate">
    Customer details amendment<br />
    <table align="center" cellpadding="3">

        <td><b>Client Id</b></td>
        <td><?php echo $row["client_id"]; ?></td>
        <tr>
            <td><b>Firstname</b></td>
            <td>
                <input type="text" name="client_fname" size="30"
                       value="<?php echo $row["client_fname"]; ?>">
            </td>

            <td>
                <input type="text" name="client_lname" size="30"
                       value="<?php echo $row["client_lname"]; ?>">
            </td>
        </tr>
    </table>
    <input type="submit" value="Update Customer">
    <input type="button" value="Return to List"
           OnClick="window.location='edit-clients.php'">
</form>
    <?php
        break;

    case "ConfirmUpdate":
        $query="UPDATE client set client_fname='$_POST[client_fname]',client_lname='$_POST[client_lname]'
                WHERE client_id =".$_GET["client_id"];
        $result= $conn->query($query);
        header("Location: edit-clients.php");
        break;
}
?>



