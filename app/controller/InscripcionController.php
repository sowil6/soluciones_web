<?php 

class InscripcionController{


	public function index(){
		
	include_once LIBRERIA ."Vista.php";

	return Vista::crear("inscripcion");
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}