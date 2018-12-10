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
<body expr:class=';"loading" + data:blog.mobileClass';>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
  <article class="contentUnaColumna">
      <link rel="stylesheet" type="text/css" href="./Styles/css_Institucional.css">
        <div class="contenedorInstitucional">
           <?php
       	$urlpagina = isset($_GET['refpage']);
	if($urlpagina!=null){//if $urlpagina
			if($urlpagina=="vision"){
			$canciones = simplexml_load_file("./XMLPage/xmlPaginaInstitucionalVision.xml");
				}
			if($urlpagina=="mision"){
			$canciones = simplexml_load_file("./XMLPage/xmlPaginaInstitucionalMision.xml");
				}
			if($urlpagina=="principios"){
			$canciones = simplexml_load_file("./XMLPage/xmlPaginaInstitucionalPrincipios.xml");
				}
			if($urlpagina=="valores"){
			$canciones = simplexml_load_file("./XMLPage/xmlPaginaInstitucionalValores.xml");
				}
			if($urlpagina=="calidad"){
			$canciones = simplexml_load_file("./XMLPage/xmlPaginaInstitucionalCalidad.xml");
				}
$master="Institucional";

echo'	<ul class="ulInstitucional">';
foreach($canciones as $cancion)
{// foreach
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video

if($estado==1){//if estado=1
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<img class='" .$master. "imagenoVideo '   src = './Img/".$cancion->foto. "' />";
}
else{//else estado=1
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = './Img/".$cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}//end estado=1

echo'<li><div class="divfrase_titulo"><p> '.$cancion->Titulo. '</p></div>';
echo'<li><div class="cuerpoInstitucional">'.$HTMLfoto_OVideo.'<p class="institucional_Intro"> '. $cancion->introduccionNoticia.'</p></br> <p class="institucional_Mensaje"> '. $cancion->mensajeNoticia.'</p></div>';
echo '</li>';
}//end foreach

}//else if $urlpagina
else{
echo '<h1> Procedimiento anormal, por favor proceda adecuadamente </h1>';	
	}//end $urlpagina 
echo'</ul>';	  
/* function ValidaExtension($sExtension) {

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
          
			
          			
        }
	*/	
?>
       </div> 

  
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>