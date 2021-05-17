<cart id="cart" class="menu block max-height-menu-0">
    <form action="order_summary.php" method="GET">
        <div class="mb-3 h-52">
            <div class="h-40 overflow-auto">
            <?php
            if(!session_status() == 2){
                 echo "sessione non attiva";
                 session_start();
            }

             if(empty($_SESSION["cart"])):?>
                 <p class="text-center font-bold text-gray-800">CARRELLO VUOTO</p>
             <?php
             endif;

             foreach ($_SESSION["cart"] as $key=>$id_product):
                 $sqlGetCartItem = $conn->query("SELECT * FROM products WHERE id_product=$id_product");
                 if(!$sqlGetCartItem){
                     echo "Query carrello non riuscita";
                 }
                 else{
                     if($sqlGetCartItem->num_rows > 0):
                         $row = $sqlGetCartItem->fetch_array(MYSQLI_ASSOC);
                 ?>

             <!-- CART ITEM -->
             <div class="flex items-start my-2">
                <input type="text" name="checkout_prodid[]" value="<?php echo $row["id_product"] ?>" hidden>

                 <!-- CART IMG -->
                 <img src="<?php echo $row['prod_img'];?>" class="border shadow-xl rounded-md" style="width: 60px; height: 60px; object-fit: cover;">
                 <div class="flex flex-1 flex-col">
                     <div class="flex justify-between items-center ml-2">

                         <!-- CART TITLE -->
                         <div class="tracking-wide font-bold uppercase"><?php echo $row["prod_name"]; ?></div>
                         <div class="flex items-center">
                             <div class="font-semibold">
                                 <select class="border rounded-lg shadow-md bg-white text-sm" name="mlselect[]" id="mlselect<?=$key; ?>" onchange="updatePrice(this, <?=$key; ?>)">
                                     <option value="10">10ml</option>
                                     <option value="30">30ml</option>
                                     <option value="60">60ml</option>
                                 </select>
                             </div>
                             <div>
                                 <a href="cart/removeCartItem.php?remove_cart_item=<?= $key; ?>" class="ml-4 mr-3 mt-1"><i class="fas fa-times text-2xl text-red-600" style="margin-top: 2px;"></i></a>
                             </div>
                         </div>
                     </div>
                     <div class="flex justify-between ml-2 text-sm mt-1">

                         <!-- CART DESC -->
                         <span class="clamp-1 overflow-hidden"><?php echo $row["prod_desc"]; ?></span>

                         <div class="ml-3 font-semibold">
                                 <select class="border rounded-lg shadow-md bg-white" name="nicselect[]" style="width: 55px; margin-right: 10px;">
                                     <option value="0">0nic</option>
                                     <option value="3">3nic</option>
                                     <option value="6">6nic</option>
                                     <option value="9">9nic</option>
                                 </select>
                         </div>

                         <div>
                             <div class="font-semibold px-2" id="price<?=$key; ?>">4€</div>
                             <input type="text" name="checkout_price[]" value="4" id="checkout_price<?=$key; ?>" hidden>
                         </div>
                     </div>
                 </div>
             </div>

                 <?php
                 endif;} endforeach; ?>
             </div>

        <div class="pt-4 pb-2 text-right border-t-2"><button type="submit" class="font-bold text-gray-900 border primary-btn rounded-2xl shadow-xl p-1 px-3 text-black">CHECKOUT</button></div>
        </div>
    </form>

</cart>

<script>
    function updatePrice(element, key) {

        price = document.getElementById("price".concat(key));
        checkoutPrice = document.getElementById("checkout_price".concat(key));
        switch (element.value) {
            case "10":
                checkoutPrice.value = "4";
                console.log(checkoutPrice.value);
                price.innerText = "4€";
                break;
            case "30":
                checkoutPrice.value = "7";
                console.log(checkoutPrice.value);
                price.innerText = "7€";
                break;
            case "60":
                checkoutPrice.value = "12";
                price.innerText = "12€";
                break;
        }
    }
</script>
