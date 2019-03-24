<?php
class OfertaController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("ofertaacademica");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}