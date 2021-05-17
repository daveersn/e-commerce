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
                        <div class="p-1">Quantitá</div>
                        <div class="p-1">Categoria</div>
                        <div class="p-1">Img</div>
                    </div>
                    <div class="border">
                    </div>
                    <div class="mx-2">
                        <input class="border rounded-2xl m-1" type="text" name="prod_name[]">
                        <input class="border rounded-2xl m-1" type="text" name="prod_desc[]">
                        <input class="border rounded-2xl m-1" type="number" name="prod_price[]">
                        <input class="border rounded-2xl m-1" type="number" name="prod_qta[]"><br>
                        <!-- CATEGORIA -->
                        <select name="prod_category[]" class="border rounded-2xl m-1 px-2">
                            <option value="fruttati">Fruttati</option>
                            <option value="cremosi">Cremosi</option>
                            <option value="tabacchi">Tabacchi</option>
                        </select><br>
                        <input class="border rounded-2xl m-1" type="text" name="prod_img[]" oninput="readURL(this, <?php echo $i ?>);">
                        <img id="preview_img_<?php echo $i ?>" src="" class="border rounded-2xl" style="width: 150px;">
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


<script>
function readURL(input, id_index) {
    var preview_img = document.getElementById("preview_img_".concat(id_index));
    preview_img.src = input.value;
}
</script>