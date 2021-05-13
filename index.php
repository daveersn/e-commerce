<?php
include 'common/header.php';
include 'common/db_conn.php';
?>

<body>
    <div class="min-h-full">
        <div class="p-3 pb-20 h-full bg-gray-100">
            <?php
            $var = ["test1", "test2", "test3", "test4", "test5", "test6",];
            $sql_get_products = $conn->query("SELECT * FROM products ORDER BY prod_name");
            if(!$sql_get_products){
                echo "Query get prodotti non riuscita";
            }
            else{
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
                                    <!-- RECENSIONI -->
<!--                                     <?php
                                    $review = 3;
                                    for ($i=0; $i < 5; $i++):
                                        if($review > 0):
                                            $review--;  ?>
                                            <i class="fas fa-star text-yellow-400" style="font-size: 0.6rem"></i>
                                    <?php
                                        else:   ?>
                                            <i class="far fa-star" style="font-size: 0.6rem"></i>
                                    <?php endif; endfor;?> -->
                                    
                                    <!-- QTA PRODOTTO -->
                                    <span class="text-xs">Qta: </span><span class="font-semibold text-yellow-600"><?php echo $row["prod_qta"]?>ml</span>

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

            <?php endwhile; } ?>
        </div>
        <!-- NAVBAR -->
        <?php include "common/navbar.php"; ?>
    </div>
</body>

<script type="text/javascript">
    
</script>

</html>