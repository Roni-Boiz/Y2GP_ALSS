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
        $opw=$_POST["opw"];
        $npw=$_POST["npw"];
        $rnpw=$_POST["rnpw"];
        $errors=array();
        $hashPassword = sha1($rnpw);
        $hash2Password = sha1($hashPassword);
        
        $sql = "SELECT password from user_account WHERE user_id={$_SESSION['userId']}";
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




}
?>
