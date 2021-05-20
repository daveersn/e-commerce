<?php
include 'common/header.php';
include 'common/db_conn.php';
$navActive = 'home';
session_start();
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

?>

<body>
    <div class="min-h-full">
        <div class="p-3 pb-20 min-h-screen bg-gray-100">

            <form action="#" method="GET" class="flex justify-between">
                <div>
                    <p>ciao</p>
                </div>
                <div style="margin-right: -25px;">
                    <select name="category" class="border rounded-2xl shadow-md text-center uppercase bg-yellow-500 text-white text-sm shadow-md" onchange="submit();" style="margin-right: -30px; padding: 6px 7px;">
                        <option value="all"
                        <?php if (isset($_GET["category"])) {
                            echo(($_GET["category"] == "all") ? "selected" : "");} ?>
                        >Tutti</option>
                        <option value="fruttati"
                        <?php if (isset($_GET["category"])) {
                            echo(($_GET["category"] == "fruttati") ? "selected" : "");} ?>
                        >Fruttati</option>
                        <option value="cremosi"
                        <?php if (isset($_GET["category"])) {
                            echo(($_GET["category"] == "cremosi") ? "selected" : "");} ?>
                        >Cremosi</option>
                        <option value="tabacchi"
                        <?php if (isset($_GET["category"])) {
                            echo(($_GET["category"] == "tabacchi") ? "selected" : "");} ?>
                        >Tabacchi</option>
                    </select>
                </div>
            </form>

        <?php
            //POPUP MSGS
            if(isset($_GET["cart_added"])):
        ?>
            <div id="cartAddedMsg" class="my-3 text-center text-xs text-gray-100 text-md uppercase font-bold bg-red-500 rounded-2xl shadow-md py-2 mx-8">
                <span><?= $_GET["cart_added"] ?> aggiunto al carrello</span>
                <i onclick="this.parentElement.style.display='none';" class="fas fa-times pl-1"></i>
            </div>
        <?php endif;
            if(isset($_GET["order_success"])):
        ?>
            <div id="orderSuccessMsg" class="my-3 text-center text-xs text-gray-100 text-md uppercase font-bold bg-green-500 rounded-2xl shadow-md py-2 mx-20">
                <span>Ordine effettuato!</span>
                <i onclick="this.parentElement.style.display='none';" class="fas fa-times pl-1"></i>
            </div>
        <?php endif; ?>

            <?php
            if(!isset($_GET['search'])){
                $sql_get_products = $conn->query(
                "SELECT * FROM products ".(isset($_GET['category']) && $_GET['category'] !== 'all' ? "WHERE prod_category = '".$_GET['category']."'" : "")." ORDER BY prod_name");
            }
            else {
                $sql_get_products = $conn->query(
                "SELECT * FROM products WHERE prod_name LIKE '%".$_GET['search']."%' ORDER BY prod_name");
            }
            if(!$sql_get_products){
                echo "Query get prodotti non riuscita";
            }
            else{
                if($sql_get_products->num_rows > 0){
                    $key = 0;
                    while($row = $sql_get_products->fetch_array(MYSQLI_ASSOC)):?>

                    <!-- CARD PRODOTTO -->
                    <div class="flex shadow-md rounded-2xl border my-5 bg-white">

                        <!-- IMG PRODOTTO -->
                        <button class="z-50" onclick="showModalProd('<?=$key;?>')">
                            <img class="border shadow-xl rounded-2xl z-10" src="<?php echo $row['prod_img']; ?>" style="width: 120px; height: 130px">
                        </button>
                        <div class="flex flex-col justify-between flex-1">
                            <div class="mt-1 pr-2">
                                <div class="flex justify-between items-center ml-3 mt-1">

                                    <!-- TITOLO PRODOTTO -->
                                    <span class="tracking-wide font-bold uppercase">
                                        <?php echo $row['prod_name']; ?></span>
                                    <div class="mb-auto font-semibold">

                                        <!-- QTA PRODOTTO -->
                                        <span class="text-xs">Qta: </span><span class="font-semibold text-yellow-600 text-xs"><?php echo $row["prod_qta"]?>ml</span>

                                    </div>
                                </div>

                                <!-- DESC PRODOTTO -->
                                <span class="overflow-hidden clamp-2 text-sm ml-3">
                                    <?php echo $row['prod_desc']; ?> </span>
                            </div>

                            <!-- ADD TO CART -->
                            <div class="text-center" style="margin-left: -20px;">
                                <a style="z-index: 1;" class="border no-border-top block w-full rounded-xl font-bold py-1 prod-card-btn" href="cart/addCartItem.php?id_product=<?php echo $row['id_product']; ?>">ADD TO CART</a>
                            </div>

                        </div>
                    </div> <!-- END CARD PROD -->

                    <!-- MODAL -->
                    <div id='prodModal<?=$key;?>' class="prod-modal flex items-center justify-center hidden opacity-0 duration-200" onclick="closeModalProd('<?=$key;?>')">
                        <div class="modal-content bg-white mb-20 p-4 border-2 border-primary shadow-md rounded-2xl pt-1">
                            <div class="text-right">
                                <i onclick="closeModalProd('<?=$key;?>')" class="fas fa-times text-red-400 text-lg"></i>
                            </div>
                            <div>
                                <img src="<?= $row['prod_img']; ?>" class="mx-auto" style="width: 250px; height: 250px;">
                                <div>
                                    <hr class="border">
                                    <p class="font-bold text-2xl tracking-wider text-gray-800 text-center py-2"><?=$row['prod_name'];?></p>
                                    <P><?=$row['prod_desc'];?></P>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END MODAL -->

            <?php
                $key++;
                endwhile; }
            else {
                ?>
                    <div class="text-center font-bold text-gray-800 text-lg uppercase my-10">NESSUN PRODOTTO IN QUESTA CATEGORIA</div>
                <?php
            }
        }?>
        </div>
        <!-- NAVBAR -->
        <?php include "common/navbar.php"; ?>
    </div>
</body>

<script type="text/javascript">

    function showModalProd(key) {
        el = document.getElementById('prodModal'.concat(key));
        if(el.classList.contains('hidden')) {
            el.classList.remove('hidden');
            el.classList.remove('opacity-0');
            el.classList.add('opacity-100');
        }
        else {
            el.classList.add('hidden');
        }

    }

    function closeModalProd(key) {
        document.getElementById('prodModal'.concat(key)).classList.add('hidden');
        el.classList.remove('opacity-100');
        el.classList.add('opacity-0');

    }

</script>

</html>
