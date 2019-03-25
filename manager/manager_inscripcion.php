<?php

if(defined('RUTA_BASE')){
include_once RUTA_MODELO."modelo_inscripcion.php"; 
include_once RUTA_BEANS.'beans_estudiante.php';

}
else
{
include_once "../modelo/modelo_inscripcion.php";
include_once '../Beans/beans_estudiante.php';
}
ob_start();

$comboProgramas=  modelo_inscripcion::get_Programas();
//$inscripciones= modelo_inscripcion::get_Consultar_proInscritos();//llena combo programas en consulta inscritos
//get_datos= modelo_inscripcion::get_Datos('7313233');
//print_r($resultado);

//variables persona
$documento=$password=$nombre=$email=$ciudad=$direccion=$lugar_nacido="";
$fecha_nacido=$edad=$sexo=$telefono_fijo=$telefono_Cel="";
$estudiante="";
//variables estudiante
$id_=$fecha_inscripcion=$programa=$jornada=$empresa=$direccion_empresa=$telefono_empresa="";

//variables para almacenar erores
$errdocumento=$errpassword=$errprograma=$errciudad=$errjornada=$errnombre=$erredad=$errsexo=$errlugar_nacido="";
$errfecha_nacido=$errdireccion=$erremail=$errtelefono_fijo=$errtelefono_Cel=$errtelefono_empresa="";
$errMensaje=$errAlert=$errRep_password="";


//arrays para guardar mensajes y errores
$aMensajes = array();
$errores = array();

//VERIFICAR DOCUMENTO
if(isset($_POST['ejecutar'])){
$op=$_POST['ejecutar'];

switch ($op) {
	  case "get_DatosEstudiante":
get_Datos_Estudiante();
	     break;
      case "verificar_documentoyPassword":
bool_Existe_estudio();
	     break;
case "Enviar":
validar_datos_y_grabar("grabar");//enviamos la accion para saber si es grabar o actualizar
	     break;

case "Actualizar":
validar_datos_y_grabar("Actualizar");//enviamos la accion para saber si es grabar o actualizar
	     break;

case "programas_inscritos":
if(isset($_POST['documento'])){
$documento=$_POST['documento'];
programas_inscritos($documento);}
	     break;

case "consulta_inscritos":
if(isset($_POST['documento'])){
$documento=$_POST['documento'];
contultar_inscritos();}//enviamos la accion para saber si es grabar o actualizar
	     break;
case "reporte_consulta_inscritos":
if(isset($_POST['documento'])){
$documento=$_POST['documento'];
reporte_contultar_inscritos();}//enviamos la accion para saber si es grabar o actualizar
	     break;
case "consulta_certificados":
if(isset($_POST['documento'])){
$documento=$_POST['documento'];
}
	contultar_certificados();
	     break;
case "ComboConsultar_programa":
ComboConsultar_programainscritos();//enviamos la accion para saber si es grabar o actualizar
	     break;
		 
case "consulta":
consultarDatos();//enviamos la accion para saber si es grabar o actualizar
	     break;

case "eliminar":
EliminarInscripcion();//enviamos la accion para saber si es grabar o actualizar
	     break;
case "Boton_prueba":
Boton_prueba();//enviamos la accion para saber si es grabar o actualizar
	     break;
}// fin switch ($op)
}//fin $_POST['ejecutar']


 /*FUNCIONES CRUD*/
 
 
 /*INICIO VERIFICACIONES*/
 
 /*verifica si el estudiante esta inscrito*/
 function bool_Existe_estudio(){
	$errores = array();
	$errores['$errMensaje']='';
	$estudio=set_estudiante();
	$expresion ="/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s0-9]+$/";
$estado="";
$id_estudiante=trim($estudio->getId_estudiante());
$documento=trim($estudio->getDocumento());	
$password=trim($estudio->getPassword());
/*$programa=$estudio->getPrograma();*/

if (!is_numeric($documento)) {$errores['$errdocumento']= 'El campo documento debe contener numero'; $errores['$errAlert']= 'hay_error'; }
if (!validarSQLInjection($expresion,$password)) {$errores['$errpassword']='La contraseña no es valida';}
/*if (empty($programa)) { $errores['$errprograma']= 'Debe seleccionar un programa de estudio';}
*/
	
 //$ins_modelo= modelo_inscripcion::();
 $bool_usertrue= modelo_inscripcion::bool_existe_documento($documento);//si existe el documento solamente
 $bool_loginTrue= modelo_inscripcion::bool_existe_documentoyPassword($documento,$password);
 
if(!$documento==""){
if($bool_loginTrue){
	
//$inscripcion= modelo_inscripcion::get_Datos($documento);//se almacenan los datos de la consulta en la variable Noticia
$result = modelo_inscripcion::get_Datos($id_estudiante,$documento);
$errores= $result->fetchAll(PDO::FETCH_ASSOC);//puse el fetchAll aqui porque en generar pdr tuve que quitarselo del metodo get_Datos

//$errores= modelo_inscripcion::get_Programas_Inscritos($documento);
//$errores['$errprograma']=$programasDelDocumento;
$errores['$errMensaje']='Login Correcto';
}


if(!$bool_loginTrue&&$bool_usertrue){//si no existe el usuario, es un nuevo registro

 $errores['$errMensaje']='Digite la contraseña';	
	
}

if(!$bool_loginTrue&&!$bool_usertrue){//si no existe el usuario, es un nuevo registro

 $errores['$errMensaje']='Nueva Inscripción';	
	
}
}//else si estan en blanco documento y contraseña
	else{
$errores['$errMensaje']= 'No ha digitado informacion';
		}//fin si estan en blanco documento y contraseña
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;

	
	
  }//fin bool_Existe_estudio()

 
 
 /*FIN VERIFICACION*/
 
 
