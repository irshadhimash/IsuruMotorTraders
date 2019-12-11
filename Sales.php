
<?php
    require("controllers/SaleController.php");
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

    <title>Sales - Isuru Motor Traders</title>
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

<div>

<br/>
<ol class="breadcrumb">
 <li><a href="home.php">Home</a></li>
 <li class="active">Sales</li>
</ol>

   <table class="table" id="salesTable">

        <tr>
            <th>Date Sold</th>
            <th>Sold By</th>
            <th>Vehicle Registration No</th>
            <th>Sale Price</th>
            <th>Payment Method</th>
            <th>Actions</th>
        </tr>

        <?php
                
            $inventoryObj = new SaleController;
            $resultSet = $inventoryObj->getAllSales();

            while($row = $resultSet->fetch_assoc()){
                echo "<tr>";
                    echo "<td>"; echo $row['DateSold']; echo "</td>";
                    echo "<td>"; echo $row['SoldBy']; echo "</td>";
                    echo "<td>"; echo $row['VehicleNo']; echo "</td>";
                    echo "<td>"; echo $row['SalePrice']; echo "</td>";
                    echo "<td>"; echo $row['PaymentMethod']; echo "</td>";
                    echo "<td>";
                    if( $_SESSION['UserRole'] == 'Admin' ){
                        echo "<a href='ReverseSale.php?id=".$row['SaleID']."&RegNo=".$row['VehicleNo']."'><input type='submit' name='reverseBtn' value='Reverse' class='btn btn-danger' /> </a>";
                    }
                    echo "</td>";
                echo "</tr>";
            }
            
        ?>

   </table>

</div>

</body>

</html>
