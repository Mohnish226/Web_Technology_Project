<?php
$servername = "localhost";
$username = "root";
$password = "";


define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$conn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$conn) or die("Failed to connect to MySQL: " . mysql_error());
?>
