<?php include "include/config.php"; 


 global $ConnectingDB;
              $sql = "SELECT * FROM inquiry ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
              $SrNo = 1000;
              while ($DataRows=$Execute->fetch()) {
                
                 $QueryId = $DataRows["id"];
                 $Name = $DataRows["name"];
                 $Email = $DataRows["email"];
                 $Mobile = $DataRows["mobile"];
                 // $Stream = $DataRows["stream"];
                 $Class = $DataRows["class"];
                 $Address = $DataRows["state"];
                 $SrNo++;
            }

?>

<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{

 global $ConnectingDB;
              $sql = "SELECT * FROM slider ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
             
              while ($DataRows=$Execute->fetch()) {
                
                 $QueryId = $DataRows["id"];
                 $Photo  = $DataRows["slide_image"];
                
            }






    // Logo
    $this->Image('nitj.png',10,6,40);
    // Photo
    $this->Image("nitj.png",150,6,50);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(55);
    // Title
    $this->Cell(50,10,'Registration Form',1,0,'C');

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

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
    
    $pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "",0,1,'L');
//APPLICATION NO
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "Application No. {$SrNo} ",1,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "",0,1,'L');


//STUDENTS DETAILS
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "Student's Details",1,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "Student's Name : {$Name}",0,1,'L');
$pdf->Cell(180, 10, "DOB : {$Email}",0,1,'L');
$pdf->Cell(180, 10, "Category : {$Mobile}",0,1,'L');
$pdf->Cell(180, 10, "Nationality :  {$Address}",0,1,'L');
$pdf->Cell(180, 10, "Adhar No. :  {$Mobile} " ,0,1,'L');

//STUDENTS PERSONAL DETAILS
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "Student's Personal Details",1,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "Father's Name :",0,1,'L');
$pdf->Cell(180, 10, "Father's Occupation :",0,1,'L');
$pdf->Cell(180, 10, "Father's Mobile No. :",0,1,'L');
$pdf->Cell(180, 10, "Mother's Name :",0,1,'L');
$pdf->Cell(180, 10, "Mother's Occupation :",0,1,'L');
$pdf->Cell(180, 10, "Mother's MObile No. :",0,1,'L');
$pdf->Cell(180, 10, "Permanet Address :",0,1,'L');
$pdf->Cell(180, 10, "Permanet City & Pin :",0,1,'L');
$pdf->Cell(180, 10, "Permanet District and State :",0,1,'L');
$pdf->Cell(180, 10, "Correspondenes Address :",0,1,'L');
$pdf->Cell(180, 10, "Correspondenes City & Pin :",0,1,'L');
$pdf->Cell(180, 10, "Correspondenes District & State :",0,1,'L');

//STUDENT'S ACADEMICS DETAIL'S
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "Student's Academic Details",1,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "Stream :",0,1,'L');
$pdf->Cell(180, 10, "Present Class :",0,1,'L');
$pdf->Cell(180, 10, "Board :",0,1,'L');
$pdf->Cell(180, 10, "Admission Class :",0,1,'L');
$pdf->Cell(180, 10, "School Name :",0,1,'L');
$pdf->Cell(180, 10, "School Address :",0,1,'L');
$pdf->Cell(180, 10, "10th Passing Year :",0,1,'L');
$pdf->Cell(180, 10, "10th Roll No. :",0,1,'L');
$pdf->Cell(180, 10, "Marks Obtained in 10th (%) :",0,1,'L');
$pdf->Cell(180, 10, "12th Passing Year :",0,1,'L');
$pdf->Cell(180, 10, "12th Roll No :",0,1,'L');
$pdf->Cell(180, 10, "Marks Obtained in 12th (%)  :",0,1,'L');

//UPLOADED DOCUMENTS
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "Uploded Documents",1,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "10th Marksheet :",0,1,'L');
$pdf->Cell(180, 10, "12th MArksheet :",0,1,'L');

//How to come with candid
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180, 10, "How did you come to know ?",1,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 10, "How did you come to know ? :",0,1,'L');


$pdf->Output();
?>