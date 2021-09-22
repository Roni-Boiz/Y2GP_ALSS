<?php

require '../app/core/model.php';

class receptionistModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readResidentRegistration(){
        $sql = "SELECT resident_id FROM resident where resident_id=(SELECT max(resident_id) FROM resident) LIMIT 1";
            $result = $this->conn->query($sql);   
            if($result){
                $lastId = mysqli_fetch_assoc($result);
                $thisId= $lastId['resident_id']+1;
                $username=0;
                $password=0;
                // print_r( $lastId);
                if($thisId<10){
                    $username = 'RA00'.$thisId;
                    $password = 'Hawlock@00'.$thisId;
                    echo $username;
                }
                else if($thisId<100){
                    $username = 'RA0'.$thisId;
                    $password = 'Hawlock@0'.$thisId;
                }
                else if($thisId<1000){
                    $username = 'RA'.$thisId;
                    $password = 'Hawlock@'.$thisId;
                }
                else{
                    echo 'resident capacity is full';
                }

            }
            else{
                echo 'last id not found';
            }
            return $result;
        }
    // public function readTable(){
    //     session_start();
    //     require '../app/core/database.php';
    //     $sql = "SELECT * FROM resident where resident_id='1'";
    //     $result = $this->conn->query($sql);   
    //     return $result;
    // }
}
?>