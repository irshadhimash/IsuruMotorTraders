
<?php 

require('DBModel.php');

class SaleModel extends DBModel{
    
    function getAllVehicleByRegNo( $RegNo ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETVEHICLEBYREGNO('$RegNo')";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function updateVehicleAvailability( $RegNo ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UPDATEVEHICLEAVAILABILITY('$RegNo')";
            $connection->query($sqlQuery);
        }

    }

    function create( $vehicleNo, $userId, $price ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call CREATESALE('$vehicleNo', $userId, $price)";
            $connection->query($sqlQuery);
        }

        $connection->close();

    }

    function getSales(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETALLSALES()";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
        
    }

}