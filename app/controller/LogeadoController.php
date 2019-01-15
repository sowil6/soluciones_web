<?php
class LogeadoController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("logeado");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}