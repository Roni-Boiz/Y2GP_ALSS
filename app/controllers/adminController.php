<?php

require_once '../app/core/controller.php';
require_once '../app/core/app.php';

class adminController extends controller
{

    function __construct(){
        parent::__construct();
        session_start();
        $this->loadModel('adminModel');
        if (!isset($_SESSION['type'])) {
            header('Location:../homeController/logout');
        } else if ($_SESSION['type'] != 'admin') {
            header('Location:../homeController/logout');
        }
    }

    public function index(){
        if (isset($_POST['apartmentNo']) && isset($_POST['floor']) && isset($_POST['parkingslot'])) {
            $result = $this->model->insertNewApartment($_POST['apartmentNo'], $_POST['floor'], $_POST['parkingslot']);
            if ($result == 0) {
                $this->view->error = "Oops something went wrong. Form didn't submiited";
            } else {
                $this->view->success = true;
            }
        }
        $this->view->doList = $this->model->getMyDoList($_SESSION['userId']);
        $this->view->apartments = $this->model->getAllApartments();
        $this->view->lastApartmentNo = $this->model->getLastApartmentNo();
        $this->view->slots = $this->model->getAllFreeSlots();
        $this->view->payments = $this->model->getMonthlyIncome();
        $this->view->overdues = $this->model->getTotalOverdue();
        $this->view->render('admin/homeView');
    }

    public function profile(){
        $this->view->profileDetails = $this->model->getProfileDetails($_SESSION['userId']);
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->render('admin/profileView');
    }

    public function editProfile(){
        $this->model->updateProfile($_POST['name'], $_POST['email'], $_SESSION['userId']);
        header("Refresh:0; url=profile");
    }

    public function changePassword(){
        $this->model->updatePassword($_POST["opw"], $_POST["npw"], $_POST["rnpw"], $_SESSION['userId']);
        header("Refresh:0; url=profile");
    }

