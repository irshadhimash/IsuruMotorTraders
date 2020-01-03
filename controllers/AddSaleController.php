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

    function createSale(){

        $isNICValid = false;
        $isInitialAmountValid = false;
        $validationMsg = '';

        if ( strlen($_POST['cxNIC']) == 10 && strpos( $_POST['cxNIC'], 'V') != false ){
            $isNICValid = true;
        }else{
            $validationMsg = $validationMsg."* Please enter a valid NIC.<br/>";
        }

        if( $_POST['paymentMethod'] == 'Installment' ){
            if( $_POST['InitialPayment'] < ($_POST['SalePrice']/10) ){
                $validationMsg = $validationMsg."* Initial payment for installment plan must include 10% of sale price.<br/>";
            }else{
                $isInitialAmountValid = true;
            }
        }else{
            $isInitialAmountValid = true;
        }

        if( $isNICValid && $isInitialAmountValid ){
            $this->updateAvailability( $_SESSION['RegistrationNo'] );
            $this->create( $_SESSION['RegistrationNo'], $_SESSION['UserID'], $_POST['SalePrice'], $_POST['paymentMethod'], $_POST['InitialPayment'], $_POST['cxNIC'] );
            $link = 'location:bill.php?RegistrationNo='.$_SESSION['RegistrationNo'].'&Make='.$_SESSION['Make'].'&Model='.$_SESSION['Model'].'&SalePrice='.$_POST['SalePrice'].'&PaymentMethod='.$_POST['paymentMethod'].'&InitialPayment='.$_POST['InitialPayment'].'&CxNIC='.$_POST['cxNIC'];
            header($link);
        }else{
            echo ("<h4 style=color:red;>Please address following!<br/>".$validationMsg."</h4>");
        }
        

    }

}

?>
