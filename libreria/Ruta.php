<?php
/**
* metodo que nos permite ingresar controladores con sus  respectivas rutas
*/
class Ruta
{
	private $_controladores= array();
	public function controladores($controlador){
		$this->_controladores=$controlador;
		//llamada al metodo que hace el rpcoeso de ruta
		self::submit();

	}

	//funcion o metodo que se ejecuta cada vez que se envia la peticion a la url
	public function submit(){

		$uri= isset($_GET["uri"]) ?$_GET["uri"]:"/";//recupera la url del proyecto
		$paths=explode("/", $uri);
		//print_r($paths);
		//echo "</br>recuperacion de la url ". $uri;
		//hacer condicional para saber si esta en un
		//controlador o en una ruta principal
		if($uri=="/"){
			//principal
			//echo "principal";
$res= array_key_exists("/",$this->_controladores);
if($res !="" && $res==1){//$res !="" && $res==1		 //busca si existe la ruta (/) en el arrary de contorladores
	//echo "correcto";
		
		foreach ($this->_controladores as $ruta=>$controller) {//recorriendo los controladores
			if($ruta=="/"){ //if $ruta //si las rutas son iguales
	$controlador=$controller;//se asigna a una variable el controlador

			}//end $ruta
		
		}//end foreach
		echo $controlador;
		$this->getController("index",$controlador);//llamamos al metodo que nos recupera el controlador

						}//end $res !="" && $res==1
	
		}else{

			//controlador y metodos
			//echo "controlador";
			$estado=false;
			
			foreach ($this->_controladores as $ruta =>$control) {//foreach $this->_controladores as $ruta =>$cont
				echo "</br>esta es la ruta " .$ruta;
				if(trim($ruta,"/")== $paths[0]){//trim($ruta,"/")== $paths[0]
$estado=true;
$controlador=$control;
$metodo="";
if(count($paths) >1){	//count($paths >1
$metodo=$paths[1];

}//end count($paths >1
$this->getController($metodo,$controlador);

				}//end trim($ruta,"/")== $paths[0]
				# code...
			}//end foreach $this->_controladores as $ruta =>$cont
if($estado==false){//$estado==false

die("error en la ruta ".$ruta);

}//end $estado==false
		}
}//end functin submit


	

public function getController($metodo, $controlador){
$metodoControler="";//variable que almacena em metodo que se va a ejecutar
//comporbamos si es index o no el metodo o funcion del controlador
if($metodo=="index"||$metodo==""){
$metodoController="index";
}else{
	$metodoController=$metodo;
}
//incluimos el controlador
$this->incluirControlador($controlador);

//comprobamos si la clase existe
if(class_exists($controlador)){//class_exists
//creamos una clase temporal en base a la varable controlador =(WelcomeControler)
$classTemp = new $controlador();
if(is_callable(array($classTemp,$metodoController))){// is_callable
$classTemp->$metodoController();

}//end is_calable
//echo "</br>la clase si existe";

}//end class_exists
else{//else class_exists 
die ("no existe la clase");

}//end class_exists
}

public function incluirControlador($controlador){
if(file_exists(APP_RUTA."controller/".$controlador.".php")){
	include APP_RUTA."controller/".$controlador.".php";
}else{
	echo "</br>error al encontrar el archivo del controlador";
	die("</br>error al encontrar el archivo del controlador");



}
}

}///end clas