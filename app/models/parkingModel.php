<?php

require '../app/core/model.php';

class parkingModel extends model
{
    function __construct()
    {
        parent::__construct();
    }

    public function readTable()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);
        return $result;

        // $sql = "SELECT * FROM user_account";
        // $result = $this->db->runQuery($sql);   
        // return $result;
    }
    public function profile()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM parking_officer WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function editProfile($fname, $lname, $email, $contact)
    {
        $sql = "UPDATE parking_officer SET fname='$fname', lname='$lname', email='$email', contact_no='$contact' WHERE user_id={$_SESSION['userId']}";
        $this->conn->query($sql);
    }
    public function changePassword($opw, $npw, $rnpw)
    {
        $errors = array();
        $hashPassword = sha1($rnpw);
        $hash2Password = sha1($hashPassword);

        $sql = "SELECT password from user_account WHERE user_id={$_SESSION['userId']} LIMIT 1";
        $oldpw = mysqli_fetch_assoc($this->conn->query($sql));
        $oldpw = $oldpw["password"];
        $hashPassword = sha1($opw);
        $hash2Password = sha1($hashPassword);
        if ($hash2Password == $oldpw) {
            if ($npw == $rnpw) {
                $hashPassword = sha1($rnpw);
                $hash2Password = sha1($hashPassword);
                $sql = "UPDATE user_account SET password='{$hash2Password}' WHERE user_id={$_SESSION['userId']}";
                if ($this->conn->query($sql)) {
                }
            } else {
                $errors[] = "doesn't match new passwords";
            }
        } else {
            $errors[] = "doesn't match with previous password";
        }
        return $errors;
    }
    //location
    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function getParkingStatus($vid){
        date_default_timezone_set("Asia/Colombo");
        $date=date('Y-m-d');
        $sql= "SELECT date,reservation_id,start_time,end_time FROM parking_slot_reservation WHERE vehicle_no='$vid' AND date>='$date' ORDER BY date ASC LIMIT 2";
        $result = $this->conn->query($sql);
        return $result;
    }
}
