<?php

class controller{

    function __construct(){
        require 'view.php';
        $this->view = new view();
    }

    public function loadModel($modelName){
        $path = '../app/models/'.$modelName.'.php';
        if(file_exists($path)){
            require $path;
            $this->model = new $modelName;
        }  
    }

    public function editProfilePhoto()
    {
        if(isset($_POST) == true){

            $fileType = pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION);
            //generate unique file name
            $fileName = $_SESSION['userName'] .'.'. $fileType;
            //file upload path
            if($_SESSION['type']!='resident'){
                $targetDir = "../uploads/profile/employee/";
            }else{
                $targetDir = "../uploads/profile/resident/";
            }
            $targetFilePath = $targetDir . $fileName;
            
            //allow certain file formats
            
            $allowTypes = array('jpg','png','jpeg');
            
            if(in_array($fileType, $allowTypes)){
                //upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    $this->model->updateProfilePic($fileName,$_SESSION['userId']);
                    $_SESSION['profilePic'] = $fileName;
                    $response['status'] = 'ok';
                }else{
                    $response['status'] = 'err';
                }
            }else{
                $response['status'] = 'type_err';
            }
            //render response data in JSON format
            echo json_encode($response);
        }
    }


}