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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	<link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>Vehicle Details</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>

<div class="well">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="inventory.php">Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vehicle Details</li>
        </ol>
    </nav>

<div class="card">
 <div class="card-heading"> Vehicle Registration No: <?php echo $vehicle['RegistrationNo']; ?> </div>
 <div class="card-body">
    <form method="post" action="#">

        <div class='col-lg-3'>
        Registration No
        </div>
        <div class='col-lg-4'>
            <input type="text" name="registrationNo" class="form-control" value="<?php echo $vehicle['RegistrationNo']; ?>" aria-describedby="basic-addon1">
        </div>

        <div class='col-lg-3'>
            Engine No
        </div>
        <div class='col-lg-4'>
            <input type="text" name="engineNo" class="form-control" value="<?php echo $vehicle['EngineNo']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Vehicle Class
        </div>
        <div class='col-lg-4'>
            <select name="vehicleClass" class="form-control">
                <option value="Motor Cycle" <?php if ($vehicle['VehicleClass'] == 'Motor Cycle') echo 'selected="selected"'; ?> > Motor Cycle </option>
                <option value="Car" <?php if ($vehicle['VehicleClass'] == 'Car') echo 'selected="selected"'; ?> > Car </option>
                <option value="Van" <?php if ($vehicle['VehicleClass'] == 'Van') echo 'selected="selected"'; ?> > Van </option>
                <option value="Bus" <?php if ($vehicle['VehicleClass'] == 'Bus') echo 'selected="selected"'; ?> > Bus </option>
            </select>
        </div>

        <div class='col-lg-3'>
            Condition
        </div>
        <div class='col-lg-4'>
            <select name="condition" class="form-control">
                <option value="Used" <?php if ($vehicle['Status'] == 'Used') echo 'selected="selected"'; ?> > Used </option>
                <option value="New" <?php if ($vehicle['Status'] == 'New') echo 'selected="selected"'; ?> > New </option>
            </select>
        </div>

        <div class='col-lg-3'>
            Fuel Type
        </div>
        <div class='col-lg-4'>
            <select name="fuelType" class="form-control">
                <option value="Petrol" <?php if ($vehicle['FuelType'] == 'Petrol') echo 'selected="selected"'; ?> > Petrol </option>
                <option value="Diesel" <?php if ($vehicle['FuelType'] == 'Diesel') echo 'selected="selected"'; ?> > Diesel </option>
            </select>
        </div>

        <div class='col-lg-3'>
            Country
        </div>
        <div class='col-lg-4'>
            <input type="text" name="country" class="form-control" value="<?php echo $vehicle['Country']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Make
        </div>
        <div class='col-lg-4'>
            <input type="text" name="make" class="form-control" value="<?php echo $vehicle['Make']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Model
        </div>
        <div class='col-lg-4'>
            <input type="text" name="model" class="form-control" value="<?php echo $vehicle['Model']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Cost
        </div>
        <div class='col-lg-4'>
            <input type="text" name="cost" class="form-control" value="<?php echo $vehicle['Cost']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Sale Price
        </div>
        <div class='col-lg-4'>
            <input type="text" name="salePrice" class="form-control" value="<?php echo $vehicle['SalePrice']; ?>" aria-describedby="basic-addon2">
        </div>

        <div class='col-lg-3'>
            Availability
        </div>
        <div class='col-lg-4'>
            <select name="availability" class="form-control">
                <option value="Available" <?php if ($vehicle['Availability'] == 'Available') echo 'selected="selected"'; ?> > Available </option>
                <option value="Sold" <?php if ($vehicle['Availability'] == 'Sold') echo 'selected="selected"'; ?> > Sold </option>
            </select>
        </div>

        <div class='col-lg-3'>
        </div>
        <div class='col-lg-4'>
            Click to update info: <input type="submit" name="updateVehicleBtn" value="Update" class="btn btn-success"/> <!--<span class="glyphicon glyphicon-plus"><span> Add Vehicle-->
        </div>

    </form>
  </div>
 </div>
</div>

    
</body>

</html>