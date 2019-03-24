<?php
require('./fpdf181/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('./imgSistema/logo_ceficc.png',10,8,13);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(30,10,'No veo el titulo3',1,0,'C');
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
}
$html="¡hola mundo";





$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode("$html"));
$pdf->Output();

?>

</body>
</html>