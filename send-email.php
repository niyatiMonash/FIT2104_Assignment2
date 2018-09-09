<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/modern-business.css" rel="stylesheet">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="welcome.php">Ruthless Real Estate</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="edit-clients.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-properties.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="multiple-properties.php">Property Prices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-type.php">Property Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit-feature.php">Property Feature</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 31/8/18
 * Time: 11:58 AM
 */
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT client_id, client_email, client_fname from client where client_mailinglist='Y'";
$result = mysqli_query($conn, $query);

?>


<?php
if (!isset($_POST["to"])) {

    ?>
    <table border="1" cellpadding="10" align="center">
        <?php
        while ($row = $result->fetch_array()) {
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="check[]" value=""<?php echo $row["client_id"]; ?>">
                    <?php echo $row["client_email"]; ?><br/>

                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <table>
        <form method="post" action="send-email.php" align="center">
            To: <input type="text" name="to"> <br/>
            Subject: <input type="text" name="subject"> <br/>
            Message: <input type="text" name="message"> <br/>
            <td>
                <input type="submit" value="Send Email"/>
                <input type="reset" value="clear"/>
            </td>

        </form>
    </table>
    <?php
} else {
    $from = "From: Ruthless Real Estate <nsri0001@student.monash.edu>";
    $to = $_POST["to"];
    $msg = $_POST["message"];
    $subject = $_POST["subject"];
    if (mail($to, $subject, $msg, $from)) {
        echo "Email has been sent";
    } else {
        echo "Error Sending Mail";
    }
}
?>

<footer class="py-5 bg-danger">
    <div class="container-fluid">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>




