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

    public function updateProfile($name, $email, $id)
    {
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

    public function getAllFreeSlots()
    {
        $sql = "SELECT * FROM parking_slot WHERE apartment_no IS NULL";
        return $this->conn->query($sql);
    }

    public function getLastApartmentNo()
    {
        $sql = "SELECT apartment_no FROM apartment ORDER BY apartment_no DESC LIMIT 1";
        return $this->conn->query($sql);
    }

    public function insertNewApartment($apartmentNo, $floor, $parkingSlot)
    {
        $apartmentNo = $this->conn->real_escape_string($apartmentNo);
        $floor = $this->conn->real_escape_string($floor);
        $parkingSlot = $this->conn->real_escape_string($parkingSlot);

        $this->conn->autocommit(FALSE);
        $sql = "INSERT INTO apartment(apartment_no, floor_no, status) VALUES('{$apartmentNo}','{$floor}', 0)";
        $result1 = $this->conn->query($sql);
        $sql = "UPDATE parking_slot SET apartment_no = '{$apartmentNo}', status = 0 WHERE slot_no = '{$parkingSlot}'";
        $result2 = $this->conn->query($sql);

        // Commit transaction
        if ($result1 && $result2) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }

        return $result1 && $result2;
    }

    public function getMonthlyIncome()
    {
        $start = date("Y-m-1 00:00:00");
        $end = date("Y-m-t 23:59:59");
        $sql = "SELECT sum(amount) AS income FROM payment WHERE paid_date>='" . $start . "' AND paid_date<='" . $end . "'";
        return $this->conn->query($sql);
    }

    public function getTotalOverdue()
    {
        $sql = "SELECT sum(balance) AS due FROM resident";
        return $this->conn->query($sql);
    }

    public function getAllEarnings(){
        $sql = "SELECT date_format(paid_date, '%M %Y') AS monthYear, sum(amount) AS total from payment WHERE paid_date> CURDATE() - INTERVAL 11 month - day(CURDATE())  GROUP BY year(paid_date), month(paid_date) ORDER BY year(paid_date) DESC, month(paid_date) DESC";
        return $this->conn->query($sql);
    }

    public function getLast12HallRes(){
        $sql = "SELECT date_format(date, '%M %Y') AS monthYear, count(reservation_id) AS total from hall_reservation WHERE cancelled_time IS NULL AND date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(date), month(date) ORDER BY year(date) DESC, month(date) DESC";
        return $this->conn->query($sql);
    }
    public function getLast12FitnessRes(){
        $sql = "SELECT date_format(date, '%M %Y') AS monthYear, count(reservation_id) AS total from fitness_centre_reservation WHERE cancelled_time IS NULL AND date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(date), month(date) ORDER BY year(date) DESC, month(date) DESC";
        return $this->conn->query($sql);
    }
    public function getLast12TreatmentRes(){
        $sql = "SELECT date_format(date, '%M %Y') AS monthYear, count(reservation_id) AS total from treatment_room_reservation WHERE cancelled_time IS NULL AND date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(date), month(date) ORDER BY year(date) DESC, month(date) DESC";
        return $this->conn->query($sql);
    }
    public function getLast12ParkingRes(){
        $sql = "SELECT date_format(date, '%M %Y') AS monthYear, count(reservation_id) AS total from parking_slot_reservation WHERE cancelled_time IS NULL AND date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(date), month(date) ORDER BY year(date) DESC, month(date) DESC";
        return $this->conn->query($sql);
    }
    public function getLast12MaintenenceReq(){
        $sql = "SELECT date_format(preferred_date, '%M %Y') AS monthYear, count(request_id) AS total from technical_maintenence_request WHERE cancelled_time IS NULL AND state!='d' AND preferred_date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(preferred_date), month(preferred_date) ORDER BY year(preferred_date) DESC, month(preferred_date) DESC";
        return $this->conn->query($sql);
    }
    public function getLast12LaundryReq(){
        $sql = "SELECT date_format(request_date, '%M %Y') AS monthYear, count(request_id) AS total from laundry_request WHERE cancelled_time IS NULL AND state!=-1 AND request_date> CURDATE() - INTERVAL 11 month - day(CURDATE()) GROUP BY year(request_date), month(request_date) ORDER BY year(request_date) DESC, month(request_date) DESC";
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

    public function unlockThisUserAccount($user_name)
    {
        $sql = "UPDATE user_account set hold=0, hold_time=NULL WHERE user_name='{$user_name}'";
        return $this->conn->query($sql);
    }

    public function getAllLockedUsers()
    {
        $sql = "SELECT user_name, profile_pic, resident.apartment_no, resident.email, resident.nic, concat_ws(' ', resident.fname, resident.lname) AS name FROM `user_account` INNER JOIN resident ON user_account.user_id = resident.user_id WHERE hold=5 and hold_time > DATE_SUB(NOW(), INTERVAL 1200 SECOND)";
        return $this->conn->query($sql);
    }

    public function deleteThisUserAccount($user_id)
    {
        $sql = "DELETE FROM user_account WHERE user_id = '{$user_id}'";
        return $this->conn->query($sql);
    }

    public function updateThisEmployeeShift($employee_id,$shift_no1,$shift_no2,$shift_no3){
        $this->conn->autocommit(FALSE);
        $sql = "DELETE FROM employee_shift WHERE employee_id = '{$employee_id}'";
        $result1 = $this->conn->query($sql);
        $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no1}','{$employee_id}', 1)";
        $result2 = $this->conn->query($sql);
        $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no2}','{$employee_id}', 2)";
        $result3 = $this->conn->query($sql);
        $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no3}','{$employee_id}', 3)";
        $result4 = $this->conn->query($sql);
        // $sql = "UPDATE employee_shift SET week1='{$week1}', week2='{$week2}', week3='{$week3}' WHERE employee_id = '{$employee_id}'";
        // Commit transaction
        if ($result1 && $result2 && $result3 && $result4) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
        return $result1 && $result2 && $result3 && $result4;
    }

    public function getThisEmployeeShift($employee_id){
        $sql = "SELECT shift_no,week FROM employee_shift WHERE employee_id = '{$employee_id}' ORDER BY week";
        return $this->conn->query($sql);
    }

    public function getEmployeesCountByTypeDate()
    {
        $sql = "SELECT type,count(type) AS count,start_date FROM employee GROUP BY start_date,type";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getEmployee($empType, $empId)
    {
        $sql = "SELECT * FROM {$empType} WHERE employee_id='{$empId}'";
        return $this->conn->query($sql);
    }

    public function getEmployees()
    {
        $sql = "SELECT LEFT(start_date,4) AS year, COUNT(employee_id) as no_emps FROM employee WHERE user_id IS NOT NULL GROUP BY left(start_date,4) ORDER BY year ASC";
        return $this->conn->query($sql);
    }

    public function getAllEmployees($empType)
    {
        if ($empType == "manager" || $empType == "receptionist" || $empType == "parking_officer" || $empType == "trainer") {
            $sql = "SELECT * FROM {$empType} WHERE user_id IS NOT NULL";
            return $this->conn->query($sql);
        } else {
            $sql = "SELECT * FROM {$empType}";
            return $this->conn->query($sql);
        }
    }

    public function getALLEmployeeBYType()
    {
        $sql = "SELECT type, COUNT(employee_id) as no_emps FROM employee WHERE user_id IS NOT NULL GROUP BY type";
        return $this->conn->query($sql);
    }

    public function insertEmployee($empType, $fname, $lname, $email, $con, $fileName, $shift_no1=0, $shift_no2=0, $shift_no3=0)
    {
        $fname = $this->conn->real_escape_string($fname);
        $lname = $this->conn->real_escape_string($lname);
        $email = $this->conn->real_escape_string($email);
        $con = $this->conn->real_escape_string($con);
        $result1 = $result2 = $result3 = '';
        // Turn autocommit off
        // $this->conn->query("START TRANSACTION");
        $this->conn->autocommit(FALSE);

        $lastId = $this->conn->query("SELECT employee_id FROM `employee` ORDER BY employee_id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($lastId);
        $empId = (int)$row['employee_id'] + 1;
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
                $errors[] = 'Employee capacity is full';
            }
            $hashPassword = sha1($password);
            $hash2Password = sha1($hashPassword);

            $sql = "INSERT INTO user_account(user_name, password, type, profile_pic, hold) VALUES ('{$username}', '{$hash2Password}', '{$empType}', '{$fileName}', '0')";
            $result1 = $this->conn->query($sql);
            $userId = mysqli_insert_id($this->conn);

            $sql = "INSERT INTO employee(type, start_date, user_id) VALUES ('{$empType}', CURDATE(), '{$userId}')";
            $result2 = $this->conn->query($sql);
            $empId = mysqli_insert_id($this->conn);

            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date, user_id) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE(),'{$userId}')";
            $result3 = $this->conn->query($sql);

            if ($result1 && $result2 && $result3) {
                $receiver = "chathus.m1999@gmail.com";
                $subject = "Hawlock City Employee Login Credentials";
                $body = "Your Username : " . $username . " and password : " . $password;
                $sender = "From:hawlockrycn@gmail.com";
                mail($receiver, $subject, $body, $sender);
            }
        } else {
            $sql = "INSERT INTO employee(type, start_date, user_id) VALUES ('{$empType}', CURDATE(), 0)";
            $result2 = $this->conn->query($sql);
            $empId = mysqli_insert_id($this->conn);

            $sql = "INSERT INTO {$empType}(employee_id, fname, lname, contact_no, email, start_date) VALUES ('{$empId}','{$fname}','{$lname}','{$con}','{$email}', CURDATE())";
            $result3 = $this->conn->query($sql);
        }

        if ($empType == 'trainer' || $empType == 'treater'){
            $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no1}','{$empId}', 1)";
            $result4_1 = $this->conn->query($sql);
            $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no2}','{$empId}', 2)";
            $result4_2 = $this->conn->query($sql);
            $sql = "INSERT INTO employee_shift(shift_no,employee_id, week) VALUES ('{$shift_no3}','{$empId}', 3)";
            $result4_3 = $this->conn->query($sql);
            $result4 = $result4_1 && $result4_2 && $result4_3;
        }
        // Commit transaction
        if (($result1 && $result2 && $result3) || ($result2 && $result3) || ($result2 && $result3 && $result4) || ($result1 && $result2 && $result3 && $result4)) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
            $this->conn->query("ALTER TABLE employee AUTO_INCREMENT = 1");
        }
        return $result1 && $result2 && $result3 || $result2 && $result3 || $result2 && $result3 && $result4 || $result1 && $result2 && $result3 && $result4;
    }

    public function deleteThisEmployee($employee_id)
    {
        $sql = "DELETE FROM employee WHERE employee_id = '{$employee_id}'";
        return $this->conn->query($sql);
    }

    // public function updateThisEmployeeShift($employee_id){
    //     $sql = "";
    //     return $this->conn->query($sql);
    // }

    public function addService($type, $name, $fee, $cancleFee){
        $type = $this->conn->real_escape_string($type);
        $name = $this->conn->real_escape_string($name);
        $fee = $this->conn->real_escape_string($fee);
        $cancleFee = $this->conn->real_escape_string($cancleFee);

        $sql = "INSERT INTO service(type,name,fee,cancelation_fee,effect_date) VALUES('{$type}', '{$name}', '{$fee}', '{$cancleFee}', CURDATE());";
        return $this->conn->query($sql);
    }

    public function getAllServices()
    {
        $sql = "SELECT * FROM service";
        return $this->conn->query($sql);
    }

    public function updateThisService($serviceId, $newFee, $newCancleFee, $effectDate)
    {
        $sql = "UPDATE service SET new_fee='{$newFee}', next_cancelation_fee='{$newCancleFee}', effect_date='{$effectDate}' WHERE service_id='{$serviceId}'";
        return $this->conn->query($sql);
    }

    public function getThisServiceRate($serviceId){
        $sql = "SELECT fee, cancelation_fee FROM service WHERE service_id='{$serviceId}'";
        return $this->conn->query($sql);
    }

    public function getAllReservationsByDate($startDate, $endDate){
        $sql = "SELECT 'Hall' AS type,count(reservation_id) AS totalRes,count(cancelled_time) AS cancelRes FROM hall_reservation WHERE date BETWEEN '{$startDate}' AND '{$endDate}'
        UNION
        SELECT 'fitness' AS type,count(reservation_id) AS totalRes,count(cancelled_time) AS cancelRes FROM fitness_centre_reservation WHERE date BETWEEN '{$startDate}' AND '{$endDate}'
        UNION
        SELECT 'treatment' AS type,count(reservation_id) AS totalRes,count(cancelled_time) AS cancelRes FROM treatment_room_reservation WHERE date BETWEEN '{$startDate}' AND '{$endDate}'
        UNION
        SELECT 'parking' AS type,count(reservation_id) AS totalRes,count(cancelled_time) AS cancelRes FROM parking_slot_reservation WHERE date BETWEEN '{$startDate}' AND '{$endDate}'
        UNION
        SELECT 'laundry' AS type,count(request_id) AS totalRes,count(cancelled_time) AS cancelRes FROM laundry_request WHERE request_date BETWEEN '{$startDate}' AND '{$endDate}' AND state!=3
        UNION
        SELECT 'technical' AS type,count(request_id) AS totalRes,count(cancelled_time) AS cancelRes FROM technical_maintenence_request WHERE request_date BETWEEN '{$startDate}' AND '{$endDate}' AND state!='d'";
        return $this->conn->query($sql);
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

    public function getAllResidentDataBySearch($searchValue){
        $sql = "SELECT * from resident WHERE fname LIKE '%$searchValue%' OR lname LIKE '%$searchValue%' nic LIKE '%$searchValue%' phone_no  LIKE '%$searchValue%' email  LIKE '%$searchValue%' vehicle_no  LIKE '%$searchValue%' apartment_no  LIKE '%$searchValue%'";
        return $this->conn->query($sql);
    }

}
