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
        $sql = "SELECT * FROM admin WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);   
        return $result;
    }

    public function insertAnnouncement($topic,$content,$category,$fileName,$id){
        $admin = $this->conn->query("SELECT admin_id FROM admin WHERE user_id='{$id}'");
        if($admin){
            $id= mysqli_fetch_assoc($admin);
            $adminId = $id['admin_id'];
        }
        $sql = "INSERT INTO announcement(topic,content,category,date,file_name,admin_id) VALUES ('{$topic}','{$content}','{$category}',NOW(),'{$fileName}','{$adminId}')";
        return $this->conn->query($sql);
    }

    public function getEmployee($empId){
        $sql = "SELECT * FROM manager WHERE employee_id='{$empId}'";
        return $this->conn->query( $sql);
    }
}
?>