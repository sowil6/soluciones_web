<?php
class PDF extends FPDF {
// Cabecera de página
function Header(){
    // Logo
    $this->Image('./ImgSistema/logo2019cefic.jpg',10,8,18);
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
//	Line (left, top_left, right , top_rigth )
	 $this->Line(10,30,200,30);/**/
	 $this->Ln(3);/**/
	 
$this->SetFont('Arial','I',10)  ;
 $this->SetTextColor(0,0,0);
$this->Cell(20,6,utf8_decode('Email		:'),0,0,'L',0); $this->Cell(50,6, utf8_decode('secretaria.general@ceficc.edu.co'),0,1,'L');
$this->Cell(20,6,utf8_decode('Telefono	:'),0,0,'L',0); $this->Cell(50,6, utf8_decode('6812539 - (+57) 3012807094'),0,1,'L');
$this->Cell(20,6,utf8_decode('Sitio Web	:'),0,0,'L',0);$this->Cell(50,6, utf8_decode($this->Write(5,'www.ceficc.edu.co','www.ceficc.edu.co')),0,1,'L');

 $this->Ln(3);
 
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
}//fin clase pdf

?>