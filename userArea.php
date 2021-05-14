<?php 
include 'common/db_conn.php';
include 'common/header.php';
session_start();
?>

<body class="bg-gray-100">
    <div>
        <div style="background: rgba(0,0,0,1);">
            <div class="navbar-top flex justify-between items-center p-3 text-xl font-bold text-white uppercase tracking-wider secondary-btn shadow-xl">
                <h1>
                    <?php echo $_SESSION['displayName'] ?>
                </h1>
                <button class="text-lg rounded-md px-3 py-1 bg-red-500 hover:bg-red-600 shadow-md" style="border: 1px solid rgba(255,255,255, 0.3);">Logout</button>
            </div>
        </div>
        <div class="mt-6 flex flex-col items-center">
            <div class="p-6 border shadow-md rounded-md bg-white w-36 h-36 text-center">
                <i class="ml-2 far fa-address-book text-7xl primary"></i>
                <h2 class="p-2 uppercase text-xl text-gray-800 font-bold tracking-wider">Ordini</h2>
            </div>
        </div>
    </div>
    <?php include 'common/navbar.php' ?>
</body>

</html>