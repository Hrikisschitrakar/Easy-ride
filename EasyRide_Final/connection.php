<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "easyride_h";
$port = 3006;

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port)) {

	die("failed to connect!");
} else {
	//echo "connected";//
}
?>