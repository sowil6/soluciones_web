<!doctype html>
<html><!-- InstanceBegin template="/Templates/plantillaBase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Corporación Educativa de Formación Integral del Caribe - CEFIC </title>
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
   <div id="contentCentro">
  
 <link rel="stylesheet" type="text/css" href="../Styles/cssOfertaAcademica.css">
    
    <div class="contenedorOferta">
       
   <div class="TituloOferta">
      <p> OFERTA ACADEMICA:</p>
      </div>
        <?php
       
$master="oferta";
$canciones = simplexml_load_file("../XMLPage/xmlMenuCatalogo.xml");
echo'	<ul class="ulOferta">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = '../Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	
/*if($cancion->Codigo==$v2){}*/
echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'">'. $cancion->Titulo.$HTMLfoto_OVideo.'</br> '. $cancion->introduccionNoticia.'</a>';
echo '</li>';
}
echo'</ul>';	  

?>
    
    </div>   
  

   </div>
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
