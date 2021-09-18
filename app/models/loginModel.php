<?php
require '../app/core/model.php';

class loginModel extends model {
    function __construct(){
         parent::__construct();
    }
    public function readLogin($username, $password){
         
        $sql = "SELECT * FROM user_account WHERE user_name='{$username}' AND Password='{$password}' limit 1";
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
                   
                    $ret = $_SESSION['type'];
                    return $ret;
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

