
<?php 
///definir ruta
session_start();
 define("RUTA_BASE",  dirname(realpath(__FILE__))."/");
//echo "ruta home " .__FILE__ ."--";
	
	include "libreria/core.php";

//echo "en index la ruta de model esss" .RUTA_MODELO."manager";
/*	 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login');
	}
if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['username']);
		header("location: /");
	}*/
 ?>
 <?php 
/*	

	if (isset($_GET['logout'])) {
		echo "ingreo";
		session_destroy();
		unset($_SESSION['username']);
		header("location: index");
	}
*/
?>