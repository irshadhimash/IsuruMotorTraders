<?php

require('fpdf.php');
require("controllers/SaleController.php");

class PDF extends FPDF{

    // Load data
    function LoadData()
    {
        $saleObj = new SaleController;
        return $saleObj->getSalesThisMonth();
    }

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
        $this->Cell(0,20,'Sales of this month.',0,0,'L');
        // Line break
        $this->Ln(20);
    }

    // data table
    function GenerateTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(28, 107, 235);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(40, 35, 40, 45);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[3],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        while($row = $data->fetch_assoc())
        {
            $this->Cell($w[3],6,$row['VehicleNo'],'LR',0,'L',$fill);
            $this->Cell($w[3],6,number_format($row['SalePrice']),'LR',0,'R',$fill);
            $this->Cell($w[3],6,$row['PaymentMethod'],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row['DateSold'],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Column headings
$header = array('Vehicle NO', 'Amount Sold For', 'Payment Method', 'Date Sold');
// Data loading
$data = $pdf->LoadData();
$pdf->Cell(0,10, '' ,0,1);
$pdf->SetFont('times','',14);
$pdf->AddPage();
$pdf->GenerateTable($header, $data);

$pdf->Output();

?>

<!-- cell signature: Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]) -->