
<?php
    require("controllers/SaleController.php");
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

    <title>Sales - Isuru Motor Traders</title>

</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

<div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sales</li>
        </ol>
    </nav>

   <table class="table" id="salesTable">

        <tr>
            <th>Date Sold</th>
            <th>Sold By</th>
            <th>Vehicle Registration No</th>
            <th>Sold For</th>
            <th>Payment Method</th>
            <th>Customer NIC</th>
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
                    echo "<td>"; echo $row['CustomerNIC']; echo "</td>";
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
