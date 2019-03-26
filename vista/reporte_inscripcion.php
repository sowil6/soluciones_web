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
require('./fpdf181/fpdf.php');
include ('./includes/include_report_header_footer.php');


  



///inicio bloque tabla
$documento=$_GET["documento"];
	$id_estudiante=$_GET["id_estudiante"];
 // echo $documento."------".$id_estudiante;
$result= modelo_inscripcion::get_Datos($id_estudiante,$documento);
/////fin bloque tabla



// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(0,8, utf8_decode('CONSTANCIA DE INSCRIPCIÓN'),1,1,'C');
$pdf->Ln(4);


$pdf->SetFont('Times','',12);
$pdf->SetFillColor(255,255,255);
 while ($estudiante= $result->fetch(PDO::FETCH_ASSOC)) { 

$pdf->Cell(20,6,utf8_decode('Email		:'),0,0,'L',0); $pdf->Cell(50,6, utf8_decode($estudiante['nombre']),0,1,'L');
$pdf->Cell(20,6,utf8_decode('Telefono	:'),0,0,'L',0); $pdf->Cell(50,6, utf8_decode($estudiante['nombre']),0,1,'L');
$pdf->Cell(20,6,utf8_decode('Sitio Web	:'),0,0,'L',0); $pdf->Cell(50,6, utf8_decode($estudiante['nombre']),0,1,'L');



 }


/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
$pdf->Output();
?>