<?php
class PruebasController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("pruebas");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}