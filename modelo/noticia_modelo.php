<?php

class noticia_modelo{
private  $db;        //En esta variable almacenaremos la conexion.
private $noticias; //En esta variable almacenaremos el registro de la tabla.
	
private $_DB;
public function __construct() {
	
    }
	
public function noticia_modelo(){ //Constructor.
    
      }
	  
	  
public function getDataSP($flag,$criterio='',$page=1,$regxpag=10){
include_once("../modelo/Conectar.php");
		$db = Conectar::conexion();
        $sql = "CALL dataGrid('".$flag."','".$criterio."','".$page."','".$regxpag."'); ";
        $data = $db->query($sql);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }  
	
public function getDatoSubtema($flag,$criterio='',$page=1,$regxpag=10){
include_once("../modelo/Conectar.php");
		$db = Conectar::conexion();
        $sql = "CALL dataGrid_Sub('".$flag."','".$criterio."','".$page."','".$regxpag."'); ";
        $data = $db->query($sql);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }  
	  
public function get_Noticias($ubicacion){
	 require_once("../modelo/Conectar.php");
   $db = Conectar::conexion();
$noticias =  array();

   //Hacemos que la variable personas se un array.
    
//Creamos una consulta donde haremos una peticion de busqueda de toda la tabla datos_noticia segun su ubicacion.
$consulta= $db->query($ubicacion);
          while ($filas= $consulta->fetch(PDO::FETCH_ASSOC)){
//echo $filas['codigoNoticia'];
			$noticias[]=$filas;
        } 
			 return $noticias;
//             include_once "../modelo/close_conexion.php";
  

}

public function get_Por_CodNoticia($cod){
	/*echo '<script language="javascript">alert("Hola en modelo '.$cod.'");</script>';*/
include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   if(!empty($cod)){
	   $sql="SELECT * FROM table_noticia where codigoNoticia='".$cod."'";
          
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
	        }
			foreach  ($result as $fila){
echo $fila['codigoNoticia'];
echo $fila['codigoDetalleNoticia'];
echo $fila['tituloNoticia'];
echo $fila['introduccion_Noticia'];
		}
   $resultado=  $result;
        return $result;
	}

function grabar($objNoticia){
include_once "../modelo/Conectar.php";
try{
$con=Conectar::conexion();
$sql = "INSERT INTO table_noticia (codigoDetalleNoticia, tituloNoticia,introduccion_Noticia, mensajeNoticia, ubicacionNoticia, fotoNoticia, urlPaginaNoticia, xmlHojaNoticia, autorNoticia) VALUES (:detCod,:titulo,:intro,:mensaje,:ubicacion,:foto,:url,:xml,:autor)";
$Consulta = $con->prepare($sql);
$Consulta->execute(array(":detCod"=>$objNoticia->getCodigoDetalleNoticia(),":titulo"=>$objNoticia->getTituloNoticia(),":intro"=>$objNoticia->getIntroduccionNoticia(),":mensaje"=>$objNoticia->getMensajeNoticia(),":ubicacion"=>$objNoticia->getUbicacionNoticia(),":foto"=>$objNoticia->getFotoNoticia(),":url"=>$objNoticia->getUrlPaginaNoticia(),":xml"=>$objNoticia->getUrlHojaXML(),":autor"=>$objNoticia->getAutornoticia()));
echo "grabando";
//header("Location:../vista/noticia_vista.php");

}
	catch(Exception $e){
		die("Error2". $e->getMessage());
		echo "Linea del herror" .$e->getLine();
		}
}

function Actualizar($objNoticia){
	/*echo '<script language="javascript">alert("Hola en MODELO ACTUALIZAR");</script>';*/

include_once "../modelo/Conectar.php";
try{
$con=Conectar::conexion();

$datos=[
':cod'=>$objNoticia->getCodigoNoticia(),
':titulo'=>$objNoticia->getTituloNoticia(),
':intro'=>$objNoticia->getIntroduccionNoticia(),
':mensaje'=>$objNoticia->getMensajeNoticia(),
':ubicacion'=>$objNoticia->getUbicacionNoticia(),
':foto'=>$objNoticia->getFotoNoticia(),
':autor'=>$objNoticia->getAutornoticia(),
':xml'=>$objNoticia->getUrlHojaXML(),
':url'=>$objNoticia->getUrlPaginaNoticia()
];
//echo "en actualizarww".$objNoticia->getCodigoNoticia().'      titulo='.$objNoticia->getTituloNoticia();

$sql = "UPDATE table_noticia SET tituloNoticia=:titulo,introduccion_Noticia=:intro, mensajeNoticia=:mensaje, ubicacionNoticia=:ubicacion, fotoNoticia=:foto, xmlHojaNoticia=:xml, urlPaginaNoticia=:url, autorNoticia=:autor where codigoNoticia=:cod"; 

                $Consulta = $con->prepare($sql);
                $Consulta->execute($datos);
				
echo "Actualizando el codigo ".$objNoticia->getCodigoNoticia()."cods" ;
//header("Location:../vista/noticia_vista.php");

}
	catch(Exception $e){
		die("Error". $e->getMessage());
		echo "Linea del herror" .$e->getLine();
		}
}

function eliminar($cod){
include_once "../modelo/Conectar.php";
try{
$con=Conectar::conexion();
$sql = "INSERT INTO table_noticia (codigoDetalleNoticia, tituloNoticia,introduccion_Noticia, mensajeNoticia, ubicacionNoticia, fotoNoticia, urlPaginaNoticia, xmlHojaNoticia, autorNoticia) VALUES (:detCod,:titulo,:intro,:mensaje,:ubicacion,:foto,:url,:xml,:autor)";
$Consulta = $con->prepare($sql);
$Consulta->execute(array(":detCod"=>$objNoticia->getCodigoDetalleNoticia(),":titulo"=>$objNoticia->getTituloNoticia(),":intro"=>$objNoticia->getIntroduccionNoticia(),":mensaje"=>$objNoticia->getMensajeNoticia(),":ubicacion"=>$objNoticia->getUbicacionNoticia(),":foto"=>$objNoticia->getFotoNoticia(),":url"=>$objNoticia->getUrlPaginaNoticia(),":xml"=>$objNoticia->getUrlHojaXML(),":autor"=>$objNoticia->getAutornoticia()));
echo "grabando";
//header("Location:../vista/noticia_vista.php");

}
	catch(Exception $e){
		die("Error2". $e->getMessage());
		echo "Linea del herror" .$e->getLine();
		}
}


function getNewCodigoDetalle(){
include_once("../modelo/Conectar.php");
$db = Conectar::conexion();

 // realizamos la consulta para obtener el mayor id insertado
  $sql = "SELECT MAX(codigoNoticia) FROM table_noticia";
  $query = $db->prepare($sql);
  $query->execute();
  $row = $query->fetchColumn();
  // imprimimos el valor obtenido, en este caso el mayor id insertado en una tabla

/*echo '<script language="javascript">alert("Hola en modelo '.$row.'");</script>';*/

$resultado=$row+1;
return $resultado;
	}

function consultaNoticia(){
	require_once "../modelo/Conectar.php"; 
	$base = Conectar::conexion();
	$registros = $base->query("SELECT * FROM usuarios");
	
	$this->personas =  array();
return $registros;
	}
	
function bool_y_EliminaCod($cod){
include_once("../modelo/Conectar.php");
$boolEncontro;
//un select que evalua si tiene item de noticia la noticia, leyendo el codigo detalle
//si el numero a eliminar tabien existe en la columna codigo detalle, no se puede eliminar el registro

		$db = Conectar::conexion();
	   if(!empty($cod)){
	   $sql="SELECT * FROM table_noticia where codigoNoticia='".$cod."'";
          
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   if($result){$boolEncontro =true; 
	   $sql="delete FROM table_noticia where codigoNoticia='".$cod."'";
	   $db->exec($sql);
	   }else{$boolEncontro= false;  }
	   }
		return $boolEncontro;
	}

function bool_existe_item_Noticia($cod){
	include_once("../modelo/Conectar.php");
	$boolEncontro;
		$db = Conectar::conexion();
	   if(!empty($cod)){
	   $sql="SELECT * FROM table_noticia where codigoDetalleNoticia='".$cod."'";
          
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   if($result){$boolEncontro =true; 
	   
	   }else{$boolEncontro= false;  }
	   }
		return $boolEncontro;
	}
	
function es_numero($numero) {
    if(is_numeric($element)) {
        echo "'{$element}' es numérico", PHP_EOL;
    } else {
        echo "'{$element}' NO es numérico", PHP_EOL;
    }
}

}//fin clase

?>