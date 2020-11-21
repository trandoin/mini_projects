<?php
//include connection file 
include "include/DB.php";
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('nitj.png',10,10,40);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Registered Students',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$display_heading = array('name'=> 'Name', 'email'=> 'Email','mobile'=> 'Mobile No.','stream'=> 'Stream','class'=> 'Class','state'=> 'State');

$result = mysqli_query($conn, "SELECT name, email, mobile, stream, class, state  FROM inquiry") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM inquiry WHERE Field != 'id'");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
foreach($header as $heading) {
$pdf->Cell(33,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(33,10,$column,1);
}
$pdf->Output();
?>
