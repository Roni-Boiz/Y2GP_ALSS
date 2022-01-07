<?php

require '../app/core/model.php';

class adminModel extends model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getProfileDetails($id)
    {
        $sql = "SELECT * FROM admin NATURAL JOIN user_account WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateProfile($name,$email,$id){
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);

        $sql = "UPDATE admin SET name = ?, email = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getAllApartments()
    {
        $sql = "SELECT * FROM apartment";
        return $this->conn->query($sql);
    }

    public function getAllFreeSlots(){
        $sql = "SELECT * FROM parking_slot WHERE apartment_no IS NULL";
        return $this->conn->query($sql);
    }

    public function getLastApartmentNo(){
        $sql = "SELECT apartment_no FROM apartment ORDER BY apartment_no DESC LIMIT 1";
        return $this->conn->query($sql);
    }

    public function insertNewApartment($apartmentNo, $floor, $parkingSlot){
        $apartmentNo = $this->conn->real_escape_string($apartmentNo);
        $floor = $this->conn->real_escape_string($floor);
        $parkingSlot = $this->conn->real_escape_string($parkingSlot);

        $sql = "INSERT INTO apartment(apartment_no, floor_no, status) VALUES('{$apartmentNo}','{$floor}', 0)";
        $result1 = $this->conn->query($sql);
        $sql = "UPDATE parking_slot SET apartment_no = '{$apartmentNo}', status = 0 WHERE slot_no = '{$parkingSlot}'";
        $result2 = $this->conn->query($sql);
        return $result1 && $result2;
    }

    public function getMonthlyIncome(){
        $start = date("Y-m-1 00:00:00");
        $end = date("Y-m-t 23:59:59");
        $sql = "SELECT sum(amount) AS income FROM payment WHERE paid_date>='".$start."' AND paid_date<='".$end."'";
        return $this->conn->query($sql);
    }

    public function getTotalOverdue(){
        $sql = "SELECT sum(balance) AS due FROM resident";
        return $this->conn->query($sql);
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

    public function getAllOnlineUsers()
    {
        $timeLimit = 300;
        $sql = "SELECT DISTINCT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type,concat_ws(' ' ,resident.fname,resident.lname) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id INNER JOIN resident ON user_account.user_id = resident.user_id  WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND) 
        UNION 
        SELECT DISTINCT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type, concat_ws(' ' ,manager.fname,manager.lname) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id INNER JOIN manager ON user_account.user_id = manager.user_id  WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND)
        UNION 
        SELECT DISTINCT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type, concat_ws(' ' ,receptionist.fname,receptionist.lname) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id INNER JOIN receptionist ON user_account.user_id = receptionist.user_id  WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND)
        UNION 
        SELECT DISTINCT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type, concat_ws(' ' ,trainer.fname,trainer.lname) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id INNER JOIN trainer ON user_account.user_id = trainer.user_id  WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND)
        UNION 
        SELECT DISTINCT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type, concat_ws(' ' , parking_officer.fname,parking_officer.lname) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id INNER JOIN parking_officer ON user_account.user_id = parking_officer.user_id  WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND)";
        // $sql = "SELECT ip_location.user_id, user_account.user_name, user_account.profile_pic, user_account.type, concat(concat_ws(' ', resident.fname, resident.lname),concat_ws(' ', manager.fname, manager.lname)) as name FROM ip_location INNER JOIN user_account ON ip_location.user_id = user_account.user_id LEFT JOIN resident ON user_account.user_id=resident.user_id LEFT JOIN manager ON user_account.user_id=manager.user_id WHERE last_activity > DATE_SUB(NOW(), INTERVAL '{$timeLimit}' SECOND) AND user_account.type != 'admin'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function unlockThisUserAccount($user_name){
        $sql = "UPDATE user_account set hold=0, hold_time=NULL WHERE user_name='{$user_name}'";
        return $this->conn->query($sql);
    }

    public function getAllLockedUsers(){
        $sql = "SELECT user_name, profile_pic, resident.apartment_no, resident.email, resident.nic, concat_ws(' ', resident.fname, resident.lname) AS name FROM `user_account` INNER JOIN resident ON user_account.user_id = resident.user_id WHERE hold=5 and hold_time > DATE_SUB(NOW(), INTERVAL 1200 SECOND)";
        return $this->conn->query($sql);
    }
    
    public function getEmployeesCountByTypeDate()
    {
        $sql = "SELECT type,count(type) AS count,start_date FROM `employee` GROUP BY start_date,type";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function insertAnnouncement($topic, $content, $category, $fileName, $id)
    {
        $topic = $this->conn->real_escape_string($topic);
        $content = $this->conn->real_escape_string($content);
        $category = $this->conn->real_escape_string($category);
        $fileName = $this->conn->real_escape_string($fileName);
        $id = $this->conn->real_escape_string($id);

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
        $result1 = $result2 = $result3 = '';
        // Turn autocommit off
        $this->conn->autocommit(FALSE);

        $sql = "INSERT INTO employee(type, start_date) VALUES ('{$empType}', CURDATE())";
        $result1 = $this->conn->query($sql);
        $empId = mysqli_insert_id($this->conn);
        $username = '';
        $password = '';
        $userId = '';
        if ($empType == 'manager' || $empType == 'receptionist' || $empType == 'parking_officer' || $empType == 'trainer') {
            $userType = ($empType == 'manager' ? "MA" : ($empType == 'receptionist' ? "RE" : ($empType == 'parking_officer' ? "PO" : "TR")));
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
            $result2 = $this->conn->query($sql);
            $userId = mysqli_insert_id($this->conn);

            if ($result1 && $result2) {
                $receiver = "chathus.m1999@gmail.com";
                $subject = "Hawlock City Employee Login Credentials";
                $body = "Your Username : " . $username . " and password : " . $password;
                $sender = "From:hawlockrycn@gmail.com";
                mail($receiver, $subject, $body, $sender);
            }

            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date, user_id) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE(),'{$userId}')";
            $result3 = $this->conn->query($sql);
        } else {
            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE())";
            $result3 = $this->conn->query($sql);
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
        return $result3;
    }

    public function getAllServices()
    {
        $sql = "SELECT * FROM service";
        return $this->conn->query($sql);
    }

    
}
