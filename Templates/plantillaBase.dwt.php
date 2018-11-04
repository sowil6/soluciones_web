<!doctype html>
<html><head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Corporación Educativa de Formación Integral del Caribe - CEFIC </title>
<!-- TemplateEndEditable -->

<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link  href="../Styles/bootstrapCSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div class="containerCeficc">
  <header>
  
  <?php include("../includes/cabecera.php")?>
    
    
  </header>
 
  <div class="MasterColumIzq">
 <?php include("../includes/includecolizquierda.php")?>
  </div>
 <!-- TemplateBeginEditable name="EditRegionCentro" -->
  <article class="contentCentro">
    <div class="Mastercentro">
aqui el contenido    
    </div>
  </article>
  <!-- TemplateEndEditable --><!-- end .content -->
  <div class="sideColDer">
    <aside>
     <div class="TituloColumnas">
     
     <p>
    NUESTRAS CERTIFICACIONES</p>
     </div>
    <div class="divCertificaciones">
    <?php
       
$master="master";
$canciones = simplexml_load_file("../XMLPage/xmlCargaCertificaciones.xml");
foreach($canciones as $cancion)
{
	
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();

$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<img  class='" .$master. "imagenoVideo' src = '../Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}

    if($cancion->Codigo=="2049"){}

 echo '<table id="tablaRepeaterDerecha">' ;
 echo '<tr>' ;
 echo '<td>';
/* echo '<a href="<'.$cancion->url.'?Accion='. $cancion->Codigo.'&x01='.$cancion->xml.'>"' ;
*/ echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'">'.$HTMLfoto_OVideo. $cancion->Titulo.'</br> '. $cancion->introduccionNoticia.'</a>';

/* echo '<h3>'. $HTMLfoto_OVideo.' </h3>';*/
 echo  $cancion->Codigo; 
echo  '</a>';
echo  '</td>';
echo  '</tr>';
echo   '</table>';
}
      

?>
     </div>
   </aside>
  </div><!-- end .sidebar1 -->
  <footer>
     <?php include("../includes/footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
</html>
