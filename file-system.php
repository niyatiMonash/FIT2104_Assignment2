<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 16/9/18
 * Time: 4:44 PM
 */
?>
<html>
<head>
    <title>PHP File System</title>
</head>
<body>
<?php
echo "<b>Current PHP File is " . $_SERVER["SCRIPT_FILENAME"] . "</b><br />";
echo "<b>Current Directory is " . dirname($_SERVER["SCRIPT_FILENAME"]) . "</b><br />";
$currdir = dirname($_SERVER["SCRIPT_FILENAME"]);
echo "<b>There is " . ceil(disk_free_space($currdir) / 1024 / 1024 / 1024) . " Gb Free Space on this drive</b><br />";

$dir = opendir($currdir);

while ($file = readdir($dir)) {
    if ($file == "." || $file == "..") {
        continue;
    }
    if (is_dir($file)) {
        echo "<b>" . $file . "</b><br />";
    } else {
        echo "<a href='display-source.php?filename=" . $file . "'>" . $file . "</a><br />";
    }
}
closedir($dir);
?>

</body>
</html>