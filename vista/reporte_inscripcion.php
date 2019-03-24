<?php
if(isset($_GET["documento"]))
{
	$documento=$_GET["documento"];
	$id_estudiante=$_GET["id_estudiante"];
 //  echo $documento."------".$id_estudiante;
}
$ruta_autoload;
//echo "ruta  ".RUTA_BASE."-- -".RUTA_Mpdf;
echo "ruta home " .__FILE__ ."--";
if(file_exists(RUTA_Mpdf.'vendor/autoload.php')) {
require_once(RUTA_Mpdf.'vendor/autoload.php');echo "existe el file4";
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
   
    </div><h1>CONSTANCIA DE INSCRIPCION

    </header>";


$mpdf = new \Mpdf\Mpdf();
	$css= file_get_contents('./Styles/stylepdf.css');
	$mpdf->WriteHTML($css,1);
	/*$mpdf->WriteHTML($css2,1);
	$mpdf->WriteHTML($css3,1);
	$mpdf->WriteHTML($css4,1);*/

	$mpdf->WriteHTML($html);
//	$mpdf->Output("inscripcion.pdf",'I');
	$mpdf->Output($documento.".pdf",'D');//genera el fichero y forza la descarga
}else{echo "no existe el archivo";}
?>

</body>
</html>