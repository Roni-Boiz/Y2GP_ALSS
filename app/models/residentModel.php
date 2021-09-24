<?php

require '../app/core/model.php';

class residentModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readResident(){
        // echo $_SESSION['userId'];
        $sql = "SELECT *FROM resident WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function readMembers(){
        $sql = "SELECT family.name as membername FROM resident INNER JOIN family ON resident.resident_id=family.resident_id WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile(){
        $sql = "update resident set values()";
        $result = $this->conn->query($sql);   
        return $result;
        
    }
    public function changePassword(){
        $sql = "update";
        $result = $this->conn->query($sql);   
        return $result;
    }




}
?>
