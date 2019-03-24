<?php 

class CatalogoController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("catalogoform");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}