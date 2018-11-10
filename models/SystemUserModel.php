
<?php

require('DBModel.php');

class SystemUserModel extends DBModel{
	
	private $user = array();

	function checkUsernameAvailability($username){
		
		$connection = $this->initDBConnection();



	}

    function create(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETUSERFORLOGIN('$username') ";
			$resultSet = $connection->query($sqlQuery);
			$this->user = $resultSet->fetch_assoc();
        }
        
	}

}

?>