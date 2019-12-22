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

        //$connection->close();
    }

}

?>
