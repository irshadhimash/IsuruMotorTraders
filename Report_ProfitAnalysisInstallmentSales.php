<?php

require('fpdf.php');
require("controllers/SaleController.php");

class PDF extends FPDF{

    // Load data
    function LoadData()
    {
        $saleObj = new SaleController;
        return $saleObj->getInstallmentSaleProfitDataForReport();
    }

    function LoadSummary(){
        $saleObj = new SaleController;
        $result = $saleObj->getInstallmentSaleProfitTotalDataForReport();
        return $result->fetch_assoc();
    }

    function Header()
    {
        // Logo
        $this->Image('images/logo.jpg',10,6,30);
        // Arial bold 15
        $this->SetFont('times','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(30,10,'Isuru Motor Traders',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // data summary
    function GenerateSummary( $summary ){
        
        $this->Cell(0,10, '' ,0,1);
        $this->SetFont('times','B',14);
        $this->Cell($w[3],6,'Cost, Revenue and Profit summary of installment based sales for the month of '.$summary['Month'],'B',0,'L',$fill);
        $this->Ln(9);
        $this->SetFont('times','',13);
        $this->Cell($w[3],6,'Below data are predictions of total after the installment plan is completed for each vehicle.','',0,'L',$fill);
        $this->Ln(6);
        $this->Cell($w[3],6,'   * Total Predicted Revenue: '.number_format($summary['TotalRevenue']),'',0,'L',$fill);
        $this->Ln(6);
        $this->Cell($w[3],6,'   * Total Cost: '.number_format($summary['TotalCOST']),'',0,'L',$fill);
        $this->Ln(6);
        $this->Cell($w[3],6,'   * Total Predicted Profit: '.number_format($summary['TotalProfit']),'',0,'L',$fill);
        $this->Cell(0,10, '' ,0,1);

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
        //$this->Cell(0,20,'Cost, Revenue and Profit of each vehicle sale during this month.',0,0,'L');
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
            $this->Cell($w[3],6,number_format($row['Revenue']),'LR',0,'R',$fill);
            $this->Cell($w[3],6,number_format($row['COST']),'LR',0,'R',$fill);
            $this->Cell($w[3],6,number_format($row['Profit']),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Column headings
$header = array('Vehicle NO', 'Revenue', 'COST', 'Profit After Plan');
// Data loading
$data = $pdf->LoadData();
$summary = $pdf->LoadSummary();
$pdf->Cell(0,10, '' ,0,1);
$pdf->SetFont('times','',14);
$pdf->AddPage();

$pdf->GenerateSummary($summary);
$pdf->GenerateTable($header, $data);

$pdf->Output();

?>

<!-- cell signature: Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]) -->