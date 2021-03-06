<?php

require '../app/core/model.php';

class receptionistModel extends model {
    function __construct(){
         parent::__construct();
    }

    //getting user details session's user ID
    public function profile(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM receptionist WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile($fname,$lname,$email,$contact){
        $sql="UPDATE receptionist SET fname='$fname', lname='$lname', email='$email', contact_no='$contact' WHERE user_id={$_SESSION['userId']}";
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


    public function readApartment(){
        $sql = "SELECT apartment_no FROM apartment WHERE status = '0' ";
        $result = $this->conn->query($sql);   
        return $result;
    }

    public function readResidentRegistration($firstname, $secondname, $email, $apartmentId){

        $errors = array();

        $firstname = mysqli_real_escape_string($this->conn, $firstname);
        $secondname = mysqli_real_escape_string($this->conn, $secondname);
        $email = mysqli_real_escape_string($this->conn, $email);
 
       if(strlen(trim($firstname))< 3 )
       {
           $errors[] = 'Enter a valid First name';
       }

       if(strlen(trim($secondname)) < 3 )
       {
           $errors[] = 'Enter a valid Second name';
       }

       if($apartmentId !="#"){
           //getting the max of apartment IDs and setup an new resident account
            $sql = "SELECT resident_id FROM resident where resident_id=(SELECT max(resident_id) FROM resident) LIMIT 1";
                $result = $this->conn->query($sql);   
                if($result){
                    $lastId = mysqli_fetch_assoc($result);
                    $thisId= $lastId['resident_id']+1;
                    $username=0;
                    $password=0;
                    $userId=0;
                    // print_r( $lastId);
                    if($lastId>0 ){
                        if($thisId<10){
                            $username = 'RA000'.$thisId;
                            $password = 'Hawlock@000'.$thisId;
                            // echo $username;
                        }
                        else if($thisId<100){
                            $username = 'RA00'.$thisId;
                            $password = 'Hawlock@00'.$thisId;
                        }
                        else if($thisId<1000){
                            $username = 'RA0'.$thisId;
                            $password = 'Hawlock@0'.$thisId;
                        }
                        else if($thisId<10000){
                            $username = 'RA'.$thisId;
                            $password = 'Hawlock@'.$thisId;
                        }
                        else{
                            $errors[]= 'resident capacity is full';
                        }
                        $hashPassword = sha1($password);
                        $hash2Password = sha1($hashPassword);

                        // echo 'Register if run';
                        $query1= "INSERT INTO user_account (user_name, password, type, hold) VALUES ('{$username}', '{$hash2Password}', 'resident', '0') ";
                        $resultSet1 = mysqli_query($this->conn, $query1);
                        $query2 = "SELECT user_id FROM user_account where user_name='{$username}' LIMIT 1";
                        $resultSet2=  mysqli_query($this->conn, $query2);
                        if($resultSet2){
                            $user= mysqli_fetch_assoc($resultSet2);
                            $userId = $user['user_id'];
                        }
                        $query3 = "UPDATE apartment SET status = '1' WHERE apartment_no = '{$apartmentId}' ";
                        $resultSet3=  mysqli_query($this->conn, $query3);
                        // echo $apartmentId;
                        $query4 = "INSERT INTO resident (fname, lname, email, apartment_no, user_id) VALUES ('{$firstname}', '{$secondname}', '{$email}', '{$apartmentId}' , '{$userId}') ";
                        // echo 'Register if run2';
                        $resultSet4 = mysqli_query($this->conn, $query4);
                        if ($resultSet1){
                            // echo 'Register if run query1';
                            if($resultSet4){
                                echo 'Register successfuly';
                                $receiver = $email;
                                $subject = "Hawlock RYCN details";
                                $body = "Username : ".$username." password : ".$password;
                                $sender = "From:hawlockrycn@gmail.com";

                                mail($receiver, $subject, $body, $sender);
                                // if(mail($receiver, $subject, $body, $sender)){
                                //     echo "Email sent successfully to $receiver";
                                // }else{
                                //     echo "Sorry, failed while sending mail!";
                                // }
                                
                            }
                            
                        }
                    }

                }
                else{
                    $errors[] = 'last Id not found';
                }

            }
            else{
                $errors[] = 'Select a apartment';
            }
            return $errors;
        }
        public function addVisitor($name,$apno,$description){
            $this->conn->autocommit(FALSE);
            $sql1="SELECT resident_id FROM resident WHERE apartment_no='$apno'";
            $resno=mysqli_fetch_assoc($this->conn->query($sql1));
            $resno=$resno['resident_id'];

            $sql2="INSERT INTO visitor(name,arrive_date,arrive_time,description,requested_date,resident_id) VALUES('$name',CURRENT_DATE,CURRENT_TIME,'$description',SYSDATE(),'$resno')";
            $result1=$this->conn->query($sql2);

            if($resno && $result1 ){
                $this->conn->commit();
                $this->conn->autocommit(TRUE);
            }
            else{
                $this->conn->rollback();
                $this->conn->autocommit(TRUE);
            }

        }

        public function readTodayVisitor(){
            date_default_timezone_set("Asia/Colombo");
            $date= date("Y-m-d");
            $sql = "SELECT resident.apartment_no,visitor.name,visitor.description,visitor.visitor_id FROM resident INNER JOIN visitor ON resident.resident_id=visitor.resident_id WHERE (arrive_date ='$date' AND arrive_time IS NULL AND cancelled_time IS NULL)";
            $result = $this->conn->query($sql);   
            return $result;
        }
        public function readOutgoingVisitor(){
            $sql = "SELECT resident.apartment_no,visitor.name,visitor.description,visitor.visitor_id,visitor.arrive_date,visitor.arrive_time FROM resident INNER JOIN visitor ON resident.resident_id=visitor.resident_id WHERE ((arrive_date IS NOT NULL) AND (arrive_time IS NOT NULL) AND (departure_time IS NULL))";
            $result = $this->conn->query($sql);   
            return $result;
        }
        public function readPreviousVisitor(){
            $sql = "SELECT resident.apartment_no,visitor.name,visitor.description,visitor.visitor_id,visitor.arrive_time,visitor.arrive_date,visitor.departure_time FROM resident INNER JOIN visitor ON resident.resident_id=visitor.resident_id WHERE (arrive_time IS NOT NULL) AND (arrive_date IS NOT NULL) AND (departure_time IS NOT NULL)   ORDER BY arrive_date DESC,arrive_time DESC LIMIT 20 ";
            //$sql = "SELECT * FROM visitor WHERE arrive_time IS NOT NULL ORDER BY arrive_date DESC,arrive_time DESC LIMIT 20 ";
            $result = $this->conn->query($sql);   
            return $result;
        }
        public function setVisitedIn($vid){
            $time=date('H:i:s');
            $sql="UPDATE visitor SET arrive_time='$time' WHERE visitor_id='$vid'";
            $this->conn->query($sql);

        }
        public function setVisitedOut($vid){
            $sql="UPDATE visitor SET departure_time=SYSDATE() WHERE visitor_id='$vid'";
            $this->conn->query($sql);

        }
    // public function readTable(){
    //     session_start();
    //     require '../app/core/database.php';
    //     $sql = "SELECT * FROM resident where resident_id='1'";
    //     $result = $this->conn->query($sql);   
    //     return $result;
    // }
    public function recordParcel($apartment,$sender,$description){
        date_default_timezone_set("Asia/Colombo");
        $date=date('Y-m-d');
        $time=date('H:i:s');
        $this->conn->autocommit(false);
        $sql="SELECT resident_id FROM resident WHERE apartment_no='$apartment'";
        $resid=mysqli_fetch_assoc($this->conn->query($sql));

        $sql2="SELECT employee_id FROM receptionist WHERE user_id={$_SESSION['userId']} LIMIT 1";
        $empid=mysqli_fetch_assoc($this->conn->query($sql2));

        $sql3="INSERT INTO parcel(receive_date,receive_time,sender,status,employee_id,resident_id,description) VALUES ('$date','$time','$sender',1,{$empid["employee_id"]},{$resid["resident_id"]},'$description')";
        $result1=$this->conn->query($sql3);

        $sql4="SELECT parcel_id,receive_date,receive_time,sender,description FROM parcel WHERE parcel_id IN (SELECT MAX(parcel_id) From parcel) ";
        $description=mysqli_fetch_assoc($this->conn->query($sql4));

        $notification="You have received a parcel from {$description["sender"]} at {$description["receive_date"]} {$description["receive_time"]}.({$description["description"]})";
        $sql5="SELECT user_id FROM resident WHERE apartment_no='$apartment'";
        $userid=mysqli_fetch_assoc($this->conn->query($sql5));

        $sql6="INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
        '$notification',{$userid["user_id"]},{$description["parcel_id"]})";
        $result2=$this->conn->query($sql6);

        if ($resid && $empid && $description && $userid && $result1 && $result2) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        }
        else{
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }    
    }
    // public function sendParcel($apartment){
    //     $date=date('Y-m-d');
    //     $time=date('H:i:s');
    //     $sql="SELECT user_id FROM resident WHERE apartment_no='$apartment'";
    //     $userid=mysqli_fetch_assoc($this->conn->query($sql));
    //     $sql2="INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
    //     'notification for parcel',{$userid["user_id"]},0)";
    //     $this->conn->query($sql2);
    // }

