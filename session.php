<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 7:34 PM
 */

include('connection.php');
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "select uname from authenticate where uname = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['uname'];

if (!isset($_SESSION['login_user'])) {
    $_SESSION['redirect_url'] = $_SERVER['PHP_SELF'];
    header('location: login.php');
    exit;
}