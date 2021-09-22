<?php

require '../app/core/model.php';

class receptionistModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readResidentRegistration($firstname, $secondname, $email, $apartmentId){
        $sql = "SELECT resident_id FROM resident where resident_id=(SELECT max(resident_id) FROM resident) LIMIT 1";
        echo $firstname;
            $result = $this->conn->query($sql);   
            if($result){
                $lastId = mysqli_fetch_assoc($result);
                $thisId= $lastId['resident_id']+1;
                $username=0;
                $password=0;
                $userId=0;
                // print_r( $lastId);
                if($lastId>0){
                    if($thisId<10){
                        $username = 'RA000'.$thisId;
                        $password = 'Hawlock@000'.$thisId;
                        echo $username;
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
                        echo 'resident capacity is full';
                    }
                    $hashPassword = sha1($password);
                    $hash2Password = sha1($hashPassword);

                    // echo 'Register if run';
                    $query1= "INSERT INTO user_account (user_name, password, type) VALUES ('{$username}', '{$hash2Password}', 'resident') ";
                    $resultSet1 = mysqli_query($this->conn, $query1);
                    $query2 = "SELECT user_id FROM user_account where user_name='{$username}' LIMIT 1";
                    $resultSet2=  mysqli_query($this->conn, $query2);
                    if($resultSet2){
                        $user= mysqli_fetch_assoc($resultSet2);
                        $userId = $user['user_id'];
                    }
                    echo $apartmentId;
                    $query3 = "INSERT INTO resident (fname, lname, email, apartment_no, user_id) VALUES ('{$firstname}', '{$secondname}', '{$email}', '{$apartmentId}' , '{$userId}') ";
                    // echo 'Register if run2';
                    $resultSet3 = mysqli_query($this->conn, $query3);
                    if ($resultSet1){
                        // echo 'Register if run query1';
                        if($resultSet3){
                            echo 'Register successfuly';
                            $receiver = "chathus.m1999@gmail.com";
                            $subject = "Hawlock RYCN details";
                            $body = "Username : ".$username." password : ".$password;
                            $sender = "From:hawlockrycn@gmail.com";

                            if(mail($receiver, $subject, $body, $sender)){
                                echo "Email sent successfully to $receiver";
                            }else{
                                echo "Sorry, failed while sending mail!";
                            }
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
                echo 'last id not found';
            }
            return $result;
        }
    // public function readTable(){
    //     session_start();
    //     require '../app/core/database.php';
    //     $sql = "SELECT * FROM resident where resident_id='1'";
    //     $result = $this->conn->query($sql);   
    //     return $result;
    // }
}
?>