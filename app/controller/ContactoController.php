<?php 

class ContactoController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("contacto_vista");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}