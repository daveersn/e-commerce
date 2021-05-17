<?php
include 'common/db_conn.php';
session_start();

if (isset($_GET['username']) && isset($_GET['password'])) {
	$user = $_GET['username'];
	$password = $_GET['password'];
	echo "ok";
}

$sqlLogin = $conn->query("SELECT * FROM accounts WHERE user='$user' AND password='$password'");

if (!$sqlLogin) {
	echo 'Query non funzionante';
}
else {
	if ($sqlLogin->num_rows > 0) {
		$row = $sqlLogin -> fetch_array(MYSQLI_ASSOC);
		$_SESSION['isLogged'] = true;
		$_SESSION['userId'] = $row['id_account'];
		$_SESSION['displayName'] = $row['display_name'];
		header('Location: userArea.php');
	}
	else {
		header('location: login_front.php?error');
	}
}

?>