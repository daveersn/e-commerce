<?php
include 'common/db_conn.php';
include 'common/header.php';
session_start();
?>

<body class="bg-gray-100">
    <div class="pt-5 pb-28">
        <div class="mb-6">
            <p class="text-center text-2xl font-bold tracking-wider my-2 mx-10 py-1 text-black">ORDINI</p>
        </div>

        <!-- ORDER CARD -->
        <?php
        $sqlGetOrders = $conn->query("SELECT *
            FROM orders
            INNER JOIN accounts ON cod_user = id_account
            WHERE id_account = '".$_SESSION['userId']."'");
        if (!$sqlGetOrders) { echo "Query select orders non riuscita";}
        else {
            if($sqlGetOrders->num_rows > 0) {
                $index = 0;
                while($row = $sqlGetOrders->fetch_array(MYSQLI_ASSOC)): ?>
                <div>
                    <div class="flex justify-between items-center bg-white mx-3 rounded-2xl shadow-md px-3 py-2 border border-primary my-4">
                        <div>
                            <p class="font-semibold">Ordine #<?= $row['id_order']; ?></p>
                        </div>
                        <div>
                            <button class="py-1 px-3 border-2 border-primary primary-btn text-white shadow-md rounded-xl text-xs font-semibold" onclick="showOrder(<?=$index; ?>)">VISUALIZZA</button>
                        </div>
                    </div>
                    <div class="p-4 mx-3 mt-2 bg-white shadow-md rounded-xl border border-primary hidden" id='order<?=$index; ?>'>
                    <?php
                    $sqlGetOrderDetail = $conn->query("SELECT * FROM order_products INNER JOIN products ON cod_product = id_product WHERE cod_order = '".$row['id_order']."'");
                    if(!$sqlGetOrderDetail) { echo "Query dettaglio ordine non riuscita";}
                    else {
                        while($rowProd = $sqlGetOrderDetail->fetch_array(MYSQLI_ASSOC)):?>
                        <div class="my-2">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <img src="<?= $rowProd['prod_img']; ?>" width="70" height="70" class="border shadow-md rounded-xl z-10">
                                    <div class="ml-2">
                                        <div>
                                            <p class="font-bold uppercase tracking-wide"><?= $rowProd['prod_name'];  ?></p>
                                        </div>
                                        <div>
                                            <p class="text-xs pt-4">Boccetta: <span class="text-sm text-red-400 font-semibold"><?= ($rowProd['order_prod_bocc']) ? 'SI' : 'NO'; ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm">
                                    <p>Prezzo</p>
                                    <p class="font-semibold text-gray-800"><?= $rowProd['order_prod_qta'] ?><span class="text-xs">ml</span></p>
                                    <p class="font-semibold text-gray-800"><?= $rowProd['order_prod_nic'] ?><span class="text-xs">nic</span></p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 border">
                        <?php endwhile; } ?>
                        <p class="text-right font-semibold text-xs">TOT:
                            <span class="text-lg text-red-500 font-bold"><?= $row['order_tot'];  ?><span class="text-sm">€</span></span></p>
                    </div>
                </div>
                <?php
                $index++;
                endwhile;
            }
            else {
                echo "Nessun ordine per questo utente";
            }
        }
        ?>

    </div>
    <!-- NAVBAR -->
    <?php include "common/navbar.php"; ?>
</body>
<script>
function showOrder(index) {
    orderSection = document.getElementById('order'.concat(index));
    if (orderSection.classList.contains('hidden')) {
        orderSection.classList.remove('hidden')
    } else {
        orderSection.classList.add('hidden');
    }
}
</script>
