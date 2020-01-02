<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SaleModel.php');

class SaleController extends SaleModel{

    function logout(){
        header('location:index.php');
    }

    function getAllSales(){
        return $this->getSales();
    }

    function reverseSale($saleId, $regNo){
        $this->reverse($saleId, $regNo);
    }

    function getSalesThisMonth(){
        return $this->getSalesThisMonthForReport();
    }

    function getCashSaleProfitDataForReport(){
        return $this->getCashSaleProfitData();
    }

    function getCashSaleProfitTotalDataForReport(){
        return $this->getCashSaleProfitData_Total();
    }

    function getInstallmentSaleProfitDataForReport(){
        return $this->getInstallmentSaleProfitData();
    }

    function getInstallmentSaleProfitTotalDataForReport(){
        return $this->getInstallmentSaleProfitData_Total();
    }

}

?>
