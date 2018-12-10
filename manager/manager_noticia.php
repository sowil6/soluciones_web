<?php
;
   global $subtema;
   	if(isset($_POST["subtema"])=="si"){ $subtema="si";}else{ $subtema="no";}
class manager_noticia{

	public function __construct() {
	global $subtema;
	if(isset($_POST["subtema"])=="si"){ $subtema="si";}else{ $subtema="no";}

    }
	
	public function manager_noticia(){ //Constructor.
   global $subtema;

	 
      }

	}

ob_start();
include_once('../modelo/noticia_modelo.php');
include_once('../Beans/Class_BeansNoticia.php');
//$valor = $_POST['ejecutar'];


//ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode

if(isset($_POST['ejecutar'])){
$op=$_POST['ejecutar'];
	
switch ($op) {
      case "grabar":
/*echo '<script language="javascript">alert("Hola en manager GRABAR ");</script>';*/
grabar();
	     break;
    case "actualizar":
/*echo '<script language="javascript">alert("Hola en manager ACTUALIZAR '.$_POST['cod'] .')";</script>';*/

  actualizar();
	    break;
		
case "selectoption":
	//opcion seleccionada	
	if(isset($_POST['option'])){	
	/*echo '<script language="javascript">alert("Hola en manager OPCION SELECCIONADA ");</script>';*/
	
	opcionSelect();
	
	}	break;
	
case "editar":
	editar();
// consultar por el codigo	se modifico la linea del boton edit con esto para que no refrescara la pagina (;return false);
break;
	
	case "publicar":
/*	echo '<script language="javascript">alert("Hola en manager PUBLICAR ");</script>';*/
	publicar();
// PUBLICAR grabar el contenido en un archivo xml			
break;

	case "verGridSubtemas":
	/*echo '<script language="javascript">alert("Hola en manager verGridSubtemas ");</script>';*/
	edit_Subtemas();
// PUBLICAR grabar el contenido en un archivo xml			
break;

case "eliminar":
	/*echo '<script language="javascript">alert("Hola en manager verGridSubtemas ");</script>';*/
	eliminar();
// PUBLICAR grabar el contenido en un archivo xml			
break;
	}

}

function editar(){
/*echo '<script language="javascript">alert("en manager Consultar por Codigo");</script>';*/

if(isset($_POST['cod'])){
	$cod=$_POST['cod'];
$Noticias= noticia_modelo::get_Por_CodNoticia($cod);//se almacenan los datos de la consulta en la variable Noticia
	/*
	foreach  ($Noticias as $fila){
echo $fila['codigoNoticia']."  - ".$fila['codigoDetalleNoticia']." --  ".$fila['tituloNoticia']." -  ". $fila['introduccion_Noticia'];
		}*/
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
//echo 	'callbackEjercicio( ' . json_encode($Noticias) . ' )';
echo json_encode($Noticias);
 
return $Noticias;//si no retorna, se envia los datos mas el html de la pagina

}

}

function grabar(){
try{
$noti=function_BeansNoticia();
$nmodelo= new noticia_modelo();
/*echo '<script language="javascript">alert("Hola en manager Grabar'.$noti.getTituloNoticia() .')";</script>';*/
mover_Imagen($noti);
noticia_modelo::grabar($noti);
return "Termino de grabar";
return $nmodelo;
}catch(Exception $ex){
	}
}

function actualizar(){
$noti=function_BeansNoticia();
$nmodelo= new noticia_modelo();
$nmodelo::Actualizar($noti);
mover_Imagen($noti);
	}
	$Noticias= array();
	
function mover_Imagen($noti){
	$filDirTemp="./temp/".$noti->getFotoNoticia();
	$fildirNew="./img/".$noti->getFotoNoticia();
	if(file_exists($filDirTemp)){
		rename($filDirTemp, $fildirNew);
		}
	}
	
function eliminar(){
$result;
	$nmodelo= new noticia_modelo();
	if(isset($_POST["cod"])){$cod= $_POST["cod"];	}
$bool_CodSetalle= $nmodelo->bool_existe_item_Noticia($cod);

if(!$bool_CodSetalle){
try{

$boolCod = $nmodelo->bool_y_EliminaCod($cod);//consulta el codigo, si existe elimina el registro
if($boolCod ){$result= $boolCod." * Se elimono el Registro "; }else{$result= $boolCod ." *No se pudo eliminar el registro*";}
echo $result ;

}catch(Exception $ex){
	}//if $bool_CodSetalle
}
else
{//else $bool_CodSetalle
echo $result= "Debe eliminar los registro item de noticias contenidos en la Noticia principal";
	return $result;
}// fin if $bool_CodSetalle
}

