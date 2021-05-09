<?php 
include 'common/header.php';
include 'common/db_conn.php';
?>

<body class="min-h-full">
    <div class="h-full">
        <div class="p-3 pb-24 h-full">

        	<form action="#" method="GET" class="flex justify-end mb-4">
        		QTA Form: <input class="border rounded-2xl ml-1 w-12" type="number" name="form_amount">
        		<input class="ml-1 px-1 border rounded-2xl" type="submit">
        	</form>
            <form action="#" method="GET">
        	<?php
                include "insert_prod_db.php";       

        		if (isset($_GET["form_amount"])):
        			$form_amount = $_GET["form_amount"];
        			for ($i=0; $i < $form_amount; $i++):
        	?>

            <div class="flex">
                <div class="mr-2 font-bold">
                    <div class="p-1">Nome</div>
                    <div class="p-1">Descrizione</div>
                    <div class="p-1">Prezzo</div>
                    <div class="p-1">Img</div>
                </div>
                <div class="border">
                </div>
                <div class="class="mx-2>
                    <input class="border border-black rounded-2xl m-1" type="text" name="prod_name[]">
                    <input class="border border-black  rounded-2xl m-1" type="text" name="prod_desc[]">
                    <input class="border border-black  rounded-2xl m-1" type="number" name="prod_price[]">
                    <input class="border border-black  rounded-2xl m-1" type="text" name="prod_img[]">
                </div>
            </div>
            <hr class="mt-1 mb-3">
        <?php endfor; endif;?>

            <div class="text-right mt-6"><input type="submit" class="ml-1 py-2 px-6 border rounded-2xl font-bold"></div>
            </form>
<!--             <div class="pb-20">
                <?php var_dump($_GET[""]); ?>
                
            </div> -->
        </div>
        <!-- NAVBAR -->
        <?php include "common/navbar.php"; ?>
    </div>
</body>