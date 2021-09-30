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
    public function treatmentReservation($id){
        $sql = "SELECT * FROM  treatment_room_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }    
    public function fitnessReservation($id){
        $sql = "SELECT * FROM fitness_centre_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function viewSlots(){
        $sql = "SELECT * from parking_slot";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function removeReservation(){
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d H:i:s');
        if(isset($_GET["hallid"])){
            $hallid=$_GET["hallid"];
            $sql = "UPDATE hall_reservation SET cancelled_time='$date' WHERE reservation_id='$hallid' ";    
        }
        else if(isset($_GET["fitid"])){
            $fitid=$_GET["fitid"];;
            $sql = "UPDATE fitness_centre_reservation SET cancelled_time='$date' WHERE reservation_id='$fitid' ";    
        }
        else if(isset($_GET["treatid"])){
            $treatid=$_GET["treatid"];
            $sql = "UPDATE treatment_room_reservation SET cancelled_time='$date' WHERE reservation_id='$treatid' ";    
        }
        if($this->conn->query($sql)){
            echo "do";
        }
    }






}
?>
