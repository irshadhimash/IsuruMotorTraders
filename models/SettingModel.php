<?php 

require('DBModel.php');

class SettingModel extends DBModel{

    function getHashedPasswordByUserID( $UserID ){

        $user = array();
        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetPasswordByUserId($UserID)";
            $result = $connection->query($sqlQuery);
            $user = $result->fetch_assoc();
        }

        //$connection->close();
        return $user;

    }

    function updatePassword($username, $password){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UpdatePassword('$username', '$password')";
            if ( $connection->query($sqlQuery) == true ){
                echo ("<script type='text/javascript'> alert('Your password has been changed successfully!');</script>");
                $_SESSION['HashedPassword'] = $password;
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

    }

    function getUserById( $UserID){
        $user = array();
        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETUSERBYID($UserID)";
            $result = $connection->query($sqlQuery);
            $user = $result->fetch_assoc();
        }

        //$connection->close();
        return $user;
    }

    function checkUsernameAvailability($username){
		
		$connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETUSERFORLOGIN('$username') ";
			$resultSet = $connection->query($sqlQuery);
            $user = $resultSet->fetch_assoc();
            
            if ($user['Username'] == null | $user['Username'] == ''){
                
                //$this->updateUserByUserId();

            }else{
                echo ("<script type='text/javascript'> alert('Already there is a user with that username. Please pick a different one!');</script>");
            }

        }

    }

    function updateUserById( $uid, $fname, $lname, $pname, $gender, $dob, $address, $email, $telephone ){
        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UpdateUserById($uid, '$fname', '$lname', '$pname', '$gender', '$dob', '$address', '$email', '$telephone')";
            if ( $connection->query($sqlQuery) == true ){
                echo ("<script type='text/javascript'> alert('Your details have been updated successfully!');</script>");
                $_SESSION['PreferedName'] = $pname;
                header('location:MySettings.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }
    }

}

?>
