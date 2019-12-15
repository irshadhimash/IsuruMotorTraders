<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InstallmentPaymentModel.php');

class InstallmentPaymentController extends InstallmentPaymentModel{
    
    function getAllInstallments(){
        return $this->getAllInstallmentPlanVehicles();
    }

    function payInstallment(){
        $this->createPayment($saleId, $amount);
    }

    function viewDetailsBySaleId($saleId){
        return $this->getInstallmentDetailsByItem($saleId);
    }

    function reverseInstallment($installmentPaymentId){
        $this->reversePayment($installmentPaymentId);
    }

}

?>
