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

}

?>
