
<?php

require('DBModel.php');

class SystemModuleModel extends DBModel{

    function getModuleListByRoleCode($roleCode){

        $connection = $this->initDBConnection();
        $moduleList = null;

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            $query = "call GETMODULELISTBYROLECODE('$roleCode')";
            $resultSet = $connection->query($query);
            $moduleList = $resultSet->fetch_assoc();
        }
        $connection->close();
        return $moduleList;
    }

}

?>