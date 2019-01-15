<?php

//todas las rutas disponibles en el proyecto
$ruta= new Ruta();
$ruta->controladores(
	array("/" =>"WelcomeController",
	"/usuarios"=>"UsuarioController" ,
	"/institucional"=>"InstitucionalController",
	"/oferta"=>"OfertaController",
	"/contacto"=>"ContactoController",
	"/noticia"=>"AppController",
	"/catalogoform"=>"CatalogoController",
	"/proyectos"=>"ProyectoController",
	"/detallecatalogo"=>"CatalogoDetalleController",
	"/certificaciones"=>"CertificacionesController",
	"/estudiante"=>"EstudianteController",
	"/login"=>"LoginController",
	"/registro"=>"RegistroController",
	"/logeado"=>"LogeadoController",
	""=>"RaizController"
	
	));