<?php
class WelcomeController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("inicio");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}