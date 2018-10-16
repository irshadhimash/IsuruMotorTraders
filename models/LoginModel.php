
<?php 

require('DBModel.php');

class LoginModel extends DBModel{

	private $user = array();

	function getUser($username){
		
		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETUSERFORLOGIN('$username') ";
			$resultSet = $connection->query($sqlQuery);
			$this->user = $resultSet->fetch_assoc();
		}

		return $this->user;

	}

}

?>