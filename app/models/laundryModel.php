<?php

require '../app/core/model.php';

class laundryModel extends model {
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
    public function profile(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM laundry WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile($fname,$lname,$email,$contact){
        $sql="UPDATE laundry SET fname='$fname', lname='$lname', email='$email', contact_no='$contact' WHERE user_id={$_SESSION['userId']}";
        $this->conn->query($sql);

    }
    public function changePassword( $opw,$npw,$rnpw){
        $errors=array();
        $hashPassword = sha1($rnpw);
        $hash2Password = sha1($hashPassword);
        
        $sql = "SELECT password from user_account WHERE user_id={$_SESSION['userId']} LIMIT 1";
        $oldpw = mysqli_fetch_assoc($this->conn->query($sql));
        $oldpw = $oldpw["password"];
        $hashPassword = sha1($opw);
        $hash2Password = sha1($hashPassword);
        if($hash2Password==$oldpw){
            if($npw==$rnpw){
                $hashPassword = sha1($rnpw);
                $hash2Password = sha1($hashPassword);
                $sql = "UPDATE user_account SET password='{$hash2Password}' WHERE user_id={$_SESSION['userId']}";
                if($this->conn->query($sql)){
                
                }        
            }else{
                $errors[]="doesn't match new passwords";
            }     
        }else{
            $errors[]="doesn't match with previous password";
        }
        return $errors;
    }
    public function getRequests(){
        $sql = "SELECT * FROM laundry_request";
        $result = $this->conn->query($sql);   
        return $result;
    }

}