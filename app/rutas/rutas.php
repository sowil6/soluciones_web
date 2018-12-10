<?php

//todas las rutas disponibles en el proyecto
$ruta= new Ruta();
$ruta->controladores(array("/" =>"WelcomeController",
	"/usuarios"=>"UsuarioController" ,
	"/institucional"=>"InstitucionalController",
	"/oferta"=>"OfertaController",
	"/contacto"=>"ContactoController",
	"/noticia"=>"AppController",
	"/catalogoform"=>"CatalogoController",
	"/proyecto"=>"ProyectoController",
	"/catalogo_det"=>"CatalogoDetalleController",
	"/certificaciones"=>"CertificacionesController"
	

));