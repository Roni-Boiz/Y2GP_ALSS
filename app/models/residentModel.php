<?php

require '../app/core/model.php';

class residentModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readResident(){
        $sql = "SELECT * FROM {$_SESSION['type']} where user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile(){
        $sql = "";
        $result = $this->conn->query($sql);   
        return $result;
        
    }




}
?>
