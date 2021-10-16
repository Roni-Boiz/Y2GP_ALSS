<?php

// require_once '../app/core/database.php';

class model{

    function __construct(){
        
        // $this->db = new database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        
        $this->conn = $this->getConnection();
    }

    public function getConnection(){
        require_once 'database.php';
        return $conn;
    }

    public function getAnnouncement(){
        if($_SESSION['type']=="resident"){
            $sql = "SELECT * FROM announcement WHERE category='resident' OR category='both' ORDER BY date DESC";
        }else{
            $sql = "SELECT * FROM announcement WHERE category='administration'  OR category='both' ORDER BY date DESC";
        }
        $ann = $this->conn->query($sql);   
        return $ann;
    }

    public function updateProfilePic($fileName,$id){
        $fileName = $this->conn->real_escape_string($fileName);
        $sql = "UPDATE user_account SET profile_pic = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $fileName, $id);
        return $stmt->execute();
    }

    public function updatePassword($opw,$npw,$rnpw,$id){
        $opw = $this->conn->real_escape_string($opw);
        $npw = $this->conn->real_escape_string($npw);
        $rnpw = $this->conn->real_escape_string($rnpw);

        $errors=array();

        $sql = "SELECT password from user_account WHERE user_id='{$id}'";
        $oldpw = $this->conn->query($sql)->fetch_assoc();
        $cpw = $oldpw["password"];
        $hashPassword = sha1($opw);
        $hash2Password = sha1($hashPassword);
        if($hash2Password==$cpw){
            if($npw==$rnpw){
                $hashPassword = sha1($rnpw);
                $hash2Password = sha1($hashPassword);
                $sql = "UPDATE user_account SET password = ? WHERE user_id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("si",$hash2Password, $id);
                $stmt->execute();
                $stmt->close();            
            }else{
                $errors[]="doesn't match new passwords";
            }     
        }else{
            $errors[]="doesn't match with previous password";
        }
    }
}