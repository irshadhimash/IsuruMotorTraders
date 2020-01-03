
<?php

require('DBModel.php');

class SystemUserModel extends DBModel{
	
	private $user = array();


	function GetAll(){
		
		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllUsers()";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
		return $result;
		
	}

	function GetUserById( $userid ){
		
		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetUserById($userid)";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
		return $result;
		
	}

	function CheckUsernameAvailability( $Username ){
		
        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            
			$sqlQuery = "call GETUSERFORLOGIN('$Username') ";
			$resultSet = $connection->query($sqlQuery);
			$user = $resultSet->fetch_assoc();

            $resultSet->close();
            $connection->next_result();

            if ($user['Username'] == null | $user['Username'] == ''){
				return true;
            }else{
                return false;
            }

        }

	}
	
    function create( $istrader, $iscustomer, $isemployee, $firstname, $lastname, $preferedname, $address, $gender, $DOB, $email, $username, $hashedpw, $isadmin, $nic ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){

			echo "Cannot connect to the database:".$connection->connect_error;

		}else{

			$sqlQuery = "call CREATEUSER( '$istrader', '$iscustomer', '$isemployee', '$firstname', '$lastname', '$preferedname', '$address', '$gender', '$DOB', '$email', '$username', '$hashedpw', '$isadmin', '$nic')";
			if ( $connection->query($sqlQuery) == true ){
				$connection->close();
				header('Location:SystemUser.php');
			}else{
				echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
				$connection->close();
			}

        }
        
	}

	function getTraders(){

		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllTraders()";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
	}

	function GetCustomers(){

		$connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetAllCustomers()";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
	}

	function delete( $userid ){

		$connection = $this->initDBConnection();

		if($connection->connect_error){

			echo "Cannot connect to the database:".$connection->connect_error;

		}else{

			$sqlQuery = "call DeleteUser( $userid )";
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
