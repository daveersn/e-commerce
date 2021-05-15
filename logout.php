<?php 

session_start();
if(session_unset()){
	header("location: index.php");
}
else {
	echo "Error unsetting session";
}

?>