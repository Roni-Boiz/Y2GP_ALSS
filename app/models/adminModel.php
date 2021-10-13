<?php

require '../app/core/model.php';

class adminModel extends model
{
    function __construct()
    {
        parent::__construct();
    }

    // public function readTable(){
    //     $sql = "SELECT * FROM user_account";
    //     $result = $this->conn->query($sql);   
    //     return $result;

    //     // $sql = "SELECT * FROM user_account";
    //     // $result = $this->db->runQuery($sql);   
    //     // return $result;
    // }

    public function getProfileDetails($id)
    {
        $sql = "SELECT * FROM admin NATURAL JOIN user_account WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getMyDoList($id)
    {
        $sql = "SELECT * FROM task_list WHERE user_id='{$id}' ORDER BY task_list_id DESC";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user_account ORDER BY type ASC";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getEmployeesCountByTypeDate()
    {
        $sql = "SELECT type,count(type) AS count,start_date FROM `employee` GROUP BY start_date,type";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function insertAnnouncement($topic, $content, $category, $fileName, $id)
    {
        $admin = $this->conn->query("SELECT admin_id FROM admin WHERE user_id='{$id}'");
        if ($admin) {
            $id = mysqli_fetch_assoc($admin);
            $adminId = $id['admin_id'];
        }
        $sql = "INSERT INTO announcement(topic,content,category,date,file_name,admin_id) VALUES ('{$topic}','{$content}','{$category}',NOW(),'{$fileName}','{$adminId}')";
        return $this->conn->query($sql);
    }

    public function getEmployee($empType, $empId)
    {
        $sql = "SELECT * FROM {$empType} WHERE employee_id='{$empId}'";
        return $this->conn->query($sql);
    }

    public function getAllEmployees($empType)
    {
        $sql = "SELECT * FROM {$empType}";
        return $this->conn->query($sql);
    }

    public function insertEmployee($empType, $fname, $lname, $email, $con, $fileName)
    {

        $fname = $this->conn->real_escape_string($fname);
        $lname = $this->conn->real_escape_string($lname);
        $email = $this->conn->real_escape_string($email);
        $con = $this->conn->real_escape_string($con);

        // Turn autocommit off
        $this->conn->autocommit(FALSE);

        $sql = "INSERT INTO employee(type,start_data) VALUES ('{$empType}', CURDATE())";
        $this->conn->query($sql);
        $empId = mysqli_insert_id($this->conn);
        $username = '';
        $password = '';
        $userId = '';
        if ($empType == 'manager' || $empType == 'reseptionist' || $empType == 'parking_officer' || $empType == 'trainer') {
            $userType = ($empType == 'manager' ? "MA" : ($empType == 'reseptionist' ? "RE" : ($empType == 'parking_officer' ? "PO" : "TR")));
            if ($empId < 10) {
                $username = $userType . '000' . $empId;
                $password = 'Hawlock@000' . $empId;
            } else if ($empId < 100) {
                $username = $userType . '00' . $empId;
                $password = 'Hawlock@00' . $empId;
            } else if ($empId < 1000) {
                $username = $userType . '0' . $empId;
                $password = 'Hawlock@0' . $empId;
            } else if ($empId < 10000) {
                $username = $userType . $empId;
                $password = 'Hawlock@' . $empId;
            } else {
                $errors[] = 'User capacity is full';
            }
            $hashPassword = sha1($password);
            $hash2Password = sha1($hashPassword);

            $sql = "INSERT INTO user_account(user_name, password, type, profile_pic, hold) VALUES ('{$username}', '{$hash2Password}', '{$empType}', '{$fileName}', '0')";
            $result = $this->conn->query($sql);
            $userId = mysqli_insert_id($this->conn);

            if ($result) {
                $receiver = "chathus.m1999@gmail.com";
                $subject = "Hawlock RYNC Employee Login Details";
                $body = "Your Username : " . $username . " and password : " . $password;
                $sender = "From:hawlockrycn@gmail.com";
                mail($receiver, $subject, $body, $sender);
            }

            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date, user_id) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE(),'{$userId}')";
            $insert = $this->conn->query($sql);
        } else {
            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE())";
            $insert = $this->conn->query($sql);
        }
        // Commit transaction
        if (!$this->conn->commit()) {
            echo "Commit transaction failed";
            $this->conn->autocommit(TRUE);
            return false;
        }
        // Rollback transaction
        $this->conn->rollback();
        $this->conn->autocommit(TRUE);
        return $insert;
    }

    public function getAllServices()
    {
        $sql = "SELECT * FROM service";
        return $this->conn->query($sql);
    }
}
