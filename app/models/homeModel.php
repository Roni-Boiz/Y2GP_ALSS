<?php

require '../app/core/model.php';

class homeModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);   
        return $result;

        // $sql = "SELECT * FROM user_account";
        // $result = $this->db->runQuery($sql);   
        // return $result;
    }

    public function readLogin($username, $password){
         
        $sql = "SELECT * FROM user_account WHERE user_name='{$username}' AND password='{$password}' limit 1";
        $resultSet = mysqli_query($this->conn, $sql);
        print_r(mysqli_fetch_assoc($resultSet));
        if ($resultSet) {
            //query successfull
  
            if ( mysqli_num_rows ($resultSet) == 1) 
            {

                //valid user found
                $user = mysqli_fetch_assoc($resultSet);

                session_start();
                $_SESSION['userId'] = $user['user_id'] ;
                $_SESSION['userName'] = $user['user_name'];
                $_SESSION['type'] = $user['type'];
                echo $_SESSION['type'];
                // announncement
                // if($_SESSION['type']=="resident"){
                //     $sql = "SELECT * FROM announcement where category='resident'";
                // }else{
                //     $sql = "SELECT * FROM announcement where category='administration'";
                // }
                // $ann= $this->conn->query($sql);   
                // return $ann;
                // $ret = $_SESSION['type'];
                // return $ret;
            } else {
                echo  'Invalid Username Password';
                return false;
            }
        } else {
            echo 'Database query failed';
        }
    }
}
?>