<?php

require '../app/core/model.php';

class AnnouncementModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        require '../app/core/database.php';
        session_start();
        if($_SESSION['type']=="resident"){
            $sql = "SELECT * FROM announcement where category='resident'";
        }else{
            $sql = "SELECT * FROM announcement where category='administration'";
        }
        $result = $this->conn->query($sql);   
        return $result;
    }
}
?>