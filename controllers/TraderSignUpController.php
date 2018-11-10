
<?php

//session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemUserModel.php');

class TraderSignUpController extends SystemUserModel{



}

if( isset($_POST['tSaveBtn']) ){
    echo ("<script type='text/javascript'> alert('user added');</script>");
}

?>