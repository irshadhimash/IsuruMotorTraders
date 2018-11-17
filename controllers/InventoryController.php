
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

class InventoryController extends InventoryModel{
    
    function getAll(){
        
        return $this->getAllVehicles();

    }

    function addVehicle($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability){
        
        $this->create($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability);

    }

    function getVehicleForEdit($id){

        return $this->getVehicleById($id);

    }

    function updateVehicle($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability){

        $this->update($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability);
        
    }

}

?>