    //to load data to inlocker tab of parcels
    public function getInlocker(){
        $sql="SELECT parcel.*,resident.apartment_no,resident.phone_no FROM parcel INNER JOIN resident ON parcel.resident_id=resident.resident_id WHERE status=1 ORDER BY receive_date ASC";
        $result= $this->conn->query($sql);
        return $result;
    }
    //to update parcel state as delivered
    public function updateInlocker($pid){
        $sql="UPDATE parcel SET status=2 WHERE parcel_id=$pid";
        $this->conn->query($sql);
    }
    //to load details of delivered parcel data
    public function getReached(){
        $sql="SELECT parcel.*,resident.apartment_no FROM parcel INNER JOIN resident ON parcel.resident_id=resident.resident_id WHERE status=2 ORDER BY receive_date DESC,receive_time DESC LIMIT 20";
        $result= $this->conn->query($sql);
        return $result;
    }
    //to get old parcels if need for operations
    public function getOldParcels($id){
        $sql="SELECT * FROM parcel WHERE status=3 AND (SELECT resident_id FROM resident WHERE apartment_no='$id') ORDER BY receive_date DESC,receive_time DESC LIMIT 20";
        $result= $this->conn->query($sql);
        return $result;
    }

    //to swipe away delivered rows manually at the end of the day as a task of receptionist 
    public function putReachedAway($pid){
        $sql="UPDATE parcel SET status=3 WHERE parcel_id=$pid";
        $this->conn->query($sql);
    }
    // public function deleteParcel($pid){
    //     $sql="DELETE FROM parcel WHERE parcel_id=$pid";
    //     $this->conn->query($sql);
    // }

