<?php
    require("controllers/InstallmentPaymentController.php");
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Main App Style -->
	<link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>

    <title>Installment Payments - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div>

        <br/>
        <ol class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li class="active">Installment Payments</li>
        </ol>

        <table class="table" id="installmentsTable">
            <legend>Vehicles sold under installment plan. Click on a vehicle to view details and proceed to payment.</legend>
            <tr>
                <th>Vehicle Registration No</th>
                <th>Sold For</th>
                <th>Initial Payment</th>
                <th>Installments Left</th>
                <th>Total Left To Pay</th>
                <th>Plan Duartion</th>
                <th>Monthly Due</th>
            </tr>
            <?php
                
            $installmentObj = new InstallmentPaymentController;
            $resultSet = $installmentObj->getAllInstallments();

            while($row = $resultSet->fetch_assoc()){
                echo "<tr>";
                    echo "<td>"; echo "<a href='MakePayment.php?id=".$row['SaleID']."&RegNo=".$row['VehicleNo']."&TotalLeft=".($row['TotalAfterInitial'] - $row['TotalInstallmentsPaid'])."' target='_blank'>".$row['VehicleNo']."</a>"; echo "</td>";
                    echo "<td>"; echo $row['SalePrice']; echo "</td>";
                    echo "<td>"; echo $row['InitialPayment']; echo "</td>";
                    echo "<td>"; echo ( 12 - $row['NoOfPayments'] ) ; echo "</td>";
                    echo "<td>"; echo $row['TotalAfterInitial'] - $row['TotalInstallmentsPaid'] ; echo "</td>";
                    echo "<td>"; echo "12 Months"; echo "</td>";
                    echo "<td>"; echo ($row['TotalAfterInitial'] - $row['TotalInstallmentsPaid']) / ( 12 - $row['NoOfPayments'] ) ; echo "</td>";
                echo "</tr>";
            }
            
            ?>
        </table>

    </div>

<body>

</html>
