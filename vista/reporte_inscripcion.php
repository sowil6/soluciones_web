<?php
if(isset($_GET["documento"]))
{
	$documento=$_GET["documento"];
	$id_estudiante=$_GET["id_estudiante"];
 //  echo $documento."------".$id_estudiante;
}


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

        <img src='./imgSistema/logo2019cefic.jpg'>
		</div><!--fin div logo-->
		<div class='titulo_reporte'>
		
 <div>Corporación de Educativa de Formación Integral del caribe</div>
		<div>CEFICC</div>
		
		</div><!--fin div class titulo_reporte-->
      	
 
		
		<div class='row'> <!--inicio row1-->
	<div class='col-sm-6 izq'><!--fin col a-->

		
	</div><!--fin col a-->

  	<div class='compania der'><!--inicio col b-->
      
		
		<div><span>Email</span> <a href='mailto:secretaria.general@ceficc.edu.co'>secretaria.general@ceficc.edu.co</a></div>
		<div><span>Telefonos:</span> 6812539 - (+57) 3012807094</div>
		<div><a href='www.ceficc.edu.co'><span>Sitio web</span>: www.ceficc.edu.co</a></div>
		<div><span>Fecha de Impresión:</span>".date('d-m-Y H:i:s')."</div>
		 
	 </div><!--fin col b-->
	  
</div><!--fin row1-->
	   
	   
	   
<div class='row'> <!--inicio row2-->
   
    </div><h1>CONSTANCIA DE INSCRIPCION";


$html.="";
if(defined('RUTA_BASE')){
include_once RUTA_MODELO."modelo_inscripcion.php"; 
include_once RUTA_BEANS.'beans_estudiante.php';

}
else
{
include_once "./modelo/modelo_inscripcion.php";
include_once './Beans/beans_estudiante.php';
}
/*$documento=73;
$id=29;*/
$result= modelo_inscripcion::get_Datos($id_estudiante,$documento);
//	echo $result;

foreach ($result as $estudiante) { 
$html.=
  "<div class='col-sm-6  datos_inscripcion'><!--fin col c-->
  
  		<div><span>Fecha de inscripción:</span>".$estudiante['fecha_inscripcion']."</div>
       	<div><span>NOMBRE del estudiante:</span>".$estudiante['nombre']."</div>
        <div><span>PROGRAMA INSCRITO:</span>".$estudiante['programa']."</div>
        <div><span>JORNADA:</span>".$estudiante['jornada']."</div>
        <div><span>SEXO:</span>".$estudiante['sexo']."</div>
		<div><span>CIUDAD:</span>".$estudiante['ciudad']."</div>
		<div><span>LUGAR DE NACIMIENTO:</span>".$estudiante['lugar_nacido']."</div>
		<div><span>DIRECCION:</span>".$estudiante['direccion']."</div>
		<div><span>EMAIL:</span>".$estudiante['email']."</div>
		<div><span>TELEFONO:</span>".$estudiante['telefono_fijo']." -  ".$estudiante['telefono_Cel']."</div>
		<div><span>NOMBRE DE LA EMPRESA DONDE LABORA:</span>".$estudiante['empresa']."</div>
		<div><span>CARGO:</span>".$estudiante['cargo']."</div>
		<div><span>DIRECCION DE LA EMPRESA:</span>".$estudiante['direccion_empresa']."</div>
		<div><span>TELEFONO DE LA EMPRESA:</span>".$estudiante['telefono_empresa']."</div>
        		
		
		  </div><!--fin col c->
		</h1>
      </div><!--fin row2-->
	 	 
		   
    </header>";
}

$mpdf = new \Mpdf\Mpdf();
	$css= file_get_contents('./Styles/stylepdf.css');
	/*$css2= file_get_contents('../Styles/bootstrap3.3.5.min.css');
	$css3= file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js');
	$css4= file_get_contents('../Scripts/jquery.min.js');*/

	$mpdf->WriteHTML($css,1);
	/*$mpdf->WriteHTML($css2,1);
	$mpdf->WriteHTML($css3,1);
	$mpdf->WriteHTML($css4,1);*/

	$mpdf->WriteHTML($html);
//	$mpdf->Output("inscripcion.pdf",'I');
	$mpdf->Output($documento.".pdf",'D');//genera el fichero y forza la descarga

?>

</body>
</html>