<?php 

class AppController{


	public function index(){
		
	include_once LIBRERIA ."Vista.php";

	return Vista::crear("noticia");
	}

	public function insertar(){

		echo "</br> hola funcion insertar";
	}
}