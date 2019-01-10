<!doctype html>
<html><!-- InstanceBegin template="/Templates/plantillaBase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
  <?php include(RUTA_INCLUDE."head_include.php")?>
<!-- InstanceBeginEditable name="doctitle" -->

<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
    
    
  </header>
 <div id="contenedor">
 <div id="contenidos">
  <div id="contentIzquierda">
 <?php include(RUTA_INCLUDE."includecolizquierda.php")?>
  </div>
 
 <!-- InstanceBeginEditable name="EditRegionCentro" -->
 <article id="contentCentro">
      <link rel="stylesheet" type="text/css" href="./Styles/cssCatalogoCertificaciones.css">

    <div class="Mastercentro">
    <div class="contenedorDetalleCerti">
           <?php
       
$master="detalleCertifi";
$canciones = simplexml_load_file("./XMLPage/xmlCargaCertificaciones.xml");
echo'	<ul class="uldetalleCerti">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo '   src = './Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	if(isset( $_GET['Accion'])){$v2=$_GET['Accion'];}

	if($v2!=null&& $cancion->Codigo==$v2){//if $v2

echo '<li><span class="Certificaciones_titulo">'. $cancion->Titulo.'</span>';
echo'<div class="Certificaciones_Imagen">'.$HTMLfoto_OVideo.'</div> <div class="Certificaciones_Intro" ><p>'. $cancion->introduccionNoticia.'</p></div><div class="Certificaciones_mensaje" ><p>'. $cancion->mensajeNoticia.'<p>';
echo '</li>';

}//end if $v2


}
echo'</ul>';	  

?>
       </div> 
    </div>
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->
 
<div id="contentDerecha">
   <?php include(RUTA_INCLUDE."includeColumnaDerecha.php")?>
</div>
</div><!-- end .contenidos -->
</div><!-- end .contenedor -->
  </div><!-- end .sidebar1 -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>
