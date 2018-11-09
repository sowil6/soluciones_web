<!doctype html>
<html><!-- InstanceBegin template="/Templates/plantillaBase.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div class="containerCeficc">
  <header>
  
  <?php include("../includes/cabecera.php")?>
    
    
  </header>
 <div class="contenedor">
 <div id="contenidos">
  <div class="contentIzquierda">
 <?php include("../includes/includecolizquierda.php")?>
  </div>
 
 <!-- InstanceBeginEditable name="EditRegionCentro" -->
  <article class="contentCentro">
    <link href="../Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
    <div class="Mastercentro">
    <div class="contenedorCerti">
           <?php
       
$master="detallecataloCerti";
$canciones = simplexml_load_file("../XMLPage/xmlCargaCertificaciones.xml");
echo'	<ul class="ulcertiCatalogo">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<img class='" .$master. "imagenoVideo '   src = '../Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	$v2 = $_GET['Accion'];
	if($cancion->Codigo==$v2){
echo'<li>'.$cancion->Titulo.$HTMLfoto_OVideo. '</br> '. $cancion->introduccionNoticia.'</br> '. $cancion->mensajeNoticia;

echo '</li>';
}}
echo'</ul>';	  

?>
       </div> 
    </div>
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->
 
<div class="contentDerecha">
   <?php include("../includes/includeCertificacionesColumnaDerecha.php")?>
</div>
</div><!-- end .contenidos -->
</div><!-- end .contenedor -->
  </div><!-- end .sidebar1 -->

  <footer>
     <?php include("../includes/footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>
