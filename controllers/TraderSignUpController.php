
<?php

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemUserModel.php');

class TraderSignUpController extends SystemUserModel{

    function checkUsernameAvailability($username){
		
		$connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
			$sqlQuery = "call GETUSERFORLOGIN('$username') ";
			$resultSet = $connection->query($sqlQuery);
            $user = $resultSet->fetch_assoc();
            $resultSet->close();
            $connection->next_result();
            
            if ($user['Username'] == null | $user['Username'] == ''){
                
                $this->createTrader();

            }else{
                echo ("<script type='text/javascript'> alert('Already there is a user with that username. Please pick a different one!');</script>");
            }

        }

    }
    
    function createTrader(){

        $SALT = 'This is my password salt!';
        $HashedPw = crypt($_POST['tPassword'], $SALT);
        $msg = $this->create( 'y', 'n', 'n', $_POST['tFirstName'], $_POST['tLastName'], $_POST['tPreferedName'], $_POST['tAddress'],
                                 $_POST['tGender'], $_POST['tDob'], $_POST['tEmail'], $_POST['tUsername'], $HashedPw , 'n' );

        if($msg == 'success'){
            header('location:home.php');
        }else{
            echo ("<script type='text/javascript'> alert('$msg');</script>");
        }

    }

}

?>