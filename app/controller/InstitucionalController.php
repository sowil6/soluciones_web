<?php
class InstitucionalController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("institucional");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}