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
        //hashing the password
       $hashpassword = sha1($password);
       $hash2password= sha1($hashpassword);
    //    echo $password;
    //    echo $hash2password;
       $sql = "SELECT * FROM user_account WHERE user_name='{$username}' AND Password='{$hash2password}' limit 1";
       $resultSet = mysqli_query($this->conn, $sql);

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