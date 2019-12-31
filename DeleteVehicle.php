
<?php

    require("controllers/InventoryController.php");

    $vehicleId = $_GET['id'];

    if( isset($_POST['deleteVehicleBtn']) ){

        $inventoryObj = new InventoryController;
        $inventoryObj->deleteVehicle($vehicleId);
    }

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

    <title>Home</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div class="well">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
                if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                    echo ("
                    <li class='breadcrumb-item'><a href='home.php'>Home</a></li>
                    <li class='breadcrumb-item'><a href='inventory.php'>Inventory</a></li>");
                }
            ?>
            <li class="breadcrumb-item active" aria-current="page">Delete Vehicle</li>
        </ol>
    </nav>

        <form method="POST" action="#">
            <h2> Confirm that you really need to delete the vehicle  </h2>
            <a href="inventory.php"> Go back! </a>
            <input type="submit" name="deleteVehicleBtn" value="Delete!" class="btn btn-danger"/>
        </form>
    </div>

</body>

</html>