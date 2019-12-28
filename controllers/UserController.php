
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemUserModel.php');

class UserController extends SystemUserModel{
    
    function getAllTraders(){
        
        return $this->getTraders();

    }

}

?>
