<?php
class EstudianteController{

	public function index(){

		include_once LIBRERIA ."Vista.php";
	return Vista::crear("gestion_estudiante");
	}

	public function insertar(){

		echo "</br> hola funcion insertar en welcome";
	}
}