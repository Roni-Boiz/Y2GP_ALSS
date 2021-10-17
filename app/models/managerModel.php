<?php

require '../app/core/model.php';

class managerModel extends model {
    function __construct(){
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

    public function updateProfile($fname,$lname,$email,$cno,$id){
        $fname = $this->conn->real_escape_string($fname);
        $lname = $this->conn->real_escape_string($lname);
        $email = $this->conn->real_escape_string($email);
        $cno = $this->conn->real_escape_string($cno);

        $sql = "UPDATE manager SET fname = ?, lname = ?, email = ? , contact_no = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $fname, $lname, $email, $cno, $id);
        return $stmt->execute();
    }

    public function getAllCOmplaints(){
        $sql = "SELECT complaint.*,resident.fname,resident.lname,resident.apartment_no FROM complaint left join resident on complaint.resident_id = resident.resident_id";
        return $this->conn->query($sql);
    }

    

}