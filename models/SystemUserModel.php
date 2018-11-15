
<?php

require('DBModel.php');

class SystemUserModel extends DBModel{
	
	private $user = array();

    function create( $istrader, $iscustomer, $isemployee, $firstname, $lastname, $preferedname, $address, $gender, $DOB, $email, $username, $hashedpw, $isadmin ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){

			echo "Cannot connect to the database:".$connection->connect_error;

		}else{

			$sqlQuery = "call CREATEUSER( '$istrader', '$iscustomer', '$isemployee', '$firstname', '$lastname', '$preferedname', '$address', '$gender', '$DOB', '$email', '$username', '$hashedpw', '$isadmin')";
			if ( $connection->query($sqlQuery) == true ){
				$connection->close();
				return 'success';
			}else{
				echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
				$connection->close();
				return 'failed';
			}

        }
        
	}

}

?>