
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemConfigurationModel.php');

class SystemConfigurationController extends SystemConfigurationModel{

    function GetModuleList(){
        return $this->GetAllModules();
    }

    function GetModuleDetail( $moduleId ){
        return $this->GetModuleByModuleId( $moduleId );
    }

    function UpdateModuleDetails( $moduleId, $mName, $mDesc ){
        $this->UpdateModuleById( $moduleId, $mName, $mDesc );
    }

}

?>
