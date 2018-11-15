<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemModuleModel.php');

class HomeController extends SystemModuleModel{

    function getModulesByRoleCode($roleCode){

        $moduleList = $this->getModuleListByRoleCode($roleCode);
        $_SESSION['ModuleList'] = $moduleList;
    }

    /*foreach($_SESSION['ModuleList'] as $module){
        echo ("<div class='col-lg-4'>
            <a href='#'>
                <img class='square' src='images/appicons/money.png' alt='Generic placeholder image' width='180' height='180'>
            </a>
            <h2>".$module['1']."</h2>
            <p>View and manage your costs, revenue and profit.</p>
        </div> ");
    }*/

}

$homeObj = new HomeController;
$homeObj->getModulesByRoleCode($_SESSION['UserRole']);

?>