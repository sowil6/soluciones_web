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

$pdf->Cell(0,8, utf8_decode('CONSTANCIA DE INSCRIPCIÓN'),0,1,'C');
$pdf->Ln(4);



$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,1,'C',1);
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(255,255,255);
 while ($estudiante= $result->fetch(PDO::FETCH_ASSOC)) { 
$pdf->Cell(70,5,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,5,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,5,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,5,$estudiante['nombre'],1,1,'C',1);
 }


/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
$pdf->Output();
?>