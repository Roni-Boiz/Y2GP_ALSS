<?php

require '../app/core/model.php';

class trainerModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);   
        return $result;

        // $sql = "SELECT * FROM user_account";
        // $result = $this->db->runQuery($sql);   
        // return $result;
    }

    public function getReservationHistory(){
        $today = date('Y-m-d');
        $sql = "SELECT trainer.fname AS trainer_fname , resident.fname AS resident_fname , resident.lname AS resident_lname , date ,start_time , end_time ,reserved_time , reservation_id  FROM fitness_centre_reservation , resident , trainer WHERE date < '$today' AND fitness_centre_reservation.resident_id = resident.resident_id  AND fitness_centre_reservation.employee_id = trainer.employee_id ORDER BY date DESC;";
        $result = $this->conn->query($sql);   
        return $result;

    }
    public function getReservationToday(){
        $today = date('Y-m-d');
        $sql = "SELECT trainer.fname AS trainer_fname , resident.fname AS resident_fname , resident.lname AS resident_lname , date ,start_time , end_time ,reserved_time , reservation_id  FROM fitness_centre_reservation , resident , trainer WHERE date = '$today' AND fitness_centre_reservation.resident_id = resident.resident_id  AND fitness_centre_reservation.employee_id = trainer.employee_id ORDER BY start_time ASC;";
        $result = $this->conn->query($sql);   
        return $result;
        
    }
    public function getReservationUpcoming(){
        $today = date('Y-m-d');
        $sql = "SELECT trainer.fname AS trainer_fname , resident.fname AS resident_fname , resident.lname AS resident_lname , date ,start_time , end_time ,reserved_time , reservation_id  FROM fitness_centre_reservation , resident , trainer WHERE date > '$today' AND fitness_centre_reservation.resident_id = resident.resident_id  AND fitness_centre_reservation.employee_id = trainer.employee_id ORDER BY date ASC; ";
        $result = $this->conn->query($sql);   
        return $result;

    }

    public function profile(){
        $sql = "SELECT * FROM trainer WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile($fname,$lname,$email,$contact){
        $sql="UPDATE trainer SET fname='$fname', lname='$lname', email='$email', contact_no='$contact' WHERE user_id={$_SESSION['userId']}";
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
    
    
        //location
        public function getLoginDevices($id)
        {
            $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
            $result = $this->conn->query($sql);
            return $result;
        }

        //insert reservations of fitness + check availability
    public function reservefitness($d, $coach, $stime, $etime)
    {
        // echo $stime."-".$etime."<br>";
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['userId'];
        
        $avail = 1;
        // echo $stime, $etime;
        //get starting slot no from $stime
        $shour = explode(":", $stime);

        if ($shour[1] == 30) {
            //function to get slot no from $stime($shour[0])
            $count = 2 * ($shour[0] - 6) + 2;
        } else {
            $count = 2 * ($shour[0] - 6) + 1;
        }
        //get time difference and count no of slots
        $diff = date_diff(date_create($etime), date_create($stime));
        //get total min/30 = slots
        $noofslots = $count + (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i) / 30;


        //  echo "count:" . $count;
        $sql1 = "SELECT * FROM fitness_reservation_count WHERE date ='$d'";
        $result = $this->conn->query($sql1);
        //check count availablility
        $row = $result->fetch_assoc();
        // print_r("-" . $noofslots."??");
        //go through $count to $noofslots and check less than 5 all slots
        $c = $count;
        while ($c < $noofslots) {
            // echo $row[$c]."+";
            if ($row[$c] < 5) {
                $c++;
                // echo "can : ";
            } else {
                $c++;
                // echo "can't : ";
                $avail = 0;
            }
        }
        if ($avail == 0) {
            return $avail;
        } else {
            //get resident id from user id
            $sql = "SELECT resident_id from resident where user_id='$id'";
            $rid = mysqli_fetch_assoc($this->conn->query($sql));
            $rid = $rid["resident_id"];
            // echo "can reserve";
            $fee = 1000;
            $empid = explode(" ", $coach);
            $empid = $empid[2];
            
            //get fee query
            $fee = 1000;

            $sql = "INSERT into fitness_centre_reservation(date,start_time,end_time,reserved_time,fee,resident_id,employee_id) VALUES('$d','$stime','$etime','$date','$fee','$rid','$empid')";
            $result = $this->conn->query($sql);
            //check date is in reservation_count
            $sql1 = "SELECT COUNT(date) as countd FROM fitness_reservation_count WHERE date LIKE '$d'";
            $result1 = mysqli_fetch_assoc($this->conn->query($sql1));
            // echo ">".$result1['countd'];
            //make sql procedure (IN $count IN $noofslots IN $d)
            if ($result1['countd']) {
                //none
            } else {
                $sql4 = "INSERT INTO fitness_reservation_count(date) VALUES('$d')";
                $this->conn->query($sql4);
            }
            while ($count < $noofslots) {
                $sql3 = "UPDATE fitness_reservation_count SET `$count` = `$count` + 1 WHERE date LIKE '$d'";
                $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }

            return $result;
        }
    }
    //show userselected date reservations of fitness
    public function dayfitness($d, $coach)
    {
        $empid = explode(" ", $coach);
        // echo $empid[2];
        $sql = "SELECT * FROM fitness_reservation_count WHERE date ='$d'";
        $result = $this->conn->query($sql);
        
        return $result;
    }
    public function getshiftno($d, $coach){
        $empid = explode(" ", $coach);
        //coach ge available shift tika
        $week = (int)date('W', strtotime($d))%3;
        //get shift details
        $shiftquery = "SELECT shift_no as n from employee_shift where employee_id=$empid[2] AND week=$week";
        $s = mysqli_fetch_assoc($this->conn->query($shiftquery));
        // echo "Weeknummer: " . $week . ">>".$s['n'];
        return $s['n'];
    }

}