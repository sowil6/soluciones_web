<?php 

define("APP_RUTA",RUTA_BASE."app/");
define("VISTA_RUTA",RUTA_BASE."vista/");
define ("RUTA", APP_RUTA."rutas/");
define ("LIBRERIA", RUTA_BASE."libreria/");
define ("RUTA_INCLUDE", RUTA_BASE."includes/");
define ("RUTA_STYLES", RUTA_BASE."Styles/");
define ("RUTA_SCRIPTS", RUTA_BASE."Scrips/");
//echo "</br>ruta en core.php ".VISTA_RUTA;

include "Ruta.php";
include RUTA."rutas.php";
//include LIBRERIA."Vista.php";
