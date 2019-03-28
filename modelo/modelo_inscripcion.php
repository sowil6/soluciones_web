<?php
if(defined('RUTA_BASE')){ include_once RUTA_MODELO."Conectar.php"; }else{include_once "../modelo/Conectar.php";}
class modelo_inscripcion{


private  $db;        //En esta variable almacenaremos la conexion.
private $noticias; //En esta variable almacenaremos el registro de la tabla.
	
private $_DB;
public function __construct() {
	
    }
	
public function modelo_inscripcion(){ //Constructor.
    
      }
	  
function bool_existe_documento($doc){
	$boolEncontro=false;
	$username = $doc;
	//include_once("../modelo/Conectar.php");
		$db = Conectar::conexion();
	   if(!empty($doc)){
	   $sql="SELECT * FROM table_usuario WHERE username='$username'";
          	  
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   if($result){$boolEncontro =true; 
	   
	   }else{$boolEncontro= false;  }
	   }
		return $boolEncontro;
	}
function bool_documento($doc){
	$boolEncontro=false;

	//include_once("../modelo/Conectar.php");
		$db = Conectar::conexion();
   $sql="SELECT idPersona FROM tabla_personamain WHERE documentoIdentidad='$doc'";
 $data = $db->query($sql);
     $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   if($result){$boolEncontro =true; 
	   
	   }else{$boolEncontro= false;  }

		return $boolEncontro;
	}
  
function bool_existe_documentoyPassword($doc, $pass){
	$boolEncontro=false;
	$username = $doc;
	$password = md5($pass);
	//include_once("../modelo/Conectar.php");
		$db = Conectar::conexion();
	   if(!empty($doc)){
	   $sql="SELECT * FROM table_usuario WHERE username='$username' AND password='$password'";
          	  
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   if($result){$boolEncontro =true; 
	   
	   }else{$boolEncontro= false;  }
	   }
		return $boolEncontro;
	}
function get_DatosEstudios($id_estudiante){
$result=array();
		$db = Conectar::conexion();

	   $sql= "SELECT jornada, fecha_inscripcion FROM tabla_estudiante where id_estudiante ='$id_estudiante'";

	  // $sql="SELECT * FROM tabla_personamain where documentoIdentidad='$doc'";
          
	 $data = $db->query($sql);
      $result = $data->fetchAll(PDO::FETCH_ASSOC);

       return $result;
	
	
	}
function getId_Persona($documento){
$result=array();
		$db = Conectar::conexion();

		   $sql= "SELECT idPersona FROM tabla_personamain where documentoIdentidad ='$documento'";

	  // $sql="SELECT * FROM tabla_personamain where documentoIdentidad='$doc'";
          
	 $data = $db->query($sql);
	  $result = $data->fetchAll(PDO::FETCH_ASSOC);
     foreach($result as $row){
echo $row['idPersona'];
     } 
	  return $row;
		
	}

function get_Datos($id_estudiante,$doc){
	//echo "entro";
	if($id_estudiante==""){
		$id_sql="";}else{
$id_sql=" and e.id_estudiante='$id_estudiante' ";
			}
//	include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   if(!empty($doc)){
		   $sql= "SELECT * FROM tabla_personamain p, tabla_estudiante e where p.documentoIdentidad ='$doc' $id_sql and p.documentoIdentidad=e.documento_estudiante";

	  // $sql="SELECT * FROM tabla_personamain where documentoIdentidad='$doc'";
          
	 $data = $db->query($sql);
      //$result = $data->fetch(PDO::FETCH_ASSOC);
	   }//quede aqui
return $data;
	}
	
function get_Datos_SinID($doc){
	if($id_estudiante==""){
		$id_sql="";}else{
$id_sql=" and id_estudiante='$id_estudiante' ";
			}
//	include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   if(!empty($doc)){
		   $sql= "SELECT * FROM tabla_personamain  where documentoIdentidad ='$doc' $id_sql";

	  // $sql="SELECT * FROM tabla_personamain where documentoIdentidad='$doc'";
          
	 $data = $db->query($sql);
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
	   }//quede aqui
       return $result;
	}

function get_Programas_Inscritos($doc){
	
//	include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   if(!empty($doc)){
$sql= "SELECT e.programa, e.id_estudiante FROM tabla_personamain p, tabla_estudiante e where p.documentoIdentidad =$doc and p.documentoIdentidad=e.documento_estudiante";
	 $data = $db->query($sql);
$result = $data->fetchAll(PDO::FETCH_ASSOC);
  
	   }//fin quede aqui
       return $result;
	}

