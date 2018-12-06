<?php 

    require('controllers/InventoryController.php');

    $inventoryObj = new InventoryController;
    $vehicle = null;
    $resultSet = null;

    if( isset($_POST['updateVehicleBtn']) ){
        $inventoryObj->updateVehicle( $_POST['registrationNo'], $_POST['engineNo'], $_POST['vehicleClass'], $_POST['condition'], $_POST['fuelType'],
                    $_POST['country'], $_POST['make'], $_POST['model'], $_POST['cost'], $_POST['salePrice'], $_SESSION['UserID'], $_POST['availability']);
    }else{
        $resultSet = $inventoryObj->getVehicleForEdit($_GET['id']);
        $vehicle = $resultSet->fetch_assoc();
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

    <title>Vehicle Details</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>

<div class="well">

<ol class="breadcrumb">
    <li> <a href="home.php">Home</a> </li>
    <li> <a href="inventory.php">Inventory</a> </li>
    <li class="active">Vehicle Details</li>
</ol>

<div class="panel panel-primary">
 <div class="panel-heading"> Vehicle Registration No: <?php echo $vehicle['RegistrationNo']; ?> </div>
 <div class="panel-body">
    <form method="post" action="#">

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Registration No</span>
            <input type="text" name="registrationNo" class="form-control" value="<?php echo $vehicle['RegistrationNo']; ?>" aria-describedby="basic-addon1">
        </div> </br>

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Engine No</span>
            <input type="text" name="engineNo" class="form-control" value="<?php echo $vehicle['EngineNo']; ?>" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Vehicle Class</span>
            <select name="vehicleClass" class="form-control">
                <option value="Motor Cycle" <?php if ($vehicle['VehicleClass'] == 'Motor Cycle') echo 'selected="selected"'; ?> > Motor Cycle </option>
                <option value="Car" <?php if ($vehicle['VehicleClass'] == 'Car') echo 'selected="selected"'; ?> > Car </option>
                <option value="Van" <?php if ($vehicle['VehicleClass'] == 'Van') echo 'selected="selected"'; ?> > Van </option>
                <option value="Bus" <?php if ($vehicle['VehicleClass'] == 'Bus') echo 'selected="selected"'; ?> > Bus </option>
            </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Condition</span>
            <select name="condition" class="form-control">
                <option value="Used" <?php if ($vehicle['Status'] == 'Used') echo 'selected="selected"'; ?> > Used </option>
                <option value="New" <?php if ($vehicle['Status'] == 'New') echo 'selected="selected"'; ?> > New </option>
            </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Fuel Type</span>
            <select name="fuelType" class="form-control">
                <option value="Petrol" <?php if ($vehicle['FuelType'] == 'Petrol') echo 'selected="selected"'; ?> > Petrol </option>
                <option value="Diesel" <?php if ($vehicle['FuelType'] == 'Diesel') echo 'selected="selected"'; ?> > Diesel </option>
            </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Country</span>
            <input type="text" name="country" class="form-control" value="<?php echo $vehicle['Country']; ?>" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Make</span>
            <input type="text" name="make" class="form-control" value="<?php echo $vehicle['Make']; ?>" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Model</span>
            <input type="text" name="model" class="form-control" value="<?php echo $vehicle['Model']; ?>" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Cost</span>
            <input type="text" name="cost" class="form-control" value="<?php echo $vehicle['Cost']; ?>" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Sale Price</span>
            <input type="text" name="salePrice" class="form-control" value="<?php echo $vehicle['SalePrice']; ?>" aria-describedby="basic-addon2">
        </div> </br>


        <div class="input-group">
            <span class="input-group-addon">Availability</span>
            <select name="availability" class="form-control">
                <option value="Available" <?php if ($vehicle['Availability'] == 'Available') echo 'selected="selected"'; ?> > Available </option>
                <option value="Sold" <?php if ($vehicle['Availability'] == 'Sold') echo 'selected="selected"'; ?> > Sold </option>
            </select>
        </div> </br>

        <div class="input-group">
            <input type="submit" name="updateVehicleBtn" value="Update" class="btn btn-success"/> <!--<span class="glyphicon glyphicon-plus"><span> Add Vehicle-->
        </div> </br>

    </form>
  </div>
 </div>
</div>

    
</body>

</html>