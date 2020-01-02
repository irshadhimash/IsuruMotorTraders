<?php

require('fpdf.php');
require("controllers/InventoryController.php");

class PDF extends FPDF{

    // Load data
    function LoadData()
    {
        $saleObj = new InventoryController;
        return $saleObj->getVehicleCountByCountry();
    }

    function Header()
    {
        // Logo
        $this->Image('images/logo.jpg',10,6,30);
        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(30,10,'Isuru Motor Traders',0,0,'C');
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
        $this->SetFont('times','',13);
        // Data
        $fill = false;
        while($row = $data->fetch_assoc())
        {
            $this->Cell($w[3],6,$row['Country'],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row['VehicleClass'],'LR',0,'L',$fill);
            $this->Cell($w[3],6,number_format($row['Count']),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Column headings
$header = array('Country', 'Vehicle Class', 'Count');
// Data loading
$data = $pdf->LoadData();
$pdf->Cell(0,10, '' ,0,1);
$pdf->SetFont('times','',14);
$pdf->AddPage();
$pdf->Cell(0,10, '' ,0,1);
$pdf->SetFont('times','B',14);
$pdf->Cell($w[3],6,'Number of available vehicles by each country.','B',0,'L',$fill);
$pdf->Ln(10);
$pdf->GenerateTable($header, $data);

$pdf->Output();

?>

<!-- cell signature: Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]) -->