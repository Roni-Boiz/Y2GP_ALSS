<?php

require '../app/core/model.php';

class laundryModel extends model {
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
    public function profile(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM laundry WHERE user_id={$_SESSION['userId']}";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function editProfile($fname,$lname,$email,$contact){
        $sql="UPDATE laundry SET fname='$fname', lname='$lname', email='$email', contact_no='$contact' WHERE user_id={$_SESSION['userId']}";
        $this->conn->query($sql);

    }
    public function changePassword( $opw,$npw,$rnpw){
        $errors=array();
        $hashPassword = sha1($rnpw);
        $hash2Password = sha1($hashPassword);
        
        $sql = "SELECT password from user_account WHERE user_id={$_SESSION['userId']} LIMIT 1";
        $oldpw = mysqli_fetch_assoc($this->conn->query($sql));
        $oldpw = $oldpw["password"];
        $hashPassword = sha1($opw);
        $hash2Password = sha1($hashPassword);
        if($hash2Password==$oldpw){
            if($npw==$rnpw){
                $hashPassword = sha1($rnpw);
                $hash2Password = sha1($hashPassword);
                $sql = "UPDATE user_account SET password='{$hash2Password}' WHERE user_id={$_SESSION['userId']}";
                if($this->conn->query($sql)){
                
                }        
            }else{
                $errors[]="doesn't match new passwords";
            }     
        }else{
            $errors[]="doesn't match with previous password";
        }
        return $errors;
    }
    public function getNewRequests(){
        $sql = "SELECT resident.apartment_no,laundry_request.request_id,laundry_request.request_date,laundry_request.preferred_date,laundry_request.description,laundry_request.type FROM resident INNER JOIN laundry_request ON resident.resident_id=laundry_request.resident_id WHERE laundry_request.state=0";
        // $sql = "SELECT * FROM laundry_request WHERE status=1";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function getselectedNew($id){
        $sql="SELECT laundry_request.request_id,laundry_request.type,laundry_request.preferred_date,laundry_request.request_date,laundry_request.description,category.category_no,category.weight,category.qty FROM laundry_request INNER JOIN category ON laundry_request.request_id = category.request_id WHERE laundry_request.request_id='$id'";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function getCleaningRequests(){
        $sql = "SELECT resident.apartment_no,laundry_request.request_id,laundry_request.request_date,laundry_request.description,laundry_request.type FROM resident INNER JOIN laundry_request ON resident.resident_id=laundry_request.resident_id WHERE laundry_request.state=1";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function getselectedCleaning($id){
        $sql="SELECT laundry_request.request_id,laundry_request.type,laundry_request.request_date,laundry_request.state,category.category_no,category.qty FROM laundry_request INNER JOIN category ON laundry_request.request_id = category.request_id WHERE laundry_request.request_id='$id' AND category.state=1 ";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function getCompletedRequests(){
        $sql = "SELECT resident.apartment_no,laundry_request.request_id,laundry_request.request_date,laundry_request.description,laundry_request.type,laundry_request.fee FROM resident INNER JOIN laundry_request ON resident.resident_id=laundry_request.resident_id WHERE laundry_request.state=2";
        $result = $this->conn->query($sql);   
        return $result;
    }
    public function getLoginDevices($id)
    {
        $sql = "SELECT * FROM ip_location WHERE user_id='{$id}'";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function getReqDetails($id){
        $sql= "SELECT category_no,weight,qty FROM category WHERE request_id='$id'";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function acceptRequest($id,$cat1,$cat2,$cat3){
        $sql1="UPDATE laundry_request SET state=1 WHERE request_id='$id'";
        // echo $id;
        $this->conn->query($sql1);
        $sql2="SELECT resident.user_id as id FROM resident INNER JOIN laundry_request ON resident.resident_id=laundry_request.resident_id WHERE request_id='$id'";
        $userId=mysqli_fetch_assoc($this->conn->query($sql2));
        $userId=$userId["id"];
        date_default_timezone_set("Asia/Colombo");
        $date=date('Y-m-d');
        $time=date('H:i:s');
        echo $cat1."".$cat2;
        $msg="";
        if($cat1==1){
            $msg=$msg."category 1 ";
        }else{
            $sql3="UPDATE category SET state=0 WHERE request_id='$id' AND category_no=1 ";
            $this->conn->query($sql3);
        }    
        if($cat2==1){
            $msg=$msg."category 2 ";
        }else{
            $sql4="UPDATE category SET state=0 WHERE request_id='$id' AND category_no=2 ";
            $this->conn->query($sql4);
        }        
        if($cat3){
            $msg=$msg."category 3 ";   
        }else{
            $sql5="UPDATE category SET state=0 WHERE request_id='$id' AND category_no=1 ";
            $this->conn->query($sql5);
        }    
        
        
        $description="Following Categories of your laundry request have accepted: .{$msg} at .{$date} .{$time}";
        $sql6="INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time','$description','$userId',0)";
        $this->conn->query($sql6);
        echo $sql6;
    }
    public function declineRequest($id){
        $sql="UPDATE laundry_request SET status=-1 WHERE request_id='$id'";
        $result= $this->conn->query($sql);
        
    }
    public function addTotalFee($id,$fee1,$fee2,$fee3){
        $Total=$fee1+$fee2+$fee3;
        $sql="UPDATE laundry_request SET fee='$Total',state=2 WHERE request_id='$id'";
        $this->conn->query($sql);

    }


}