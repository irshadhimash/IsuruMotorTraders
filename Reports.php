
<?php
    require('controllers/InventoryController.php');
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>Reports - Isuru Motor Traders</title>

</head>

<body>
    
<header>
    <?php require("header.php"); ?>
</header>
    
<div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reports</li>
        </ol>
    </nav>

    
    <div class="row">

        <div class='col-lg-3 text-center'>
            <a href='Report_ProfitAnalysisCashSales.php' target='_BLANK'>
                <img class='square' src='images/appicons/Report.png'width='150' height='150'>
            </a>
            <h2>Profit Analysis - Cash Sales</h2>
            <p>View profit analysis of cash sales for this month.</p>
        </div>

        <div class='col-lg-3 text-center'>
            <a href='Report_ProfitAnalysisInstallmentSales.php' target='_BLANK'>
                <img class='square' src='images/appicons/Report.png'width='150' height='150'>
            </a>
            <h2>Profit Analysis - Installment Sales</h2>
            <p>View profit analysis of Installment sales.</p>
        </div>

        <div class='col-lg-3 text-center'>
            <a href='Report_SalesThisMonth.php' target='_BLANK'>
                <img class='square' src='images/appicons/Report.png'width='150' height='150'>
            </a>
            <h2>Sales This Month</h2>
            <p>View list of sales for current month.</p>
        </div>

        <div class='col-lg-3 text-center'>
            <a href='Report_VehicleCountByCountry.php' target='_BLANK'>
                <img class='square' src='images/appicons/Report.png'width='150' height='150'>
            </a>
            <h2>Vehicle Count By Country</h2>
            <p>View list of vehicles manufactured in each country.</p>
        </div>

    </div>

</div>  

</body>

</html>
