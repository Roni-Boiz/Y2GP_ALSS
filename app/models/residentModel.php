<?php

require '../app/core/model.php';

class residentModel extends model
{
    function __construct()
    {
        parent::__construct();
    }

    //Get profile details
    public function readResident()
    {
        // echo $_SESSION['userId'];
        $sql = "SELECT *FROM resident WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);
        return $result;
    }

    //Get family members
    public function readMembers()
    {
        $sql = "SELECT family.name as membername FROM resident INNER JOIN family ON resident.resident_id=family.resident_id WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);
        return $result;
    }

    //remove family members from profile
    public function removeMember($id)
    {
        $sql = "DELETE from family WHERE name='$id'";
        $this->conn->query($sql);
        //echo $_POST["removedmem"];
    }

    //change basic profile detials 
    public function editProfile()
    {
        $sql1 = "UPDATE resident  SET fname='" . $_POST["firstname"] . "',lname='" . $_POST["lastname"] . "',nic='" . $_POST["nic"] . "',phone_no='" . $_POST["phone_no"] . "',email='" . $_POST["email"] . "',vehicle_no='" . $_POST["vehicle_no"] . "' WHERE user_id={$_SESSION['userId']}";
        $a = $this->conn->query($sql1);
        if ($_POST["fam"]) {
            $sql2 = "INSERT INTO family(resident_id,name) VALUES(" . $_POST["res_id"] . ",'" . $_POST["fam"] . "')";
            //$sql2 = "INSERT INTO family(resident_id,name) VALUES(1,'Sajith')";
            $this->conn->query($sql2);
        }
        return $a;
        //if($_POST["vehicle_no"]){
        //$sql3 = "INSERT vehicle SET vehicle_no='".$_POST["veh"]."' WHERE user_id='".$_POST["resident_id"]."'";
        //$this->conn->query($sql3); 
        //}     
    }

