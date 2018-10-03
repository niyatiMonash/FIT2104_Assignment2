<?php
/**
 * Created by PhpStorm.
 * User: stephanietran
 * Date: 5/9/18
 * Time: 3:07 PM
 */

function display_data()
{
    $output = '';
    include("connection.php");
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $query = "SELECT * FROM client order by client_lname, client_fname ASC";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_array()) {

        $output .= '
        <tr>
            <td>' . $row["client_id"] . '</td>
            <td>' . $row["client_lname"] . '</td>
            <td>' . $row["client_fname"] . '</td>
            <td>' . $row["client_street"] . ', <br/> ' . $row["client_suburb"] . ', <br/> ' . $row["client_state"] . ' ' . $row["client_pc"] . '</td>
            <td>' . $row["client_email"] . '</td>
            <td>' . $row["client_mobile"] . '</td>
        </tr>
        ';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once("tcpdf/tcpdf.php");
    $obj_pdf = new TCPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->AddPage("", "", false, false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("List of Clients in PDF");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->SetPrintHeader(false);
    $obj_pdf->SetPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(true, 10);
    $obj_pdf->SetFont('helvetica', '', 10);

    $content = '';

    $content .= '
        <h3 align ="center"> Clients</h3>
             <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th width="5%"><b>ID</b></th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th width="20%">Address</th>                      
                        <th width="25%">Email</th>
                        <th>Mobile</th>
                    </tr>
              
    ';
    $content .= display_data();

    $content .= '</table>';

    $obj_pdf->writeHTML($content);

    $obj_pdf->output("Clients.pdf", "I");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Format</title>
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
        <a class="navbar-brand" href="index.php">Ruthless Real Estate</a>
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
                    <a class="nav-link" href="edt-properties.php">Properties</a>
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
                    <a class="nav-link" href="documentation.php">Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="grid second-nav">
    <div class="column-xs-12">
        <nav>
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="edit-clients.php">Clients</a></li>
                <li class="breadcrumb-item active">PDF Client</li>
            </ol>
        </nav>
    </div>
</div>
<div>
    <h1 align="center">Preview</h1><br/>
    <div>
        <table border="1" align="center">
            <tr>
                <th width="5%"><b>ID</b></th>
                <th><b>Last Name</b></th>
                <th><b>First Name</b></th>
                <th width="20%">Address</th>
                <th width="25%">Email</th>
                <th>Mobile</th>
            </tr>
            <?php
            echo display_data();
            ?>
        </table>
        <form method="post" align="center">
            <input type="submit" name="create_pdf" class="btn btn-danger" value="Generate PDF"/>
        </form>
    </div>
</div>

<!-- Footer to be used in all main pages-->
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
