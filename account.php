<?php
include 'common/db_conn.php';
include 'common/header.php';
$navActive = 'profile';
session_start();
?>

<body class="bg-gray-100">
    <div class="pt-5">
        <div class="text-center">
          <i class="far fa-user-circle text-8xl secondary"></i>
          <h2 class="mt-3 text-center text-3xl font-bold border-2 rounded-2xl mx-24 py-1 px-2 bg-white border-primary shadow-md text-gray-800">
            Username
          </h2>
        </div>
    </div>
        <!-- NAVBAR -->
    <?php include "common/navbar.php"; ?>
</body>
