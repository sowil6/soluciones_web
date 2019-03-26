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
<!--<div class="tpl-snow">
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
--><body expr:class=';"loading" + data:blog.mobileClass';>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
  <article class="contentUnaColumna">
      <!doctype html>
<html>
<head>
<?php
//echo "entro".RUTA_fpdf;
?>
<script type="text/javascript">
function generapdf(){ //lo activas con un OnClick

	//alert(html);
	documento_="73";
	id_estudiante_="29";
window.location="reporte_inscripcion?documento="+ documento_+"&id_estudiante="+id_estudiante_ ;
// window.open("reporte_inscripcion?documento="+ documento_+"&id_estudiante="+id_estudiante_ , '_blank' , 'width=800,height=500 , menubar=no ,resizable=no'   );
}
</script>
<form method="post">
</span><label class="la_documento">Numero de Documento:</label> 
 <input  class="documento" type="text" id="documento" name="documento"  value="8" onkeyup="Exist_Estudio();return false;"><!--// return false Evitar ejecutar el submit del formulario.-->

</head>br>
</span><label class="la_documento">Numero de Documento:</label> 
 <input  class="id_estudiante" type="text" id="id_estudiante" name="id_estudiante"  value="27" onkeyup="Exist_Estudio();return false;"><!--// return false Evitar ejecutar el submit del formulario.-->



<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="generapdf();">Generar Pdf</button>
<a href="#"  onClick="generapdf();" >Registro</a>  
</form>
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>