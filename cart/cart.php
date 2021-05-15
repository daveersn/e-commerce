<cart id="cart" class="menu block max-height-menu-0">
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

    	$cartIndex = 0;
    	foreach ($_SESSION["cart"] as $id_product):
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

    		<!-- CART IMG -->
    		<img src="<?php echo $row['prod_img'];?>" class="border shadow-xl rounded-md" style="width: 60px; height: 60px; object-fit: cover;">
    		<div class="flex flex-1 flex-col">
	    		<div class="flex justify-between items-center ml-2">

	    			<!-- CART TITLE -->
	            	<div class="tracking-wide font-bold uppercase"><?php echo $row["prod_name"]; ?></div>
	            	<div class="flex items-center">
	            		<div class="font-semibold">30ml</div>
	                	<div class="ml-3 font-semibold">6€</div>
	                	<div>
	                    	<a href="cart/removeCartItem.php?remove_cart_item=<?= $cartIndex; ?>" class="ml-4 mr-3 mt-1"><i class="fas fa-times text-2xl text-red-600" style="margin-top: 2px;"></i></a>
	                	</div>
	            	</div>
	        	</div>
        		<div class="ml-2 text-sm ">

        			<!-- CART DESC -->
        			<span class="clamp-1 overflow-hidden"><?php echo $row["prod_desc"]; ?></span>
        		</div>
        	</div>
	    </div>

    		<?php
    		$cartIndex++;
    		endif;} endforeach; ?>

    	</div>

	    <div class="pt-4 pb-2 text-right border-t-2"><a href="" class="font-bold text-gray-900 border primary-btn rounded-2xl shadow-xl p-1 px-3 text-black">CHECKOUT</a></div>
    </div>  

</cart>