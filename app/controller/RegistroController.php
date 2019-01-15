<?php
class RegistroController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("registro");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}