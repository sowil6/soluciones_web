    
  <link rel="stylesheet" type="text/css" href="../Styles/cssIncludeColumnaDerecha.css">
  <div class="divContentCertificaciones">
      <div class="divTituloCertificaciones">
          <p>
    NUESTRAS CERTIFICACIONES</p>
     </div>
    <div class="divCertificaciones">
   
    <?php
       
$master="derecha";
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

