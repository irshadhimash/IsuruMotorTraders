
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

    <title>Inventory - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="Traders.php">Traders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
            </ol>
        </nav>

        <table class="table" id="vehiclesTable">

            <?php

                $inventoryObj = new InventoryController;
                $resultSet = $inventoryObj->getVehicleByUserId( $_GET['id'] );

                if ( $resultSet != null ){

                    echo "<h3>Below are the list of vehicles posted by <em>".$_GET['Name']."</em>. Click on Mark As Interested on a vehicle to proceed.</h3> <br/>";
                    echo ("<tr>
                            <th>Vehicle Class</th>
                            <th>Registration No</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Condition</th>
                            <th>Fuel Type</th>
                            <th>Country</th>
                            <th>Sale Price</th>
                            <th>Mark Interested</th>
                        </tr>");
                    while($row = $resultSet->fetch_assoc()){
                        $vehicleId = $row['VehicleId'];
                        echo "<tr>";
                            echo "<td>"; echo $row['VehicleClass']; echo "</td>";
                            echo "<td>"; echo $row['RegistrationNo']; echo "</td>";
                            echo "<td>"; echo $row['Make']; echo "</td>";
                            echo "<td>"; echo $row['Model']; echo "</td>";
                            echo "<td>"; echo $row['Status']; echo "</td>";
                            echo "<td>"; echo $row['FuelType']; echo "</td>";
                            echo "<td>"; echo $row['Country']; echo "</td>";
                            echo "<td>"; echo $row['SalePrice']; echo "</td>";
                            echo "<td> <a href='MarkInterested.php?vehicleID=$vehicleId&id=".$_GET['id']."&Name=".$_GET['Name']."'> <button type='button' name='markInterestedBtn' class='btn btn-success'> <span class='fas fa-magic'></span> </button> </a> ";
                        echo "</tr>";
                    }
                }else{
                    echo "There are no vehicles listed by <em>".$_GET['Name']."!";
                }
                
            ?>

        </table>

    </div>

</body>

</html>
