<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InstallmentPaymentModel.php');

class InstallmentPaymentController extends InstallmentPaymentModel{
    
    function getAllInstallments(){
        return $this->getAllInstallmentPlanVehicles();
    }

    function payInstallment(){

    }

    function payAndSettle(){
        return $this->getInstallmentDetailsByItem($RegNo);
    }

}

?>
