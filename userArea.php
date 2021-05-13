<?php 
include 'common/db_conn.php';
include 'common/header.php';
session_start();
?>

<body class="bg-gray-100">

<div>
	<h1 class="text-center p-4 text-3xl font-bold text-white uppercase tracking-wider secondary-btn">
		<?php echo $_SESSION['displayName'] ?>
	</h1>

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