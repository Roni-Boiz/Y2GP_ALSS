<?php

require_once '../app/core/controller.php';

class managerController extends controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        $this->loadModel('managerModel');
        if (!isset($_SESSION['type'])) {
            header('Location:../homeController/logout');
        } else if ($_SESSION['type'] != 'manager') {
            header('Location:../homeController/logout');
        }
    }

    public function index()
    {
        $this->view->upcommingReq = $this->model->getUpcommingRequests(date("Y-m-d", strtotime("+1 week")));
        $this->view->upcommingHallRes = $this->model->getUpcommingHallReservations(date("Y-m-d", strtotime("+1 week")));
        $this->view->render('manager/managerView');
    }

    public function profile()
    {
        $this->view->profileDetails = $this->model->getProfileDetails($_SESSION['userId']);
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->render('manager/profileView');
    }

    public function editProfile()
    {
        $this->model->updateProfile($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['cno'], $_SESSION['userId']);
        header("Refresh:0; url=profile");
    }

    public function changePassword()
    {
        $this->model->updatePassword($_POST["opw"], $_POST["npw"], $_POST["rnpw"], $_SESSION['userId']);
        header("Refresh:0; url=profile");
    }

    public function updateLastActivity()
    {
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "update_time") {
                $this->model->updateLoginDetails(date("Y-m-d H:i:s", strtotime(date('h:i:sa'))), $_SESSION['loginId']);
            }
        }
    }

    public function request()
    {
        $this->view->TodayPendingReq = $this->model->getTodayPendingTechnicalReq();
        $this->view->pendingReq = $this->model->getAllPendingTechnicalReq();
        $this->view->inprogressReq = $this->model->getAllInprogressTechnicalReq();
        $this->view->completedReq = $this->model->getAllCompletedTechnicalReq();
        $this->view->declinedReq = $this->model->getAllDeclinedTechnicalReq();
        $this->view->render('manager/handleReqView');
    }

    public function getFreeTechnicians()
    {
        $result = $this->model->getAllFreeTechnicians();
        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function acceptThisRequest()
    {
        return $this->model->updateThisRequest($_POST["request_id"], $_POST["employee_id"], $_POST["employee_name"]);
    }

    public function addRequestCharge()
    {
        return $this->model->addChargeToRequest($_POST["request_id"], $_POST["fee"]);
    }

    public function declineThisRequest()
    {
        return $this->model->addCancelTimeToRequest($_POST["request_id"], $_POST["reason"]);
    }

    public function reservation()
    {
        $this->view->todayHallRes = $this->model->getTodayHallRes();
        $this->view->todayFitnessRes = $this->model->getTodayFitnessRes();
        $this->view->todayTreatmentRes = $this->model->getTodayTreatmentRes();

        $this->view->allHallRes = $this->model->getAllHallRes();
        $this->view->allFitnessRes = $this->model->getAllFitnessRes();
        $this->view->allTreatmentRes = $this->model->getAllTreatmentRes();

        $this->view->render('manager/manageResView');
    }

    public function removeThisReservation()
    {
        return $this->model->emergencyRemoveThisReservation($_POST["reservation_id"], $_POST["reason"]);
    }

    public function complaint()
    {
        $this->view->complaints = $this->model->getAllComplaints();
        $this->view->render('manager/complaintView');
    }

    public function announcement()
    {
        if (isset($_POST['topic']) && isset($_POST['content']) && isset($_POST['visibility'])) {
            $result = $this->addAnnouncement();
            if ($result == 0) {
                $this->view->error = "Oops something went wrong. Form didn't submiited. " . $this->view->message;
            }
        }
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('manager/announcementView');
    }

    public function report()
    {
        $this->view->render('manager/reportView');
    }

    public function addAnnouncement()
    {
        if (isset($_POST['broadcast'])) {
            $targetDir = "../uploads/announcement/";
            $allowTypes = array('jpg', 'png', 'jepg', 'gif', 'pdf', 'doc', 'docx', 'xlsx');
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

    public function dismissThisComplaint(){
        return $this->model->updateComplaint($_POST['complaint_id'], $_SESSION['userId']);
    }

    public function considerThisComplaint(){
        if (isset($_POST['mailAddress']) && isset($_POST['mailbody'])) {
            $receiver = $_POST['mailAddress'];
            $subject = "Hawlock City Resident Complaint";
            $body = $_POST['mailbody'];
            $sender = "From:hawlockrycn@gmail.com";
            mail($receiver, $subject, $body, $sender);
        }
    }
}
