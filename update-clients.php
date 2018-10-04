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
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ruthless Real Estate</a><div>Welcome <?php echo $_SESSION['login_user'] ?></div>
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
                    <a class="nav-link" href="property-search.php">Properties</a>
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
                    <a class="nav-link" href="all-images.php">Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send-email.php">Send Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="documentation.php">Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="grid second-nav">
        <div class="column-xs-12">
            <nav>
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="edit-clients.php">Clients</a></li>
                    <li class="breadcrumb-item active">Update Client</li>
                </ol>
            </nav>
        </div>
    </div>
    <h1 align="center">Update Client</h1>
    <?php
    /**
     * Created by PhpStorm.
     * User: niyatisrinivasan
     * Date: 30/8/18
     * Time: 9:18 PM
     */
    ob_start();
    include("session.php");
    //connection statement
    include("connection.php");
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $query = "SELECT * FROM client WHERE client_id =" . $_GET["client_id"];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();


    switch ($_GET["Action"]) {
    case "Delete":
        ?>

        Confirm deletion of the customer record <br/>
        <table>
            <tr>
                <td><b>Client no:</b></td>
                <td><?php echo $row["client_id"]; ?></td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $row["client_lname"] . " " . $row["client_fname"]; ?></td>
            </tr>
        </table>
    <br/>
        <table>
            <tr>
                <td>
                    <input type="button" value="Confirm" class="btn btn-primary" OnClick="confirm_delete();"></td>
                <td>
                    <input type="button" value="Cancel" class="btn btn-secondary"
                           OnClick="window.location='edit-clients.php'">
                </td>
            </tr>
        </table>

        <script language="javascript">
            function confirm_delete() {
                window.location = 'update-clients.php?client_id= <?php echo $_GET["client_id"];?> &Action=ConfirmDelete';
            }
        </script>
    <?php
    break;

    case "ConfirmDelete":
    $query = "DELETE FROM client WHERE client_id =" . $_GET["client_id"];
    if ($conn->query($query))
    {
    ?>
        The following client record has been successfully deleted<br/>
    <?php echo "Client no." . $row["client_id"] . " " . $row["client_lname"] . " " . $row["client_fname"];
    }
    else {
        echo "Error deleting customer record";
    }
    echo "<input type='button' value='Return to List'
OnClick='window.location=\"edit-clients.php\"'>";
    break;

    case "Update": ?>
        <form method="post"
              action="update-clients.php?client_id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmUpdate">
            <table align="center" cellpadding="3">
                <div>
                    Client Id:
                    <?php echo $row["client_id"]; ?>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>First Name:</label>
                        <input type="text" name="client_fname" size="30" class="form-control"
                               value="<?php echo $row["client_fname"]; ?>">
                    </div>
                    <div class="form-group col">
                        <label>Last Name:</label>
                        <input type="text" name="client_lname" size="30" class="form-control"
                               value="<?php echo $row["client_lname"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Street:</label>
                        <input type="text" name="client_street" size="30" class="form-control"
                               value="<?php echo $row["client_street"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Suburb:</label>
                        <input type="text" name="client_suburb" size="30" class="form-control"
                               value="<?php echo $row["client_suburb"]; ?>">
                    </div>


                    <div class="form-group col-2">
                        <label>State:</label>
                        <input type="text" name="client_state" size="30" class="form-control"
                               value="<?php echo $row["client_state"]; ?>">
                    </div>
                    <div class="form-group col-2">
                        <label>Postcode:</label>
                        <input type="text" name="client_pc" size="30" class="form-control"
                               value="<?php echo $row["client_pc"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Email:</label>
                        <input type="text" name="client_email" size="30" class="form-control"
                               value="<?php echo $row["client_email"]; ?>">
                    </div>
                    <div class="form-group col">
                        <label>Mobile:</label>
                        <input type="text" name="client_mobile" size="30" class="form-control"
                               value="<?php echo $row["client_mobile"]; ?>">
                    </div>
                </div>
                <input type="submit" value="Update Customer" class="btn btn-primary">
                <input type="button" value="Return to List" class="btn btn-secondary"
                       OnClick="window.location='edit-clients.php'">
            </table>
        </form>
        <?php
        break;

        case "ConfirmUpdate":
            $query = "UPDATE client set client_fname='$_POST[client_fname]',client_lname='$_POST[client_lname]', client_street='$_POST[client_street]', 
client_suburb='$_POST[client_suburb]', client_state='$_POST[client_state]', client_pc='$_POST[client_pc]', client_email='$_POST[client_email]', client_mobile='$_POST[client_mobile]'
                WHERE client_id =" . $_GET["client_id"];
            $result = $conn->query($query);
            header("Location: edit-clients.php");
            break;
    }
    ?>
    <button class="btn btn-outline-primary">
        <a href='display-source.php?filename=update-clients.php'>Update/Delete Client</a><br/>
    </button>
    <!-- Footer to be used in all main pages-->
    <footer class="py-5 bg-danger">
        <div class="container-fluid">
            <p class="m-0 text-center text-white">Copyright &copy; Ruthless Real Estate 2018</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>


