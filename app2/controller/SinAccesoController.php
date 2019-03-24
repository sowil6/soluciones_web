<?php 

class SinAccesoController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("sin_acceso");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}