function  get_Datos_Estudiante(){
	$estudio=set_estudiante();
	$id_estudiante=$estudio->getId_estudiante();
	$carrera=$estudio->getCarrera();
	 $datos_estudio= modelo_inscripcion::get_DatosEstudios($id_estudiante);//se consulta por id del estudio y el nombre de la carera


ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($datos_estudio);

return $datos_estudio;
	}
 
function bool_Existe_Documento(){
	$errores = array();
	$estudio=set_estudiante();
	$expresion ="/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s0-9]+$/";

	
$documento=$estudio->getDocumento();	

/*$programa=$estudio->getPrograma();*/

if(count($errores)==0){
	
 $ins_modelo= new modelo_inscripcion();
 $bool_documento= $ins_modelo->bool_existe_documento($documento);
if($bool_documento){
echo  "Digite su contraseña";

return ;


}else{
	//si no existe la inscripcion
	echo "Digite una Contraseña";
	return ;
	}//if $bool_documento

}else{
echo "Digite una Contraseña";
	return ;
	
	}//fin count errores
	
  }//fin bolexiste

function validar_datos_y_grabar($accion) {
$errores = array();

//expresiones regulares
$expresion ="/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s0-9]+$/";
$expresion_fecha  = "^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$";

//Get_estudiante($estudiante);asignamos nombres de variables a los datos
$estudiante=set_estudiante();//seteamos las variables 

//persona
$id_estudiante=$estudiante->getId_estudiante();	
$documento_estudiante=trim($estudiante->getDocumento_estudiante());	
$documento=trim($estudiante->getDocumento());	
$password=trim($estudiante->getPassword());	
$rep_password=trim($estudiante->getRep_password());
$nombre=$estudiante->getNombre();
$programa=$estudiante->getPrograma();
$email=$estudiante->getEmail();
$ciudad=$estudiante->getCiudad();
$direccion=$estudiante->getDireccion();
$lugar_nacido=$estudiante->getLugar_nacido();
$fecha_nacido=$estudiante->getFecha_nacido();
$edad=$estudiante->getEdad();
$sexo=$estudiante->getSexo();
$telefono_fijo=$estudiante->getTelefono_fijo();
$telefono_Cel=$estudiante->getTelefono_Cel();

//estudiante
$fecha_inscripcion=$estudiante->getFecha_inscripcion();
$programa=$estudiante->getPrograma();
$jornada=$estudiante->getJornada();
$empresa=$estudiante->getEmpresa();
$direccion_empresa=$estudiante->getDireccion_empresa();
$telefono_empresa=$estudiante->getTelefono_empresa();

//$expresion = @"[^\w]";$errores ="";


//asignamos nombres de variables a los beans

/*INICIO VALIDACION DE LAS VARIABLES*/

if (!is_numeric($documento)) {$errores['$errdocumento']= 'El campo documento debe contener numero';}

if($accion=="grabar"){
if (!validarSQLInjection($expresion,$password)) {$errores['$errpassword']='La contraseña no es valida';}
if ($password!=$rep_password) {$errores['$errRep_password']='Las contraseñas no son iguales';}
}

if ($programa=="") {$errores['$errprograma']='El campo programa es requerido';}

if (!validarSQLInjection($expresion,$ciudad)) {$errores['$errciudad']='El campo ciudad es requerido';}

if (!validarSQLInjection( $expresion,$nombre)) {$errores['$errnombre']= 'El campo nombre es requerido';}

if (!is_numeric($edad)) {$errores['$erredad']= 'El campo edad debe contener numero';}

if (empty($sexo)) { $errores['$errsexo']= 'La jornada es requerida';}

if (!validarSQLInjection( $expresion,$lugar_nacido)) {$errores['$errlugar_nacido']= 'El campo lugar de Nacimiento es requerido';}

/*$validfecha=validarDate($fecha_nacido);
if ($validfecha=="false") {
	$errores['$errfecha_nacido']= $fecha_nacido."  ".$valores[1]." ". $valores[2]." ". $valores[0]. 'El campo fecha de Nacimiento es requerido';}
*/
if (!validarSQLInjection( $expresion,$direccion)) {$errores['$errdireccion']= 'El campo direccion es requerido';}
$valida_email=validaEmail($email);

if ($valida_email=="false") {$errores['$erremail']= 'El campo email es incorrecto';}

if ($telefono_fijo!=""&&!is_numeric($telefono_fijo)) {$errores['$errtelefono_fijo']= 'El campo telefono Fijo debe contener numero';}

if ($telefono_Cel!=""&&!is_numeric($telefono_Cel)) {$errores['$errtelefono_Cel']= 'El campo telefono celular debe contener numero';}

if (empty($jornada)) { $errores['$errjornada']= 'La jornada es requerida';}

if ($telefono_empresa!=""&&!is_numeric($telefono_empresa)) {$errores['$errtelefono_empresa']= 'El campo telefono de la Empresa debe contener numero';}


//preguntamos si n hay errores, si no hay, graba los datos

if(count($errores)==0){

	
if($accion=="grabar"){
	//verificar si es un registro nuevo, o registro de un programa nuevo a un estudiante registrado

grabar($estudiante);
}else{
//echo "la fecha de inscripcion es".	$estudiante->getFecha_inscripcion();
actualizar($estudiante);
	}

//return $accion;
} else{
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;	 
}//fin count($errores)==0)

  /*FIN VALIDACION DE LAS VARIABLES*/

  }//fin $_SERVER

