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
    public function getResources(){
        $sql="SELECT resource_type,available_resources FROM laundry_resources";
        $result = $this->conn->query($sql);   
        return $result;
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
        // $this->conn->autocommit(FALSE);

        $sql1="UPDATE laundry_request SET state=1 WHERE request_id='$id'";
        $result1=$this->conn->query($sql1);

        $sql2="SELECT resident.user_id as id FROM resident INNER JOIN laundry_request ON resident.resident_id=laundry_request.resident_id WHERE request_id='$id'";
        $userId=mysqli_fetch_assoc($this->conn->query($sql2));
        $userId=$userId["id"];


        date_default_timezone_set("Asia/Colombo");
        $date=date('Y-m-d');
        $time=date('H:i:s');
        $washer1=0;$washer2=0;$washer3=0;$dryer1=0;$dryer2=0;$dryer3=0;$iron1=0;$iron2=0;$folder1=0;
        $msg="";
        if($cat1==1){
            echo "1";
            $msg=$msg."category 1 ";
            $sql3="UPDATE category SET state=1 WHERE request_id='$id' AND category_no=1 ";
            $this->conn->query($sql3);

            //resource allocation shirt,short, trousers
            $sql4="SELECT weight FROM category WHERE request_id='$id' AND category_no=1 ";
            $w1=mysqli_fetch_assoc($this->conn->query($sql4));
            $w1=$w1["weight"];

            //amount of resources needed for 1-10 kg of category 1
            if($w1=='1-10'){
                $washer1=1;
                $dryer1=2;
                $iron1=3;
                $folder1=2;
            }
            //amount of resources needed for 11-20 kg of category 1
            else if($w1=='11-20'){
                $washer1=2;
                $dryer1=4;
                $iron1=6;
                $folder1=4;
            }

            $sql5="UPDATE laundry_resources SET available_resources=available_resources-'$washer1' WHERE resource_no=1 ";
            $this->conn->query($sql5);
            $sql6="UPDATE laundry_resources SET available_resources=available_resources-'$dryer1' WHERE resource_no=2 ";
            $this->conn->query($sql6);
            $sql7="UPDATE laundry_resources SET available_resources=available_resources-'$iron1' WHERE resource_no=3 ";
            $this->conn->query($sql7);
            $sql17="UPDATE laundry_resources SET available_resources=available_resources-'$folder1' WHERE resource_no=3 ";
            $this->conn->query($sql17);
        }    
        if($cat2==1){
            echo "2";
            $msg=$msg."category 2 ";
            $sql8="UPDATE category SET state=1 WHERE request_id='$id' AND category_no=2 ";
            $this->conn->query($sql8);

            //resource allocation for coat,curtain etc
            $sql9="SELECT weight FROM category WHERE request_id='$id' AND category_no=2 ";
            $w2=mysqli_fetch_assoc($this->conn->query($sql9));
            $w2=$w2["weight"];

            //amount of resources needed for 1-10 kg of category 2
            if($w2=='1-10'){
                $washer2=1;
                $dryer2=2;
                $iron2=3;
                
            }
            //amount of resources needed for 11-20 kg of category 2
            else if($w2=='11-20'){
                $washer2=2;
                $dryer2=4;
                $iron2=6;
            }

            $sql10="UPDATE laundry_resources SET available_resources=available_resources-'$washer2' WHERE resource_no=1 ";
            $this->conn->query($sql10);
            $sql11="UPDATE laundry_resources SET available_resources=available_resources-'$dryer2' WHERE resource_no=2 ";
            $this->conn->query($sql11);
            $sql12="UPDATE laundry_resources SET available_resources=available_resources-'$iron2' WHERE resource_no=3 ";
            $this->conn->query($sql12);
        }        
        if($cat3){
            echo "3";
            $msg=$msg."category 3 ";   
            $sql13="UPDATE category SET state=1 WHERE request_id='$id' AND category_no=3 ";
            $this->conn->query($sql13);

            //for resource allocation for blankets etc...
            $sql14="SELECT weight FROM category WHERE request_id='$id' AND category_no=3 ";
            $w3=mysqli_fetch_assoc($this->conn->query($sql14));
            $w3=$w3["weight"];

            //amount of resources needed for 1-10 kg of category 3
            if($w3=='1-10'){
                $washer3=1;
                $dryer3=2;
                
            }
            //amount of resources needed for 11-20 kg of category 3
            else if($w3=='11-20'){
                $washer3=2;
                $dryer3=2;
                
            }

            $sql15="UPDATE laundry_resources SET available_resources=available_resources-'$washer3' WHERE resource_no=1 ";
            $this->conn->query($sql15);
            $sql16="UPDATE laundry_resources SET available_resources=available_resources-'$dryer3' WHERE resource_no=3 ";
            $this->conn->query($sql16);
        }    
        
        $description="Following Categories of your laundry request have accepted: .{$msg} at .{$date} .{$time}. of the request of .{$id}";
        $sql6="INSERT INTO notification(date,time,description,user_id,view) VALUES ('$date','$time','$description','$userId',0)";
        $result2=$this->conn->query($sql6);

        // if($result1 && $result2 && $userId){
        //     $this->conn->commit();
            
        // }else{
        //     $this->conn->rollback();
        // }
        // $this->conn->autocommit(TRUE);
        // echo $sql6;
    }
    public function declineRequest($id){

        $sql="UPDATE laundry_request SET state=-1 WHERE request_id='$id'";
        $result1= $this->conn->query($sql);
        $sql1="UPDATE category SET state=-1 WHERE request_id='$id'";
        $result2= $this->conn->query($sql1);

        if($result1 && $result2){
            $this->conn->commit();
            
        }else{
            $this->conn->rollback();
        }
        $this->conn->autocommit(TRUE);
        
    }
    public function addTotalFee($id,$fee1,$fee2,$fee3,$w1,$w2,$w3){
        $Total=$fee1+$fee2+$fee3;
        $sql="UPDATE laundry_request SET fee='$Total',state=2 WHERE request_id='$id'";
        $this->conn->query($sql);
        

        $washer1=0;$washer2=0;$washer3=0;$dryer1=0;$dryer2=0;$dryer3=0;$iron1=0;$iron2=0;$folder1=0;
        if($w1!=0){
            $sql30="SELECT weight FROM category WHERE request_id='$id' AND category_no=1 ";
            $nw1=mysqli_fetch_assoc($this->conn->query($sql30));
            $nw1=$nw1["weight"];

            //amount of resources needed for 1-10 kg of category 1
            if($nw1=='1-10'){
                $washer1=1;
                $dryer1=2;
                $iron1=3;
                $folder1=2;
            }
            //amount of resources needed for 11-20 kg of category 1
            else if($nw1=='11-20'){
                $washer1=2;
                $dryer1=4;
                $iron1=6;
                $folder1=4;
            }

            $sql31="UPDATE laundry_resources SET available_resources=available_resources+'$washer1' WHERE resource_no=1 ";
            $this->conn->query($sql31);
            $sql32="UPDATE laundry_resources SET available_resources=available_resources+'$dryer1' WHERE resource_no=2 ";
            $this->conn->query($sql32);
            $sql33="UPDATE laundry_resources SET available_resources=available_resources+'$iron1' WHERE resource_no=3 ";
            $this->conn->query($sql33);
            $sql43="UPDATE laundry_resources SET available_resources=available_resources+'$folder1' WHERE resource_no=3 ";
            $this->conn->query($sql43);

            $sql1="UPDATE category SET weight='$w1'WHERE request_id='$id' AND category_no=1";
            $this->conn->query($sql1);

        }
        if($w2!=0){
            $sql34="SELECT weight FROM category WHERE request_id='$id' AND category_no=2 ";
            $nw2=mysqli_fetch_assoc($this->conn->query($sql34));
            $nw2=$nw2["weight"];

            //amount of resources needed for 1-10 kg of category 2
            if($nw2=='1-10'){
                $washer2=1;
                $dryer2=2;
                $iron2=3;
                
            }
            //amount of resources needed for 11-20 kg of category 2
            else if($nw2=='11-20'){
                $washer2=2;
                $dryer2=4;
                $iron2=6;
            }

            $sql35="UPDATE laundry_resources SET available_resources=available_resources+'$washer2' WHERE resource_no=1 ";
            $this->conn->query($sql35);
            $sql36="UPDATE laundry_resources SET available_resources=available_resources+'$dryer2' WHERE resource_no=2 ";
            $this->conn->query($sql36);
            $sql37="UPDATE laundry_resources SET available_resources=available_resources+'$iron2' WHERE resource_no=3 ";
            $this->conn->query($sql37);
            $sql38="UPDATE category SET weight='$w3'WHERE request_id='$id' AND category_no=2";
            $this->conn->query($sql38);
        }
        if($w3!=0){
            $sql39="SELECT weight FROM category WHERE request_id='$id' AND category_no=3 ";
            $nw3=mysqli_fetch_assoc($this->conn->query($sql39));
            $nw3=$nw3["weight"];

            //amount of resources needed for 1-10 kg of category 3
            if($nw3=='1-10'){
                $washer3=1;
                $dryer3=2;
                
            }
            //amount of resources needed for 11-20 kg of category 3
            else if($nw3=='11-20'){
                $washer3=2;
                $dryer3=2;
                
            }

            $sql40="UPDATE laundry_resources SET available_resources=available_resources+'$washer3' WHERE resource_no=1 ";
            $this->conn->query($sql40);
            $sql41="UPDATE laundry_resources SET available_resources=available_resources+'$dryer3' WHERE resource_no=3 ";
            $this->conn->query($sql41);
            $sql42="UPDATE category SET weight='$w3'WHERE request_id='$id' AND category_no=3";
            $this->conn->query($sql42);
        }


    }


}