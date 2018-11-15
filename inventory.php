
<?php
    require('controllers/InventoryController.php');
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--Data Table-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>
    <!--Data Table-->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <title>Inventory</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
    
    <a>Add New</a>
    <table class="table" id="vehicles">

		<tr>
			<th>Registration No</th>
            <th>Engine No</th>
            <th>Vehicle Class</th>
            <th>Status</th>
            <th>Fuel Type</th>
            <th>Country</th>
            <th>Make</th>
            <th>Model</th>
            <th>Cost</th>
            <th>Sale Price</th>
			<th>Listed By</th>
            
		</tr>

        <?php

            $con = new mysqli("localhost", "root", "", "IsuruMotorTraders");
            
            if($con->connect_error){
                echo "Cannot connect to the database:".$con->connect_error;
            }else{
                $sqlQuery = "SELECT
                        V.*,
                        SU.PreferedName AS ListedBy
                    FROM vehicle v
                    LEFT OUTER JOIN systemuser SU
                        ON V.UserId = SU.UserId";
                
                $resultSet = $con->query($sqlQuery);

                while($row = $resultSet->fetch_assoc()){
                    $vehicleId = $row['VehicleId'];
                    echo "<tr>";
                        echo "<td>"; echo $row['RegistrationNo']; echo "</td>";
                        echo "<td>"; echo $row['EngineNo']; echo "</td>";
                        echo "<td>"; echo $row['VehicleClass']; echo "</td>";
                        echo "<td>"; echo $row['Status']; echo "</td>";
                        echo "<td>"; echo $row['FuelType']; echo "</td>";
                        echo "<td>"; echo $row['Country']; echo "</td>";
                        echo "<td>"; echo $row['Make']; echo "</td>";
                        echo "<td>"; echo $row['Model']; echo "</td>";
                        echo "<td>"; echo $row['Cost']; echo "</td>";
                        echo "<td>"; echo $row['SalePrice']; echo "</td>";
                        echo "<td>"; echo $row['ListedBy']; echo "</td>";
                        echo "<td>";
						echo "<a href='EditVehicle.php?id=$vehicleId'><input type='button' name='editBtn' value=' Edit ' class='btn btn-link' /> </a> | <a href='DeleteVehicle.php?id=$vehicleId'><input type='submit' name='deleteBtn' value='Delete' class='btn btn-link' /> </a>";
						echo "</td>";
                    echo "</tr>";
                }

            }
        ?>

    </table>

<script type="text/javascript">
$(document).ready( function () {
    $('#vehicles').DataTable();
} );
</script>    

</body>

</html>