<!doctype html>
<html><!-- InstanceBegin template="/Templates/PlantillaUnaColumna.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<?php include(RUTA_INCLUDE."head_include.php")?>
<!-- InstanceBeginEditable name="doctitle" -->
<!-- InstanceEndEditable -->
  
<!--<link href="../Styles/bootstrapCSS/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../Scripts/jquery-css-transform.js" type="text/javascript"></script>-->
 


<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>
<div class="tpl-snow">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<body expr:class=';"loading" + data:blog.mobileClass';>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
  <article class="contentUnaColumna">
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

  
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>