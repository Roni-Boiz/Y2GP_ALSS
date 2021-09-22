<?php

require '../app/core/model.php';

class adminModel extends model {
    function __construct(){
         parent::__construct();
    }

    // public function readTable(){
    //     $sql = "SELECT * FROM user_account";
    //     $result = $this->conn->query($sql);   
    //     return $result;

    //     // $sql = "SELECT * FROM user_account";
    //     // $result = $this->db->runQuery($sql);   
    //     // return $result;
    // }

    public function getDetails(){
        session_start();
        $id = $_SESSION('user_id');
        $sql = "SELECT * FROM admin where user_id='{$id}'";
        $result = $this->conn->query($sql);   
        printf(mysqli_fetch_assoc($result));
        return $result;
    }
}
?>