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

       $errors = array();
               // check for the sql queries
        $sqlfreeusername = mysqli_real_escape_string($this->conn, $username);
        $sqlfreepassword = mysqli_real_escape_string($this->conn, $password);
 
       if(strlen(trim($sqlfreeusername))< 1 )
       {
           $errors[] = 'Username is invalid';
       }

       if(strlen(trim($sqlfreepassword)) < 1 )
       {
           $errors[] = 'Password is invalid';
       }
    //    echo $password;
    //    echo $hash2password;

    if (empty($errors)){



        //hashing the password
        $hashpassword = sha1($sqlfreepassword);
        $hash2password= sha1($hashpassword);

        $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
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
                    $errors[] = 'Invalid Username Password';
                    return $errors;
                }
            } else {
                $errors[] = 'Database query failed';
                return $errors;
            }
        }
        else{
            return $errors;
        }
   }
}
?>