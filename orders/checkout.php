<?php
include "../common/db_conn.php";
session_start();


if (isset($_GET["checkout_prodid"]) && isset($_GET["mlselect"]) && isset($_GET["nicselect"])) {

    $orderTot = $_GET['totOrdine'];

    $sqlInsertOrder = $conn->query("INSERT INTO orders (order_tot, cod_user) VALUES ('$orderTot', '".$_SESSION['userId']."')");
    if(!$sqlInsertOrder) {
        echo "Query insert order non riuscita";
    }
    else {
        $sqlSelectLastOrder = $conn->query("SELECT * FROM orders ORDER BY id_order DESC LIMIT 1");
        ($sqlSelectLastOrder) ? $lastOrderId = $sqlSelectLastOrder->fetch_array(MYSQLI_ASSOC) : "";

        foreach ($_GET["checkout_prodid"] as $key => $id_prod) {
            $boccetta = 0;
            if(isset($_GET['boccetta'][$key])) {
                if($_GET['boccetta'][$key] == 'on') {
                    $boccetta = 1;
                }
            }
            echo $key;
            $sqlInsertOrderProducts = $conn->query("INSERT INTO order_products (cod_product, cod_order, order_prod_qta, order_prod_nic, order_prod_bocc, order_prod_price) VALUES ('$id_prod', '".$lastOrderId['id_order']."', '".$_GET['mlselect'][$key]."', '".$_GET['nicselect'][$key]."', '$boccetta', '".$_GET['checkout_price'][$key]."')");
            echo ($sqlInsertOrderProducts) ? "Prodotto ordine inserito" : "Errore query inserimento prodotti";
        }
        unset($_SESSION['cart']);
        header("location: ../index.php?order_success=true");
    }
}
?>