function consultarDatos(){
	$errores = array();

	$estudio=set_estudiante();
$estado="";
	$id_estudiante=trim($estudio->getId_estudiante());
$documento=trim($estudio->getDocumento());	
/*$programa=$estudio->getPrograma();*/
if($id_estudiante=="0"){
$errores=modelo_inscripcion::get_Datos_SinID($documento);
//$errores['$errMensaje']= 'entro en vacio';
}else{
	$result= modelo_inscripcion::get_Datos($id_estudiante,$documento);
	$errores= $result->fetchAll(PDO::FETCH_ASSOC);//puse el fetchAll aqui porque en generar pdr tuve que quitarselo del metodo get_Datos
	//$errores['$errMensaje']= 'entro en con contenido'.$id;
	}

	
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;

	
	
  }//fin consultarDatos()


//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.

  
function programas_inscritos($documento){
//$inscripciones= array();
	$inscripciones= modelo_inscripcion::get_Programas_Inscritos($documento);
  echo $nuevo="<option >Inscribir un Nuevo Curso</option>";

foreach($inscripciones as $file){
  echo $html="<option value='".$file['id_estudiante']."'>".$file['programa']."</option>";

}

//ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
//echo json_encode($html);
return $nuevo.$html;
	}

function grabar($estudiante){
	 $errores['$errMensaje']= 'entro en grabar';
	 $emodelo= new modelo_inscripcion();
$documento=$estudiante->getDocumento();//obtenemos el numero del documento
//verificamos si el nuevo registro es de un estudiante ya registrado o no
	$bool_documento= $emodelo->bool_documento($documento);

	 if($bool_documento){
		 //si ya existe el estudiante inscrito
		try{
$getId_estudiante= $emodelo->getId_Persona($documento);
$estudiante->setDocumento_estudiante($getDocumento_estudiante['documentoIdentidad']);
/*echo '<script language="javascript">alert("Hola en manager Grabar'.$noti.getTituloNoticia() .')";</script>';*/
$emodelo::grabar($estudiante,"registrado");
$errores['$errMensaje']= 'grabar';
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;	 

//return $nmodelo;
}catch(Exception $ex){
	}
		 
		 }else{
	 
	 
//validamos que el programa sea nuevo o si ya existe
try{

/*echo '<script language="javascript">alert("Hola en manager Grabar'.$noti.getTituloNoticia() .')";</script>';*/
$emodelo::grabar($estudiante,"nuevoRegistro");
$errores['$errMensaje']= 'grabar';
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;	 

//return $nmodelo;
}catch(Exception $ex){
	}
		 }//fin  if($bool_documento)
}//fin grabar

 function actualizar($estudiante){
//validamos que el programa sea nuevo o si ya existe
try{
$emodelo= new modelo_inscripcion();
/*echo '<script language="javascript">alert("Hola en manager Grabar'.$noti.getTituloNoticia() .')";</script>';*/
$emodelo::actualizar($estudiante);
$errores['$errMensaje']= 'actualizar';
//echo $estudiante->getId();
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);
return $errores;	 

}catch(Exception $ex){
	}
}//fin grabar
/*CONSULTA*/

