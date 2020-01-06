
<?php

require('DBModel.php');

class InventoryModel extends DBModel{

    private $result = null;

    function create($RegistrationNo, $EngineNo, $VehicleClass, $Status, $FuelType, $Country, $Make, $Model, $Cost, $SalePrice, $UserId, $Availability, $isPurchased){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            $sqlQuery = "call CREATEVEHICLE('$RegistrationNo', '$EngineNo', '$VehicleClass', '$Status',
                         '$FuelType', '$Country', '$Make', '$Model', '$Cost', '$SalePrice', $UserId, '$Availability', $isPurchased)";
            if ( $connection->query($sqlQuery) == true ){
                /*if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                    header('location:inventory.php');
                }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                    header('location:TraderPortal.php');
                }*/
                echo ("<script type='text/javascript'> alert('Vehicle has been added successfully!');</script>");
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }
        $connection->close();

    }

    function getAllVehicles(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETALLVEHICLES";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function getVehicleById($id){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GETVEHICLEBYID('$id')";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;

    }

    function update($RegistrationNo, $EngineNo, $VehicleClass, $Status, $FuelType, $Country, $Make, $Model, $Cost, $SalePrice, $UserId, $Availability){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call UPDATEVEHICLE('$RegistrationNo', '$EngineNo', '$VehicleClass', '$Status',
                            '$FuelType', '$Country', '$Make', '$Model', '$Cost', '$SalePrice', $UserId, '$Availability')";
            if ( $connection->query($sqlQuery) == true ){
                if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                    header('location:inventory.php');
                }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                    header('location:TraderPortal.php');
                }
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function delete($id){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call DELETEVEHICLE('$id')";
            if ( $connection->query($sqlQuery) == true ){
                if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                    header('location:inventory.php');
                }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                    header('location:TraderPortal.php');
                }
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function getVehicleByUserId( $UserId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetVehicleByListedUserId($UserId)";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

    function GetVehicleByCustomerId( $UserId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetVehicleByCustomerId($UserId)";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

    function markVehicleAsInterested( $vehicleID, $userId, $UserName ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call MarkVehicleInterested($vehicleID)";
            if ( $connection->query($sqlQuery) == true ){
                header("location:TraderInventory.php?id=$userId&Name=".$UserName);
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function purchase( $vehicleId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call PurchaseVehicle($vehicleId)";
            if ( $connection->query($sqlQuery) == true ){
                header('location:Traders.php');
            }else{
                echo "Error in: " . $sqlQuery . "<br>" . $connection->error;
            }
        }

        $connection->close();

    }

    function getPreferedVehicleCountByTraderId( $userId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetPreferedVehicleCountByTraderId( $userId )";
            $result = $connection->query($sqlQuery);
            //$result->close();
            $connection->next_result();
        }

        //$connection->close();
        return $result;
        
    }

    function getPurchasedVehicleCountByTraderId( $userId ){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call GetPurchasedVehicleCountByTraderId( $userId )";
            $result = $connection->query($sqlQuery);
        }

        //$connection->close();
        return $result;
        
    }

    function getReportByCountry(){

        $connection = $this->initDBConnection();

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "SELECT
            COUNT(*) as Count,
            v.vehicleclass,
            Country
        FROM VEHICLE V
        GROUP BY Country, vehicleclass";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

    function getVehicleCountByCountryForReport(){
        $connection = $this->initDBConnection();

        if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
        }else{
            $sqlQuery = "call Report_GetVehicleCountByCountry";
            $result = $connection->query($sqlQuery);
        }

        $connection->close();
        return $result;
    }

}

?>
