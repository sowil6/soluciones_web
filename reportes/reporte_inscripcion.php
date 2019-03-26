<?php
if(isset($_GET["documento"]))
{
	$documento=$_GET["documento"];
	echo "documento= ". $documento;
	$id_estudiante=$_GET["id_estudiante"];
  echo $documento."------".$id_estudiante;
 
}
echo $documento."------".$id_estudiante;
// die();




if(defined('RUTA_BASE')){
include_once RUTA_MODELO."modelo_inscripcion.php"; 
include_once RUTA_BEANS.'beans_estudiante.php';
echo "entro".RUTA_fpdf;
}
else
{
include_once "../modelo/modelo_inscripcion.php";
include_once '../Beans/beans_estudiante.php';
}
require('../fpdf181/fpdf.php');
include ('../includes/include_report_header_footer.php');
/*class PDF extends FPDF {
// Cabecera de página
function Header(){
    // Logo
    $this->Image('../ImgSistema/logo2019cefic.jpg',10,8,13);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
 $this->SetTextColor(0,0,232);
    $this->Cell(100,8, utf8_decode('Corporación Educativa de Formación Integral del Caribe'),0,1,'C');
	  //$this->Ln(4);
	    $this->Cell(0,11,'CEFICC',0,0,'C');
    // Salto de línea
    $this->Ln(10);/**/
	 $this->Line(12,15,12,60);/**/
	 $this->Ln(10);/**/
}//fin heater

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}//fin footer
}//fin clase pdf*/

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
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,0,'C',1);
$pdf->Cell(20,6,'nombre',1,1,'C',1);
$pdf->SetFont('Times','',12);

 while ($estudiante= $result->fetch(PDO::FETCH_ASSOC)) { 
$pdf->Cell(70,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,0,'C',1);
$pdf->Cell(20,6,$estudiante['nombre'],1,1,'C',1);
 }


/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
$pdf->Output();
?>