
<?php

//session_start();

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
            
            if ($user == null | $user == ''){
                
                $this->create();
                //echo ("<script type='text/javascript'> alert('user added');</script>");
            }else{
                echo ("<script type='text/javascript'> alert('Already there is a user with that username. Please pick a different one!');</script>");
            }

        }

	}

}

if( isset($_POST['tSaveBtn']) ){

    $TraderSignUp = new TraderSignUpController;
    $TraderSignUp->checkUsernameAvailability($_POST['tUsername']);

}

?>