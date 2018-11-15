
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

class InventoryController extends InventoryModel{
    
    function getAll(){

        global $vehicles;
        return $this->getAllVehicles();

    }

}

?>