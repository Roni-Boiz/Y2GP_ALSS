<?php

require_once '../app/core/controller.php';

class laundryController extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('laundryModel');
        session_start();
        if (!isset($_SESSION['type'])) {
            header('Location:../homeController/logout');
        } else if ($_SESSION['type'] != 'laundry') {
            header('Location:../homeController/logout');
        }
    }

    public function index()
    {
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('laundry/laundryView');
    }

    public function announcement()
    {
        $this->view->ann = $this->model->readTable();
    }
    public function profile()
    {
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->render('laundry/profileView');
        // $this->model->editProfile();
    }
    public function editProfile()
    {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $contact = $_POST["contact_no"];
        $this->model->editProfile($fname, $lname, $email, $contact);
        $this->profile();
    }

    public function changePassword()
    {
        $opw = $_POST["opw"];
        $npw = $_POST["npw"];
        $rnpw = $_POST["rnpw"];
        $this->model->changePassword($opw, $npw, $rnpw);
        $this->profile();
    }
    public function requests()
    {
        if (isset($_GET["reqId"]) && isset($_GET["tab"])) {
            $id = $_GET["reqId"];
            $tab = $_GET["tab"];
            if ($tab == 0) {
                //$this->getReqDetails($id);
                $this->view->reqSelected = true;
                $this->view->selectedNewCat = $this->model->getselectedNew($id);
                $this->view->requestInfo = $this->model->getselectedNew($id);
            }
            if ($tab == 1) {
                //$this->getReqDetails($id);
                $this->view->reqSelectedClean = true;
                $this->view->laundyCleaningRequests = $this->model->getCleaningRequests();
                $this->view->selectedCleaningCat = $this->model->getselectedCleaning($id);
            }
        }
        $this->view->laundyNewRequests = $this->model->getNewRequests();
        $this->view->laundyCleaningRequests = $this->model->getCleaningRequests();
        $this->view->laundyCompletedRequests = $this->model->getCompletedRequests();
        $this->view->render('laundry/requestView');
    }
    public function laundryresponse(){
        $cat1=0;$cat2=0;$cat3=0;
        $id=$_POST['requestId1'];
        if ($_POST['action'] == 'Accept') {
            if(isset($_POST['category1'])){
                $cat1=1;
            }
            if(isset($_POST['category2'])){
                $cat2=1;
            }
            if(isset($_POST['category3'])){
                $cat3=1;
            }
            $this->model->acceptRequest($id,$cat1,$cat2,$cat3);
    
  
        } else if ($_POST['action'] == 'Decline') {
            $this->model->declineRequest($id);


        }

        header("Refresh:0; url=requests");

    }
    public function addFees(){
        $fee1=0;$fee2=0;$fee3=0;$Total=0;
        $id=$_POST['requestId2'];
        if ($_POST['action2'] == 'Add') {
            if(isset($_POST['qty1']) && isset($_POST['amt1'])){
                $fee1=$_POST['qty1']*$_POST['amt1'];
                
            }
            if(isset($_POST['qty2']) && isset($_POST['amt2'])){
                $fee1=$_POST['qty2']*$_POST['amt2'];
            }
            if(isset($_POST['qty3']) && isset($_POST['amt3'])){
                $fee1=$_POST['qty3']*$_POST['amt3'];
            }
            $Total=$fee1+$fee2+$fee3;
            $this->model->addTotalFee($id,$Total);
    
  
        }    

        // header("Refresh:0; url=requests");

    }
    public function getNotification()
    {
        $this->view->render('laundry/notificationView');
    }
    public function getNewReq()
    {
    }
}
