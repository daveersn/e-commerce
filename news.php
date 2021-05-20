<?php
include 'common/db_conn.php';
include 'common/header.php';
$navActive = 'news';
session_start();
?>

<body class="bg-gray-100">
    <div class="min-h-screen">
        <p class="text-center text-2xl uppercase font-bold tracking-widest py-5">news</p>
        <div class="flex flex-col items-center space-y-4">
            <?php
            $sqlGetNews = $conn->query('SELECT * FROM news');
            if(!$sqlGetNews) {
              echo "Query news non riuscita";
            }
            else {
              if($sqlGetNews->num_rows > 0):
                $key = 0;
                while ($row = $sqlGetNews->fetch_array(MYSQLI_ASSOC)):?>
            <div class="news-card p-2 border-2 border-primary bg-white rounded-2xl shadow-md" onclick="showModalNews('<?=$key;?>')">
                <p class="text-gray-800 text-xl uppercase font-bold tracking-wider"><?=$row['news_title']?></p>
                <hr class="border my-1">
                <p class="text-sm clamp-2 overflow-hidden text-gray-800"><?=$row['news_content']?></p>
            </div>

            <!-- MODAL -->
            <div id='newsModal<?=$key;?>' class="news-modal flex items-center justify-center hidden">
                <div class="modal-content bg-white mb-20 p-4 border-2 border-primary shadow-md rounded-2xl pt-1">
                    <div class="text-right">
                        <i onclick="closeModalNews('<?=$key;?>')" class="fas fa-times text-red-400 text-lg"></i>
                    </div>
                    <div>
                      <p class="font-bold text-3xl tracking-wider text-gray-800 uppercase text-center pb-2">
                          <?=$row['news_title'];?>
                      </p>
                      <hr class="border">
                    <div class="">
                      <div class="h-96 overflow-auto">
                        <P class="py-3">
                            <?=$row['news_content'];?>
                        </P>
                      </div>
                    </div>
                  </div>
                </div>
            </div> <!-- END MODAL -->
            <?php
            $key++;
            endwhile; endif;  }
            ?>
        </div>
    </div>
    </div>
    <!-- NAVBAR -->
    <?php include "common/navbar.php"; ?>
</body>
</html>

<script type="text/javascript">

    function showModalNews(key) {
        el = document.getElementById('newsModal'.concat(key));
        if(el.classList.contains('hidden')) {
            el.classList.remove('hidden');
        }
    }

    function closeModalNews(key) {
        document.getElementById('newsModal'.concat(key)).classList.add('hidden');
    }

</script>
