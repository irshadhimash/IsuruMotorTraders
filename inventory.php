
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
            <li class="breadcrumb-item active" aria-current="page">Inventory</li>
        </ol>
    </nav>

    <a class="link" href="AddVehicle.php"> <span class="glyphicon glyphicon-plus"></span> Add New Vehicle </a>
    </br>
    <table class="table" id="vehiclesTable">

		<tr>
            <th>Vehicle Class</th>
			<th>Registration No</th>
            <th>Make</th>
            <th>Model</th>
            <th>Status</th>
            <th>Fuel Type</th>
            <th>Country</th>
            <th>Sale Price</th>
			<th>Listed By</th>
            <th>Actions</th>
            
		</tr>

        <?php
                
            $inventoryObj = new InventoryController;
            $resultSet = $inventoryObj->getAll();

            while($row = $resultSet->fetch_assoc()){
                $vehicleId = $row['VehicleId'];
                echo "<tr>";
                    echo "<td>"; echo $row['VehicleClass']; echo "</td>";
                    echo "<td>"; 
                        echo "<a href='EditVehicle.php?id=$vehicleId'> ".$row['RegistrationNo']." </a>";//echo $row['VehicleClass']; 
                    echo "</td>";
                    echo "<td>"; echo $row['Make']; echo "</td>";
                    echo "<td>"; echo $row['Model']; echo "</td>";
                    echo "<td>"; echo $row['Status']; echo "</td>";
                    echo "<td>"; echo $row['FuelType']; echo "</td>";
                    echo "<td>"; echo $row['Country']; echo "</td>";
                    echo "<td>"; echo $row['SalePrice']; echo "</td>";
                    echo "<td>"; echo $row['ListedBy']; echo "</td>";
                    if( $_SESSION['UserRole'] == 'Admin' ){
                    echo "<td>";
                        echo "<a href='EditVehicle.php?id=$vehicleId'><input type='button' name='editBtn' value=' Edit ' class='btn btn-link' /> </a> | <a href='DeleteVehicle.php?id=$vehicleId'><input type='submit' name='deleteBtn' value='Delete' class='btn btn-danger' /> </a>";
                    echo "</td>";
                    }
                echo "</tr>";
            }
            
        ?>

    </table>

</div>
<script type="text/javascript">
$(document).ready( function () {
    $('#vehiclesTable').DataTable();
} );
</script>    

</body>

</html>
