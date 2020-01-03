<?php

//require("controllers/AddSaleController.php");
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('images/logo.jpg',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(30,10,'Isuru Motor Traders',0,0,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(35,20,'407/D, Nilpanagoda, Wegowwa, Minuwangoda.',0,0,'R');
        //$this->Cell(15,30,'(077) 754 3587',0,0,'R');
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
        $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'Letter');
//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(0,10, '' ,0,1);
$pdf->Cell(0,10, 'Customer NIC     :'.$_GET['CxNIC'] ,0,1);
$pdf->Cell(0,10, 'Vehicle No       :'.$_GET['RegistrationNo'] ,0,1);
$pdf->Cell(0,10, 'Make             :'.$_GET['Make'] ,0,1);
$pdf->Cell(0,10, 'Model            :'.$_GET['Model'] ,0,1);
$pdf->Cell(0,10, 'Price            : RS. '.$_GET['SalePrice'] ,0,1);
$pdf->Cell(0,10, 'Payment Method   :'.$_GET['PaymentMethod'] ,0,1);
if ( $_GET['PaymentMethod'] == 'Installment' ){
    $pdf->Cell(0,10, 'Initial Payment   :'.$_GET['InitialPayment'] ,0,1);
    $monthlyDue = ( $_GET['SalePrice'] - $_GET['InitialPayment'] ) / 12;
    $pdf->Cell(0,10, 'Monthly Due Amount   :'.$monthlyDue ,0,1);
}

$pdf->Output();

?>
