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

class PDF extends FPDF{//inicio clase
// Cabecera de página
function Header(){
    // Logo
    $this->Image('./ImgSistema/logo2019cefic.jpg',10,8,13);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(30,10, utf8_decode('Corporación Educativa de Formación Integral del Caribe'),0,0,'C');
	    $this->Cell(52);
	    $this->Cell(32,12,'CEFICC',0,0,'C');
    // Salto de línea
    $this->Ln(20);/**/
	
}

// Pie de página
function Footer()
{
   // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C'); /**/
}


}//fin clase pdf



$documento=$_GET["documento"];
	$id_estudiante=$_GET["id_estudiante"];
 // echo $documento."------".$id_estudiante;
$result= modelo_inscripcion::get_Datos($id_estudiante,$documento);


$pdf = new PDF();
// Títulos de las columnas

// Carga de datos
//$data = $pdf->LoadData();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
 while ($estudiante= $result->fetch(PDO::FETCH_ASSOC)) { 
$pdf->Cell(70,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,1,'C',1);
 }
$pdf->Output();

?>

</body>
</html>