<?php

require '../app/core/model.php';

class adminModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);   
        return $result;

        // $sql = "SELECT * FROM user_account";
        // $result = $this->db->runQuery($sql);   
        // return $result;
    }
}
?>