function publicar(){

//crear una consulta para traer los datos de la noticia desde la base de datos
$Noticias= array();
$noticia= function_BeansNoticia();
$opt=$_POST['option'];
//opcion($opt, $noticia);//obtenemos la ubicacion de la noticia
if(isset($_POST["detCod"])){$noticia->setCodigoDetalleNoticia($_POST["detCod"]);}


$codigoDetalle=$noticia->getCodigoDetalleNoticia();
$ubic=$noticia->getUbicacionNoticia();
$paginaxml=$noticia->getUrlHojaXML();

//se hace una consulta a la base de datos y se traen los valores, segun la ubicacion

if($ubic=="si"){

$ubicacion="SELECT * FROM table_noticia where codigoDetalleNoticia='".$codigoDetalle."'";
}else{
$ubicacion=	"SELECT * FROM table_noticia where ubicacionNoticia='".$ubic."'";
	}

$Noticias= noticia_modelo::get_Noticias($ubicacion);//se almacenan los datos de la consulta en la variable Noticia
 $xml = new DomDocument('1.0', 'UTF-8');

$contenido = $xml->createElement('Noticias');
    $tema = $xml->appendChild($contenido);
	
	foreach  ($Noticias as $fila){
//		echo "</br>"."en get noticia";
//se cargan los set del beans notica con los valores de la consulta
	$noticia= setNoticia($fila);
	
	
 
    $tema = $xml->createElement('Noticia');
    $tema = $contenido->appendChild($tema);
     
  	$Codigo = $xml->createElement('Codigo',$noticia->getCodigoNoticia());
    $Codigo = $tema->appendChild($Codigo);
 
    $DetalleCodigo = $xml->createElement('DetalleCodigo',$noticia->getcodigoDetalleNoticia());
    $DetalleCodigo = $tema->appendChild($DetalleCodigo);
 
    $Titulo = $xml->createElement('Titulo',$noticia->getTituloNoticia());
    $Titulo = $tema->appendChild($Titulo);
 
    $introduccionNoticia = $xml->createElement('introduccionNoticia',$noticia->getIntroduccionNoticia());
    $introduccionNoticia = $tema->appendChild($introduccionNoticia);
 
    $mensajeNoticia = $xml->createElement('mensajeNoticia','<p>'.$noticia->getMensajeNoticia().'</p>');
    $mensajeNoticia = $tema->appendChild($mensajeNoticia);
 
 	$urlFile = $xml->createElement('urlFile',$noticia->getUrlPaginaNoticia());
    $urlFile = $tema->appendChild($urlFile);
	/*
	$xmlFile = $xml->createElement('xmlFile',$noti->getUrlHojaXML());
    $xmlFile = $tema->appendChild($xmlFile);*/
	
	$foto = $xml->createElement('foto',$noticia->getFotoNoticia());
    $foto = $tema->appendChild($foto);
	
	$fecha = $xml->createElement('fecha','Maxico D.F. - Editorial Grijalbo');
    $fecha = $tema->appendChild($fecha);
	
	$autor = $xml->createElement('autor',$noticia->getAutornoticia());
    $autor = $tema->appendChild($autor);
	
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
/*	$filDirTemp="../temp/".$noticia->getFotoNoticia();
	$fildirNew="../img/".$noticia->getFotoNoticia();
	if(file_exists($filDirTemp)){
		rename($filDirTemp, $fildirNew);
		}*/
	
		}
//		con los datos obtenidos se crea o reeecribe el xml
//echo "la pagina xml que se crea es= ".$paginaxml."esta";
 $xml->save("../XMLPage/".$paginaxml);
 
//Mostramos el XML puro
 $resultado= "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".htmlentities($el_xml)."<br/><hr>";
		// verGets($noticia);
		
		// echo $resultado;
		}
		
