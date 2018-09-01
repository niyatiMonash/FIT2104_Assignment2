<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 31/8/18
 * Time: 7:34 PM
 */

   include('session.php');

?>

<html>
<style>
    <?php include('stylesheets/welcome.css'); ?>
</style>

<head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <button><a href = "logout.php">Sign Out</a></button>
   </body>

</html>