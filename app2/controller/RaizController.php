<?php
class LoginRaizController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear(RUTA_BASE);
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}