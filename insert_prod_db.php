<?php
if (isset($_GET["prod_name"]) &&
	isset($_GET["prod_desc"]) &&
	isset($_GET["prod_price"]) &&
	isset($_GET["prod_img"])) {


	for ($i=0; $i < count($_GET["prod_name"]); $i++) { 

		if ($_GET["prod_name"][$i] != "" &&
		    $_GET["prod_desc"][$i] != "" &&
			$_GET["prod_price"][$i] != "" &&
			$_GET["prod_img"][$i] != ""){

			$sql_insert_prod = $conn->query("
				INSERT INTO products ('prod_name', 'prod_desc', 'prod_price', 'prod_img') VALUES ('".$_GET['prod_name'][$i]."', '".$_GET['prod_desc'][$i]."', '".$_GET['prod_price'][$i]."', '".$_GET['prod_img'][$i]."')");

			if(!$sql_insert_prod) {
				echo "Query non riuscita";
			}
			else{
				echo "Prodotti inseriti";
			}

		}
		else {
			echo "Prodotto non inserito: campi vuoti";
		}
	}

}
?>