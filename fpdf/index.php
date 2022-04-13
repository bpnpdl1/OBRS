<?php
require_once './fpdf.php';

$pdf= new FPDF();

$pdf->AddPage();




$pdf->SetFont('times','B',16);
$pdf->Cell('80',10,'OBRS');
$pdf->Cell('80',14,'');
$pdf->Output('file.php','I');