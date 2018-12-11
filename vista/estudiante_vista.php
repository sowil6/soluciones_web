



  <?php
		   if(isset($_GET['action'])){ $urlpagina = $_GET['action'];

	if($urlpagina!=null){//if $urlpagina
			
			if($urlpagina=="inscripcion"){
		include RUTA_INCLUDE."include_inscripcion.php";
				}
		
	if($urlpagina=="certificado"){
		include RUTA_INCLUDE."include_certificado.php";
				}
}
		   }
?>