<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemModuleModel.php');

class HomeController extends SystemModuleModel{

    function getModulesByRoleCode($roleCode){

        return $this->getModuleListByRoleCode($roleCode);
        
    }

    function getTotalSalesByMonth(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetTotalSalesByMonth";
            $result = $connection->query($sqlQuery);
            $connection->next_result();
        }
        return $result;
    }

    function getTotalInstallmentSalesByMonth(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetTotalInstallmentSalesByMonth";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

}

?>
