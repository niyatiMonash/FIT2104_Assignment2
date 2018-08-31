<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 11:01 AM
 */

ob_start();
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM type WHERE type_id =".$_GET["type_id"];
$result = $conn->query($query);
$row = $result->fetch_assoc();

 switch($_GET["Action"]){
    case "Delete":
    ?>

    Confirm deletion of the property type record <br />
    <table>
        <tr>
            <td><b>Type Id</b></td>
            <td><?php echo $row["type_id"]; ?></td>
        </tr>
        <tr>
            <td><b>Property Type</b></td>
            <td><?php echo $row["type_name"]; ?></td> </tr>
    </table>
    <br/>
    <table align="center">
        <tr>
            <td>
                <input type="button" value="Confirm" OnClick="confirm_delete();"></td>
            <td>
                <input type="button" value="Cancel" OnClick="window.location='edit-type.php'">
            </td>
        </tr>
    </table>

    <script language = "javascript">
        function confirm_delete()
        {
            window.location='update-type.php?type_id= <?php echo $_GET["type_id"];?> &Action=ConfirmDelete';
        }
    </script>
<?php
break;

case "ConfirmDelete":
$query="DELETE FROM type WHERE type_id =".$_GET["type_id"];
if($conn->query($query))
{
    ?>
    The following type record has been successfully deleted<br />
    <?php echo "Type no.".$row["type_id"] ." ".$row["type_name"]." ";
}
else{
    echo "Error deleting property type record";
}
echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-type.php\"'>";
break;

case "Update": ?>
<form method="post" action="update-type.php?type_id=<?php echo $_GET["type_id"]; ?>&Action=ConfirmUpdate">
    Property Type details amendment<br /><p />
    <table align="center" cellpadding="3">
        <tr />
        <td><b>Type Id</b></td>
        <td><?php echo $row["type_id"]; ?></td>
        </tr>
        <tr>
            <td><b>Property Name</b></td>
            <td>
                <input type="text" name="type_name" size="30"
                       value="<?php echo $row["type_name"]; ?>">
            </td>
        </tr>
    </table>
    <input type="submit" value="Update Property Type">
    <input type="button" value="Return to List"
           OnClick="window.location='edit-type.php'">
</form>
<?php
break;

case "ConfirmUpdate":
$query="UPDATE type set type_name='$_POST[type_name]'
                WHERE type_id =".$_GET["type_id"];
$result= $conn->query($query);
header("Location: edit-type.php");
break;
}
?>

