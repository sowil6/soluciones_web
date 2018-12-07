<!doctype html>
<html><!-- InstanceBegin template="/Templates/plantillaBase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
<!-- InstanceEndEditable -->
  <?php include("../includes/head_include.php")?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
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
<div class="containerCeficc">
  <header>
  
  <?php include("../includes/cabecera.php")?>
    
    
  </header>
 <div id="contenedor">
 <div id="contenidos">
  <div id="contentIzquierda">
 <?php include("../includes/includecolizquierda.php")?>
  </div>
 
 <!-- InstanceBeginEditable name="EditRegionCentro" -->
<!-- <link href="../Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css"> 
 <link rel="stylesheet" type="text/css" href="../Styles/cssOfertaAcademica.css">-->
<link rel="stylesheet" type="text/css" href="../Styles/css_Detalle_Catalogo.css">
<article id="contentCentro">
 <div class="contenedor_Cat">
 <div id="contenidos_Cat">
   <div class="contenedorDetalleCatalogo"> 
   <p class="DetalleCatalogo_TituloPagina">OFERTA ACADEMICA DETALLADA</p> 
    <div class="contenedorDetalleCatalogoIZQ">
    <?php
       
$master="detallecatalogoIZQ";
$canciones = simplexml_load_file("../XMLPage/xmlCatalogo.xml");
echo'	<ul class="ulDetalleCatalogoIZQ">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo '   src = '../Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	$v2 = $_GET['Accion'];
	$detalleCod = $_GET['dcod'];
if($cancion->DetalleCodigo==$detalleCod){
echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'&dcod='.$cancion->DetalleCodigo.'"><li>  <p class="titulo">'. $cancion->Titulo.'</p>';
echo $HTMLfoto_OVideo.'<p class="Intro">'. $cancion->introduccionNoticia.'</p> </a>';
echo '</li>';
}}
echo'</ul>';	  

?>
    </div>
       <div class="contenedorDetalleCatalogoDER">
           <?php
       
$master="detallecatalogoDER";
$canciones = simplexml_load_file("../XMLPage/xmlCatalogo.xml");
echo'	<ul class="ulDetalleCatalogoDER">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo '   src = '../Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	
if($cancion->Codigo==$v2&&$cancion->DetalleCodigo==$detalleCod){
echo'<li><p class="titulo">'. $cancion->Titulo.'</p> ';
echo $HTMLfoto_OVideo.'<p class="Intro">'. $cancion->introduccionNoticia.'</p>';

echo '</li>';
}}
echo'</ul>';	  

?>
       </div>
    </div>
</div>
</div>
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->
 
<div id="contentDerecha">
   <?php include("../includes/includeColumnaDerecha.php")?>
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
