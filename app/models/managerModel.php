<?php

require '../app/core/model.php';

class managerModel extends model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertAnnouncement($topic, $content, $category, $fileName, $id)
    {
        $manager = $this->conn->query("SELECT employee_id FROM manager WHERE user_id='{$id}'");
        if ($manager) {
            $id = mysqli_fetch_assoc($manager);
            $managerId = $id['employee_id'];
        }
        $sql = "INSERT INTO announcement(topic,content,category,date,file_name,employee_id) VALUES ('{$topic}','{$content}','{$category}',NOW(),'{$fileName}','{$managerId}')";
        return $this->conn->query($sql);
    }

    public function getProfileDetails($id)
    {
        $sql = "SELECT * FROM manager NATURAL JOIN user_account WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateProfile($fname, $lname, $email, $cno, $id)
    {
        $fname = $this->conn->real_escape_string($fname);
        $lname = $this->conn->real_escape_string($lname);
        $email = $this->conn->real_escape_string($email);
        $cno = $this->conn->real_escape_string($cno);

        $sql = "UPDATE manager SET fname = ?, lname = ?, email = ? , contact_no = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $fname, $lname, $email, $cno, $id);
        return $stmt->execute();
    }

    public function updateLoginDetails($date, $id)
    {
        $sql = "UPDATE ip_location SET last_activity ='{$date}' WHERE sl_no = '{$id}'";
        return $this->conn->query($sql);
    }

    public function getAllComplaints()
    {
        $sql = "SELECT complaint.*,resident.fname,resident.lname,resident.apartment_no FROM complaint LEFT JOIN resident ON complaint.resident_id = resident.resident_id ORDER BY date_time DESC";
        return $this->conn->query($sql);
    }

    public function getTodayHallRes()
    {
        $sql = "SELECT hall_reservation.*,resident.fname,resident.lname FROM hall_reservation LEFT JOIN resident ON hall_reservation.resident_id=resident.resident_id WHERE cancelled_time IS NULL AND date = CURDATE() ORDER BY date,start_time";
        return $this->conn->query($sql);
    }

    public function getTodayFitnessRes()
    {
        $sql = "SELECT fitness_centre_reservation.*,resident.fname AS rfname,resident.lname AS rlname,trainer.fname AS tfname, trainer.lname AS tlname FROM fitness_centre_reservation LEFT JOIN resident on fitness_centre_reservation.resident_id=resident.resident_id LEFT JOIN trainer ON fitness_centre_reservation.employee_id=trainer.employee_id WHERE cancelled_time IS NULL AND date = CURDATE() ORDER BY date,start_time";
        return $this->conn->query($sql);
    }

    public function getTodayTreatmentRes()
    {
        $sql = "SELECT treatment_room_reservation.*,resident.fname AS rfname,resident.lname AS rlname,treater.fname AS tfname, treater.lname AS tlname FROM treatment_room_reservation LEFT JOIN resident ON treatment_room_reservation.resident_id=resident.resident_id LEFT JOIN treater ON treatment_room_reservation.employee_id=treater.employee_id WHERE cancelled_time IS NULL AND date = CURDATE() ORDER BY date,start_time";
        return $this->conn->query($sql);
    }

    public function getAllHallRes()
    {
        $sql = "SELECT hall_reservation.*,resident.fname,resident.lname FROM hall_reservation LEFT JOIN resident on hall_reservation.resident_id=resident.resident_id ORDER BY reserved_time DESC";
        return $this->conn->query($sql);
    }

    public function getAllFitnessRes()
    {
        $sql = "SELECT fitness_centre_reservation.*,resident.fname AS rfname,resident.lname AS rlname,trainer.fname AS tfname, trainer.lname AS tlname FROM fitness_centre_reservation LEFT JOIN resident ON fitness_centre_reservation.resident_id=resident.resident_id LEFT JOIN trainer ON fitness_centre_reservation.employee_id=trainer.employee_id ORDER BY reserved_time DESC";
        return $this->conn->query($sql);
    }

    public function getAllTreatmentRes()
    {
        $sql = "SELECT treatment_room_reservation.*,resident.fname AS rfname,resident.lname AS rlname,treater.fname AS tfname, treater.lname AS tlname FROM treatment_room_reservation LEFT JOIN resident ON treatment_room_reservation.resident_id=resident.resident_id LEFT JOIN treater ON treatment_room_reservation.employee_id=treater.employee_id ORDER BY reserved_time DESC";
        return $this->conn->query($sql);
    }

    public function getTodayPendingTechnicalReq()
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id WHERE state='P' AND technical_maintenence_request.preferred_date=CURDATE() ORDER BY preferred_date ASC";
        return $this->conn->query($sql);
    }

    public function getAllPendingTechnicalReq()
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id WHERE state='P' ORDER BY preferred_date ASC";
        return $this->conn->query($sql);
    }

    public function getAllInprogressTechnicalReq()
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no,technician.fname AS tfname, technician.lname AS tlname FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id LEFT JOIN technician ON technical_maintenence_request.employee_id=technician.employee_id WHERE state='I' ORDER BY preferred_date ASC";
        return $this->conn->query($sql);
    }

    public function getAllCompletedTechnicalReq()
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no,technician.fname AS tfname, technician.lname AS tlname FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id LEFT JOIN technician ON technical_maintenence_request.employee_id=technician.employee_id WHERE state='C' ORDER BY preferred_date ASC";
        return $this->conn->query($sql);
    }

    public function getAllDeclinedTechnicalReq()
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id WHERE state='D' ORDER BY request_id DESC";
        return $this->conn->query($sql);
    }

    public function getUpcommingRequests($date)
    {
        $sql = "SELECT technical_maintenence_request.*,resident.fname,resident.lname,resident.apartment_no,user_account.profile_pic FROM technical_maintenence_request LEFT JOIN resident ON technical_maintenence_request.resident_id=resident.resident_id LEFT JOIN user_account ON resident.user_id=user_account.user_id WHERE state='P' AND preferred_date<='{$date}' ORDER BY preferred_date ASC";
        return $this->conn->query($sql);
    }

    public function getUpcommingHallReservations($date)
    {
        $sql = "SELECT hall_reservation.*,resident.fname,resident.lname,resident.apartment_no,user_account.profile_pic FROM hall_reservation LEFT JOIN resident ON hall_reservation.resident_id=resident.resident_id LEFT JOIN user_account ON resident.user_id=user_account.user_id WHERE cancelled_time IS NULL AND date>=CURDATE() AND date<='{$date}' ORDER BY date,start_time ASC";
        return $this->conn->query($sql);
    }

    public function getAllFreeTechnicians()
    {
        $sql = "SELECT technician.* FROM technician WHERE technician.employee_id NOT IN (SELECT technical_maintenence_request.employee_id FROM technical_maintenence_request WHERE technical_maintenence_request.state = 'i')";
        return $this->conn->query($sql);
    }

    public function updateThisRequest($requestId, $employeeId, $employeeName)
    {
        // Turn autocommit off
        // $this->conn->query("START TRANSACTION");
        $this->conn->autocommit(FALSE);
        $sql = "UPDATE technical_maintenence_request SET employee_id='{$employeeId}', state='i' WHERE request_id='{$requestId}'";
        $result1 = $this->conn->query($sql);

        $result2 = $this->conn->query("SELECT resident_id FROM technical_maintenence_request WHERE request_id='{$requestId}'");
        $row = mysqli_fetch_assoc($result2);
        $residentId = (int)$row['resident_id'];

        $result3 = $this->conn->query("SELECT user_id FROM resident WHERE resident_id='{$residentId}'");
        $row = mysqli_fetch_assoc($result3);
        $userId = (int)$row['user_id'];

        $desc = "Your request(request ID-" . $requestId . ") has been accepted. Technician " . $employeeName . " will come for your repair";
        $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0);";
        $result4 = $this->conn->query($sql);

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

    public function addChargeToRequest($requestId, $fee)
    {
        $this->conn->autocommit(FALSE);
        $sql = "UPDATE technical_maintenence_request SET fee='{$fee}', state='c' WHERE request_id='{$requestId}'";
        $result1 = $this->conn->query($sql);

        $result2 = $this->conn->query("SELECT resident_id FROM technical_maintenence_request WHERE request_id='{$requestId}'");
        $row = mysqli_fetch_assoc($result2);
        $residentId = (int)$row['resident_id'];

        $result3 = $this->conn->query("SELECT user_id FROM resident WHERE resident_id='{$residentId}'");
        $row = mysqli_fetch_assoc($result3);
        $userId = (int)$row['user_id'];

        $desc = "Your request(request ID-" . $requestId . ") has been completed. A charge of Rs." . $fee . " will add to your current monthly bill";
        $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
        $result4 = $this->conn->query($sql);

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

    public function addCancelTimeToRequest($requestId, $reason)
    {
        $this->conn->autocommit(FALSE);
        $sql = "UPDATE technical_maintenence_request SET cancelled_time=NOW(), state='d' WHERE request_id='{$requestId}'";
        $result1 = $this->conn->query($sql);

        $result2 = $this->conn->query("SELECT resident_id FROM technical_maintenence_request WHERE request_id='{$requestId}'");
        $row = mysqli_fetch_assoc($result2);
        $residentId = (int)$row['resident_id'];

        $result3 = $this->conn->query("SELECT user_id FROM resident WHERE resident_id='{$residentId}'");
        $row = mysqli_fetch_assoc($result3);
        $userId = (int)$row['user_id'];

        $desc = "Your request(request ID-" . $requestId . ") has been declined. Because " . $reason . ". Contact management for any clarification";
        $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
        $result4 = $this->conn->query($sql);

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

    public function emergencyRemoveThisReservation($reservationId, $reason)
    {
        $this->conn->autocommit(FALSE);

        $type = $reservationId[0];
        $reservationId = (int)substr($reservationId, 1);
        $result1 =  $result2 = $result3 =  $result4 = $result5 = '';
        $residentId = '';
        if ($type == 'H') {
            $sql = "UPDATE hall_reservation SET cancelled_time=NOW(), fee=0 WHERE reservation_id='{$reservationId}'";
            $result1 = $this->conn->query($sql);

            $result2 = $this->conn->query("SELECT resident_id FROM hall_reservation WHERE reservation_id='{$reservationId}'");
            $row = mysqli_fetch_assoc($result2);
            $residentId = (int)$row['resident_id'];

            $result3 = true;
        } elseif ($type == 'F') {
            $sql = "UPDATE fitness_centre_reservation SET cancelled_time=NOW(), fee=0 WHERE reservation_id='{$reservationId}'";
            $result1 = $this->conn->query($sql);

            $result2 = $this->conn->query("SELECT resident_id FROM fitness_centre_reservation WHERE reservation_id='{$reservationId}'");
            $row = mysqli_fetch_assoc($result2);

            $residentId = (int)$row['resident_id'];

            // Reduce fitness reservation count
            $res = mysqli_fetch_assoc($this->conn->query("SELECT start_time,end_time,date from fitness_centre_reservation where reservation_id='{$reservationId}'"));
            $stime = $res['start_time'];
            $etime = $res['end_time'];
            $d = $res['date'];

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
                $result3 = $this->conn->query($sql3);
                $count++;
                // echo "\n".$sql3;
            }
        } elseif ($type == 'T') {
            $sql = "UPDATE treatment_room_reservation SET cancelled_time=NOW(), fee=0 WHERE reservation_id='{$reservationId}'";
            $result1 = $this->conn->query($sql);

            $result2 = $this->conn->query("SELECT resident_id FROM treatment_room_reservation WHERE reservation_id='{$reservationId}'");
            $row = mysqli_fetch_assoc($result2);
            $residentId = (int)$row['resident_id'];

            //get fee query
            $res = mysqli_fetch_assoc($this->conn->query("SELECT start_time,end_time,date from treatment_room_reservation where reservation_id='{$reservationId}'"));
            $stime = $res['start_time'];
            $etime = $res['end_time'];
            $d = $res['date'];

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
                $result3 = $this->conn->query($sql3);
                $count++;
            }
        }

        $result4 = $this->conn->query("SELECT user_id FROM resident WHERE resident_id='{$residentId}'");
        $row = mysqli_fetch_assoc($result4);
        $userId = (int)$row['user_id'];

        if ($type == 'H') {
            $desc = "Your hall reservation(reservation ID-" . $reservationId . ") has been emergency removed. Because " . $reason . ". Reservation fee also deducted from your monthly bill. Contact management for any clarification";
            $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
            $result5 = $this->conn->query($sql);
        } elseif ($type == 'F') {
            $desc = "Your fitness center reservation(reservation ID-" . $reservationId . ") has been emergency removed. Because " . $reason . ". Reservation fee also deducted from your monthly bill. Contact management for any clarification";
            $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
            $result5 = $this->conn->query($sql);
        } elseif ($type == 'T') {
            $desc = "Your treatment room reservation(reservation ID-" . $reservationId . ") has been emergency removed. Because " . $reason . ". Reservation fee also deducted from your monthly bill. Contact management for any clarification";
            $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
            $result5 = $this->conn->query($sql);
        }

        // Commit transaction
        if ($result1 && $result2 && $result3 && $result4 && $result5) {
            $this->conn->commit();
            $this->conn->autocommit(TRUE);
        } else {
            // Rollback transaction
            // echo "Commit transaction failed";
            $this->conn->rollback();
            $this->conn->autocommit(TRUE);
        }
        return $result1 && $result2 && $result3 && $result4 && $result5;
    }

    public function updateComplaint($complaintId, $userId)
    {
        $this->conn->autocommit(FALSE);
        $manager = $this->conn->query("SELECT employee_id FROM manager WHERE user_id='{$userId}'");
        if ($manager) {
            $id = mysqli_fetch_assoc($manager);
            $managerId = $id['employee_id'];
        }
        $sql = "UPDATE complaint SET employee_id='{$managerId}' WHERE complaint_id='{$complaintId}'";
        $result1 = $this->conn->query($sql);

        $result2 = $this->conn->query("SELECT resident_id FROM complaint WHERE complaint_id='{$complaintId}'");
        $row = mysqli_fetch_assoc($result2);
        $residentId = (int)$row['resident_id'];

        $result3 = $this->conn->query("SELECT user_id FROM resident WHERE resident_id='{$residentId}'");
        $row = mysqli_fetch_assoc($result3);
        $userId = (int)$row['user_id'];

        $desc = "Your complaint(complaint no-" . $complaintId . ") has been considerd and resolve. Feel free to contact us for further actions";
        $sql = "INSERT INTO notification(date,time,description,user_id,view) VALUES (CURDATE(),CURTIME(),'{$desc}','{$userId}',0)";
        $result4 = $this->conn->query($sql);

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

    public function getAllSubstituteStaff($type, $employeeId, $resDate){

        if($type == 'treatment'){
            $week = (int)date('W', strtotime($resDate)) % 3 + 1 ;
            $result1 = $this->conn->query("SELECT shift_no FROM employee_shift WHERE employee_id='{$employeeId}' AND week='{$week}'");
            $shift = mysqli_fetch_assoc($result1);
            $shiftNo = $shift['shift_no'];
            $sql = "SELECT treater.* FROM treater WHERE treater.employee_id IN (SELECT employee_id FROM employee_shift WHERE shift_no='{$shiftNo}' AND week='{$week}')";
            return $this->conn->query($sql);
        }else{
            $week = (int)date('W', strtotime($resDate)) % 3 + 1 ;
            $result1 = $this->conn->query("SELECT shift_no FROM employee_shift WHERE employee_id='{$employeeId}' AND week='{$week}'");
            $shift = mysqli_fetch_assoc($result1);
            $shiftNo = $shift['shift_no'];
            $sql = "SELECT trainer FROM trainer WHERE trainer.employee_id IN (SELECT employee_id FROM employee_shift WHERE shift_no='{$shiftNo}' AND week='{$week}')";
            return $this->conn->query($sql);
        }

    }
}
