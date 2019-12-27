<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SettingModel.php');

class SettingController extends SettingModel{

    function verify( $currentPW, $confirmedPW ){

        $SALT = 'This is my password salt!';

        if ( crypt($currentPW, $SALT) == $_SESSION['HashedPassword'] ){
            $this->updatePassword($_SESSION['Username'], crypt($confirmedPW, $SALT));
        }else{
            echo ("<script type='text/javascript'> alert('Password that you have entered is incorrect, please try again!');</script>");
        }

    }

    function getUser(){
        return $this->getUserById( $_SESSION['UserID']);
    }

    function updateUser(){
        $this->updateUserById( $_SESSION['UserID'], $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['gender'], $_POST['dob'], $_POST['address'], $_POST['email'], $_POST['telephone'] );
    }

    function verifyUsername(){

        if ( $_SESSION['Username'] == $_POST['currentUsername'] ){
            $this->checkUsernameAvailability( $_SESSION['UserID'], $_POST['currentUsername'], $_POST['newUsername'] );
        }else{
            echo ("<script type='text/javascript'> alert('Please enter your current username to proceed!');</script>");
        }
            
    }

}

?>