    //change password
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
                    date_default_timezone_set("Asia/Colombo");
                    $date = date('Y-m-d');
                    $time = date('H:i:s');
                    $notification = "Your password changed at" . " " . $date . " " . $time;
                    $sql2 = "INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
        '$notification',{$_SESSION['userId']},0)";
                    $this->conn->query($sql2);
                }
            } else {
                $errors[] = "doesn't match new passwords";
            }
        } else {
            $errors[] = "doesn't match with previous password";
        }
        return $errors;
    }

    //get hall reservations for display my reservations
    public function hallReservation($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM hall_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date >= '$d'";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 function hall reservations for display in right panel
    public function latesthallfun($id)
    {
        $d = date('Y-m-d');

        $sql = "SELECT * FROM hall_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id')  AND date >= '$d'  AND  type='function' AND cancelled_time IS NULL LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 conference hall reservations for display in right panel
    public function latesthallcon($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM hall_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id')  AND date >= '$d'  AND  type='conference' AND cancelled_time IS NULL LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //show userselected date reservations of hall
    public function dayhall($d, $type)
    {
        if ($type == "function") {
            $sql = "SELECT * FROM hall_reservation WHERE date ='$d' and type='function' and cancelled_time IS NULL ";
        } else {
            $sql = "SELECT * FROM hall_reservation WHERE date ='$d' and type='conference' and cancelled_time IS NULL";
        }
        $result = $this->conn->query($sql);
        return $result;
    }

    //insert reservations of hall + check availability
    public function reservehall($d, $type, $stime, $etime, $members)
    {
        $this->conn->autocommit(FALSE);

        //echo $stime."-".$etime."<br>";
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['userId'];
        $avail = 1;
        // echo $stime, $etime;
        $to_time = strtotime($stime);
        $from_time = strtotime($etime);
        $minutes = round(abs($to_time - $from_time) / 60, 2);
        $noofslots = $minutes / 30;
        // echo $noofslots;
        //function part
        if ($type == "function") {
            $sql = "SELECT date_add(end_time,interval 1 hour) as end_time,date_add(start_time,interval -1 hour) as start_time FROM hall_reservation WHERE date ='$d' and type='function' and cancelled_time is NULL";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                //echo $row["start_time"]."-".$row["end_time"]."<br>";
                //check availability

                if ($stime >= $row["start_time"] && $stime < $row["end_time"] || $etime > $row["start_time"] && $etime <= $row["end_time"]) {
                    $avail = 0;
                }
            }
            if ($avail == 0) {
                return 0;
            } else {
                //get resident id from user id
                $sql = "SELECT resident_id from resident where user_id='$id'";
                $rid = mysqli_fetch_assoc($this->conn->query($sql));
                $rid = $rid["resident_id"];
                //get fee query
                $sql2 = "SELECT fee from service where type='fhall'";
                $fee = mysqli_fetch_assoc($this->conn->query($sql2));
                //fee multiple by members and no of slots

                $fee = $fee["fee"] * $members * $noofslots;
                $sql = "INSERT into hall_reservation(date,start_time,end_time,reserved_time,type,no_of_members,fee,resident_id) VALUES('$d','$stime','$etime','$date','$type','$members','$fee','$rid')";
                //echo $sql;
                $result1 = $this->conn->query($sql);
                $sql1 = "Update resident set balance=balance - $fee where resident_id=$rid";
                $result2 = $this->conn->query($sql1);
            }
            //conference part
        } else {
            $sql = "SELECT * FROM hall_reservation WHERE date ='$d' and type='conference' ";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                //echo $row["start_time"]."-".$row["end_time"]."<br>";
                //check availability
                if ($stime >= $row["start_time"] && $stime < $row["end_time"] || $etime > $row["start_time"] && $etime <= $row["end_time"]) {
                    $avail = 0;
                }
            }
            if ($avail == 0) {
                return 0;
            } else {
                //get resident id from user id
                $sql = "SELECT resident_id from resident where user_id='$id'";
                $rid = mysqli_fetch_assoc($this->conn->query($sql));
                $rid = $rid["resident_id"];
                //echo $rid;
                //get fee query
                $sql2 = "SELECT fee from service where type='chall'";
                $fee = mysqli_fetch_assoc($this->conn->query($sql2));
                //fee multiple by members and no of slots

                $fee = $fee["fee"] * $members * $noofslots;
                $sql = "INSERT into hall_reservation(date,start_time,end_time,reserved_time,type,no_of_members,fee,resident_id) VALUES('$d','$stime','$etime','$date','$type','$members','$fee','$rid')";
                $result1 = $this->conn->query($sql);
                $sql1 = "Update resident set balance=balance - $fee where resident_id=$rid";
                $result2 = $this->conn->query($sql1);
            }
        }
        if ($result1 && $result2) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
            date_default_timezone_set("Asia/Colombo");
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $notification = "Your " . $type . " reservation successfull!\n Add " . $fee . "Rs to current monthly bill";
            $sql2 = "INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
'$notification',{$_SESSION['userId']},0)";
            $this->conn->query($sql2);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
        return $result1 && $result2;
    }

    //insert reservations of fitness + check availability
    public function reservefitness($d, $coach, $stime, $etime)
    {
        $this->conn->autocommit(FALSE);

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
        $r1 = $this->conn->query($sql1);
        //check count availablility
        $row = $r1->fetch_assoc();
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
            $empid = explode(" ", $coach);
            $empid = $empid[2];

            //get fee query
            $sql2 = "SELECT fee from service where type='fitness'";
            $fee = mysqli_fetch_assoc($this->conn->query($sql2));
            //fee multiple by slots
            $fee = $fee["fee"] * ($noofslots - $count);

            $sql = "INSERT into fitness_centre_reservation(date,start_time,end_time,reserved_time,fee,resident_id,employee_id) VALUES('$d','$stime','$etime','$date','$fee','$rid','$empid')";
            $result1 = $this->conn->query($sql);
            //check date is in reservation_count
            $sql1 = "SELECT COUNT(date) as countd FROM fitness_reservation_count WHERE date LIKE '$d'";
            $result2 = mysqli_fetch_assoc($this->conn->query($sql1));
            // echo ">".$result1['countd'];
            // echo $sql;
            //make sql procedure (IN $count IN $noofslots IN $d)
            if ($result2['countd']) {
                //none
            } else {
                $sql4 = "INSERT INTO fitness_reservation_count(date) VALUES('$d')";
                $result2 = $this->conn->query($sql4);
            }
            while ($count < $noofslots) {
                $sql3 = "UPDATE fitness_reservation_count SET `$count` = `$count` + 1 WHERE date LIKE '$d'";
                $result3 = $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }
            $sql1 = "Update resident set balance=balance - $fee where resident_id=$rid";
            $result4 = $this->conn->query($sql1);


            if ($result1 && $result2 && $result3 && $result4) {
                $this->conn->commit();
                $this->conn->autocommit(TRUE);
                date_default_timezone_set("Asia/Colombo");
                $date = date('Y-m-d');
                $time = date('H:i:s');
                $notification = "Your fitness centre reservation successfull!\n Add " . $fee . "Rs to current monthly bill";
                $sql2 = "INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
'$notification',{$_SESSION['userId']},0)";
                $this->conn->query($sql2);
            } else {
                // Rollback transaction
                // echo "Commit transaction failed";
                $this->conn->rollback();
                $this->conn->autocommit(TRUE);
            }
            return  $result1 && $result2 && $result3 && $result4;
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
    //get shift times of trainers
    public function getshiftno($d, $coach)
    {
        $empid = explode(" ", $coach);
        //coach ge available shift tika
        $week = (int)date('W', strtotime($d)) % 3 + 1;
        //get shift details
        $shiftquery = "SELECT shift_no as n from employee_shift where employee_id=$empid[2] AND week=$week";
        $s = mysqli_fetch_assoc($this->conn->query($shiftquery));
        // echo "Weeknummer: " . $week . ">>".$s['n'];
        return $s['n'];
    }

    //insert reservations of treatment + check availability
    public function reservetreatment($d, $type, $stime, $etime)
    {
        $this->conn->autocommit(FALSE);

        //echo $stime."-".$etime."<br>";
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

        // echo "count:" . $count;
        $sql1 = "SELECT * FROM treatment_reservation_count WHERE date ='$d'";
        $r1 = $this->conn->query($sql1);
        //check count availablility
        $row = $r1->fetch_assoc();
        //echo "-" . $row[$count];
        //print_r("-" . $noofslots);
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
            //get fee query
            $sql2 = "SELECT fee from service where type='treatment' and name='$type'";
            $fee = mysqli_fetch_assoc($this->conn->query($sql2));
            //fee multiple by slots
            $fee = $fee["fee"] * ($noofslots - $count);
            //res id AI karann
            $sql = "INSERT into treatment_room_reservation(date,start_time,end_time,reserved_time,type,fee,resident_id,employee_id) VALUES('$d','$stime','$etime','$date','$type','$fee','$rid',9)";
            $result2 = $this->conn->query($sql);


            //check date is in reservation_count
            $sql1 = "SELECT COUNT(date) as countd FROM treatment_reservation_count WHERE date LIKE '$d'";
            $result1 = mysqli_fetch_assoc($this->conn->query($sql1));
            // echo ">".$result1['countd'];

            if ($result1['countd']) {
                //none
            } else {
                $sql4 = "INSERT INTO treatment_reservation_count(date) VALUES('$d')";
                $result3 = $this->conn->query($sql4);
            }
            while ($count < $noofslots) {
                $sql3 = "UPDATE treatment_reservation_count SET `$count` = `$count` + 1 WHERE date LIKE '$d';";
                $result4 = $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }

            $sql1 = "Update resident set balance=balance - $fee where resident_id=$rid";
            $result3 = $this->conn->query($sql1);

            if ($result1 && $result2 && $result3 && $result4) {
                $this->conn->commit();
                $this->conn->autocommit(TRUE);
                date_default_timezone_set("Asia/Colombo");
                $date = date('Y-m-d');
                $time = date('H:i:s');
                $notification = "Your treatment room reservation for " . $type . " successfull!\n" . "Add " . $fee . "Rs to current monthly bill";
                $sql2 = "INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
'$notification',{$_SESSION['userId']},0)";
                $this->conn->query($sql2);
            } else {
                // Rollback transaction
                // echo "Commit transaction failed";
                $this->conn->rollback();
                $this->conn->autocommit(TRUE);
            }
            return  $result1 && $result2 && $result3 && $result4;
        }
    }

    //show userselected date reservations of treatment
    public function daytreatment($d)
    {
        //echo $d;
        $sql = "SELECT * FROM treatment_reservation_count WHERE date ='$d'";
        $result = $this->conn->query($sql);
        return $result;
    }

    //show userselected date reservations of parking
    public function dayparking($d, $time)
    {
        echo $d, $time;
        $sql = "SELECT * FROM hall_reservation WHERE date ='$d'";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get treatment reservations for display my reservations
    public function treatmentReservation($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM  treatment_room_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND date > '$d' AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 reservations for display in right panel    
    public function latesttreatment($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM  treatment_room_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date > '$d' LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get fitness reservations for display my reservations
    public function fitnessReservation($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT f.*,t.fname,t.lname FROM fitness_centre_reservation as f, trainer as t WHERE f.employee_id=t.employee_id AND resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date > '$d' ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //coach list for reservations
    public function getcoaches()
    {
        $sql = "SELECT * from trainer";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 reservations for display in right panel
    public function latestfitness($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT f.*,t.fname,t.lname FROM fitness_centre_reservation as f, trainer as t WHERE f.employee_id=t.employee_id AND resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date > '$d' LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //view parking slots for reservation
    public function viewSlots()
    {
        $sql = "SELECT * from parking_slot";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get parking reservations of resident
    public function parkingReservation($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM  parking_slot_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date > $d";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 reservations for display in right panel
    public function latestparking($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * FROM  parking_slot_reservation WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND date > $d LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //remove reservations
    public function removeReservation()
    {
        $this->conn->autocommit(FALSE);
        $id = $_SESSION['userId'];
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d H:i:s');

        //remove hall
        if (isset($_GET["hallid"])) {
            $hallid = $_GET["hallid"];
            //get fee query
            $res = mysqli_fetch_assoc($this->conn->query("SELECT fee,type from hall_reservation where reservation_id='$hallid'"));
            $fee = $res['fee'];
            $t = $res['type'];
            //get cancel fee query
            if ($t == 'fhall') {
                $sql2 = "SELECT cancelation_fee from service where type='fhall'";
            } else {
                $sql2 = "SELECT cancelation_fee from service where type='chall'";
            }

            $penaltyfee = mysqli_fetch_assoc($this->conn->query($sql2));
            $penaltyfee = $penaltyfee["cancelation_fee"];
            $val = $penaltyfee - $fee;
            $sql = "UPDATE hall_reservation SET cancelled_time='$date',fee='$val' WHERE reservation_id='$hallid' ";
            $result3 = $this->conn->query($sql);

            //remove fitness
        } else if (isset($_GET["fitid"])) {
            $fitid = $_GET["fitid"];

            //get fee query
            $res = mysqli_fetch_assoc($this->conn->query("SELECT fee,start_time,end_time,date from fitness_centre_reservation where reservation_id='$fitid'"));
            $fee = $res['fee'];
            $stime = $res['start_time'];
            $etime = $res['end_time'];
            $d = $res['date'];
            //get cancel fee query
            $sql2 = "SELECT cancelation_fee from service where type='fitness'";
            $penaltyfee = mysqli_fetch_assoc($this->conn->query($sql2));
            $penaltyfee = $penaltyfee["cancelation_fee"];
            $val = $penaltyfee - $fee;
            $sql = "UPDATE fitness_centre_reservation SET cancelled_time='$date',fee='$val' WHERE reservation_id='$fitid' ";
            $result3 = $this->conn->query($sql);


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

            while ($count < $noofslots) {
                $sql3 = "UPDATE fitness_reservation_count SET `$count` = `$count` - 1 WHERE date LIKE '$d'";
                $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }
        } else if (isset($_GET["treatid"])) {
            $treatid = $_GET["treatid"];

            //get fee query
            $res = mysqli_fetch_assoc($this->conn->query("SELECT fee,start_time,end_time,date from treatment_room_reservation where reservation_id='$treatid'"));
            $fee = $res['fee'];
            $stime = $res['start_time'];
            $etime = $res['end_time'];
            $d = $res['date'];
            //get cancel fee query
            $sql2 = "SELECT cancelation_fee from service where type='treatment'";
            $penaltyfee = mysqli_fetch_assoc($this->conn->query($sql2));
            $penaltyfee = $penaltyfee["cancelation_fee"];
            $val = $penaltyfee - $fee;
            $sql = "UPDATE treatment_room_reservation SET cancelled_time='$date',fee='$val' WHERE reservation_id='$treatid' ";
            $result3 = $this->conn->query($sql);


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

            while ($count < $noofslots) {
                $sql3 = "UPDATE treatment_reservation_count SET `$count` = `$count` - 1 WHERE date LIKE '$d'";
                $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }
        }

        //complete park
        else if (isset($_GET["park"])) {
            $parkid = $_GET["park"];
            //get fee query
            $sql2 = "SELECT cancelation_fee from service where type='park'";
            $penaltyfee = mysqli_fetch_assoc($this->conn->query($sql2));
            $penaltyfee = $penaltyfee["cancellation_fee"];
            $sql = "UPDATE parking_slot_reservation SET cancelled_time='$date',fee=100 WHERE reservation_id='$parkid' ";
            $result3 = $this->conn->query($sql);
        }

        $sql1 = "Update resident set balance=balance - ($penaltyfee-$fee) where resident_id=$rid";
        $result4 = $this->conn->query($sql1);

        if ($result3 && $result4) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
    }

    //get technical services display in my requests
    public function maintenence($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * from technical_maintenence_request WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND state= 'p'";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get latest 5 request if maintenence
    public function latestmaintenence($id)
    {
        $d = date('Y-m-d');
        //echo $d;
        $sql = "SELECT * from technical_maintenence_request WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND state= 'p' AND preferred_date>'$d' LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //request technical services
    public function reqMaintenence($type, $pdate, $des, $id)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql = "INSERT INTO technical_maintenence_request(request_date,preferred_date,category,description,resident_id) VALUES('$date','$pdate','$type','$des','$rid')";
        return $this->conn->query($sql);
    }

    //get technical services requests to display in my requests
    public function laundry($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * from laundry_request WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL AND preferred_date>=$d";
        $result = $this->conn->query($sql);
        return $result;
    }

    //request laundry services
    public function reqLaundry($type, $pdate, $des, $id, $catw1, $catw2, $catw3, $quantity1, $quantity2, $quantity3)
    {
        $this->conn->autocommit(FALSE);
        $date = date('Y-m-d H:i:s');
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql1 = "INSERT INTO laundry_request(request_date,preferred_date,description,type,resident_id) VALUES('$date','$pdate','$des','$type','$rid')";
        // echo($sql1);
        $a0 = $this->conn->query($sql1);
        //get latest req id
        $sql2 = "SELECT max(request_id) as latest from laundry_request WHERE resident_id=$rid";
        $latestid = mysqli_fetch_assoc($this->conn->query($sql2));
        $latestid = $latestid["latest"];
        //insert category
        // $this->conn->query("START TRANSACTION");
        $a1 = $this->conn->query("INSERT INTO category(category_no,request_id,weight,qty) VALUES(1,'$latestid','$catw1','$quantity1');");
        $a2 = $this->conn->query("INSERT INTO category(category_no,request_id,weight,qty) VALUES(2,'$latestid','$catw2','$quantity2');");
        $a3 = $this->conn->query("INSERT INTO category(category_no,request_id,weight,qty) VALUES(3,'$latestid','$catw3','$quantity3');");

        //transaction
        if ($a0 && ($a1 || $a2 || $a3)) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
            return true;
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
            return false;
        }
    }

    //get category details
    public function categorydetail($id)
    {
        $sql = "SELECT * from category WHERE request_id=$id";
        $result = $this->conn->query($sql);
        return $result;
    }

    //get visitor requests to display in my requests
    public function visitor($id)
    {
        $d = date('Y-m-d');
        $sql = "SELECT * from visitor WHERE resident_id IN (select resident_id from resident where user_id='$id') AND cancelled_time IS NULL";
        $result = $this->conn->query($sql);
        return $result;
    }

    //request visitor
    public function requestVisitor($name, $vdate, $des, $id)
    {
        $date = date('Y-m-d H:i:s');
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql = "INSERT INTO visitor(name,arrive_date,description,requested_date,resident_id) VALUES('$name','$vdate','$des','$date','$rid')";
        return $this->conn->query($sql);
    }
    //get considered complaints
    public function considercomplaint($id)
    {
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql = "Select complaint.*,manager.fname as fname ,manager.lname as lname from complaint,manager where resident_id='$rid' and complaint.employee_id=manager.employee_id";
        // echo $sql;
        $result =$this->conn->query($sql);
        return $result;
    }
    //get other complaints
    public function othercomplaint($id)
    {
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql = "Select * from complaint where resident_id='$rid' and employee_id IS NULL";
        $result =$this->conn->query($sql);
        return $result;
    }
    

    //remove upcomig requests
    public function removeRequest()
    {
        $this->conn->autocommit(False);
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d H:i:s');
        if (isset($_GET["laundryid"])) {
            $laundryid = $_GET["laundryid"];
            $sql = "UPDATE laundry_request SET cancelled_time='$date' WHERE request_id='$laundryid' ";
            $sql1 = "DELETE from category where request_id='$laundryid'";
            $this->conn->query($sql1);
        } else if (isset($_GET["maintenenceid"])) {
            $maintenenceid = $_GET["maintenenceid"];
            $sql = "UPDATE technical_maintenence_request SET cancelled_time='$date' WHERE request_id='$maintenenceid' ";
        } else if (isset($_GET["visitorid"])) {
            $visitorid = $_GET["visitorid"];
            $sql = "UPDATE visitor SET cancelled_time='$date' WHERE visitor_id='$visitorid' ";
        }
        $result = $this->conn->query($sql);
        if (($result)) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
        return $result;
    }

    //read treater
    public function readtreater()
    {
        $sql = "SELECT fname,lname,contact_no FROM treater";
        return ($this->conn->query($sql));
    }

    //read notification of resident
    public function readNotification()
    {
        $sql = "SELECT * FROM notification WHERE user_id={$_SESSION['userId']} AND (view<>1) ORDER BY notification_id DESC LIMIT 10 ";
        return ($this->conn->query($sql));
    }

    //set parcels as reached
    public function setReached($nid)
    {
        $this->conn->autocommit(False);
        $time = date('Y-m-d H:i:s');
        $sql1 = "SELECT view FROM notification WHERE notification_id='$nid'";
        $pid = mysqli_fetch_assoc($this->conn->query($sql1));
        $sql2 = "UPDATE parcel SET status=2,reached_time='$time' WHERE parcel_id={$pid["view"]}";
        $result1 = $this->conn->query($sql2);
        $sql3 = "UPDATE notification SET view=0 WHERE notification_id='$nid'";
        $result2 = $this->conn->query($sql3);
        if (($result1 && $result2)) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
    }

    //remove read  notification
    public function removeNotification($nid)
    {
        $sql = "UPDATE notification SET view=1 WHERE notification_id='$nid'";
        $this->conn->query($sql);
    }

    //show current monthly bills
    public function bill($id, $year, $month)
    {
        $s = date("$year-$month-d 00:00:00", strtotime("first day of this month"));
        $e = date("$year-$month-d 23:59:59", strtotime("last day of this month"));
        $sql = "SELECT * from bill where '$s'<=dateaffect and dateaffect<'$e' and resident_id IN (select resident_id from resident where user_id='$id')";
        $result = $this->conn->query($sql);
        return $result;
    }
    //get payments for bill
    public function payment($id, $year, $month)
    {
        $s = date("$year-$month-d 00:00:00", strtotime("first day of this month"));
        $e = date("$year-$month-d 23:59:59", strtotime("last day of this month"));
        $sql = "SELECT * from payment where '$s'<=paid_date and paid_date<'$e' and resident_id IN (select resident_id from resident where user_id='$id')";
        $result = $this->conn->query($sql);
        return $result;
    }

    //update payments and bill
    public function paymentSave($amount)
    {
        $this->conn->autocommit(FALSE);
        $id = $_SESSION['userId'];
        $date = date('Y-m-d H:i:s');
        $value = $amount;
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $sql1 = "INSERT INTO payment(amount,paid_date,resident_id) VALUES('$value','$date','$rid')";
        $result1 = $this->conn->query($sql1);
        $sql1 = "Update resident set balance=balance +$value where resident_id=$rid";
        $result2 = $this->conn->query($sql1);
        if (($result1 && $result2)) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
    }

    //get total bill amount
    public function billtotal($id, $year, $month)
    {
        $s = date("$year-$month-d 00:00:00", strtotime("first day of this month"));
        $e = date("$year-$month-d 23:59:59", strtotime("last day of this month"));
        $sql = "SELECT sum(fee) as total  from bill where '$s'<=dateaffect and dateaffect<'$e' and resident_id IN (select resident_id from resident where user_id='$id') ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //update payments details
    public function pay($id)
    {
        $sql = "SELECT * from payment where resident_id IN (select resident_id from resident where user_id='$id')  ORDER BY paid_date DESC LIMIT 5";
        $result = $this->conn->query($sql);
        return $result;
    }

    //make complaints
    public function complaint($des, $type, $id)
    {
        //get resident id from user id
        $sql = "SELECT resident_id from resident where user_id='$id'";
        $rid = mysqli_fetch_assoc($this->conn->query($sql));
        $rid = $rid["resident_id"];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO complaint(date_time,description,type,resident_id) VALUES('$date','$des','$type','$rid')";
        //echo $sql;
        return $this->conn->query($sql);
    }

    //get location+login details
    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function checkParking($data)
    {
        $date = $data['Date'];
        $duration = $data['Duration'];
    }
}
