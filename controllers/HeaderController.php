<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/HeaderModel.php');

class HeaderController extends HeaderModel{

    function logout(){
        header('location:index.php');
    }

}

/*$headerObj = new HeaderController;

if ( isset($_POST['logout']) ){
    $headerObj->logout();
}*/

if ( isset( $_SESSION['UserID'] && $_SESSION['IsLoggedIn'] == true ) ){
    header('location:home.php');
}else{
    header('location:index.php');
}

?>

