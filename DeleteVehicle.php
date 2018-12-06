
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>

    <title>Home</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div class="well">

    <ol class="breadcrumb">
        <li> <a href="home.php">Home</a> </li>
        <li> <a href="inventory.php">Inventory</a> </li>
        <li class="active">Delete Vehicle</li>
    </ol>

        <form method="POST" action="#">
            <p> Confirm that you really need to delete the vehicle  </p>
            <a href="inventory.php"> Go back! </a>
            <input type="submit" name="deleteVehicleBtn" value="Delete!" class="btn btn-success"/>
        </form>
    </div>

</body>

</html>