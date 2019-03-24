<?php 

class Reporte_InscripcionController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("reporte_inscripcion");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}