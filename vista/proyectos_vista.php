<!doctype html>
<html><!-- InstanceBegin template="/Templates/PlantillaUnaColumna.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<?php include(RUTA_INCLUDE."head_include.php")?>
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
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
<link rel="stylesheet" type="text/css" href="./Styles/cssPagina_Proyectos.css">
  <article class="contentUnaColumna">
  <div class="contenedorProyecto"> 
  
  
 <div class="contenedorProyectoIZQ">
  <div class="divTituloulProyectoIZQ">
<p>PORTAFOLIO</p> 
 </div>
 
 
         <?php
       
$master="ProyectoIZQ";
$canciones = simplexml_load_file("./XMLPage/xmlPaginaInicioParteBaja.xml");
echo'	<ul class="ulProyectoIZQ">';
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
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = './Img/".$cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	
/*if($cancion->Codigo==$v2){}*/
echo '<li><a href='.$cancion->urlFile."?Accion=".$cancion->Codigo.'> <span class="titulo">'. $cancion->Titulo.'</span>';		
echo $HTMLfoto_OVideo.'<p class="Intro">'. $cancion->introduccionNoticia.'</p></a>';
echo '</li>';
}
echo'</ul>';	
  
?>
	
    </div> 
  
      

       <div class="contenedorProyectoDER">
<!--           <div class="slide_proyectos">Portafolio de Servicios</div>
-->  <?php
       
$master="ProyectoDER";
$canciones = simplexml_load_file("./XMLPage/xmlPaginaInicioParteBaja.xml");
echo'	<ul class="ulProyectoDER">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='".$master. "imagenoVideo'   src = './Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = './Img/".$cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
		$cod = $_GET['Accion'];
if($cancion->Codigo==$cod){
echo '<li>  <p class="tituloDer">'. $cancion->Titulo.'</p>';    
echo $HTMLfoto_OVideo.'<p class="Intro">'. $cancion->introduccionNoticia.'</p> ';
echo '<div class="Mensaje">'.$cancion->mensajeNoticia.'</div> ';
echo '</li>';
}}
echo'</ul>';	  

?>
       </div>
    </div>

  
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>