//consulta inscritos like por documento, nombre, programa, estado dele studiante, estado de certificacion
function get_Consultar_Inscritos($estudiante, $sql){
	$documento=$estudiante->getDocumento();	
	$nombre=$estudiante->getNombre();
	$programa=$estudiante->getPrograma();
	$estado_estudiante=$estudiante->getEstado_estudiante();	
	$estado_certificacion=$estudiante->getEstado_certificacion();
	
//	include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   
/*$sql= "SELECT  * FROM tabla_personamain p, tabla_estudiante e where 
p.documentoIdentidad like '%$documento%' 
and  p.nombre like '%$nombre%'  
and  e.programa like '%$programa%'
and  e.estado_estudiante like '%$estado_estudiante%'
and  e.estado_certificacion like '%$estado_certificacion%'
and p.documentoIdentidad=e.documento_estudiante
 group by p.documentoIdentidad";//and p.idPersona=e.id_estudiante*/
	 $data = $db->query($sql);
$result = $data->fetchAll(PDO::FETCH_ASSOC);
  
	 
       return $result;
	}

function get_RegistradosSinCursos($estudiante){
	$documento=$estudiante->getDocumento();
	$result=array();
		$db = Conectar::conexion();
	 
echo $sql= "SELECT * FROM tabla_personamain where documentoIdentidad like '%$documento%'";
	 $data = $db->query($sql);
$result = $data->fetchAll(PDO::FETCH_ASSOC);
  
	 
       return $result;
	}

function get_Consultar_proInscritos(){
	
//	include_once("../modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	  
$sql= "SELECT distinct programa FROM tabla_estudiante";
	 $data = $db->query($sql);
$result = $data->fetchAll(PDO::FETCH_ASSOC);
         return $result;
	}

function get_Programas(){
	//include_once("./modelo/Conectar.php");
$result=array();
		$db = Conectar::conexion();
	   $sql="select nombrePrograma from tabla_curriculoprograma";
	 $data = $db->query($sql);
       $result = $data->fetchAll(PDO::FETCH_ASSOC);
       return $result;
	}

function grabar($objNoticia,$estado){
include_once "../modelo/Conectar.php";
try{
	// connect to database
	$bd_cfg = include '../modelo/basedatos.php';
	$driver=$bd_cfg["driver"];
    $host=$bd_cfg["host"];
	$bduser=$bd_cfg["user"];
	$bdpass=$bd_cfg["pass"];
    $database=$bd_cfg["database"];
$bd = mysqli_connect('localhost', $bduser, $bdpass, $database);
$con=Conectar::conexion();
//obtenemos los valores de las variables de usuario
$username = mysqli_real_escape_string($bd, $objNoticia->getDocumento());
$email = mysqli_real_escape_string($bd, $objNoticia->getEmail());
$pass = mysqli_real_escape_string($bd,$objNoticia->getPassword());
$nivel_acceso = mysqli_real_escape_string($bd, 1);

if($estado=="nuevoRegistro"){//inscripcion por primera vez
//obtener el numero ultimo registro en la tabla		
$sqlMax="SELECT max(id) AS max_page FROM table_usuario";
$resMas=mysqli_query($bd, $sqlMax);
$idprevio=mysqli_fetch_array($resMas);
$id=$idprevio['max_page']+1;
$id=$objNoticia->getDocumento();//el id se coloca el documento de la persona

//echo $id."</br>".$objNoticia->getDocumento()."</br>".$objNoticia->getEmail()."</br>".$pass;



//grabamos el usuario
//nota el id del usuario es el documento de la persona
$pass = md5($objNoticia->getPassword());//encrypt the password before saving in the database
$query = "INSERT INTO table_usuario (id,username, nivel_acceso, email, password)  VALUES('$id','$username', '$nivel_acceso','$email', '$pass')";
mysqli_query($bd, $query);


$sql ="insert into tabla_personamain (documentoIdentidad, nombre, lugar_nacido, fecha_nacido, edad, sexo, ciudad, direccion, email, telefono_fijo, telefono_Cel ) 
values (:documento, :nombre, :lugar_nacido, :fecha_nacido, :edad, :sexo, :ciudad, :direccion, :email, :telefono_fijo, :telefono_Cel)" ;
$Consulta = $con->prepare($sql);
$Consulta->execute(array(":documento"=>$objNoticia->getDocumento(),":nombre"=>$objNoticia->getNombre(), ":lugar_nacido"=>$objNoticia->getLugar_nacido(), 
":fecha_nacido"=>$objNoticia->getFecha_nacido(), ":edad"=>$objNoticia->getEdad(),":sexo"=>$objNoticia->getSexo(),":ciudad"=>$objNoticia->getCiudad(), ":direccion"=>$objNoticia->getDireccion(), ":email"=>$objNoticia->getEmail(),
"telefono_fijo"=>$objNoticia->getTelefono_Fijo(), "telefono_Cel"=>$objNoticia->getTelefono_Cel()));
}else{
	
	//nueva inscripcion al mismo estudiante
//	obtenemos el id_estudiante
$id_estudiante=$objNoticia->getId_estudiante();
	}

// bloque que se graba si la insercion es de un estudiante ya registrado
$sql = "INSERT INTO tabla_estudiante (documento_estudiante, programa, jornada, empresa, cargo, direccion_empresa, telefono_empresa, fecha_inscripcion) 
VALUES 
(:documento, :programa, :jornada, :empresa, :cargo, :direccion_empresa, :telefono_empresa, :fecha_inscripcion)";
$Consulta = $con->prepare($sql);
$Consulta->execute(array(
":documento"=>$objNoticia->getDocumento(),":programa"=>$objNoticia->getPrograma(), ":jornada"=>$objNoticia->getJornada(),":empresa"=>$objNoticia->getEmpresa(),
":cargo"=>$objNoticia->getCargo(), ":direccion_empresa"=>$objNoticia->getDireccion_empresa(),
":telefono_empresa"=>$objNoticia->getTelefono_empresa(), ":fecha_inscripcion"=>$objNoticia->getFecha_inscripcion()));



echo "grabando";
//header("Location:../vista/noticia_vista.php");

}
	catch(Exception $e){
		die("Error2". $e->getMessage());
		echo "Linea del herror" .$e->getLine();
		}
}//fin grabar

