<?php
class LoginController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("login");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}