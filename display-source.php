<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 16/9/18
 * Time: 4:11 PM
 */
$file = $_GET["filename"];
echo "<h1>Source Code for: ".$file."</h1>";
highlight_file($file);