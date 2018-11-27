
<link href="../Styles/CSSIncludeSlide.css" rel="stylesheet" type="text/css">
<!--El orden de los css y js afectan el funcionamiento del slide-->
  <script src="../Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
<!--  <link href="Styles/slideshow.css" rel="stylesheet" type="text/css" />-->
    <script src="../Scripts/slideshow.js" type="text/javascript"></script>
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
     <script type="text/javascript" >
        $(document).ready(function () {

            // Create slideshow instances
            var $s = $('.slideshow').slides();
        });

    </script>
    <style>

    
    </style>
</head>

<body>
 <div class="divsliderSeccionSuperior">
<div class="containerslider">
 <div class="slideshow" data-transition="crossfade" data-loop="true" data-skip="false">
        <ul class="carousel">

  <?php
       
$master="slider";
$canciones = simplexml_load_file("../XMLPage/xmlPaginaInicioParteSuperior.xml");
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
echo' <li class="slide">';
echo'  <svg height="400" width="800">';
echo'   <polygon points="0,0 0,400 500,400 200,0"  />';
echo'   <p class="textoTituloSlide">'. $cancion->Titulo.' </p>' ;
echo'   <p class="TextoIntroSlide">'. $cancion->introduccionNoticia.'</p>' ;
echo'   <span class="TextoMensajeSlide">'. $cancion->mensajeNoticia.'</span>' ;
echo' </svg>';
echo	$HTMLfoto_OVideo;
echo'  </li>';

}
  /*    function ValidaExtension($sExtension) {

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
					//echo "nombre imagen----".$sExtension."..///// ".$resul." estado";
                break;

                default:
                case "mp4":
                case "avi":
                case "wmv":
				$resul=FALSE;
//									echo "nombre imagen----".$sExtension."..///// ".$resul." estado";

                    break;
            }
return $resul;
          
			
          			
        }
*/
?>
               
           </ul>
           
        
     </div>
  </div><!-- end .container -->
</div>
    <div class="divSeccionBajaSlide">


<p class="slide_proyectos">Portafolio de Servicios y Emprendimiento</p>
	
    <?php
       
$master="catalogoslide";
$canciones = simplexml_load_file("../XMLPage/xmlPaginaInicioParteBaja.xml");
echo'	<ul class="galeria">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = '../Img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/" . $cancion->foto. "' type = 'video/mp4' > <source src = '../img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = '../Img/".$cancion->foto. "' />";
}

echo'		<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'"target="_blank">'.$HTMLfoto_OVideo.' </br><p>'. $cancion->Titulo.'</p></a></li>';


}
   echo'	</ul>';	  

?>
            
 

    </div>    
