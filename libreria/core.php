<?php 

define("APP_RUTA",RUTA_BASE."app2/");
define("VISTA_RUTA",RUTA_BASE."vista/");
define ("RUTA", APP_RUTA."rutas/");
define ("LIBRERIA", RUTA_BASE."libreria/");
define ("RUTA_INCLUDE", RUTA_BASE."includes/");
define ("RUTA_STYLES", RUTA_BASE."Styles/");
define ("RUTA_SCRIPTS", RUTA_BASE."Scrips/");
define ("RUTA_TEMP", RUTA_BASE."Temp/");
define ("RUTA_IMG", RUTA_BASE."Img/");
define ("RUTA_MODELO", RUTA_BASE."modelo/");
define ("RUTA_MANAGER", RUTA_BASE."manager/");
define ("RUTA_BEANS", RUTA_BASE."Beans/");
define ("RUTA_Mpdf", RUTA_BASE."mpdf/");

//echo "</br>ruta en core.php ".VISTA_RUTA;

include "Ruta.php";
include RUTA."rutas.php";
//include LIBRERIA."Vista.php";
