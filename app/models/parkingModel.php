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
        $time=date('H:i:s');
        $sql= "SELECT date,reservation_id,start_time,end_time,checkin_time,checkout_time FROM parking_slot_reservation WHERE vehicle_no='$vid' AND ((date='$date'AND end_time>='$time') OR (checkout_time IS NULL)  OR date>'$date'  ) ORDER BY date ASC LIMIT 2";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function checkinVehicle($rid){
        date_default_timezone_set("Asia/Colombo");
        $time=date('H:i:s');
        $sql0="SELECT apartment_no FROM resident WHERE resident_id=(SELECT resident_id FROM parking_slot_reservation WHERE reservation_id='$rid') ";
        $ap_no = mysqli_fetch_assoc($this->conn->query($sql0));
        $ap_no=$ap_no['apartment_no'];
        $sql1="UPDATE parking_slot_reservation SET checkin_time=SYSDATE() WHERE reservation_id='$rid' ";
        $this->conn->query($sql1);
        $sql2="UPDATE parking_slot SET status=1,apartment_no='$ap_no' WHERE slot_no=(SELECT slot_no FROM parking_slot_reservation WHERE reservation_id='$rid') ";
        $this->conn->query($sql2);

    }
    public function checkoutVehicle($rid){
        date_default_timezone_set("Asia/Colombo");
        $time=date('H:i:s');
        // $sql1="SELECT apartment_no FROM resident WHERE resident_id=(SELECT resident_id FROM parking_slot_reservation WHERE reservation_id='$rid') ";
        // $ap_no = mysqli_fetch_assoc($this->conn->query($sql1));
        // $ap_no=$ap_no['apartment_no'];
        $sql2="UPDATE parking_slot_reservation SET checkout_time='$time' WHERE reservation_id='$rid' ";
        $this->conn->query($sql2);
        $sql3="UPDATE parking_slot SET status=0 WHERE slot_no=(SELECT slot_no FROM parking_slot_reservation WHERE reservation_id='$rid' ";
        $this->conn->query($sql3);

        //to get end time(as e_time) check overdue charges if any,get overdue charge rate from service table
        //set reminders for upcoming overdue
        $sql4="SELECT end_time FROM parking_slot_reservation WHERE reservation_id='$rid' ";
        $e_time = mysqli_fetch_assoc($this->conn->query($sql4));
        $e_time=$e_time['apartment_no'];

        //methana frontend walin ada ho iye ewata witharak button eka enable karanna one
        if($e_time<$time){
            $sql5="SELECT fee FROM service WHERE name='overdue'";
            $overduefee= $this->conn->query($sql5);
            $minutes = ceil(abs($time - $e_time) / 60, 2);
            $noofslots = $minutes / 30;

        }

    }
    public function getOutgoingVehicles(){
        $time=date('H:i:s');
        $sql1="SELECT end_time,parking_slot_reservation.vehicle_no,slot_no,apartment_no FROM parking_slot_reservation,resident WHERE (cancelled_time IS NULL AND checkout_time IS NULL AND checkin_time IS NOT NULL) AND end_time<=DATE_ADD(SYSDATE(),INTERVAL 1 HOUR) AND parking_slot_reservation.resident_id= resident.resident_id ";
        $result = $this->conn->query($sql1);
        return $result;
    }
    public function getOverdueVehicles(){
        $time=date('H:i:s');
        $sql1="SELECT end_time,parking_slot_reservation.vehicle_no,slot_no,apartment_no,phone_no FROM parking_slot_reservation,resident WHERE (cancelled_time IS NULL AND checkout_time IS NULL AND checkin_time IS NOT NULL) AND (end_time<=SYSDATE() OR (date<CURRENT_DATE()) ) AND parking_slot_reservation.resident_id= resident.resident_id";
        $result = $this->conn->query($sql1);
        
        while($s_no=mysqli_fetch_assoc($result)){
            $sql2="UPDATE parking_slot SET status=2 WHERE slot_no= $s_no[slot_no]";
            $this->conn->query($sql2);
        }
        return $result;
    }
    public function getParkingState(){
        $sql1="SELECT * FROM parking_slot ";
        $result = $this->conn->query($sql1);
        return $result;
    }
}
