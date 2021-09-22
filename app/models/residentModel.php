<?php

require '../app/core/model.php';

class residentModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readResident(){
        session_start();
        $sql = "SELECT * FROM resident where resident_id='1'";
        $result = $this->conn->query($sql);   
        return $result;
    }

}
?>