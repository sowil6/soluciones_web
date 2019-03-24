<?php


//echo "ruta  ".RUTA_BASE."-- -".RUTA_Mpdf;
echo "ruta home " .__FILE__ ."--";
if(file_exists(RUTA_Mpdf.'vendor/autoload.php')) {
require_once(RUTA_Mpdf.'vendor/autoload.php');echo "existe el file3";
echo $html="<!doctype html>
<html>
<head>
<script type='text/javascript'>
function generapdf(){ //lo activas con un OnClick

	//alert(html);
	documento_='75482555';
	id_estudiante_='245';
location.href='reporte_inscripcion?documento='+ documento_+'&id_estudiante='+id_estudiante_ ;
}
</script>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>

<body>
<button type='button' class='btn btn-success'  id='btnNuevo' title='' href='javascript:;' 	onClick='generapdf();'>Generar Pdf</button>

</body>
</html>";


$mpdf = new \Mpdf\Mpdf();
	$css= file_get_contents('./Styles/stylepdf.css');
	$mpdf->WriteHTML($css,1);
	/*$mpdf->WriteHTML($css2,1);
	$mpdf->WriteHTML($css3,1);
	$mpdf->WriteHTML($css4,1);*/

	$mpdf->WriteHTML($html);
//$mpdf->Output("inscripcion.pdf",'I');
		$mpdf->Output("hola.pdf",'D');//genera el fichero y forza la descarga
}else{echo "no existe el archivo";}
?>

</body>
</html>