/*genera tabla en consulta inscripcion*/
function contultar_inscritos(){
	$estudiante=set_estudiante();//seteamos las variables 
	
	$documento=$estudiante->getDocumento();	
	$nombre=$estudiante->getNombre();
	$programa=$estudiante->getPrograma();
	$estado_estudiante=$estudiante->getEstado_estudiante();	
	$estado_certificacion=$estudiante->getEstado_certificacion();
	
	$sinCurso="";
echo "<table class='table table-hover table-condensed'>
<thead><th> Documento</th>
<th>Nombre</th>
<th>Programa</th>
<th>Estado del Estudiante</th>
<!--<th>id_estudiante</th>-->
<th>Ver</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>";
$sql= "SELECT  * FROM tabla_personamain p, tabla_estudiante e where 
p.documentoIdentidad like '%$documento%' 
and  p.nombre like '%$nombre%'  
and  e.programa like '%$programa%'
and  e.estado_estudiante like '%$estado_estudiante%'
and  e.estado_certificacion like '%$estado_certificacion%'
and p.documentoIdentidad=e.documento_estudiante
 group by p.documentoIdentidad";//and p.idPersona=e.id_estudiante


$inscripciones= modelo_inscripcion::get_Consultar_Inscritos($estudiante, $sql);//si no encuentra datos, solo busca en la tabla persona
echo count($inscripciones) . " registros entrontrados";
if($inscripciones==null){
	//$inscripciones= modelo_inscripcion::get_RegistradosSinCursos($estudiante);
	$sinCurso="vacio";}
 foreach($inscripciones as $datos){

if($sinCurso=="vacio"){
	$prog = "vacio";
	$id_estudiante = "0";
	$documento_estudiante ="0";
	$estado_estudiante="vacio";
	}else{
	$prog = $datos['programa'];
	$id_estudiante = $datos['id_estudiante'];
	$documento_estudiante = $datos['documentoIdentidad'];
	$estado_estudiante=$datos['estado_estudiante'];
	}


echo $html=
"<tr><td>" .$datos['documentoIdentidad']."</td>
<td>".$datos['nombre']."</td>
<td>".$prog."</td>
<td>".$estado_estudiante."</td>
<td><a href='javascript:;' onClick='ConsultaDatosInscritos(".$id_estudiante.",".$documento_estudiante.");return false;' href='#'><i class='fa fa-eye'></i>ver</a></td>
<td><a href='javascript:;' onClick='Eliminar(".$id_estudiante.",".$documento_estudiante.",".$datos['documentoIdentidad'].");return false;' href='#'>Eliminar</a></td>";
	 }
echo "</tbody>";
 echo "</table>";
	
	}//fin function contultar_inscritos