    //to get available apartments for dropdown select 
    public function getApartment(){
        $sql = "SELECT apartment_no FROM apartment WHERE status = '1' ";
        $result = $this->conn->query($sql);   
        return $result;
    }

    // to get notifications of receptionist
    public function readNotification(){
        $sql="SELECT * FROM notification WHERE user_id={$_SESSION['userId']} AND (view<>1) ORDER BY notification_id DESC LIMIT 10 ";
        return ($this->conn->query($sql));
    }

    //to mark a notification as viewed
    public function removeNotification($nid){
        $sql="UPDATE notification SET view=1 WHERE notification_id='$nid'";
        $this->conn->query($sql);
    }

    //to load login devices in profile view
    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    //to get the details for the right column
    public function getStats(){
        $sql= "SELECT COUNT(apartment_no) as stat FROM apartment";
        $result = $this->conn->query($sql);
        return $result;
    }
    public  function readcontact($type, $name){
        if(!$name){
            if($type=='Manager'){
                $sql= "SELECT * from manager where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                return $result;
            }else if($type=='Admin'){
                $sql= "SELECT * from admin where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                // echo "dd";
                return $result;
            }else if($type=='Resident'){
                $sql= "SELECT * from resident where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                return $result;
            }else if($type=='Parking Officer'){
                $sql= "SELECT * from parking_officer where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                return $result;
            }else if($type=='Laundry'){
                $sql= "SELECT * from laundry where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                return $result;
            }else if($type=='Trainer'){
                $sql= "SELECT * from trainer where user_id IS NOT NULL";
                $result = $this->conn->query($sql);
                return $result;
        
            }else{
                $sql= "SELECT * from treater";
                $result = $this->conn->query($sql);
                return $result;
            }
        }
        
       
    }



    
}
