<?php
session_start();
include "common/db_conn.php";
include "common/header.php";

?>

<body>
    <div class="min-h-full">
        <div class="p-3 pb-20 min-h-screen bg-gray-100">
            <div>
                <p class="text-center text-2xl font-bold tracking-wider my-2 mx-10 py-1 text-black">RIEPILOGO ORDINE</p>
            </div>
            <form action="orders/checkout.php" method="get">

            <?php
            $orderTot = 0;
            foreach ($_GET["checkout_price"] as $prodPrice) {
                $orderTot += $prodPrice;
            }
            if (isset($_GET["checkout_prodid"]) && isset($_GET["mlselect"]) && isset($_GET["nicselect"])) {
                foreach ($_GET['checkout_prodid'] as $key => $id_product):
                    $mlqta = $_GET["mlselect"][$key];
                    $nicqta = $_GET["nicselect"][$key];
                    $sql_get_products = $conn->query("SELECT * FROM products WHERE id_product = '$id_product' ORDER BY prod_name");
                    if(!$sql_get_products){
                        echo "Query get prodotti non riuscita";
                    }
                    else{
                        if($sql_get_products->num_rows > 0):
                            $row = $sql_get_products->fetch_array(MYSQLI_ASSOC)?>

                <!-- CARD PRODOTTO -->
                <div class="flex shadow-md rounded-2xl border my-5 bg-white">

                    <input type="text" name="checkout_prodid[]" value="<?= $_GET["checkout_prodid"][$key] ?>" hidden>
                    <input type="text" name="checkout_price[]" value="<?= $_GET["checkout_price"][$key] ?>" hidden>
                    <input type="text" name="mlselect[]" value="<?= $_GET["mlselect"][$key] ?>" hidden>
                    <input type="text" name="nicselect[]" value="<?= $_GET["nicselect"][$key] ?>" hidden>


                    <!-- IMG PRODOTTO -->
                    <img class="border shadow-xl rounded-2xl z-10" src="<?php echo $row['prod_img']; ?>" style="width: 120px; height: 130px">
                    <div class="flex flex-col flex-1">
                        <div class="mt-1 pr-2">
                            <div class="flex justify-between items-center ml-3 mt-1">
                                <!-- TITOLO PRODOTTO -->
                                <span class="tracking-wide font-bold uppercase">
                                    <?php echo $row['prod_name']; ?></span>
                                <div class="mb-auto font-semibold">
                                    <!-- PREZZO PRODOTTO -->
                                    <span class="pr-2 text-yellow-600"><?= $_GET['checkout_price'][$key]; ?><span class="text-xs">€</span></span>
                                </div>
                            </div>
                            <!-- DESC PRODOTTO -->
                            <span class="overflow-hidden clamp-2 text-sm ml-3">
                                <?php echo $row['prod_desc']; ?> </span>
                        </div>
                        <!-- ADD TO CART -->
                        <hr class="mx-3 my-1 border">
                        <div class="ml-3 flex justify-between items-center pr-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="boccetta[]" onchange="changeTotPrice(this)">
                                <label for="boccetta[]" class="text-sm pl-1">Boccetta <span class="text-xs">+1€</span></label>
                            </div>
                            <div>
                                <span class="font-semibold text-pink-600">
                                <?= $mlqta?></span><span class="text-sm text-pink-600">ml</span>
                                <span class="font-semibold text-purple-500">
                                <?= $nicqta?></span><span class="text-sm text-purple-500">nic</span>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; } endforeach; }?>
            <hr class="border">
            <div class="flex justify-between mt-3">
                <div>
                    <p class="font-semibold tracking-wide pl-3">TOTALE:
                        <span class="text-xl text-red-500 font-bold" id="totViewOrdine"><?=$orderTot?></span>
                        <input type="text" name="totOrdine" value="<?=$orderTot?>" id="totOrdine" hidden>
                        <span class="text-red-500 font-bold">€</span>
                    </p>
                </div>
                <div>
                    <button type="submit" class="p-1 px-3 border rounded-2xl shadow-2xl secondary-btn">Procedi all'ordine</button>
                </div>
            </div>
            </form>
        </div>
    </div>
            <!-- NAVBAR -->
    <?php include "common/navbar.php"; ?>
</body>

<script>

    function changeTotPrice(element) {
        totView = document.getElementById('totViewOrdine');
        tot = document.getElementById('totOrdine');


        if(element.checked) {
            totView.innerText = parseInt(totView.innerText)+1;
            tot.value = parseInt(totView.innerText);
        }
        else {
            totView.innerText = parseInt(totView.innerText)-1;
            tot.value = parseInt(totView.innerText);
        }
    }
</script>
