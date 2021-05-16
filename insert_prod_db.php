<?php

function create_img_from_url($img_url, $img_name){
	copy($img_url, 'img/img_'.str_replace(' ', '_', $img_name).'.jpg');
	return 'img/img_'.str_replace(' ', '_', $img_name).'.jpg';
}

if (isset($_GET["prod_name"]) &&
	isset($_GET["prod_desc"]) &&
	isset($_GET["prod_price"]) &&
	isset($_GET["prod_img"]) &&
	isset($_GET["prod_category"])) {


	for ($i=0; $i < count($_GET["prod_name"]); $i++) { 

		if ($_GET["prod_name"][$i] != "" &&
		    $_GET["prod_desc"][$i] != "" &&
			$_GET["prod_price"][$i] != 0 &&
			$_GET["prod_img"][$i] != "" &&
			$_GET["prod_category"][$i] != "" &&
			$_GET["prod_qta"][$i] != 0){

			$img = create_img_from_url($_GET["prod_img"][$i], $_GET["prod_name"][$i]);

			$sql_insert_prod = $conn->query("
				INSERT INTO products (prod_name, prod_desc, prod_price, prod_img, prod_qta, prod_category) VALUES ('".$_GET['prod_name'][$i]."', '".str_replace("'","\'",$_GET['prod_desc'][$i])."', '".$_GET['prod_price'][$i]."', '$img', '".$_GET['prod_qta'][$i]."', '".$_GET['prod_category'][$i]."')");

			if(!$sql_insert_prod) {
				echo "Query non riuscita";
			}
			else{
				echo "Prodotto: ".$_GET['prod_name'][$i]." inserito <br>";
			}

		}
		else {
			$j = $i;
			$j++; 
			echo "Prodotto n. $j non inserito: campi vuoti <br>";
		}
	}

}
?>

