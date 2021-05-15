<?php 
session_start();

if (isset($_GET["remove_cart_item"])) {
	unset($_SESSION["cart"][$_GET["remove_cart_item"]]);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>