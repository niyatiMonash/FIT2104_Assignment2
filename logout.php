<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 7:34 PM
 */
session_start();

if (session_destroy()) {
    header("Location: login.php");
}
?>