function opcionSelect(){
require_once '../controls/DataGrid.php';

	//si se ejecuta el select, hace una consulta y llena la columna derecha
/*echo '<script language="javascript">alert("Hola en manager option ");</script>';*/
$Grid = new DataGrid("gridT");//se inicializa el grid para crearlo
//opciones para el paginado del grid
$cod = isset($_REQUEST['cod'])?$_REQUEST['cod']:'';
$subtema = isset($_REQUEST['subtema'])?$_REQUEST['subtema']:'';
$page     = isset($_REQUEST['_page'])?$_REQUEST['_page']:1;
$regxpag  = isset($_REQUEST['_regxpag'])?$_REQUEST['_regxpag']:10;

$noti=function_BeansNoticia();//obtenemos la ubicacion de la noticia


if($subtema!="Subtemas"){
$criterio=  ' WHERE codigoNoticia="'.$cod.'"';//se optiene la ubicacion de la pagina
}else{
	$ubicacion =$noti->getUbicacionNoticia();//se optiene la ubicacion de la pagina
	$criterio=  ' WHERE ubicacionNoticia = "'.$ubicacion.'"';//consulta segun el codigo es enviado o no	
	}
	

//$conctainer_datagrid= $_POST["opti"]."</br>".$criterio."</br>".$page."</br>".$regxpag;
//echo $conctainer_datagrid;
$Grid->addCheckBox(array(

    "values"=>array("fotoNoticia"),
    "ajax"=>array(
        "funcion"=>"index.check",
        "params"=>array("fotoNoticia")//'<img id="img3" src="../Img/'.$valores.'"/>';
    ),
  ));

$Grid->addColumn(array(
    "title"=>"Cod",
    "campo"=>"codigoNoticia"
));
$Grid->addColumn(array(
    "title"=>"Titulo",
    "campo"=>"tituloNoticia"

));
$Grid->addColumn(array(
    "title"=>"Introduccion",
    "campo"=>"introduccion_Noticia"
));
/*$Grid->addColumn(array(
    "title"=>"Contenido",    
	"campo"=>"mensajeNoticia"

));
*/

$Grid->addAccion(array(
    "titulo"=>"Editar",
    "icono"=>"glyphicon glyphicon-pencil",
    "ajax"=>array(
	"funcion"=>"edit",
	 "params"=>array(
	 "codigoNoticia"
	 ) ),
	)
);

$Grid->selectData(array(
    "info"=>false,
    "criterio"=>$criterio,
    "class"=>"noticia_modelo",
    "method"=>"getDataSP",
    "paginate"=>array(
       //"ajax"=>"index.getDatagrid",
        "page"=>$page,
        "reg_x_pag"=>$regxpag,
        "itemPaginas"=>10
    )
));

echo $Grid->render();


	}

function edit_Subtemas(){
require_once '../controls/DataGrid.php';

	//si se ejecuta el select, hace una consulta y llena la columna derecha
/*echo '<script language="javascript">alert("Hola en manager option ");</script>';*/
$Grid = new DataGrid("gridT");//se inicializa el grid para crearlo
//opciones para el paginado del grid
$detCod = isset($_REQUEST['detCod'])?$_REQUEST['detCod']:'';
$page     = isset($_REQUEST['_page'])?$_REQUEST['_page']:1;
$regxpag  = isset($_REQUEST['_regxpag'])?$_REQUEST['_regxpag']:10;

//$noti=function_BeansNoticia();//obtenemos la ubicacion de la noticia

$criterio=  ' WHERE codigoDetalleNoticia = "'.$detCod.'"';

$Grid->addCheckBox(array(
    "values"=>array("fotoNoticia"),
    "ajax"=>array(
        "funcion"=>"index.check",
        "params"=>array("fotoNoticia")//'<img id="img3" src="../Img/'.$valores.'"/>';
    ),
  ));

$Grid->addColumn(array(
    "title"=>"Cod",
    "campo"=>"codigoNoticia"
));
$Grid->addColumn(array(
    "title"=>"Titulo",
    "campo"=>"tituloNoticia"

));
$Grid->addColumn(array(
    "title"=>"Introduccion",
    "campo"=>"introduccion_Noticia"
));
/*$Grid->addColumn(array(
    "title"=>"Contenido",    
	"campo"=>"mensajeNoticia"

));
*/

$Grid->addAccion(array(
    "titulo"=>"Editar",
    "icono"=>"glyphicon glyphicon-pencil",
    "ajax"=>array(
	"funcion"=>"edit",
	 "params"=>array(
	 "codigoNoticia"
	 ) ),
	)
);

$Grid->selectData(array(
    "info"=>false,
    "criterio"=>$criterio,
    "class"=>"noticia_modelo",
    "method"=>"getDatoSubtema",
    "paginate"=>array(
       //"ajax"=>"index.getDatagrid",
        "page"=>$page,
        "reg_x_pag"=>$regxpag,
        "itemPaginas"=>10
    )
));

echo $Grid->render();


	}

