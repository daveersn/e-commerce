<?php
include 'common/db_conn.php';
include 'common/header.php';
$navActive = 'profile';
session_start();
?>

<body class="bg-gray-100">
    <div class="pt-5">

        <a href="order_list.php">
            <div class="mt-6 flex flex-col items-center">
                <div class="border flex flex-col justify-center shadow-md rounded-md bg-white w-36 h-36 text-center">
                    <i class="far fas fa-archive text-7xl primary"></i>
                    <h2 class="pt-1 uppercase text-xl text-gray-700 font-extrabold tracking-wider">Ordini</h2>
                </div>
            </div>
        </a>

        <a href="account.php">
            <div class="mt-6 flex flex-col items-center">
                <div class="border flex flex-col justify-center shadow-md rounded-md bg-white w-36 h-36 text-center">
                    <i class="far fa-address-book text-7xl text-purple-400"></i>
                    <h2 class="pt-1 uppercase text-xl text-gray-700 font-extrabold tracking-wider">Account</h2>
                </div>
            </div>
        </a>

        <a href="logout.php">
            <div class="mt-6 flex flex-col items-center">
                <div class="border flex flex-col justify-center shadow-md rounded-md bg-white w-36 h-36 text-center">
                    <i class="fas fa-sign-out-alt text-7xl text-red-400"></i>
                    <h2 class="pt-1 uppercase text-xl text-gray-700 font-extrabold tracking-wide">Logout</h2>
                </div>
            </div>
        </a>

    </div>
    <?php include 'common/navbar.php' ?>
</body>

</html>
