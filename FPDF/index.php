
<?php
include "include/config.php";



 global $ConnectingDB;
              $sql = "SELECT * FROM inquiry ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
              $SrNo = 0;
              while ($DataRows=$Execute->fetch()) {
              	
                 $QueryId = $DataRows["id"];
                 $Name = $DataRows["name"];
                 $Email = $DataRows["email"];
                 $Mobile = $DataRows["mobile"];
                 $Stream = $DataRows["stream"];
                 $Class = $DataRows["class"];
                 $Address = $DataRows["state"];
                 $SrNo++;
            }


require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

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