function function_BeansNoticia(){
	
$noticia=new Class_BeansNoticia();

//evaluamos si es un tema o subtema
/*if(isset($_POST["subtema"])=="si"){

	if(isset($_POST["cod"])){$noticia->setCodigoDetalleNoticia($_POST["cod"]);	}

}else{
	if(isset($_POST["detCod"])){$noticia->setCodigoDetalleNoticia($_POST["detCod"]);	}
	}
	*/
	$opt= $_POST["option"];//optenemos el valor de la opcion seleccionada

opcion($opt, $noticia);//ejecutamos la function option, para asignar los valores a url, xml y la ubicacion donde se graba el registro

if(isset($_POST["detCod"])){$noticia->setCodigoDetalleNoticia($_POST["detCod"]);	}
if(isset($_POST["cod"])){$noticia->setCodigoNoticia($_POST["cod"]);					}
if(isset($_POST["titulo"]))		{$titulo= 	str_replace ("nbsp", "#160", $_POST["titulo"]); 	$noticia->setTituloNoticia($titulo); 		}
if(isset($_POST["intro"]))		{$introd= 	str_replace ("nbsp", "#160", $_POST["intro"]); 		$noticia->setIntroduccionNoticia($introd);	}
if(isset($_POST["contenido"]))	{$mensaje= 	str_replace ("nbsp", "#160", $_POST["contenido"]);	$noticia->setMensajeNoticia($mensaje);		}
if(isset($_POST["imagen"])){$noticia->setFotoNoticia($_POST["imagen"]);}
if(isset($_POST["option"])){$noticia->setAutornoticia($_POST["option"]);}
/*if(isset($_POST["xml"])){$noticia->setUrlHojaXML($_POST["xml"]);}
if(isset($_POST["url"])){$noticia->setUrlPaginaNoticia($_POST["url"]);}*/

	//verGets($noticia);
//echo  'titulo='.$noticia->getTituloNoticia().'</br> intro='.$noticia->getIntroduccionNoticia();
return $noticia;

	 }

function opcion($opt, $noticia){
	$subtema="";
		if(isset($_POST["subtema"])){ $subtema=$_POST["subtema"];}
//echo "***".$subtema." 9999 ".$_POST["subtema"]."***";

	switch ($opt) {
      case 1:
		$noticia->setUbicacionNoticia("certificaciones");
		$noticia->setUrlPaginaNoticia("certificaciones");
		$noticia->setUrlHojaXML("xmlCargaCertificaciones.xml");//xml que se debe crear
	     break;
    case 2:
	
		if($subtema!="Subtemas"){		//si es un subtema, dejamos sin ubicacion la noticia
    	$noticia->setUbicacionNoticia("Subtemas_Menu");
		$noticia->setUrlPaginaNoticia("detallecatalogo");
		$noticia->setUrlHojaXML("xmlCatalogo.xml");
		}
		else
		
		{
		$noticia->setUbicacionNoticia("menuOfertaIZQ");	
		$noticia->setUrlPaginaNoticia("catalogoform");
		$noticia->setUrlHojaXML("xmlMenuCatalogo.xml");//xml que se debe crear
		}
	
	   
        break;
	case 3:
      $noticia->setUbicacionNoticia("subMenuOferta");
		$noticia->setUrlPaginaNoticia("detallecatalogo");
		$noticia->setUrlHojaXML("xmlCatalogo.xml");//xml que se debe crear
        break;
	case 4:
        $noticia->setUbicacionNoticia("inicioSlide");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInicioParteSuperior.xml");//xml que se debe crear
        break;
	case 5:
        $noticia->setUbicacionNoticia("inicioContenidoBajo");
		$noticia->setUrlPaginaNoticia("proyectos_vista");
		$noticia->setUrlHojaXML("xmlPaginaInicioParteBaja.xml");//xml que se debe crear
        break;
	case 6:
        $noticia->setUbicacionNoticia("mision");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInstitucionalMision.xml");//xml que se debe crear
        break;
	case 7:
        $noticia->setUbicacionNoticia("vision");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInstitucionalVision.xml");//xml que se debe crear
        break;
	case 8:
        $noticia->setUbicacionNoticia("valores");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInstitucionalValores.xml");//xml que se debe crear
        break;
	case 9:
        $noticia->setUbicacionNoticia("principios");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInstitucionalPrincipios.xml");//xml que se debe crear
        break;
		case 10:
        $noticia->setUbicacionNoticia("calidad");
		$noticia->setUrlPaginaNoticia("");
		$noticia->setUrlHojaXML("xmlPaginaInstitucionalCalidad.xml");//xml que se debe crear
        break;
		
}
	}

