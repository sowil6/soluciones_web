<?php
if(isset($_GET["documento"]))
{
	$documento=$_GET["documento"];
	$id_estudiante=$_GET["id_estudiante"];
 //  echo $documento."------".$id_estudiante;
}
$ruta_autoload;
//echo "ruta  ".RUTA_BASE."-- -".RUTA_Mpdf;


require_once(RUTA_Mpdf.'vendor/autoload.php');echo "existe el file3";

$html2="hola mundo";
$mpdf = new \Mpdf\Mpdf();
	//$css= file_get_contents('./Styles/stylepdf.css');
	/*$css2= file_get_contents('../Styles/bootstrap3.3.5.min.css');
	$css3= file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js');
	$css4= file_get_contents('../Scripts/jquery.min.js');*/

	//$mpdf->WriteHTML($css,1);
	/*$mpdf->WriteHTML($css2,1);
	$mpdf->WriteHTML($css3,1);
	$mpdf->WriteHTML($css4,1);*/

	$mpdf->WriteHTML($html2);
	$mpdf->Output();
//	$mpdf->Output("inscripcion.pdf",'I');
//	$mpdf->Output($documento.".pdf",'D');//genera el fichero y forza la descarga

?>

