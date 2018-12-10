<?php 

class AppController{


	public function index(){
	include_once LIBRERIA ."Vista.php";
	return Vista::crear("noticia_vista");


		
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}