
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

}