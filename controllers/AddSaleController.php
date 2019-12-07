<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SaleModel.php');

class AddSaleController extends SaleModel{

    function search( $RegNo ){
        return $this->getAllVehicleByRegNo($RegNo);
    }

    function updateAvailability( $RegNo ){
        $this->updateVehicleAvailability( $RegNo );
    }

    function createSale( $vehicleNo, $userId, $price ){
        $this->create( $vehicleNo, $userId, $price );
        $link = 'location:bill.php?RegistrationNo='.$_SESSION['RegistrationNo'].'&Make='.$_SESSION['Make'].'&Model='.$_SESSION['Model'].'&SalePrice='.$_POST['SalePrice'];
        header($link);
    }

}

?>
