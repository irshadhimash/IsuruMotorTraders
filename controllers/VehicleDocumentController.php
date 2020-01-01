
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/VehicleDocumentModel.php');

class VehicleDocumentController extends VehicleDocumentModel{

    function getVehicleDocumentsByVNo( $vno){

        return $this->getVehicleDocumentsByVehicleNo( $vno );

    }

}