/*genera tabla en consultar certificados*/
function contultar_certificados(){
	$estudiante=set_estudiante();//seteamos las variables 
	$documento=$estudiante->getDocumento();	
	$nombre=$estudiante->getNombre();
	$programa=$estudiante->getPrograma();
	$estado_estudiante=$estudiante->getEstado_estudiante();	
	$estado_certificacion=$estudiante->getEstado_certificacion();	
	$sinCurso="";
echo "<table class='table table-hover table-condensed'>
<thead><th> Documento</th>
<th>Nombre</th>
<th>Programa</th>
<th>Estado de Certificación</th>
<th>Fecha de Certificacion</th>
<th></th>
</tr>
</thead>
<tbody>";

$sql= "SELECT  * FROM tabla_personamain p, tabla_estudiante e where 
e.documento_estudiante = '$documento' 
and  p.nombre like '%$nombre%'  
and  e.programa like '%$programa%'
and  e.estado_estudiante like '%$estado_estudiante%'
and  e.estado_certificacion like '%$estado_certificacion%'
and e.documento_estudiante=p.documentoIdentidad
 group by e.documento_estudiante";//and p.idPersona=e.id_estudiante

$inscripciones= modelo_inscripcion::get_Consultar_Inscritos($estudiante, $sql);//si no encuentra datos, solo busca en la tabla persona
//if($inscripciones==null){$inscripciones= modelo_inscripcion::get_RegistradosSinCursos($estudiante);$sinCurso="vacio";}
 foreach($inscripciones as $datos){

if($sinCurso=="vacio"){$prog = "vacio";$id_estudiante = "0";$documento_estudiante ="0";$estado_certificacion ="vacio";$fecha_certificacion ="null";}
else{
	$prog = $datos['programa'];$id_estudiante = $datos['id_estudiante'];$documento_estudiante = $datos['documentoIdentidad'];$estado_certificacion = $datos['estado_certificacion'];$fecha_certificacion = $datos['fecha_certificacion'];}


echo $html=
"<tr><td>" .$datos['documentoIdentidad']."</td>
<td>".$datos['nombre']."</td>
<td>".$prog."</td>
<td>".$estado_certificacion."</td>
<td>".$fecha_certificacion."</td>";

	 }
echo "</tbody>";
 echo "</table>";
	
	}//fin function contultar_inscritos	

/*LLENAR COMBO PROGRAMA EN CONSULTA*/
function ComboConsultar_programainscritos(){
//$inscripciones= array();
	$inscripciones= modelo_inscripcion::get_Consultar_Inscritos();
foreach($inscripciones as $file){
  echo $html="<option >".$file['programa']."</option>";
return $html;
}
}
function set_estudiante(){
	
$estudiante=new beans_estudiante();

//persona

if(isset($_POST["id_estudiante"])){$estudiante->setId_estudiante($_POST["id_estudiante"]);	}

if(isset($_POST["documento_estudiante"])){$estudiante->setDocumento_estudiante($_POST["documento_estudiante"]);	}
if(isset($_POST["carrera"])){$estudiante->setCarrera($_POST["carrera"]);	}

if(isset($_POST["password"])){$estudiante->setPassword($_POST["password"]);	}
if(isset($_POST["rep_password"])){$estudiante->setRep_password($_POST["rep_password"]);	}



if(isset($_POST["documento"])){$estudiante->setDocumento($_POST["documento"]);	}
if(isset($_POST["nombre"])){$estudiante->setNombre($_POST["nombre"]);	}
if(isset($_POST["lugar_nacido"])){$estudiante->setLugar_nacido($_POST["lugar_nacido"]);	}
if(isset($_POST["fecha_nacido"])){$estudiante->setFecha_nacido($_POST["fecha_nacido"]);	}
if(isset($_POST["edad"])){$estudiante->setEdad($_POST["edad"]);	}
if(isset($_POST["sexo"])){$estudiante->setSexo($_POST["sexo"]);	}
if(isset($_POST["ciudad"])){$estudiante->setCiudad($_POST["ciudad"]);	}
if(isset($_POST["direccion"])){$estudiante->setDireccion($_POST["direccion"]);	}
if(isset($_POST["email"])){$estudiante->setEmail($_POST["email"]);	}
if(isset($_POST["telefono_fijo"])){$estudiante->setTelefono_fijo($_POST["telefono_fijo"]);	}
if(isset($_POST["telefono_Cel"])){$estudiante->setTelefono_Cel($_POST["telefono_Cel"]);	}

//estudiante
if(isset($_POST["programa"])){$estudiante->setPrograma($_POST["programa"]);	}
if(isset($_POST["fecha_inscripcion"])){$estudiante->setFecha_inscripcion($_POST["fecha_inscripcion"]);	}
if(isset($_POST["jornada"])){$estudiante->setJornada($_POST["jornada"]);	}
if(isset($_POST["empresa"])){$estudiante->setEmpresa($_POST["empresa"]);	}
if(isset($_POST["cargo"])){$estudiante->setEmpresa($_POST["cargo"]);	}
if(isset($_POST["direccion_empresa"])){$estudiante->setDireccion_empresa($_POST["direccion_empresa"]);	}
if(isset($_POST["telefono_empresa"])){$estudiante->setTelefono_empresa($_POST["telefono_empresa"]);	}

if(isset($_POST["estado_estudiante"])){$estudiante->setEstado_estudiante($_POST["estado_estudiante"]);	}
if(isset($_POST["observacion"])){$estudiante->setObservacion($_POST["observacion"]);	}

if(isset($_POST["estado_certificacion"])){$estudiante->setEstado_certificacion($_POST["estado_certificacion"]);	}
if(isset($_POST["fecha_certificacion"])){$estudiante->setFecha_certificacion($_POST["fecha_certificacion"]);	}

/*
echo '<script language="javascript">alert("Hola en manager GRABAR ");</script>';
*/return $estudiante;

	 }//fin set_estudiante
	 
