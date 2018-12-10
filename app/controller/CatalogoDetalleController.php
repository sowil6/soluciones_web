<?php 

class CatalogoDetalleController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("catalogo_det");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}