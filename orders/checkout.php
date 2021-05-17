<?php
include "../common/db_conn.php";
session_start();


if (isset($_GET["checkout_prodid"]) && isset($_GET["mlselect"]) && isset($_GET["nicselect"])) {

    $orderTot = 0;
    foreach ($_GET["checkout_price"] as $prodPrice) {
        echo $prodPrice."<br>";
        $orderTot += $prodPrice;
    }

    $sqlInsertOrder = $conn->query("INSERT INTO orders (order_tot, cod_user) VALUES ('$orderTot', '".$_SESSION['userId']."')");
    if(!$sqlInsertOrder) {
        echo "Query insert order non riuscita";
    }
    else {
        $sqlSelectLastOrder = $conn->query("SELECT * FROM orders ORDER BY id_order DESC LIMIT 1");
        ($sqlSelectLastOrder) ? $lastOrderId = $sqlSelectLastOrder->fetch_array(MYSQLI_ASSOC) : "";

        foreach ($_GET["checkout_prodid"] as $key => $id_prod) {
            echo $key;
            $sqlInsertOrderProducts = $conn->query("INSERT INTO order_products (cod_product, cod_order, order_prod_qta, order_prod_nic, order_prod_bocc) VALUES ('$id_prod', '".$lastOrderId['id_order']."', '".$_GET['mlselect'][$key]."', '".$_GET['nicselect'][$key]."', '0')");
            echo ($sqlInsertOrderProducts) ? "Prodotto ordine inserito" : "Errore query inserimento prodotti";
        }

        echo "Ordine inserito";
    }
}
?>
