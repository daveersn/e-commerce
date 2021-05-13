<?php 
	
session_start();


if (isset($_GET['id_product'])) {
	array_push($_SESSION['cart'], $_GET['id_product']);
}

header("location: ../index.php");

?>