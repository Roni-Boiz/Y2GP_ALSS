<?php

require '../app/core/model.php';

class homeModel extends model
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

    public function readLogin($username, $password)
    {

        //unset cookie
        if(isset($_COOKIE['hold'])) {
            if($_COOKIE['hold'] == 'fogot'){
                setcookie('hold', '' , time() -86400, '/');
            }
        }


        $errors = array();
        date_default_timezone_set("Asia/Colombo");
        $time = date('Y-m-d H:i:s', time());
        // check for the sql queries
        $sqlfreeusername = mysqli_real_escape_string($this->conn, $username);
        $sqlfreepassword = mysqli_real_escape_string($this->conn, $password);

        if (strlen(trim($sqlfreeusername)) < 1) {
            $errors[] = 'Enter a valid Username';
            return $errors;
        }

        if (strlen(trim($sqlfreepassword)) < 8) {
            $errors[] = 'Enter a valid Password';
            return $errors;
        }

        //hashing the password
        $hashpassword = sha1($sqlfreepassword);
        $hash2password = sha1($hashpassword);
        
        //    echo $password;
        //    echo $hash2password;

        $query12 = "SELECT TIMESTAMPDIFF(MINUTE,hold_time,CURRENT_TIMESTAMP) as minutes FROM user_account WHERE user_name='{$sqlfreeusername}' LIMIT 1 ";
        $resultHold1 = mysqli_query($this->conn, $query12);
        $res = mysqli_fetch_assoc($resultHold1);

        if (isset($res) && $res['minutes'] >= 20) {
            $timeresetQuery = "UPDATE user_account SET hold ='0' WHERE user_name='{$sqlfreeusername}' limit 1";
            $timeReset = mysqli_query($this->conn, $timeresetQuery);
        }

        $dbHold = "SELECT hold FROM user_account WHERE user_name='{$sqlfreeusername}' limit 1";
        $resultHold = mysqli_query($this->conn, $dbHold);
        $hold = mysqli_fetch_assoc($resultHold);

        if (isset($hold) && $hold['hold'] == 5) {

            $timeDiff = 20 - $res['minutes'];

            $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
            $resultSet = mysqli_query($this->conn, $sql);

            if ($resultSet) {
                if (mysqli_num_rows($resultSet) == 1) {
                    $errors[] = "Your Account is Hold for {$timeDiff} minutes";
                    return $errors;
                } else {
                    $addHold = "UPDATE user_account SET hold_time = '{$time}' WHERE user_name='{$sqlfreeusername}' limit 1";
                    $resultAdd = mysqli_query($this->conn, $addHold);
                    $errors[] = "Your Account is Hold for {$timeDiff} minutes";
                    return $errors;
                }
            }
        } else {
            if (empty($errors)) {

                $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
                $resultSet = mysqli_query($this->conn, $sql);

                if ($resultSet) {
                    //query successfull

                    if (mysqli_num_rows($resultSet) == 1) {
                        $removeHold = "UPDATE user_account SET hold = '0' WHERE user_name='{$sqlfreeusername}' limit 1";
                        $resultRemove = mysqli_query($this->conn, $removeHold);
                        //valid user found
                        $user = mysqli_fetch_assoc($resultSet);
                        session_start();
                        $_SESSION['userId'] = $user['user_id'];
                        $_SESSION['userName'] = $user['user_name'];
                        $_SESSION['type'] = $user['type'];
                        $_SESSION['profilePic'] = $user['profile_pic'];

                        if($user['type'] == 'resident'){
                            $Res = "SELECT resident_id FROM resident WHERE user_id = '{$user['user_id']}' limit 1";
                            $resData = mysqli_query($this->conn, $Res);

                            $Resident = mysqli_fetch_assoc($resData);
                            $_SESSION['residentId'] = $user['resident_id'];
                        }
                        //Gets the IP Address from the visitor
                        $PublicIP =  get_client_ip(); //get_client_ip();  //"112.135.65.171"
                        if ($PublicIP != "::1") {
                            //Uses ipinfo.io to get the location of the IP Address, you can use another site but it will probably have a different implementation
                            $json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
                            //Breaks down the JSON object into an array
                            $json     = json_decode($json, true);
                            $ip       = $json['ip'];
                            $city     = $json['city'];
                            $region   = $json['region'];
                            $country  = $json['country'];
                            $timezone = $json['timezone'];

                            $sql = "INSERT INTO ip_location(ip_address,city,region,country_code,time_zone,user_id) VALUES (?,?,?,?,?,?)";
                            $stmt = mysqli_prepare($this->conn, $sql);
                            mysqli_stmt_bind_param($stmt, "sssssi", $ip, $city, $region, $country, $timezone, $_SESSION['userId']);
                            mysqli_stmt_execute($stmt);
                        }
                    } else {
                        $errors[] = 'Invalid Username or Password';
                        if (isset($hold['hold']) && $hold['hold'] >= 2) {
                            $attempt = $hold['hold'] + 1;
                            $addHold = "UPDATE user_account SET hold = '{$attempt}', hold_time = '{$time}' WHERE user_name='{$sqlfreeusername}' limit 1";
                            $resultSet = mysqli_query($this->conn, $addHold);

                            //set cookie
                            $val = 'fogot';
                            $_COOKIE['hold'] = $val;
                            // $cookie_name = "hold";
                            // $cookie_value = "fogot";
                            // setcookie($cookie_name, $cookie_value);


                            // header('Location:fogotPassword');
                            return $errors;
                        } else if (isset($hold['hold']) && $hold['hold'] >= 0) {
                            $attempt = $hold['hold'] + 1;
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

    public function readApartment()
    {
        $sql = "SELECT apartment_no FROM apartment WHERE status = '1' ";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function readFogot($username, $email)
    {
        $errors = array();

        $CheckUser = "SELECT user_id, type FROM user_account WHERE user_name='{$username}' limit 1";
        $resultuser = mysqli_query($this->conn, $CheckUser);

        if ($resultuser) {
            if (mysqli_num_rows($resultuser) == 1) {
                $user = mysqli_fetch_assoc($resultuser);

                $type = "SELECT user_id FROM {$user['type']} WHERE email='{$email}' limit 1";
                $resultuser = mysqli_query($this->conn, $type);
                $usertype = mysqli_fetch_assoc($resultuser);
                if ($usertype['user_id'] == $user['user_id']) {
                    $userId = $user['user_id'];
                    $time = date('sdm');

                    $newPassword = "Ab@$time.456";
                    // echo $newPassword;

                    //hashing the password
                    $hashpassword = sha1($newPassword);
                    $hash2password = sha1($hashpassword);

                    $change = "UPDATE user_account SET password = '{$hash2password}' WHERE user_id='{$userId}' limit 1";
                    $resultuser = mysqli_query($this->conn, $change);
                    if ($resultuser) {
                        $receiver = "$email";
                        $subject = "Hawlock RYCN details";
                        $body = "Your new password is : " . $newPassword;
                        $sender = "From:hawlockrycn@gmail.com";
                        mail($receiver, $subject, $body, $sender);
                    }
                } else {
                    $errors[] = "Email not match";
                }
            } else {
                $errors[] = "Username not valid";
            }
        } else {
            $errors[] = 'Database query failed';
        }

        // if($typeOrApartmentId !='admin' && $typeOrApartmentId !='manager' && $typeOrApartmentId !='receptionist' && $typeOrApartmentId !='trainer' && $typeOrApartmentId !='laundry' && $typeOrApartmentId !='parking'){

        //     $CheckEmail = "SELECT email FROM resident WHERE email='{$email}' limit 1";
        //     $resultEmail = mysqli_query($this->conn, $CheckEmail);

        //     if( mysqli_num_rows ($resultEmail) == 1){
        //         if($typeOrApartmentId !="#"){
        //             $sql = "SELECT * FROM resident WHERE apartment_no = '{$typeOrApartmentId}' AND email='{$email}' limit 1";
        //             $resultSet = mysqli_query($this->conn, $sql);

        //                 if ($resultSet) {
        //                         if ( mysqli_num_rows ($resultSet) == 1)
        //                     {
        //                         $result = mysqli_fetch_assoc($resultSet);
        //                         $userId  = $result['user_id'];
        //                         $time= date('sdm');

        //                         $newPassword = "Ab@.$time.456" ;
        //                         // echo $newPassword;

        //                         //hashing the password
        //                         $hashpassword = sha1($newPassword);
        //                         $hash2password= sha1($hashpassword);


        //                         $newpass = "UPDATE user_account SET password = '{$hash2password}' WHERE user_id='{$userId}' limit 1";
        //                         $resultNewPass = mysqli_query($this->conn, $newpass);

        //                         if($resultNewPass){
        //                             $receiver = "$email";
        //                             $subject = "Hawlock RYCN details";
        //                             $body = "Your new password is : ".$newPassword;
        //                             $sender = "From:hawlockrycn@gmail.com";
        //                             mail($receiver, $subject, $body, $sender);
        //                         }
        //                     }
        //                     else {
        //                         $errors[] = "Valid user not found";
        //                         return $errors;
        //                         }
        //                     }
        //         }
        //         else{
        //             $errors[] = "Select a apartment";
        //         }
        //     }
        //     else{
        //         $errors[] = "Enter a valid Email";
        //     }
        // }
        // else{
        //     $CheckEmailEmployee = "SELECT user_id FROM {$typeOrApartmentId} WHERE email='{$email}' limit 1";
        //     $resultEmployee = mysqli_query($this->conn, $CheckEmailEmployee);

        //     if($resultEmployee){
        //         if( mysqli_num_rows ($resultEmployee) == 1){

        //             $result = mysqli_fetch_assoc($resultEmployee);
        //             $userId  = $result['user_id'];
        //             $time= date('sdm');

        //             $newPassword = "Ab@.$time.456" ;
        //             // echo $newPassword;

        //             //hashing the password
        //             $hashpassword = sha1($newPassword);
        //             $hash2password= sha1($hashpassword);


        //             $newpass = "UPDATE user_account SET password = '{$hash2password}' WHERE user_id='{$userId}' limit 1";
        //             $resultNewPass = mysqli_query($this->conn, $newpass);

        //             if($resultNewPass){
        //                 $receiver = "$email";
        //                 $subject = "Hawlock RYCN details";
        //                 $body = "Your new password is : ".$newPassword;
        //                 $sender = "From:hawlockrycn@gmail.com";
        //                 mail($receiver, $subject, $body, $sender);
        //             }

        //         }
        //         else{
        //             $errors[] = "Select User type or Apartment";
        //         }
        //     }
        //     else{
        //         $errors[] = "Enter valid employee details";
        //     }
        // }

        return $errors;
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
    return $ipaddress;
}
