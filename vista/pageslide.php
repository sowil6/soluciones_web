<!doctype html>
<html><!-- InstanceBegin template="/Templates/plantillaBase.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
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
 <!-- InstanceBeginEditable name="EditRegionCentro" -->
  <article class="contentCentro">
    <div class="Mastercentro">
    aqui el contenido
    </div>
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->
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
echo' <ul class="ulCertificaciones">';
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
echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'&dcod='.$cancion->DetalleCodigo.'">'.$HTMLfoto_OVideo. $cancion->Titulo.'</br> '. $cancion->introduccionNoticia.'</a>';
echo '</li>';
}
echo'</ul>';    

?>
    </div>
  
     </div>
   </aside>
  </div><!-- end .sidebar1 -->
  <footer>
     <?php include("../includes/footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>
