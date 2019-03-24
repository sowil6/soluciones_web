<?php 

class ProyectoController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("proyectos_vista");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}