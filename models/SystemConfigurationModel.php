
<?php 

require('DBModel.php');

class SystemConfigurationModel extends DBModel{

    function getModuleList(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETModuleList()";
			$resultSet = $connection->query($sqlQuery);
			$this->user = $resultSet->fetch_assoc();
		}

    }

}

?>