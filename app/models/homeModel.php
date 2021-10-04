<?php

require '../app/core/model.php';

class homeModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM user_account";
        $result = $this->conn->query($sql);   
        return $result;

        // $sql = "SELECT * FROM user_account";
        // $result = $this->db->runQuery($sql);   
        // return $result;
    }

    public function readLogin($username, $password){
        $errors = array();
        date_default_timezone_set("Asia/Colombo");
        $time= date('Y-m-d H:i:sa', time());
                       // check for the sql queries
        $sqlfreeusername = mysqli_real_escape_string($this->conn, $username);
        $sqlfreepassword = mysqli_real_escape_string($this->conn, $password);
 
       if(strlen(trim($sqlfreeusername))< 1 )
       {
           $errors[] = 'Enter a valid Username';
        return $errors;
       }

       if(strlen(trim($sqlfreepassword)) < 8 )
       {
           $errors[] = 'Enter a valid Password';
        return $errors;
       }

        //hashing the password
        $hashpassword = sha1($sqlfreepassword);
        $hash2password= sha1($hashpassword);
    //    echo $password;
    //    echo $hash2password;

        $query12 = "SELECT TIMESTAMPDIFF(MINUTE,hold_time,CURRENT_TIMESTAMP) as minutes FROM user_account WHERE user_name='{$sqlfreeusername}' LIMIT 1 ";
        $resultHold1 = mysqli_query($this->conn, $query12);
        $res = mysqli_fetch_assoc($resultHold1);

        if(isset($res) && $res['minutes'] >= 20){
            $timeresetQuery = "UPDATE user_account SET hold ='0' WHERE user_name='{$sqlfreeusername}' limit 1";
            $timeReset = mysqli_query($this->conn, $timeresetQuery);
        }

        $dbHold = "SELECT hold FROM user_account WHERE user_name='{$sqlfreeusername}' limit 1";
        $resultHold = mysqli_query($this->conn, $dbHold);
        $hold = mysqli_fetch_assoc($resultHold);

        if(isset($hold) && $hold['hold']==5){

            $timeDiff = 20 - $res['minutes'];

            $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
                $resultSet = mysqli_query($this->conn, $sql);

                    if ($resultSet) {
                            if ( mysqli_num_rows ($resultSet) == 1) 
                        {
                            $errors[] = "Your Account is Hold for {$timeDiff} minutes";
                            return $errors;
                        } 
                        else {
                            $addHold = "UPDATE user_account SET hold_time = '{$time}' WHERE user_name='{$sqlfreeusername}' limit 1";
                            $resultAdd = mysqli_query($this->conn, $addHold);
                            $errors[] = "Your Account is Hold for {$timeDiff} minutes";
                            return $errors;
                            }
                        }
        }

        else{
            if (empty($errors)){

                $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
                $resultSet = mysqli_query($this->conn, $sql);

                    if ($resultSet) {
                        //query successfull

                            if ( mysqli_num_rows ($resultSet) == 1) 
                        {
                            $removeHold = "UPDATE user_account SET hold = '0' WHERE user_name='{$sqlfreeusername}' limit 1";
                            $resultRemove = mysqli_query($this->conn, $removeHold);
                            //valid user found
                            $user = mysqli_fetch_assoc($resultSet);
                            session_start();
                            $_SESSION['userId'] = $user['user_id'] ;
                            $_SESSION['userName'] = $user['user_name'];
                            $_SESSION['type'] = $user['type'];

                        } else {
                            $errors[] = 'Invalid Username or Password';
                            if(isset($hold['hold']) && $hold['hold']>=2){
                                $attempt = $hold['hold']+1;
                                $addHold = "UPDATE user_account SET hold = '{$attempt}', hold_time = '{$time}' WHERE user_name='{$sqlfreeusername}' limit 1";
                                $resultSet = mysqli_query($this->conn, $addHold);
                                header('Location:fogotPassword');
                                return $errors;
                            }
                            else if(isset($hold['hold']) && $hold['hold']>=0){
                                $attempt = $hold['hold']+1;
                                // date_timezone_set(asia, Colombo);
                                $addHold = "UPDATE user_account SET hold = '{$attempt}', hold_time = '{$time}' WHERE user_name='{$sqlfreeusername}' limit 1";
                                $resultAdd = mysqli_query($this->conn, $addHold);
                                return $errors;
                            }
                            
                        }
                    } else {
                        $errors[] = 'Database query failed';
                    }
                }
                return $errors;
                }
        }


        public function readApartment(){
            $sql = "SELECT apartment_no FROM apartment WHERE status = '1' ";
            $result = $this->conn->query($sql);   
            return $result;
        }
        
        public function readFogot($apartmentId , $email){
            $sql = "SELECT * FROM resident WHERE apartment_no = '{$apartmentId}' AND email='{$email}' limit 1";
                $resultSet = mysqli_query($this->conn, $sql);
                $result = mysqli_fetch_assoc($resultSet);
                $userId  = $result['user_id'];

                    if ($resultSet) {
                            if ( mysqli_num_rows ($resultSet) == 1) 
                        {
                            $time= date('sdm');
                            
                            $newPassword = "Ab@.$time.456" ;
                            echo $newPassword;
                            //hashing the password
                            $hashpassword = sha1($newPassword);
                            $hash2password= sha1($hashpassword);


                            $newpass = "UPDATE user_account SET password = '{$hash2password}' WHERE user_id='{$userId}' limit 1";
                            $resultNewPass = mysqli_query($this->conn, $newpass);

                            if($resultNewPass){
                                $receiver = "$email";
                                $subject = "Hawlock RYCN details";
                                $body = "Your new password is : ".$newPassword;
                                $sender = "From:hawlockrycn@gmail.com";
                                mail($receiver, $subject, $body, $sender);
                            }
                            
                            
                        } 
                        else {
                            $errors[] = "Valid user not found";
                            return $errors;
                            }
                        }
        }
}
?>