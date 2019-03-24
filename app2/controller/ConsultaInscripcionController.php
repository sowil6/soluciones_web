<?php 

class ConsultaInscripcionController{


	public function index(){
		
	include_once LIBRERIA ."Vista.php";

	return Vista::crear("consultarinscripcion");
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}