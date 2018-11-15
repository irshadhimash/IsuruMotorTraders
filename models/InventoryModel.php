
<?php

require('DBModel.php');

class InventoryModel extends DBModel{

    private $vehicles = null;

    function create($RegistrationNo, $EngineNo, $VehicleClass, $Status, $FuelType, $Country, $Make, $Model, $Cost, $SalePrice){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            $sqlQuery = "call CREATEVEHICLE('$RegistrationNo', '$EngineNo', '$VehicleClass', '$Status',
                         '$FuelType', '$Country', '$Make', '$Model', '$Cost', '$SalePrice')";
            if ( $connection->query($query) == true ){
                header('location:inventory.php');
            }else{
                echo ("<script type='text/javascript'> alert('Failed');</script>");
            }
        }
        $connection->close();

    }

    function getAllVehicles(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "SELECT
                            V.*,
                            SU.PreferedName AS ListedBy
                        FROM vehicle v
                        LEFT OUTER JOIN systemuser SU
                            ON V.UserId = SU.UserId";
            $result = $connection->query($sqlQuery);
            $this->vehicles = $result->fetch_assoc();
        }

        return $this->vehicles;

    }

}

?>