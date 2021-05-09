<?php 
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "e-commerce";

$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

if ($conn->connect_errno) {
	echo "Mysql connect error: ". $conn->connect_errno;
	exit();
}

?>