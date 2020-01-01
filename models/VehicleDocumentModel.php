<?php

require('DBModel.php');

class VehicleDocumentModel extends DBModel{

    function getVehicleDocumentsByVehicleNo( $vno ){
        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetVehicleDocumentByVehicleNo('$vno')";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }
}

?>
