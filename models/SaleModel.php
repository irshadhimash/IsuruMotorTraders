
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
        }

    }

    function create( $vehicleNo, $userId, $price, $paymentMethod, $InitialPayment ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call CREATESALE('$vehicleNo', $userId, $price, '$paymentMethod', $InitialPayment)";
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

}
