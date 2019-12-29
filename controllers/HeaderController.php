<?php

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/HeaderModel.php');

class HeaderController extends HeaderModel{

    function logout(){
        session_destroy();
        header('location:index.php');
    }

}

if ( isset( $_SESSION['UserID'] ) && $_SESSION['IsLoggedIn'] == true ){
    
}else{
    header('location:index.php');
}

?>
