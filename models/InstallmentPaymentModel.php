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

    function GetInstallmentsByRegNo( $RegNo ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetInstallmentsByRegNo( '$RegNo' )";
            $result = $connection->query($sqlQuery);
        }

        return $result;
        $connection->close();

    }

    function getInstallmentDetailsByItem($saleId){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllInstallmentBySaleId($saleId)";
            $result = $connection->query($sqlQuery);
        }

        return $result;
        $connection->close();

    }

    function reversePayment($installmentPaymentId){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call ReverseInstallment($installmentPaymentId)";
            if ( $connection->query($sqlQuery) == true ){
                header('location:InstallmentPayment.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function createPayment($saleId, $amount){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call CreateInstallmentPayment($saleId, $amount)";
            if ( $connection->query($sqlQuery) == true ){
                header('location:#');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

}

?>
