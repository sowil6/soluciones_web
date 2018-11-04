<!doctype html>
<html><!-- InstanceBegin template="/Templates/PlantillaUnaColumna.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
<!-- InstanceEndEditable -->
<!--<link href="../Styles/bootstrapCSS/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../Scripts/jquery-css-transform.js" type="text/javascript"></script>-->
 


<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>

<div class="containerCeficc">
  <header>
  
  <?php include("../includes/cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
  <article class="contentUnaColumna">
  
    <div class="contenedorProyecto"> 
  <div class="slide_proyectos">Portafolio de Servicios y Emprendimiento</div>

    <div class="contenedorProyectoIZQ">
    <?php
       
$master="ProyectoIZQ";
$canciones = simplexml_load_file("../XMLPage/xmlPaginaInicioParteBaja.xml");
echo'	<ul class="ulProyectoIZQ">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = '../img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../img/" . $cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}

echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'">'.$HTMLfoto_OVideo. $cancion->Titulo.'</a>';
echo '</li>';
}
echo'</ul>';	  

?>
    </div>
       <div class="contenedorProyectoDER">
           <?php
       
$master="ProyectoDER";
$canciones = simplexml_load_file("../XMLPage/xmlPaginaInicioParteBaja.xml");
echo'	<ul class="ulProyectoDER">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<embed class='".$master. "imagenoVideo'   src = '../img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../img/" . $cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
		$cod = $_GET['Accion'];
if($cancion->Codigo==$cod){
echo'<li><p class="titulo_proyecto">'.$cancion->Titulo. '</p>' .$HTMLfoto_OVideo. '</br> '. $cancion->introduccionNoticia.'</br> '. $cancion->mensajeNoticia;

echo '</li>';
}}
echo'</ul>';	  

?>
       </div>
    </div>

  
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include("../includes/footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>