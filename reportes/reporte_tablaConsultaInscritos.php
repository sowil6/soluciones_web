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
if(isset($_GET["id_estudiante"])){$id_estudiante=$_GET["id_estudiante"];	}
if(isset($_GET["documento"])){$documento=$_GET["documento"];	}
$estudiante=set_estudiante();
//$id_estudiante=$estudiante->getId_estudiante();
	//$documento=$estudiante->getDocumento();	
	$nombre=$estudiante->getNombre();
	$programa=$estudiante->getPrograma();
	$estado_estudiante=$estudiante->getEstado_estudiante();	
	$estado_certificacion=$estudiante->getEstado_certificacion();
	

require_once('../mpdf/vendor/autoload.php');
$html="
<!DOCTYPE html>
<html>
<head>
  
  	<title></title>
</head>


<body class='body_reporte'>
<header>
<div id='logo' class='logo clearfix'><!--inicio div logo-->

        <img src='../imgSistema/logo2019cefic.jpg'>
</div><!--fin div logo-->
		<div class='titulo_reporte'>
		
 <div>Corporación de Educativa de Formación Integral del caribe</div>
		<div>CEFICC</div>
		
		</div><!--fin div class titulo_reporte-->
      	
 
  	<div class='compania der'><!--inicio col b-->
      
		
		<div><span>Email</span> <a href='mailto:secretaria.general@ceficc.edu.co'>secretaria.general@ceficc.edu.co</a></div>
		<div><span>Telefonos:</span> 6812539 - (+57) 3012807094</div>
		<div><a href='www.ceficc.edu.co'><span>Sitio web</span>: www.ceficc.edu.co</a></div>
		<div><span>Fecha de Impresión:</span>".date('d-m-Y H:i:s')."</div>
		 
	 </div><!--fin col b-->
	   </header>

   REPORTE DE ESTUDIANTES INSCRITOS 

";
$sql= "SELECT  * FROM tabla_personamain p, tabla_estudiante e where 
p.documentoIdentidad like '%$documento%' 
and  p.nombre like '%$nombre%'  
and  e.programa like '%$programa%'
and  e.estado_estudiante like '%$estado_estudiante%'
and  e.estado_certificacion like '%$estado_certificacion%'
and p.documentoIdentidad=e.documento_estudiante
 group by p.documentoIdentidad";//and p.idPersona=e.id_estudiante
	$sinCurso="";
	$inscripciones= modelo_inscripcion::get_Consultar_Inscritos($estudiante, $sql);//si no encuentra datos, solo busca en la tabla persona
$html.= count($inscripciones) . " registros entrontrados";
if($inscripciones==null){
	//$inscripciones= modelo_inscripcion::get_RegistradosSinCursos($estudiante);
	$sinCurso="vacio";}
	
$html.="";	
	$html.="<table  class='tabla_report_consulta_inscritos' border='1'>
  <tbody>
    <tr>
      <td>Documento</td>
      <td>Nombre</td>
      <td>Programa</td>
      <td>Estado del Estudiante</td>
      <td>Eliminar</td>
    </tr>
";
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

$html.=
"
    <tr>
      <td>" .$datos['documentoIdentidad']."</td>
      <td>".$datos['nombre']."</td>
      <td>".$prog."</td>
      <td>".$estado_estudiante."</td>
      <td>&nbsp;</td>
    </tr>";
	 }
$html.="</tbody>
  </table>
	";
	 	
echo $html;

$mpdf = new \Mpdf\Mpdf();
	$css= file_get_contents('../Styles/stylepdf.css');
	/*$css2= file_get_contents('../Styles/bootstrap3.3.5.min.css');
	$css3= file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js');
	$css4= file_get_contents('../Scripts/jquery.min.js');*/

	$mpdf->WriteHTML($css,1);
	/*$mpdf->WriteHTML($css2,1);
	$mpdf->WriteHTML($css3,1);
	$mpdf->WriteHTML($css4,1);*/

	$mpdf->WriteHTML($html);
	$mpdf->Output("",'I');/**/

?>

</body>
</html>




<?php

/*if(defined('RUTA_BASE')){
include_once RUTA_MODELO."modelo_inscripcion.php"; 
include_once RUTA_BEANS.'beans_estudiante.php';

}
else
{
include_once "../modelo/modelo_inscripcion.php";
include_once '../Beans/beans_estudiante.php';
}*/
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

?>

