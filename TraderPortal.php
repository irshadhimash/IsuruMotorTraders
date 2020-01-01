
<?php
    require('controllers/InventoryController.php');

    $inventoryModel = new InventoryModel;
    $preferedVehicles = $inventoryModel->getPreferedVehicleCountByTraderId( $_SESSION['UserID'] );
    $preferedVehicleCount = $preferedVehicles->fetch_assoc();
    $purchasedVehicles = $inventoryModel->getPurchasedVehicleCountByTraderId( $_SESSION['UserID'] );
    $purchasedVehicleCount = $purchasedVehicles->fetch_assoc();
    $_SESSION['PreferedVehicleCount'] = $preferedVehicleCount['PreferedVehicleCount'];
    $_SESSION['PurchasedVehicleCount'] = $purchasedVehicleCount['PurchasedVehicleCount'];

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

<body class='bg-info'>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <br/>
        <h2> Hi <em><?php echo $_SESSION['PreferedName'] ?></em>! Your dashboard for today is as follows. </h2>

        <br/>
        <div class="row">
            <div class='col-lg-3 text-center'>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?php echo $_SESSION['PurchasedVehicleCount']; ?> vehicles purchased!</strong>
                    <p>Isuru Motor Traders purchased <?php echo $_SESSION['PurchasedVehicleCount']; ?> of your vehicles.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class='col-lg-3'>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['PreferedVehicleCount']; ?> listings of interest!</strong>
                    <p>Isuru Motor Traders prefers <?php echo $_SESSION['PreferedVehicleCount']; ?> out of your listings below.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class='col-lg-3'>
            </div>
            <div class='col-lg-3'>
                <span class="badge badge-pill badge-success">Signed in as <?php echo $_SESSION['PreferedName'] ?>!</span>
            </div>
        </div>

        <a class="link text-white" href="AddVehicle.php"> <span class="glyphicon glyphicon-plus"></span> Add New Vehicle </a>
        </br>
        <table class="table text-white" id="vehiclesTable">

            <tr>
                <th>Vehicle Class</th>
                <th>Registration No</th>
                <th>Availability</th>
                <th>Make</th>
                <th>Model</th>
                <th>Condition</th>
                <th>Fuel Type</th>
                <th>Country</th>
                <th>Sale Price</th>
                <th>Actions</th>
                <th></th>
            </tr>

            <?php
                    
                $inventoryObj = new InventoryController;
                $resultSet = $inventoryObj->getVehicleByUserId( $_SESSION['UserID'] );

                while($row = $resultSet->fetch_assoc()){
                    $vehicleId = $row['VehicleId'];
                    echo "<tr>";
                        echo "<td>"; echo $row['VehicleClass']; echo "</td>";
                        echo "<td class='text-white'>";
                        if( $row['IsPurchasedByClient'] == 1 ){
                            echo $row['RegistrationNo'];
                        }else{
                            echo "<a class='text-white' href='EditVehicle.php?id=$vehicleId'> ".$row['RegistrationNo']." </a>";
                        }
                        echo "</td>";
                        echo "<td>"; echo $row['Availability']; echo "</td>";
                        echo "<td>"; echo $row['Make']; echo "</td>";
                        echo "<td>"; echo $row['Model']; echo "</td>";
                        echo "<td>"; echo $row['Status']; echo "</td>";
                        echo "<td>"; echo $row['FuelType']; echo "</td>";
                        echo "<td>"; echo $row['Country']; echo "</td>";
                        echo "<td>"; echo $row['SalePrice']; echo "</td>";
                        if( $row['IsPurchasedByClient'] == 1 ){
                            echo "<td>Vehicle has been purchased!</td>";
                        }else{
                            echo "<td>";
                                echo "<a class='text-white' href='EditVehicle.php?id=$vehicleId'><input type='button' name='editBtn' value=' Edit ' class='btn btn-link' /> </a> | <a href='DeleteVehicle.php?id=$vehicleId'><button type='submit' name='deleteBtn' value='Delete' class='btn btn-danger'> <span class='fas fa-trash-alt'></span> Delete </button> </a>";
                            echo "</td>";
                        }
                    echo "</tr>";
                }
                
            ?>

        </table>

    </div>

    </body>

</html>
