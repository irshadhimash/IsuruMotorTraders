
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

class InventoryController extends InventoryModel{
    
    function getAll(){
        
        return $this->getAllVehicles();

    }

    function AddVehicle(){
        
        $IsVehicleNoValid = false;
        $IsCostValid = false;
        $IsSalePriceValid = false;
        $validationMsg = '';

        if ( strlen($_POST['registrationNo']) >= 6 && strlen($_POST['registrationNo']) <= 10 ){

            if( strpos( $_POST['registrationNo'], '-') != false ){
                $IsVehicleNoValid = true;
            }else{
                $validationMsg = $validationMsg."* Vehicle number must contain a '-'.<br/>";
            }

        }else{
            $validationMsg = $validationMsg."* Vehicle number must contain at least 6 characters.<br/>";
        }

        if( $_POST['cost'] > 0 ){
            $IsCostValid = true;
        }else{
            $validationMsg = $validationMsg."* Cost cannot be negative.<br/>";
        }

        if( $_POST['cost'] > 0  ){
            if( $_POST['salePrice'] >= $_POST['cost'] ){
                $IsSalePriceValid = true;
            }else{
                $validationMsg = $validationMsg."* Sale price must be larger than or equal to cost.<br/>";
            }
        }else{
            $validationMsg = $validationMsg."* Sale price cannot be negative or zero.<br/>";
        }

        if( $IsVehicleNoValid && $IsCostValid && $IsSalePriceValid ){

            if( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){

                $this->create($_POST['registrationNo'], $_POST['engineNo'], $_POST['vehicleClass'], $_POST['condition'], $_POST['fuelType'],
                             $_POST['country'], $_POST['make'], $_POST['model'], $_POST['cost'], $_POST['salePrice'], $_SESSION['UserID'], $_POST['availability'], 1);

            }elseif( $_SESSION['SystemRole'] == 'Trader' ){

                $this->create($_POST['registrationNo'], $_POST['engineNo'], $_POST['vehicleClass'], $_POST['condition'], $_POST['fuelType'],
                             $_POST['country'], $_POST['make'], $_POST['model'], $_POST['cost'], $_POST['salePrice'], $_SESSION['UserID'], $_POST['availability'], 0);

            }

        }else{
            echo ("<h4 style=color:red;>Please address following!<br/>".$validationMsg."</h4>");
        }

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

    function GetVehiclePurchasedByCustomer( $UserId ){
        return $this->GetVehicleByCustomerId( $UserId );
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
