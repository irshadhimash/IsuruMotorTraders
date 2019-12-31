<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/InventoryModel.php');

    $inventoryObj = new InventoryModel;
    $inventoryObj->markVehicleAsInterested( $_GET['vehicleID'], $_GET['id'], $_GET['Name'] );

?>
