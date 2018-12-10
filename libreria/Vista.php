<?php 
class Vista{

public static function crear($path){
//comprobamos si existe la variable path

if($path !=""){//if $path !=""

$paths= explode(".",$path);//convertimos a un array separado por puntos
$ruta=""; //inicializamos
for($i=0;$i <count($paths);$i++){ // for recorrer la variable paths
if($i== count($paths)-1){//comprobamos si es el ultimo
$ruta.=$paths[$i].".php";	//si es el ultimo le ponemos .php
}else{
$ruta.=$paths[$i]."/";//si no es el ultimo le ponemos una barra inclinada
}


}//end for
//comprobr si el archivo existe
echo "la ruta es: ". $ruta;
if (file_exists(VISTA_RUTA.$ruta)){
include  VISTA_RUTA.$ruta;
}else{
echo VISTA_RUTA.$ruta;
	die("la ruta no existe");
}


}//end if

	
}
}
?>