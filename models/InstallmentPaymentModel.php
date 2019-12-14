<?php 

require('DBModel.php');

class InstallmentPaymentModel extends DBModel{

    function getAllInstallmentPlanVehicles(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllInstallmentPlanVehicles()";
            $result = $connection->query($sqlQuery);
        }

        return $result;
        $connection->close();
        
    }

    function getInstallmentDetailsByItem($RegNo){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllInstallmentPlanVehicles()";
            $result = $connection->query($sqlQuery);
        }

        return $result;
        $connection->close();

    }

}

?>
