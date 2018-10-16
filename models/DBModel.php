<?php

class DBModel{
    
    private $db_server = 'localhost';
    private $db_username = 'root';
    private $db_password = '';
    private $database = 'IsuruMotorTraders';
    private $db_connection = null;

    function initDBConnection(){

        if($this->db_connection == null){
            $this->db_connection = new mysqli($this->db_server, $this->db_username, $this->db_password, $this->database);
            return $this->db_connection;
        }else{
            return $this->db_connection;
        }

    }
    
}

?>