<?php
    require("controllers/InstallmentPaymentController.php");
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>Installment Payments - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php
                    if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                        echo ("
                        <li class='breadcrumb-item'><a href='home.php'>Home</a></li>");
                    }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                        echo ("
                        <li class='breadcrumb-item'><a href='TraderPortal.php'>Home</a></li>");
                    }elseif( $_SESSION['SystemRole'] == 'Customer' ){
                        echo ("
                        <li class='breadcrumb-item'><a href='CustomerPortal.php'>Home</a></li>");
                    }
                ?>
                <li class="breadcrumb-item active" aria-current="page">Installment Payments</li>
            </ol>
        </nav>

        <form method="post" action="#">

            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Registration No</span>
                        <input type="text" name="RegNoTxt" class="form-control" placeholder="Format xx-xxxx" aria-describedby="basic-addon1">
                    </div> </br>

                    <div class="input-group">
                        <button type="submit" name="searchBtn" value="Search" class="btn btn-success">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"> Search</span>
                        </button>
                    </div> </br>
                </div>
            </div>

        </form>
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

            if( isset($_POST['searchBtn'] ) ){
                $resultSet = $installmentObj->search();
                
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

            }else{
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

            }
                
            
            ?>
        </table>

    </div>

<body>

</html>
