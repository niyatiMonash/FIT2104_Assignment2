<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 8/9/18
 * Time: 7:15 PM
 */


ob_start();
include("session.php");
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM property";
$result = $conn->query($query);
$row = $result->fetch_assoc();


switch ($_GET["Action"]) {
    case "Delete":
        ?>

        Confirm deletion of the property record <br/>
        <table>
            <tr>
                <td><b>Property no.</b></td>
                <td><?php echo $row["property_id"]; ?></td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td><?php echo $row["property_street"] . "</br>" . $row["property_suburb"] . ", " . $row["property_state"] . " " . $row["property_pc"]; ?></td>
            </tr>
        </table>
        <br/>
        <table align="center">
            <tr>
                <td>
                    <input type="button" value="Confirm" OnClick="confirm_delete();"></td>
                <td>
                    <input type="button" value="Cancel" OnClick="window.location='edit-properties.php'">
                </td>
            </tr>
        </table>

        <script language="javascript">
            function confirm_delete() {
                window.location = 'update-properties.php?property_id= <?php echo $_GET["property_id"];?> &Action=ConfirmDelete';
            }
        </script>
        <?php
        break;

    case "ConfirmDelete":
        $query = "DELETE FROM property WHERE property_id =" . $_GET["property_id"];
        if ($conn->query($query)) {
            ?>
            The following property record has been successfully deleted<br/>
            <?php echo "Property no." . $row["property_id"] . " " . $row["property_street"] . "</br>" . $row["property_suburb"] . ", " . $row["property_state"] . " " . $row["property_pc"];
        } else {
            echo "Error deleting customer record";
        }
        echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-properties.php\"'>";
        break;

    case "Update": ?>
        <form method="post"
              action="update-properties.php?property_id=<?php echo $_GET["property_id"]; ?>&Action=ConfirmUpdate">
            Property amendment<br/>
            <table align="center" cellpadding="3">

                <td><b>Property Id</b></td>
                <td><?php echo $row["property_id"]; ?></td>
                <tr>
                    <td><b>Street</b></td>
                    <td>
                        <input type="text" name="property_street" size="30"
                               value="<?php echo $row["property_street"]; ?>">
                    </td>
                    <td><b>Suburb</b></td>
                    <td>
                        <input type="text" name="property_suburb" size="30"
                               value="<?php echo $row["property_suburb"]; ?>">
                    </td>
                    <td><b>State</b></td>
                    <td>
                        <input type="text" name="property_state" size="30"
                               value="<?php echo $row["property_state"]; ?>">
                    </td>
                    <td><b>Postcode</b></td>
                    <td>
                        <input type="text" name="property_pc" size="30"
                               value="<?php echo $row["property_pc"]; ?>">
                    </td>
                    <form>
                        Select Property Type<br/>
                        <select name="property_type">
                            <?php
                            while ($row = $result->fetch_array()) {
                                ?>
                                <option value="<?php echo $row["type_id"]; ?>"><?php echo $row["type_name"];
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>
                    <td><b>Listing Date</b></td>
                    <td>
                        <input type="date" name="listing_date" size="30"
                               value="<?php echo $row["listing_date"]; ?>">
                    </td>
                    <td>
                        <input type="number" name="listing_price" size="30"
                               value="<?php echo $row["listing_price"]; ?>">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Update Customer">
            <input type="button" value="Return to List"
                   OnClick="window.location='edit-properties.php'">
        </form>
        <?php
        break;

    case "ConfirmUpdate":
        $query = "UPDATE property set property_street='$_POST[property_street]',property_suburb='$_POST[property_suburb]',
                property_state='$_POST[property_state]', property_pc='$_POST[property_pc]', property_type='$_POST[property_type]',
                listing_date='$_POST[listing_date]', listing_price='$_POST[listing_price]'
                WHERE property_id =" . $_GET["property_id"];
        $result = $conn->query($query);
        header("Location: edit-properties.php");
        break;
}
?>



