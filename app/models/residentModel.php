<?php

require '../app/core/model.php';

class residentModel extends model {
    function __construct(){
         parent::__construct();
    }
    // Profile
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
    public function removeMember($id){
        $sql = "DELETE from family WHERE name='$id'";
        $this->conn->query($sql);
        //echo $_POST["removedmem"];
    }
    public function editProfile(){
        $sql1 = "UPDATE resident  SET fname='".$_POST["firstname"]."',lname='".$_POST["lastname"]."',nic='".$_POST["nic"]."',phone_no='".$_POST["phone_no"]."',email='".$_POST["email"]."',vehicle_no='".$_POST["vehicle_no"]."' WHERE user_id={$_SESSION['userId']}";
        $this->conn->query($sql1); 
        if($_POST["fam"]){
            $sql2 = "INSERT INTO family(resident_id,name) VALUES(".$_POST["res_id"].",'".$_POST["fam"]."')";
            //$sql2 = "INSERT INTO family(resident_id,name) VALUES(1,'Sajith')";
            $this->conn->query($sql2); 
        }  
        //if($_POST["vehicle_no"]){
        //$sql3 = "INSERT vehicle SET vehicle_no='".$_POST["veh"]."' WHERE user_id='".$_POST["resident_id"]."'";
        //$this->conn->query($sql3); 
        //}     
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
    //reservations
    public function hallReservation($id){
        $sql = "SELECT * FROM hall_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function latesthall($id){
        
    }
    public function treatmentReservation($id){
        $sql = "SELECT * FROM  treatment_room_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }   
    public function latestreatment($id){
        
    } 
    public function fitnessReservation($id){
        $sql = "SELECT f.*,t.fname,t.lname FROM fitness_centre_reservation as f natural join trainer as t WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function latestfitness($id){
        
    }
    public function viewSlots(){
        $sql = "SELECT * from parking_slot";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function latestparking($id){
        
    }
    public function removeReservation(){
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d H:i:s');
        if(isset($_GET["hallid"])){
            $hallid=$_GET["hallid"];
            $sql = "UPDATE hall_reservation SET cancelled_time='$date' WHERE reservation_id='$hallid' ";    
        }
        else if(isset($_GET["fitid"])){
            $fitid=$_GET["fitid"];
            $sql = "UPDATE fitness_centre_reservation SET cancelled_time='$date' WHERE reservation_id='$fitid' ";    
        }
        else if(isset($_GET["treatid"])){
            $treatid=$_GET["treatid"];
            $sql = "UPDATE treatment_room_reservation SET cancelled_time='$date' WHERE reservation_id='$treatid' ";    
        }
        $this->conn->query($sql);
    }
    public function maintenence($id){
        $sql = "SELECT * from technical_maintenence_request WHERE resident_id IN (select resident_id from resident where user_id='$id')";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function latestmaintenence($id){
        $sql = "SELECT * from technical_maintenence_request WHERE resident_id IN (select resident_id from resident where user_id='$id') LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function reqMaintenence($type,$pdate,$des){
        $date = date('Y-m-d H:i:s');
        $sql="INSERT INTO technical_maintenence_request(request_date,preferred_date,category,description,resident_id) VALUES('$date','$pdate','$type','$des','1')";
        $this->conn->query($sql);
    }
    public function laundry($id){
        $sql = "SELECT * from laundry_request WHERE resident_id IN (select resident_id from resident where user_id='$id') ";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function visitor($id){
        $sql = "SELECT * from visitor WHERE resident_id IN (select resident_id from resident where user_id='$id')";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function requestVisitor($name,$vdate,$des){
        $date = date('Y-m-d H:i:s');
        // resident id
        $sql = "INSERT INTO visitor(name,arrive_date,description,requested_date,resident_id) VALUES('$name','$vdate','$des','$date','1')";
        $this->conn->query($sql);
    }
    public function removeRequest(){
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d H:i:s');
        if(isset($_GET["laundryid"])){
            $laundryid=$_GET["laundryid"];
            $sql = "UPDATE laundry_request SET cancelled_time='$date' WHERE reservation_id='$laundryid' ";    
        }
        else if(isset($_GET["maintenenceid"])){
            $maintenenceid=$_GET["maintenenceid"];
            $sql = "UPDATE technical_maintenence_request SET cancelled_time='$date' WHERE reservation_id='$maintenenceid' ";    
        }
        else if(isset($_GET["visitorid"])){
            $visitorid=$_GET["visitorid"];
            $sql = "UPDATE visitor SET cancelled_time='$date' WHERE reservation_id='$visitorid' ";    
        }
        if($this->conn->query($sql)){
            echo "do";
        }
    }
    public function readNotification(){
        $sql="SELECT * FROM notification WHERE user_id={$_SESSION['userId']} AND (view<>1) ORDER BY notification_id DESC LIMIT 10 ";
        return ($this->conn->query($sql));
    }
    public function setReached($nid){
        $time = date('Y-m-d H:i:s');
        $sql1="SELECT view FROM notification WHERE notification_id='$nid'";
        $pid=mysqli_fetch_assoc($this->conn->query($sql1));
        $sql2="UPDATE parcel SET status=2,reached_time='$time' WHERE parcel_id={$pid["view"]}";
        $this->conn->query($sql2);
        $sql3="UPDATE notification SET view=1 WHERE notification_id='$nid'";
        $this->conn->query($sql3);
    }
    public function removeNotification($nid){
        $sql="UPDATE notification SET view=1 WHERE notification_id='$nid'";
        $this->conn->query($sql);
    }
    // bills
    public function bill($id,$year,$month){
        $s=date("$year-$month-d 00:00:00",strtotime("first day of this month"));
        $e=date("$year-$month-d 23:59:59",strtotime("last day of this month"));
        $sql = "SELECT * from bill where '$s'<=dateaffect and dateaffect<'$e' and resident_id IN (select resident_id from resident where user_id='$id')";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function billtotal($id,$year,$month){
        $s=date("$year-$month-d 00:00:00",strtotime("first day of this month"));
        $e=date("$year-$month-d 23:59:59",strtotime("last day of this month"));
        $sql = "SELECT sum(fee) as total  from bill where '$s'<=dateaffect and dateaffect<'$e' and resident_id IN (select resident_id from resident where user_id='$id') ";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function pay($id){
        $sql = "SELECT * from payment where resident_id IN (select resident_id from resident where user_id='$id')  ORDER BY paid_date DESC LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function complaint($des){
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO complaint(date_time,description,resident_id) VALUES('$date','$des','1')";
        $result = $this->conn->query($sql);
        return $result;
    }
    //location
    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }



}
?>
