<!----><link rel="stylesheet" type="text/css" href="./Styles/cssIncludeColIzquierda.css">
<script>
 $('.ulMenuIzquierdo').click(function(){

			$('.ulMenuIzquierdo li').css({'background-color': 'red'});

		
	});
</script>
<div class="divMenuIzquierdo">
  <div class="divTituloMenuIzquierdo">
<p>PROGRAMAS</p> 
 </div>
         <?php
       
$master="MenuIzquierdo";
$canciones = simplexml_load_file("./XMLPage/xmlMenuCatalogo.xml");
echo'	<ul class="ulMenuIzquierdo">';
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
echo '<li><a href="'.$cancion->urlFile.'?Accion='.$cancion->Codigo.'"><span class="titulo">'. $cancion->Titulo.'</span>';
echo'<div class="contenedorImagen">'.$HTMLfoto_OVideo.'</div> <div class="MenuIzquierdo_Intro" ><p>'. $cancion->introduccionNoticia.'</p></div></a>';
echo '</li>';


}
echo'</ul>';	
  
?>
	
    </div>

