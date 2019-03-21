<?php
if(isset($_GET['ejecutar'])){
	$valor=$_GET['ejecutar'];
$html=$_GET['html'];
//print_r($html);
//die();


////////////
require_once('../mpdf/vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf();
	$css= file_get_contents('../Styles/style.css');
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html,2);
	$mpdf->Output();
//////////////

}

?>