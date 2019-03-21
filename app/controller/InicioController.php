<?php 

class InicioController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}