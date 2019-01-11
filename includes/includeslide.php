

<!--<script src="./Scripts/jquery.min.js"></script>
--><link rel="stylesheet" href="./Styles/bootstrapCSS/bootstrap.min.css">
<script src="./Scripts/bootstrapJS/bootstrap.min.js" ></script>
<link href="./Styles/CSSIncludeSlide.css" rel="stylesheet" type="text/css">
<!--El orden de los css y js afectan el funcionamiento del slide-->
  <script src="./Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
<!--  <link href="Styles/slideshow.css" rel="stylesheet" type="text/css" />-->
    <script src="./Scripts/slideshow.js" type="text/javascript"></script>
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
-->


     <script type="text/javascript" >
        $(document).ready(function () {

            // Create slideshow instances
            var $s = $('.slideshow').slides();
			
			
		$(document).on("click", "#btnAgregarModulo", function () {
var myBookId = $(this).data('tit');   	$(".modal-body #nombreprograma").val( myBookId );
var myBookId2 = $(this).data('foto');		$(".modal-body #horasPrograma").val( myBookId2 );

var myBookId3 = $(this).data('intro');		$(".modal-body #ObjetivoGeneralPrograma").val(myBookId3);

var myBookId4 = $(this).data('men'); 		$(".modal-body #ObjetivosEspecificosPrograma").val(myBookId4 );
HTMLfoto_OVideo = "<embed id='crs_imgPrevia' src='./ImgSistema/noHaSeleccionadoImagen.jpg' />";	
	document.getElementById("demo").innerHTML = HTMLfoto_OVideo;	
		
	/* $("#exampleModal").modal();
   
    });*/
  
 // enviarDato(myBookId);
 
   
});	
	
	
			
        });


function enviarDato(id){
//alert (id);

	 var dato = id;
    $.ajax({
      data: {"dato" : dato},
      url: "./includes/modal.php",
      type: "post",
      success:  function (response) {
       //alert(response);
      }
    });
 
	
	}








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
$canciones = simplexml_load_file("./XMLPage/xmlPaginaInicioParteSuperior.xml");
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen
$HTMLfoto_OVideo= "<img class='" .$master. "imagenoVideo '   src = './Img/".$cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = './Img/".$cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";
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

<!--INICIO MODULO PROGRAMAS-->
    <div class="divSeccionBajaSlide">


<p class="slide_proyectos">Portafolio de Servicios</p>
	
    <?php
       
$master="catalogoslide";


/*$canciones = simplexml_load_file("./XMLPage/xmlPaginaInicioParteBaja.xml");*/
$canciones = simplexml_load_file("./XMLPage/xmlMenuCatalogo.xml");
echo'	<ul class="galeria">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = './Img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/" . $cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = './Img/".$cancion->foto. "' />";
}

echo'		<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'"target="_blank">'.$HTMLfoto_OVideo.' </br><p>'. $cancion->Titulo.'</p></a></li>';


}
   echo'	</ul>';	  

?>
            
 

    </div>  
<!--FIN MODULO PROGRAMAS-->
    
    <!--MODULO CONVENIOS-->
        <div class="divSeccionConvenios">


<p class="Titulo_Convenios">CONVENIOS</p>
La CORPORACIÓN EDUCATIVA CEFICC tiene convenio con las siguientes entidades a nivel regional y nacional.
	
    <?php
       
$master="catalogoslide";
$canciones = simplexml_load_file("./XMLPage/xmlPaginaInicioConvenios.xml");
echo'	<ul class="ulConvenios">';
foreach($canciones as $cancion)
{
	$info = new SplFileInfo($cancion->foto);//obtenemos la extension del archivo
	$ext= $info->getExtension();
$estado=ValidaExtension($ext);//con la extension evaluamos si es tipo imagen o video
if($estado==1){
	//si es imagen se embebe en el control html imagen

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = './Img/" . $cancion->foto. "' />";
}else{
	//si es video se embebe en el control html video
$HTMLfoto_OVideo= "<video controls  class='" .$master. "imagenoVideo'> <source src = '../Img/" . $cancion->foto. "' type = 'video/mp4' > <source src = './img/" . $cancion->foto. "' type = 'video/ogg' ></ video >";

$HTMLfoto_OVideo= "<embed class='" .$master. "imagenoVideo'   src = './Img/".$cancion->foto. "' />";
}




echo'<li>';
echo '<a  id="btnAgregarModulo" href="#"  data-toggle="modal" data-target="#exampleModal" data-tit='. $cancion->Titulo.' data-foto='. $cancion->foto.' data-intro='.$cancion->introduccionNoticia.' data-men='.$cancion->mensajeNoticia.'>';
echo $HTMLfoto_OVideo.' <p>'. $cancion->Titulo.'</p> ';
echo '</a></li>';


}
   echo'	</ul>';	  

?>
       
 

    </div>    
<!--FIN MODULO CONVENIOS-->  

<!--INICIO POPU-->  
<?php
include_once('./includes/modal.php');
?>
<!--FIN POPU-->  
