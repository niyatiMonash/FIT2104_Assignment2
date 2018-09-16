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
                    <a class="nav-link" href="logout.php">Logout</a>
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

<div class="container-fluid">
    <?php
    if (!isset($_POST["check"])) {
        ?>
        <form method="post" action="send-email.php">
            <table>
                <?php
                while ($row = $result->fetch_array()) {
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="check[]" value="<?php echo $row["client_email"]; ?>">
                            <?php echo $row["client_email"]; ?><br/>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <table>
                Subject: <input type="text" name="subject" class="form-control"> <br/>
                Message: <textarea type="text" name="message" class="form-control"> </textarea><br/>
                <td>
                    <button type="submit" value="Send Email" class="btn btn-primary">Send Email</button>
                    <button type="reset" value="clear" class="btn btn-secondary">Clear</button>
                </td>

        </form>
        </table>
        <?php
    } else {
        if (!empty($_POST['check'])) {
            // Loop to store and display values of individual checked checkbox.
            foreach ($_POST['check'] as $selected) {
                $from = "From: Ruthless Real Estate <nsri0001@student.monash.edu>";
                $to = $selected;
                $msg = $_POST["message"];
                $subject = $_POST["subject"];
                if (mail($to, $subject, $msg, $from)) {
                    echo '<div class="alert alert-success">Email has been sent to </div>';
                } else {
                    echo '<div class="alert alert-danger">Sorry there was an error sending your Mail. Please try again later</div>';
                }
            }
        }

    }
    ?>
</div>
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




