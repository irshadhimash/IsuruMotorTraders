
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

class InventoryController extends InventoryModel{
    
    function getAll(){
        
        return $this->getAllVehicles();

    }

    function addVehicle($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability, $isPurchased){
        
        $this->create($registrationNo, $engineNo, $vehicleClass, $condition, $fuelType, $country, $make, $model, $cost, $salePrice, $UserId, $availability, $isPurchased );

        /*if( $msg == 'success'){
            if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                header('location:inventory.php');
            }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                header('location:TraderPortal.php');
            }
        }else{
            echo ("<script type='text/javascript'> alert('Failed".$msg."');</script>");
        }*/

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

    function getVehicleCountByCountry(){
        return $this->getVehicleCountByCountryForReport();
    }

}

?>
