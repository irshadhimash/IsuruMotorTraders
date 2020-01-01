<?php

    require('controllers/VehicleDocumentController.php');

    $vehicleObj = new VehicleDocumentController;
    $resultSet = $vehicleObj->getVehicleDocumentsByVNo( $_POST['regNo'] );

    while($row = $resultSet->fetch_assoc()){

        $vehicleId = $row['VehicleId'];

        header("Content-type: image/jpg"); 
        echo $row['VehicleDocmuent']; 
    }

?>
