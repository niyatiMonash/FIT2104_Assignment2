<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 5/9/18
 * Time: 11:24 AM
 */


ob_start();
//connection statement
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="SELECT * FROM feature";
$result = $conn->query($query);
$row = $result->fetch_assoc();

switch($_GET["Action"]){
    case "Delete":
        ?>

        Confirm deletion of the property feature record <br />
        <table>
            <tr>
                <td><b>Feature Id</b></td>
                <td><?php echo $row["feature_id"]; ?></td>
            </tr>
            <tr>
                <td><b>Feature Name</b></td>
                <td><?php echo $row["feature_name"]; ?></td> </tr>
        </table>
        <br/>
        <table align="center">
            <tr>
                <td>
                    <input type="button" value="Confirm" OnClick="confirm_delete();"></td>
                <td>
                    <input type="button" value="Cancel" OnClick="window.location='edit-feature.php'">
                </td>
            </tr>
        </table>

        <script language = "javascript">
            function confirm_delete()
            {
                window.location='update-feature.php?feature_id= <?php echo $_GET["feature_id"];?> &Action=ConfirmDelete';
            }
        </script>
        <?php
        break;

    case "ConfirmDelete":
        $query="DELETE FROM feature WHERE feature_id =".$_GET["feature_id"];
        if($conn->query($query))
        {
            ?>
            The following type record has been successfully deleted<br />
            <?php echo "Feature no.".$row["feature_id"] ." ".$row["feature_name"]." ";
        }
        else{
            echo "Error deleting property feature record";
        }
        echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-feature.php\"'>";
        break;

    case "Update": ?>
        <form method="post" action="update-feature.php?feature_id=<?php echo $_GET["feature_id"]; ?>&Action=ConfirmUpdate">
            Property Feature details amendment<br />
            <table align="center" cellpadding="3">

                <td><b>Feature Id</b></td>
                <td><?php echo $row["feature_id"]; ?></td>
                <tr>
                    <td><b>Property Feature</b></td>
                    <td>
                        <input type="text" name="feature_name" size="30"
                               value="<?php echo $row["feature_name"]; ?>">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Update Property Feature">
            <input type="button" value="Return to List"
                   OnClick="window.location='edit-feature.php'">
        </form>
        <?php
        break;

    case "ConfirmUpdate":
        $query="UPDATE feature set feature_name='$_POST[feature_name]'
                WHERE feature_id =".$_GET["feature_id"];
        $result= $conn->query($query);
        header("Location: edit-feature.php");
        break;
}
?>

