<?php
include 'common/header.php';

?>

<body>
    <div class="min-h-full">
        <div class="p-3 pb-20 h-full">
            <?php
            $var = ["test1", "test2", "test3", "test4", "test5", "test6",];
            foreach ($var as $title):?>
            <div class="flex shadow-md rounded-2xl border my-5">
                <img class="shadow-xl rounded-2xl z-10" src="https://place-hold.it/130" alt="">
                <div class="flex flex-col justify-between">
                    <div class="mt-1 pr-2">
                        <div class="flex justify-between items-center font-bold uppercase ml-3 mt-1">
                            <span class="tracking-wide">
                                <?php echo $title; ?></span>
                            <div>
                                
                                <?php
                                $review = 3;
                                for ($i=0; $i < 5; $i++):
                                    if($review > 0):
                                        $review--;  ?>

                                        <i class="fas fa-star text-xs text-yellow-400"></i>

                                <?php
                                    else:   ?>

                                        <i class="far fa-star text-xs"></i>

                                <?php endif; endfor; ?>

                            </div>
                        </div>
                        <span class="overflow-hidden clamp-2 text-sm ml-3"> Kowloon Legba katana motion chrome 3D-printed computer boat. Kanji futurity dead boy 8-bit city bicycle rifle carbon convenience store assault grenade. Man j-pop into tanto katana urban hotdog military-grade face forwards tube </span>
                    </div>
                    <div class="text-center" style="margin-left: -20px;">
                        <a class="border no-border-top block w-full rounded-xl font-bold py-1 prod-card-btn" href="#">ADD TO CART</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- NAVBAR -->
        <?php include "common/navbar.php"; ?>
    </div>
</body>

<script type="text/javascript">
    
</script>

</html>