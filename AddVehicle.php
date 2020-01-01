
<?php
    require('controllers/InventoryController.php');
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

    <title>Inventory - Add Vehicle</title>

</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

<div class="well">

<ol class="breadcrumb">
    <?php
        if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
            echo ("
            <li class='breadcrumb-item'><a href='home.php'>Home</a></li>
            <li><a href='inventory.php'>Inventory</a></li>");
        }elseif( $_SESSION['SystemRole'] == 'Trader' ){
            echo ("
            <li class='breadcrumb-item'><a href='TraderPortal.php'>Home</a></li>");
        }elseif( $_SESSION['SystemRole'] == 'Customer' ){
            echo ("
            <li class='breadcrumb-item'><a href='CustomerPortal.php'>Home</a></li>");
        }
    ?>
  <li class="active">Add Vehicle</li>
</ol>

<div class="panel panel-primary">
 <div class="panel-heading">Add new vehicle</div>
 <div class="panel-body">
    <form method="post" action="#">

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Registration No</span>
            <input type="text" name="registrationNo" required class="form-control" placeholder="Format xx-xxxx" aria-describedby="basic-addon1">
        </div> </br>

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Engine No</span>
            <input type="text" name="engineNo" required class="form-control" placeholder="Engine No" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group mb-3">
            <span class="input-group-addon" id="basic-addon1">Vehicle Class</span>
            <select name="vehicleClass" class="form-control">
                <option value="Motor Cycle"> Motor Cycle </option>
                <option value="Car"> Car </option>
                <option value="Van"> Van </option>
                <option value="Bus"> Bus </option>
            </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Condition</span>
            <select name="condition" class="form-control"> <option value="Used"> Used </option> <option value="New"> New </option> </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Fuel Type</span>
            <select name="fuelType" class="form-control"> <option value="Petrol"> Petrol </option> <option value="Diesel"> Diesel </option> </select>
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Country</span>
            <input type="text" required name="country" class="form-control" placeholder="Country" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Make</span>
            <input type="text" required name="make" class="form-control" placeholder="Make" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Model</span>
            <input type="text" required name="model" class="form-control" placeholder="Model" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Cost</span>
            <input type="text" required name="cost" class="form-control" placeholder="Cost" aria-describedby="basic-addon2">
        </div> </br>

        <div class="input-group">
            <span class="input-group-addon">Sale Price</span>
            <input type="text" required name="salePrice" class="form-control" placeholder="Sale Price" aria-describedby="basic-addon2">
        </div> </br>


        <div class="input-group">
            <span class="input-group-addon">Availability</span>
            <select name="availability" required class="form-control"> <option value="Available"> Available </option> <option value="Sold"> Sold </option> </select>
        </div> </br>

        <div class="input-group">
            <input type="submit" name="addVehicleBtn" value="Add Vehicle" class="btn btn-success"/> <!--<span class="glyphicon glyphicon-plus"><span> Add Vehicle-->
        </div> </br>

    </form>
  </div>
 </div>

</div>

</body>

<?php

if ( isset($_POST['addVehicleBtn']) ){

    $inventoryObj = new InventoryController;
    $inventoryObj->addVehicle($_POST['registrationNo'], $_POST['engineNo'], $_POST['vehicleClass'], $_POST['condition'], $_POST['fuelType'],
                     $_POST['country'], $_POST['make'], $_POST['model'], $_POST['cost'], $_POST['salePrice'], $_SESSION['UserID'], $_POST['availability']);

}

?>

</html>