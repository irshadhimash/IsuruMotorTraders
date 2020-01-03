
<?php 

require('DBModel.php');

class SaleModel extends DBModel{
    
    function getAllVehicleByRegNo( $RegNo ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETVEHICLEBYREGNO('$RegNo')";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function updateVehicleAvailability( $RegNo ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UPDATEVEHICLEAVAILABILITY('$RegNo')";
            $connection->query($sqlQuery);
            $connection->next_result();
        }

    }

    function create( $vehicleNo, $userId, $price, $paymentMethod, $InitialPayment, $cxNIC ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call CREATESALE('$vehicleNo', $userId, $price, '$paymentMethod', $InitialPayment, '$cxNIC')";
            $connection->query($sqlQuery);
        }

        $connection->close();

    }

    function getSales(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETALLSALES()";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
        
    }

    function reverse($saleId, $regNo){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call REVERSESALE($saleId, '$regNo')";
            if ( $connection->query($sqlQuery) == true ){
                header('location:sales.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function getTotalSalesByMonth(){
        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetTotalSalesByMonth";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

    function getSalesThisMonthForReport(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_GetSalesThisMonth";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function getCashSaleProfitData(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_ProfitAnalysisCashSales";
            $result = $connection->query($sqlQuery);
            $connection->next_result();
        }

        $connection->close();
        return $result;

    }

    function getCashSaleProfitData_Total(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_ProfitAnalysisCashSales_Total";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function getInstallmentSaleProfitData(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_ProfitAnalysisInstallmentSales";
            $result = $connection->query($sqlQuery);
            $connection->next_result();
        }

        $connection->close();
        return $result;

    }

    function getInstallmentSaleProfitData_Total(){

        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_ProfitAnalysisInstallmentSales_Total";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

}
