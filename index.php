
<?php 
///definir ruta

 define("RUTA_BASE", dirname(realpath(__FILE__))."/");
//echo "en index.php " .RUTA_BASE;
	
	include "libreria/core.php";
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login');
	}
if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['username']);
		header("location: /");
	}
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