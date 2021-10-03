<?php

require '../app/core/model.php';

class receptionistModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);   
        return $result;
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
                                $receiver = "chathus.m1999@gmail.com";
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

        public function readVisitor(){
            $date= date("Y-m-d");
            $sql = "SELECT * FROM visitor WHERE arrive_date = '{$date}' ";
            $result = $this->conn->query($sql);   
            return $result;
        }
    // public function readTable(){
    //     session_start();
    //     require '../app/core/database.php';
    //     $sql = "SELECT * FROM resident where resident_id='1'";
    //     $result = $this->conn->query($sql);   
    //     return $result;
    // }
    public function recordParcel($apartment,$sender){
        date_default_timezone_set("Asia/Colombo");
        $date=date('Y-m-d');
        $time=date('H:i:s');
        $sql="SELECT resident_id FROM resident WHERE apartment_no='$apartment'";
        $resid=mysqli_fetch_assoc($this->conn->query($sql));
        $sql2="SELECT employee_id FROM receptionist WHERE user_id={$_SESSION['userId']} LIMIT 1";
        $empid=mysqli_fetch_assoc($this->conn->query($sql2));
        $sql3="INSERT INTO parcel(receive_date,receive_time,sender,status,employee_id,resident_id) VALUES ('$date','$time','$sender',1,{$empid["employee_id"]},{$resid["resident_id"]}) ";
        $this->conn->query($sql3);
        $sql4="SELECT receive_date,receive_time,sender FROM parcel WHERE parcel_id IN (SELECT MAX(parcel_id) From parcel) ";
        $description=mysqli_fetch_assoc($this->conn->query($sql4));
        $notification="You have received a parcel from {$description["sender"]} at {$description["receive_date"]} {$description["receive_time"]}";
        $sql5="SELECT user_id FROM resident WHERE apartment_no='$apartment'";
        $userid=mysqli_fetch_assoc($this->conn->query($sql5));
        $sql6="INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time',
        '$notification',{$userid["user_id"]},5)";
        $this->conn->query($sql6);
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
    public function getInlocker(){
        $sql="SELECT * FROM parcel WHERE status=1";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function updateInlocker($pid){
        $sql="UPDATE parcel SET status=2 WHERE parcel_id=$pid";
        $this->conn->query($sql);
    }
    public function getReached(){
        $sql="SELECT * FROM parcel WHERE status=2";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function putReachedAway($pid){
        $sql="UPDATE parcel SET status=3 WHERE parcel_id=$pid";
        $this->conn->query($sql);
    }
    public function deleteParcel($pid){
        $sql="DELETE FROM parcel WHERE parcel_id=$pid";
        $this->conn->query($sql);
    }
    
}
?>
