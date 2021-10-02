<?php

require_once '../app/core/controller.php';
require_once '../app/core/app.php';

class adminController extends controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        $this->loadModel('adminModel');
        if (!isset($_SESSION['type'])) {
            header('Location:logout');
        } else if ($_SESSION['type'] != 'admin') {
            header('Location:logout');
        }
    }

    public function index()
    {
        // $this->announcement();
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('admin/adminView');
    }

    public function user()
    {
        $this->view->render('admin/userView');
    }

    public function employee()
    {
        $this->view->managers=$this->model->getAllEmployees("manager");
        $this->view->receptionists=$this->model->getAllEmployees("receptionist");
        $this->view->parkingOfficers=$this->model->getAllEmployees("parking_officer");
        $this->view->trainers=$this->model->getAllEmployees("trainer");
        $this->view->technicians=$this->model->getAllEmployees("technician");
        $this->view->treaters=$this->model->getAllEmployees("treater");
        $this->view->laundrys=$this->model->getAllEmployees("treater");
        $this->view->render('admin/employeeView');
    }

    public function service()
    {
        $this->view->render('admin/serviceView');
    }

    public function announcement()
    {
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('admin/announcementView');
    }

    public function report()
    {
        $this->view->render('admin/reportView');
    }

    public function addAnnouncement()
    {
        if (isset($_POST['broadcast'])) {
            $targetDir = "../uploads/announcement/";
            $allowTypes = array('jpg', 'png', 'jepg', 'gif', 'pdf');
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $fileNames = array_filter($_FILES['files']['name']);
            if (!empty($fileNames)) {
                foreach ($_FILES['files']['name'] as $key => $val) {
                    $fileName = basename($_FILES['files']['name'][$key]);
                    $targetFilePath = $targetDir . $fileName;

                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES['files']["tmp_name"][$key], $targetFilePath)) {
                            $insertValuesSQL .= "('" . $fileName . "'),";
                            $insert = $this->model->insertAnnouncement($_POST['topic'], $_POST['content'], $_POST['visibility'], $fileName, $_SESSION['userId']);
                        } else {
                            $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                        }
                    } else {
                        $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                    }
                }

                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

                if ($insertValuesSQL) {
                    $statusMsg = "Files are uploaded successfully." . $errorMsg;
                    echo $statusMsg;
                    header("Refresh:1; url=announcement");
                } else {
                    $statusMsg = "Upload failed! " . $errorMsg;
                    $this->view->error_message = $statusMsg;
                    $this->view->render('404errorView');
                }
            } else {
                $this->model->insertAnnouncement($_POST['topic'], $_POST['content'], $_POST['visibility'], NULL, $_SESSION['userId']);
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
                echo $statusMsg;
                header("Refresh:1; url=announcement");
            }
        }
    }

    public function addEmployee()
    {

        $statusMsg = '';

        // File upload path
        $targetDir = "../uploads/announcement/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $this->model->insertEmployee($_POST['emptype'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], $fileName);
                    if ($insert) {
                        $statusMsg = "The Employee " . $_POST['fname'] . " has been added successfully.";
                    } else {
                        $statusMsg = "Employee query failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        } else {
            $insert = $this->model->insertEmployee($_POST['emptype'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], NULL);
            if ($insert) {
                $statusMsg = "The Employee " . $_POST['fname'] . " has been added successfully.";
            } else {
                $statusMsg = "Employee query failed, please try again.";
            }
        }
        // Display status message
        echo $statusMsg;
        header("Refresh:1; url=employee");
    }
}
