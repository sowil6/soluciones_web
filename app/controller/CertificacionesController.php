<?php 

class CertificacionesController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("certificaciones");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}