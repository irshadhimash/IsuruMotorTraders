
<?php

require('DBModel.php');

class InventoryModel extends DBModel{

    private $result = null;

    function create($RegistrationNo, $EngineNo, $VehicleClass, $Status, $FuelType, $Country, $Make, $Model, $Cost, $SalePrice, $UserId, $Availability){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            $sqlQuery = "call CREATEVEHICLE('$RegistrationNo', '$EngineNo', '$VehicleClass', '$Status',
                         '$FuelType', '$Country', '$Make', '$Model', '$Cost', '$SalePrice', $UserId, '$Availability')";
            if ( $connection->query($sqlQuery) == true ){
                header('location:inventory.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }
        $connection->close();

    }

    function getAllVehicles(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETALLVEHICLES";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function getVehicleById($id){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETVEHICLEBYID('$id')";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function update($RegistrationNo, $EngineNo, $VehicleClass, $Status, $FuelType, $Country, $Make, $Model, $Cost, $SalePrice, $UserId, $Availability){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UPDATEVEHICLE('$RegistrationNo', '$EngineNo', '$VehicleClass', '$Status',
                            '$FuelType', '$Country', '$Make', '$Model', '$Cost', '$SalePrice', $UserId, '$Availability')";
            if ( $connection->query($sqlQuery) == true ){
                header('location:inventory.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

}

?>