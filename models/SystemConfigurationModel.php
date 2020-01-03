
<?php 

require('DBModel.php');

class SystemConfigurationModel extends DBModel{

    function GetAllModules(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETModuleList()";
			$resultSet = $connection->query($sqlQuery);
		}

		$connection->close();
		return $resultSet;
		
	}
	
	function GetModuleByModuleId( $moduleId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GetModuleById($moduleId)";
			$resultSet = $connection->query($sqlQuery);
		}

		$connection->close();
		return $resultSet;
		
	}

	function UpdateModuleById( $moduleId, $mName, $mDesc ){

		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
			$sqlQuery = "call UpdateModuleById( $moduleId, '$mName', '$mDesc' )";
			if ( $connection->query($sqlQuery) == true ){
                header('location:SystemModule.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
		}
		
	}

}

?>
