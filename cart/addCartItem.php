<?php 
include '../common/db_conn.php';
session_start();


if (isset($_GET['id_product'])) {

	array_push($_SESSION['cart'], $_GET['id_product']);

	$sqlCartItemAdded = $conn->query("SELECT prod_name FROM products WHERE id_product=".$_GET['id_product']);

    if(!$sqlCartItemAdded) {
    	echo "Query cart item added non riuscita";
	}
	else {
    	if($sqlCartItemAdded->num_rows > 0){
    		$row = $sqlCartItemAdded->fetch_array(MYSQLI_ASSOC);
    	}
    }
    header("location: ../index.php?cart_added=".$row['prod_name']);
}


?>