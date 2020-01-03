
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemUserModel.php');

class UserController extends SystemUserModel{
    
    function GetUser( $userid ){
        return $this->GetUserById( $userid );
    }

    function getAllTraders(){
        
        return $this->getTraders();

    }

    function deleteUser( $userid ){
        
        $msg = $this->delete( $userid );

        if ( $msg == 'success' ){
		    header('location:Traders.php');
        }

    }

    function GetAllUsers(){
        return $this->GetAll();
    }

    function AddUser(){
        
    }

}

?>