function setNoticia($fila){
	$noticia=new Class_BeansNoticia();
	//se cargan los set del beans notica con los valores de la consulta
	$noticia->setCodigoNoticia($fila['codigoNoticia']);
   	$noticia->setcodigoDetalleNoticia($fila['codigoDetalleNoticia']);
   	$noticia->setTituloNoticia($fila['tituloNoticia']);
	$noticia->setIntroduccionNoticia($fila['introduccion_Noticia']);
	$noticia->setMensajeNoticia($fila['mensajeNoticia']);
	$noticia->setUbicacionNoticia($fila['ubicacionNoticia']);
	$noticia->setFotoNoticia($fila['fotoNoticia']);
	$noticia->setUrlPaginaNoticia($fila['urlPaginaNoticia']);
	$noticia->setUrlHojaXML($fila['xmlHojaNoticia']);
	$noticia->setFechanoticia($fila['fotoNoticia']);
	$noticia->setAutornoticia($fila['autorNoticia']);
	return $noticia;
	}
function verGets($noticia){
echo '</br> cod='.$noticia->getCodigoNoticia().
'</br> detCod='.$noticia->getCodigoDetalleNoticia(),
'</br> titulo='.$noticia->getTituloNoticia(),
'</br> intro='.$noticia->getIntroduccionNoticia(),
'</br> mensaje='.$noticia->getMensajeNoticia(),
'</br> foto='.$noticia->getFotoNoticia(),
'</br> autor='.$noticia->getAutornoticia(),
'</br> xml='.$noticia->getUrlHojaXML(),
'</br> url='.$noticia->getUrlPaginaNoticia()."fin gets";

	
	}

if (isset($_FILES["foto"]))
{
//	$nom=$_POST['txtnombre'];
    $file = $_FILES["foto"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../temp/";

    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'&& $tipo != 'application/pdf')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 2048*2048)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 2600 || $height > 2600)
    {
        echo "Error la anchura y la altura maxima permitida es 1500px";
    }
    else if($width < 0 || $height < 0)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
		
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo $nombre;
    }
	return $nombre;
}

function eliminarFiles(){
	echo "eliminando filas";
	$files = glob('./temp/*'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
	
    unlink($file); //elimino el fichero
	
	
}
	}/**/

function publicarRespaldo(){
			
echo '<script language="javascript">alert("En Publicar");</script>';
//crear una consulta para traer los datos de la noticia desde la base de datos
$Noticias= array();
$noticia=new BeansNoticia();
$opt=$_POST['option'];
opcion($opt, $noticia);//obtenemos la ubicacion de la noticia
$ubicacion=$noticia->getUbicacionNoticia();
echo '<script language="javascript">alert("En Publicar en ubicacion"'.$ubicacion.');</script>';
//se hace una consulta a la base de datos y se traen los valores, segun la ubicacion
$Noticias= noticia_modelo::get_Noticias($ubicacion);//se almacenan los datos de la consulta en la variable Noticia
foreach  ($Noticias as $fila){echo "</br>"."en get noticia";
//se cargan los set del beans notica con los valores de la consulta
	$noticia->setCodigoNoticia($fila['codigoNoticia']);
   	$noticia->setcodigoDetalleNoticia($fila['codigoDetalleNoticia']);
   	$noticia->setTituloNoticia($fila['tituloNoticia']);
	$noticia->setIntroduccionNoticia($fila['introduccion_Noticia']);
	$noticia->setMensajeNoticia($fila['mensajeNoticia']);
	$noticia->setUbicacionNoticia($fila['ubicacionNoticia']);
	$noticia->setFotoNoticia($fila['fotoNoticia']);
	$noticia->setUrlPaginaNoticia($fila['urlPaginaNoticia']);
	$noticia->setUrlHojaXML($fila['xmlHojaNoticia']);
	$noticia->setFechanoticia($fila['fotoNoticia']);
	$noticia->setAutornoticia($fila['autorNoticia']);

$resultado=
"Codigo=".$noticia->getCodigoNoticia()
."</br> Detalle codigo	=". $noticia->getcodigoDetalleNoticia()
."</br> titulo			=". $noticia->getTituloNoticia()
."</br> Introduccion	=".	$noticia->getIntroduccionNoticia()
."</br>	mensaje			=".	$noticia->getMensajeNoticia()
."</br> Foto			=".	$noticia->getFotoNoticia()
."</br>	Ubicacion		=".	$noticia->getUbicacionNoticia()
."</br>	Url	pagina		=".	$noticia->getUrlPaginaNoticia()
."</br>	xml pagina		=".	$noticia->getUrlHojaXML()
."</br>	autor			=".	$noticia->getAutornoticia();
echo $resultado;
		}
//		con los datos obtenidos se crea o reeecribe el xml
crearXML($noticia);
		}

function es_numero($numero) {
    if(is_numeric($numero)) {
        echo "'{$numero}' es numérico", PHP_EOL;
    } else {
        echo "'{$numero}' NO es numérico", PHP_EOL;
    }
}


?>