    public function getEarningSummary(){
        $result = $this->model->getAllEarnings();
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getServiceSummary(){
        $result1 = $this->model->getLast12HallRes();
        $result2 = $this->model->getLast12FitnessRes();
        $result3 = $this->model->getLast12TreatmentRes();
        $result4 = $this->model->getLast12ParkingRes();
        $result5 = $this->model->getLast12MaintenenceReq();
        $result6 = $this->model->getLast12LaundryReq();
        //loop through the returned data
        $data1 = array();
        $data2 = array();
        $data3 = array();
        $data4 = array();
        $data5 = array();
        $data6 = array();
        foreach ($result1 as $row) {
            $data1[] = $row;
        }
        foreach ($result2 as $row) {
            $data2[] = $row;
        }
        foreach ($result3 as $row) {
            $data3[] = $row;
        }
        foreach ($result4 as $row) {
            $data4[] = $row;
        }
        foreach ($result5 as $row) {
            $data5[] = $row;
        }
        foreach ($result6 as $row) {
            $data6[] = $row;
        }
        $data = '{"hall" : ' . json_encode($data1) . ' , "fitness" : ' . json_encode($data2) . ' , "treatment" : ' . json_encode($data3) . ' , "parking" : ' . json_encode($data4) . ' , "maintenence" : ' . json_encode($data5) . ' , "laundry" : ' . json_encode($data6) . '}';
        echo $data;
    }

    public function user(){
        $this->view->users = $this->model->getAllUsers();
        $this->view->activeUsers = $this->model->getAllOnlineUsers();
        $this->view->lockedAccounts = $this->model->getAllLockedUsers();
        $this->view->render('admin/userView');
    }

    public function unclockThisAccount(){
        return $this->model->unlockThisUserAccount($_POST["user_name"]);
    }

    public function deleteUserAccount()
    {
        return $this->model->deleteThisUserAccount($_POST["user_id"]);
    }

    public function employee(){
        if ((isset($_POST['emptype']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['cno'])) || (isset($_POST['emptype']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['cno']) && isset($_POST['week1']) && isset($_POST['week2']) && isset($_POST['week3']))) {
            $result = $this->addEmployee();
            if ($result == 0) {
                $this->view->error = $this->view->message;
            } else {
                $this->view->success = $this->view->message;
            }
        }
        $this->view->managers = $this->model->getAllEmployees("manager");
        $this->view->receptionists = $this->model->getAllEmployees("receptionist");
        $this->view->trainers = $this->model->getAllEmployees("trainer");
        $this->view->treaters = $this->model->getAllEmployees("treater");
        $this->view->parkingOfficers = $this->model->getAllEmployees("parking_officer");
        $this->view->technicians = $this->model->getAllEmployees("technician");
        $this->view->laundrys = $this->model->getAllEmployees("treater");
        $this->view->render('admin/employeeView');
    }

    public function getEmployees(){
        $result = $this->model->getEmployees();
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getEmployeesType(){
        $result = $this->model->getALLEmployeeBYType();
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function deleteEmployee(){
        return $this->model->deleteThisEmployee($_POST['employee_id']);
    }

    public function updateEmployeeShift(){
        return $this->model->updateThisEmployeeShift($_POST['employee_id'],$_POST['week1'],$_POST['week2'],$_POST['week3']);
    }

    public function getEmployeeShift(){
        $result = $this->model->getThisEmployeeShift($_POST['employee_id']);
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function service(){
        if (isset($_POST['servicetype']) && isset($_POST['servicename']) && isset($_POST['fee']) && isset($_POST['canclefee'])) {
            $result = $this->model->addService($_POST['servicetype'], $_POST['servicename'], $_POST['fee'], $_POST['canclefee']);
            if ($result == 0) {
                $this->view->error = "Oops something went wrong. Form didn't submiited";
            } else {
                $this->view->success = "New Service Added";
            }
        }
        if (isset($_POST['serviceId']) && isset($_POST['newfee']) && isset($_POST['newcancelfee']) && isset($_POST['effectdate'])) {
            $result = $this->model->updateThisService($_POST['serviceId'], $_POST['newfee'], $_POST['newcancelfee'], $_POST['effectdate']);
            if ($result == 0) {
                $this->view->error = "Oops something went wrong. Record didn't updated";
            } else {
                $this->view->success = "Service Rate Updated";
            }
        }
        $this->view->services = $this->model->getAllServices();
        $this->view->render('admin/serviceView');
    }

    public function getServiceRate(){
        $result = $this->model->getThisServiceRate($_POST['service_id']);
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getRequestReservations(){
        $result = $this->model->getAllReservationsByDate($_POST['startDate'],$_POST['endDate']);
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        // create a JSON object
        print json_encode($data);
    }

    public function getServices(){
        $result = $this->model->getAllServices();
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function announcement(){
        if (isset($_POST['topic']) && isset($_POST['content']) && isset($_POST['visibility'])) {
            $result = $this->addAnnouncement();
            if ($result == 0) {
                $this->view->error = "Oops something went wrong. Form didn't submiited " . $this->view->message;
            } else {
                $this->view->success = "New Announcement Added";
            }
        }
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('admin/announcementView');
    }

    public function report(){
        $this->view->render('admin/reportView');
    }

    public function addAnnouncement(){
        if (isset($_POST['broadcast'])) {
            $targetDir = "../uploads/announcement/";
            $allowTypes = array('jpg', 'png', 'jepg', 'gif', 'pdf');
            $insert = $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $fileNames = array_filter($_FILES['files']['name']);
            if (!empty($fileNames)) {
                foreach ($_FILES['files']['name'] as $key => $val) {
                    $fileName = time() . '_' . basename($_FILES['files']['name'][$key]);
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
                } else {
                    $statusMsg = "Upload failed! " . $errorMsg;
                    $this->view->error_message = $statusMsg;
                }
            } else {
                $insert = $this->model->insertAnnouncement($_POST['topic'], $_POST['content'], $_POST['visibility'], NULL, $_SESSION['userId']);
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            }
        }
        header("Refresh:0; url=announcement");
        $this->view->message = $statusMsg;
        return $insert;
    }

    public function addEmployee(){
        $statusMsg = '';

        // File upload path
        $targetDir = "../uploads/profile/employee/";
        $fileName = time() . '_' . basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $insert = '';
        if (isset($_POST['submit']) && !empty($_FILES["file"]["name"])) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $this->model->insertEmployee($_POST['emptype'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], $fileName, $_POST['week1'], $_POST['week2'], $_POST['week3']);
                    if ($insert) {
                        $statusMsg = "The Employee " . $_POST['fname'] . " has been added successfully.";
                    } else {
                        $statusMsg = "Employee query failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
            }
        } else if(isset($_POST['submit']) && isset($_POST['week1']) && isset($_POST['week2']) && isset($_POST['week3'])) {
            $insert = $this->model->insertEmployee($_POST['emptype'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], NULL, $_POST['week1'], $_POST['week2'], $_POST['week3']);
            if ($insert) {
                $statusMsg = "The Employee " . $_POST['fname'] . " has been added successfully.";
            } else {
                $statusMsg = "Employee query failed, please try again.";
            }
        } else if(isset($_POST['submit'])){
            $insert = $this->model->insertEmployee($_POST['emptype'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], NULL);
            if ($insert) {
                $statusMsg = "The Employee " . $_POST['fname'] . " has been added successfully.";
            } else {
                $statusMsg = "Employee query failed, please try again.";
            }
        }
        // Display status message
        $this->view->message = $statusMsg;
        return $insert;
    }

    public function getResidentData(){
        // $result = $this->model->getAllResidentData($_POST['search']['value'],$_POST['min'],$_POST['max']);
        if(isset($_POST['search']['value'])){
            $result = $this->model->getAllResidentDataBySearch($_POST['search']['value']);
        }
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        // create a JSON object
        print json_encode($data);
    }
}


