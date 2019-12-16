<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SettingModel.php');

class SettingController extends SettingModel{

    function verify( $currentPW, $confirmedPW ){

        $user = $this->getHashedPasswordByUserID($_SESSION['UserID']);

        $SALT = 'This is my password salt!';
        $currentPW = crypt($currentPW, $SALT);

        if ( $currentPW = $user['HashedPassword'] ){
            //$this->changePassword();
            echo ("<script type='text/javascript'> alert('Password changed');</script>");
        }else{
            echo ("<script type='text/javascript'> alert('Password that you have entered is incorrect, please try again!');</script>");
        }

    }

}

?>
