<?php 

define("APP_RUTA",RUTA_BASE."app/");
define("VISTA_RUTA",RUTA_BASE."vista/");
define ("RUTA", APP_RUTA."rutas/");
define ("LIBRERIA", RUTA_BASE."libreria/");
//echo "</br>ruta en core.php ".VISTA_RUTA;

include "Ruta.php";
include RUTA."rutas.php";
//include LIBRERIA."Vista.php";
