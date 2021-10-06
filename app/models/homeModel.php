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

        $errors = array();
        // check for the sql queries
        $sqlfreeusername = mysqli_real_escape_string($this->conn, $username);
        $sqlfreepassword = mysqli_real_escape_string($this->conn, $password);

        if (strlen(trim($sqlfreeusername)) < 1) {
            $errors[] = 'Enter a valid Username';
        }

        if (strlen(trim($sqlfreepassword)) < 8) {
            $errors[] = 'Enter a valid Password';
        }
        //    echo $password;
        //    echo $hash2password;

        if (empty($errors)) {



            //hashing the password
            $hashpassword = sha1($sqlfreepassword);
            $hash2password = sha1($hashpassword);

            $sql = "SELECT * FROM user_account WHERE user_name='{$sqlfreeusername}' AND Password='{$hash2password}' limit 1";
            $resultSet = mysqli_query($this->conn, $sql);

            if ($resultSet) {
                //query successfull

                if (mysqli_num_rows($resultSet) == 1) {
                    //valid user found
                    $user = mysqli_fetch_assoc($resultSet);
                    session_start();
                    $_SESSION['userId'] = $user['user_id'];
                    $_SESSION['userName'] = $user['user_name'];
                    $_SESSION['type'] = $user['type'];
                    $_SESSION['profilePic'] = $user['profile_pic'];

                    //Gets the IP Address from the visitor
                    $PublicIP =  get_client_ip(); //get_client_ip();  //"112.135.65.171"
                    if ($PublicIP != "::1") {
                        //Uses ipinfo.io to get the location of the IP Address, you can use another site but it will probably have a different implementation
                        $json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
                        //Breaks down the JSON object into an array
                        $json     = json_decode($json, true);
                        $ip = $json['ip'];
                        $city     = $json['city'];
                        $region   = $json['region'];
                        $country  = $json['country'];
                        $timezone = $json['timezone'];

                        $sql = "INSERT INTO ip_location(ip_address,city,region,country_code,time_zone,user_id) VALUES (?,?,?,?,?,?)";
                        $stm=mysqli_prepare($this->conn,$sql);
                        mysqli_stmt_bind_param($stm,"sssssi",$ip,$city,$region,$country,$timezone,$_SESSION['userId']);
                        mysqli_stmt_execute($stm);
                    }
                } else {
                    $errors[] = 'Invalid Username or Password';
                }
            } else {
                $errors[] = 'Database query failed';
            }
        }
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
