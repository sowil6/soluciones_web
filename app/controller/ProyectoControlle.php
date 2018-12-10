<?php 

class ProyectoController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("proyecto");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}