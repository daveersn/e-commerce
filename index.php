<?php
include 'common/header.php';
include 'common/db_conn.php';
session_start();
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

?>


<body>
    <div class="min-h-full">
        <div class="p-3 pb-20 min-h-screen bg-gray-100">

            <form action="#" method="GET" class="text-right">
                <span class="border-2 py-2 px-2 pr-6 rounded-2xl bg-yellow-500 shadow-2xl font-semibold text-white" style="margin-right: -25px;">Categoria</span>

                <select name="category" class="border rounded-2xl shadow-md px-2 text-center font-semibold uppercase py-2 bg-yellow-600 text-white" onchange="submit();">

                    <option value="all" 
                    <?php if(isset($_GET["category"])) { 
                        echo(($_GET["category"] == "all") ? "selected" : "");} ?>
                    >Tutti</option>

                    <option value="fruttati" 
                    <?php if(isset($_GET["category"])) { 
                        echo(($_GET["category"] == "fruttati") ? "selected" : "");} ?>
                    >Fruttati</option>

                    <option value="cremosi" 
                    <?php if(isset($_GET["category"])) { 
                        echo(($_GET["category"] == "cremosi") ? "selected" : "");} ?>
                    >Cremosi</option>

                    <option value="tabacchi" 
                    <?php if(isset($_GET["category"])) { 
                        echo(($_GET["category"] == "tabacchi") ? "selected" : "");} ?>
                    >Tabacchi</option>
                </select>
            </form>

        <?php
            if(isset($_GET["cart_added"])):
        ?>
            <div id="cartAddedMsg" class="my-3 text-center text-xs text-gray-100 text-md uppercase font-bold bg-red-500 rounded-2xl shadow-md py-2 mx-8">
                <span><?= $_GET["cart_added"] ?> aggiunto al carrello</span>
                <i onclick="this.parentElement.style.display='none';" class="fas fa-times pl-1"></i>
            </div>
        <?php endif; ?>

            <?php
            $sql_get_products = $conn->query(
                "SELECT * FROM products ".(isset($_GET['category']) && $_GET['category'] !== 'all' ? "WHERE prod_category = '".$_GET['category']."'" : "")." ORDER BY prod_name");
            if(!$sql_get_products){
                echo "Query get prodotti non riuscita";
            }
            else{
                if($sql_get_products->num_rows > 0){
                    while($row = $sql_get_products->fetch_array(MYSQLI_ASSOC)):?>

                    <!-- CARD PRODOTTO -->
                    <div class="flex shadow-md rounded-2xl border my-5 bg-white">

                        <!-- IMG PRODOTTO -->
                        <img class="border shadow-xl rounded-2xl z-10" src="<?php echo $row['prod_img']; ?>" style="width: 120px; height: 130px">
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
                                <a class="border no-border-top block w-full rounded-xl font-bold py-1 prod-card-btn" href="cart/addCartItem.php?id_product=<?php echo $row['id_product']; ?>">ADD TO CART</a>
                            </div>

                        </div>
                    </div>

            <?php endwhile; }
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
    
</script>

</html>