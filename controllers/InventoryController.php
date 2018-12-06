
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

class InventoryController extends InventoryModel{
    
    function getAll(){
        
        return $this->getAllVehicles();

    }

    function addVehicle($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability){
        
        $msg = $this->create($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability);

        if( $msg == 'success'){
            echo ("<script type='text/javascript'> alert('Vehicle Added');</script>");
        }else{
            echo ("<script type='text/javascript'> alert('Failed".$msg."');</script>");
        }

    }

    function getVehicleForEdit($id){

        return $this->getVehicleById($id);

    }

    function updateVehicle($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability){

        $this->update($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability);
        
    }

    function deleteVehicle($id){
        
        $this->delete($id);

    }

    function getReport(){
        return $this->getReportByCountry();
    }

}

?>