function get_estudiante($estudiante){
//$estudiante=new beans_estudiante();

//persona
$id_estudiante=$estudiante->getId_estudiante();	
$documento_estudiante=$estudiante->getDocumento_estudiante();
$documento=$estudiante->getDocumento();	
$password=$estudiante->getPassword();	
$nombre=$estudiante->getNombre();
$email=$estudiante->getEmail();
$ciudad=$estudiante->getCiudad();
$direccion=$estudiante->getDireccion();
$lugar_nacido=$estudiante->getLugar_nacido();
$fecha_nacido=$estudiante->getFecha_nacido();
$edad=$estudiante->getEdad();
$sexo=$estudiante->getSexo();
$telefono_fijo=$estudiante->getTelefono_fijo();
$telefono_Cel=$estudiante->getTelefono_Cel();

//estudiante
$fecha_inscripcion=$estudiante->getFecha_inscripcion();
$programa=$estudiante->getPrograma();
$jornada=$estudiante->getJornada();
$empresa=$estudiante->getEmpresa();
$direccion_empresa=$estudiante->getDireccion_empresa();
$telEmpresa=$estudiante->getTelEmpresa();
$estado_estudiante=$estudiante->getEstado_estudiante();
$observacion=$estudiante->getObservacion();

$estado_certificacion=$estudiante->getEstado_certificacion();
$fecha_certificacion=$estudiante->getFecha_certificacion();

return $estudiante;	
	}  //fin get_estudiante

function EliminarInscripcion(){
$nmodelo= new modelo_inscripcion();
	if(isset($_POST["id"])){$id= $_POST["id"];	}
	if(isset($_POST["documento_estudiante"])){$documento_estudiante= $_POST["documento_estudiante"];	}
	if(isset($_POST["documento"])){$documento= $_POST["documento"];	}
$count_Inscripcion;	
//$count_Inscripcion= $nmodelo->contar_inscripciones($id_estudiante, $documento);
try{
$nmodelo->Eliminar_inscrito_Id($id);
$errores['$errMensaje']= 'Se elimino el registro con exito';
ob_end_clean();	//evita el problema de json que no se ejecuta en ajax va despues de ob_start() y antes de json_encode
echo json_encode($errores);

}catch(Exception $ex){
	}

return $errores;
}


function Boton_prueba(){
//echo __DIR__.'/vendor/autoload.php';
echo 	'../html-pdf/vendor/autoload.php';
/*require __DIR__.'/html-pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();*/
	}

//Comprobar validaciones
function validarSQLInjection($expresion, $dato) {
     if(preg_match($expresion,$dato)){
    return true;
  }else{
  return false;}

        }
function validaRequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }
function validarEntero($valor, $opciones=null){
    if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
       return false;
    }else{
       return true;
    }
 }
function validardni($valor) {
	function numerodni($numdni) {return substr("TRWAGMYFPDXBNJZSQVHLCKE",$numdni%23,1);}//función para asignar la letra de control
	$patron="^([0-9]{1,8})([T,R,W,A,G,M,Y,F,P,D,X,B,N,J,Z,S,Q,V,H,L,C,K,E]{1})$";//patrón que controla que haya entre 1 y 8 números y una letra de las de la lista; además carga en el array los datos numéricos y la letra por separado
	if (ereg($patron, $valor, $regs) && $regs[2]==numerodni($regs[1])) {
		return true;
	}else {
		return false;
	}
} 
function validaEmail($email){
	$estado = "false";
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $estado = "true";
   // echo "Esta dirección de correo ($email) es válida.";
}
return $estado;
}
function validarDate($fecha){
	$estado = "false";
echo  $valores = explode('-', $fecha);
   if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
	$estado = "true";
	    }
	return 	$estado;
}

?>
