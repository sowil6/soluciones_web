<?php
class Conectar{
	
public static function conexion(){
	echo '<script language="javascript">alert("en Conectar_ 1or");</script>';
$host= "localhost";
$user="root";
$password="";
$database="bdcefic";

error_reporting(0);//no me muestra errores

//lista de tablas
$tabla1= table_noticia;

$conexion= new mysqli($host, $user, $password, $database);
mysqli_set_charset($conexion, "utf8");
//echo "conexion exitosa";

if($conexion->connect_errno){
	echo "Nuestro sitio experimneta fallos...";
	exit();
	}
	}
	


	
	}

?>