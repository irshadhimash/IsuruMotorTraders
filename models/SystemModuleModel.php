
<?php

require('DBModel.php');

class SystemModuleModel extends DBModel{

    function getModuleListByRoleCode($roleCode){

        $connection = $this->initDBConnection();
        $result = null;

		if($connection->connect_error){
			echo "Cannot connect to the database:".$connection->connect_error;
		}else{
            $query = "call GETMODULELISTBYROLECODE('$roleCode')";
            $result = $connection->query($query);
        }
        $connection->close();
        return $result;
    }

}

?>