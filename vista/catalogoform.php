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

  <article id="contentCentro">
 <link rel="stylesheet" type="text/css" href="../Styles/css_Catalogo_Form.css">  
<!--<link href="../Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
-->  
    <div class="contenedorCatalogo">
    
    <div class="div_ulOpcion_Menu_en_catalogo">
  <div class="divTitulo_ulOpcion_Menu_en_catalogo">
<p>OFERTA ACADEMICA</p> 
 </div>
         <?php
       
$master="MenuIzquierdo";
$canciones = simplexml_load_file("../XMLPage/xmlMenuCatalogo.xml");
echo'	<ul class="ulOpcion_Menu_en_catalogo">';
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
	$c2 = $_GET['Accion'];
if($cancion->Codigo==$c2){
echo '<li><span class="titulo">'. $cancion->Titulo.'</span>';
echo'<div class="ulOpcion_MenuImagen">'.$HTMLfoto_OVideo.'</div> <div class="Intro" ><p>'. $cancion->introduccionNoticia.'</p></div>';
echo '</li>';
}

}
echo'</ul>';	
  
  /*function ValidaExtension($sExtension) {

            $resul;
            switch ($sExtension)
            {
                case "jpg":
                case "jpeg":
                case "png":
                case "gif":
                case "bmp":
                case "JPG":
                case "JPEG":
                case "PNG":
                case "GIF":
                case "BMP":
               $resul=TRUE;
				
                break;

                default:
                case "mp4":
                case "avi":
                case "wmv":
				$resul=FALSE;
                    break;
            }
return $resul;
          
			
          			
        }*/
?>
	
    </div>

    
    
    
    
    
    
    <?php
       
$master="ulcatalogo";
$canciones = simplexml_load_file("../XMLPage/xmlCatalogo.xml");
echo'	<ul class="ulCatalogo">';
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
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/".$cancion->foto. "' type = 'video/mp4' > <source src = '../Img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	$v2 = $_GET['Accion'];
if($cancion->DetalleCodigo==$v2){

echo'<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'&dcod='.$cancion->DetalleCodigo.'"> <p class="titulo">'. $cancion->Titulo.'</p>'.$HTMLfoto_OVideo.'<p class="Intro">'. $cancion->introduccionNoticia.'</p></a>';
echo '</li>';
}}
echo'</ul>';	  

?>
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
