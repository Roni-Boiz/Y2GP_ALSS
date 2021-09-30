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
    public function yourReservation($id){
        //hall
        $sql = "SELECT * FROM hall_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_date IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function removeHall($id){
        //echo $id;
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE hall_reservation SET cancelled_date='$date' WHERE reservation_id='$id' ";
        $this->conn->query($sql);
    }
    public function hallreservation(){
        //INSERT INTO `fitness_centre_reservation` (`reservation_id`, `date`, `start_time`, `end_time`, `reserved_time`, `cancelled_time`, `fee`, `resident_id`, `employee_id`, `schedule_id`) VALUES ('2', '2021-09-08', '09:06:02', '02:01:00', '2021-09-27 02:00:00', NULL, '200', '1', null, NULL)

        //$sql="insert into hall_reservation value ("3","2008-11-11","13:23:44","15:23:44","2008-11-11 11:12:01","2008-11-11 11:12:01","Hall",10,1000,1)";
    }
    public function viewSlots(){
        $sql = "SELECT * from parking_slot";
        $result = $this->conn->query($sql);
        return $result;
    }




}
?>