function Actualizar($estudiante){
	/*echo '<script language="javascript">alert("Hola en MODELO ACTUALIZAR");</script>';*/

include_once "../modelo/Conectar.php";
try{
$con=Conectar::conexion();
$documento=$estudiante->getDocumento();
//$idestudiante=$estudiante->getDocumento_estudiante();
$id_estudiante=$estudiante->getId_estudiante();
$datos=[
':nombre'=>$estudiante->getNombre(),
':email'=>$estudiante->getEmail(),
':ciudad'=>$estudiante->getCiudad(),
':direccion'=>$estudiante->getDireccion(),
':lugar_nacido'=>$estudiante->getLugar_nacido(),
':fecha_nacido'=>$estudiante->getFecha_nacido(),
':edad'=>$estudiante->getEdad(),
':sexo'=>$estudiante->getSexo(),
':telefono_fijo'=>$estudiante->getTelefono_fijo(),
':telefono_Cel'=>$estudiante->getTelefono_Cel(),
':programa'=>$estudiante->getPrograma(),
':fecha_inscripcion'=>$estudiante->getFecha_inscripcion(),
':jornada'=>$estudiante->getJornada(),
':empresa'=>$estudiante->getEmpresa(),
':cargo'=>$estudiante->getCargo(),
':direccion_empresa'=>$estudiante->getDireccion_empresa(),
':telefono_empresa'=>$estudiante->getTelefono_empresa(),
':estado_estudiante'=>$estudiante->getEstado_estudiante(),
':observacion'=>$estudiante->getObservacion(),
':estado_certificacion'=>$estudiante->getEstado_certificacion(),
':fecha_certificacion'=>$estudiante->getFecha_certificacion()
];
//echo "en actualizarww".$objNoticia->getCodigoNoticia().'      titulo='.$objNoticia->getTituloNoticia();

$sql = "UPDATE tabla_personamain p, tabla_estudiante e  SET
p.nombre=:nombre,
p.email=:email, 
p.ciudad=:ciudad,
p.direccion=:direccion, 
p.lugar_nacido=:lugar_nacido,
p.fecha_nacido=:fecha_nacido, 
p.edad=:edad, 
p.sexo=:sexo, 
p.telefono_fijo=:telefono_fijo, 
p.telefono_Cel=:telefono_Cel,
e.programa=:programa,
e.fecha_inscripcion=:fecha_inscripcion,
e.jornada=:jornada,
e.empresa=:empresa,
e.cargo=:cargo,
e.direccion_empresa=:direccion_empresa,
e.telefono_empresa=:telefono_empresa,
e.estado_estudiante=:estado_estudiante,
e.observacion=:observacion,
e.estado_certificacion=:estado_certificacion,
e.fecha_certificacion=:fecha_certificacion
 where p.documentoIdentidad ='$documento' and e.documento_estudiante= p.documentoIdentidad and e.id_estudiante='$id_estudiante'"; 

                $Consulta = $con->prepare($sql);
                $Consulta->execute($datos);
				
//echo "Actualizando el codigo ".$objNoticia->getCodigoNoticia()."cods" ;
//header("Location:../vista/noticia_vista.php");

}
	catch(Exception $e){
		die("Error". $e->getMessage());
		echo "Linea del herror" .$e->getLine();
		}
}

function contar_inscripciones($id_estud,$documento){
	include_once "../modelo/Conectar.php";
$bd = Conectar::conexion();
$sql="select * FROM tabla_personamain p, tabla_estudiante e where p.documentoIdentidad =$documento and e.documento_estudiante='$id_estud' and p.documentoIdentidad=e.documento_estudiante ";
//$sql="select * FROM tabla_personamain";
$pdoResult = $bd->query($sql); 
$result=$pdoResult->rowCount();
//echo $result;
return $result;
	}

function Eliminar_inscrito_Id($id){
		$db = Conectar::conexion();
 $sql="delete FROM tabla_estudiante where id='".$id."'";
	   $db->exec($sql);
}



}//fin class inscripcion
?>