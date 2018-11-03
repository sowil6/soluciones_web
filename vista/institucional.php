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
      <link href="../Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
        <div class="contenedorInstitucional">
           <?php
       	$urlpagina = $_GET['refpage'];

		if($urlpagina=="vision"){
			$canciones = simplexml_load_file("../XMLPage/xmlPaginaInstitucionalVision.xml");
				}
						if($urlpagina=="mision"){
			$canciones = simplexml_load_file("../XMLPage/xmlPaginaInstitucionalMision.xml");
				}
						if($urlpagina=="principios"){
			$canciones = simplexml_load_file("../XMLPage/xmlPaginaInstitucionalPrincipios.xml");
				}
						if($urlpagina=="valores"){
			$canciones = simplexml_load_file("../XMLPage/xmlPaginaInstitucionalValores.xml");
				}
					if($urlpagina=="calidad"){
			$canciones = simplexml_load_file("../XMLPage/xmlPaginaInstitucionalCalidad.xml");
				}
$master="Institucional";

echo'	<ul class="ulInstitucional">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<img class='" .$master. "imagenoVideo '   src = '../img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../img/" . $cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
		}
	
echo'<li><p class="frase_titulo">'.$cancion->Titulo. '</p> '.$HTMLfoto_OVideo.'</br><p> '. $cancion->introduccionNoticia.'</br>  '. $cancion->mensajeNoticia.'</p>';
echo '</li>';
}
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
     <?php include("../includes/footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>