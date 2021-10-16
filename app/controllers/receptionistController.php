<?php

require_once '../app/core/controller.php';

class receptionistController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('receptionistModel');
        session_start();
        if(!isset($_SESSION['type'])){
        header('Location:../homeController/logout');
        }
        else if($_SESSION['type']!='receptionist'){
        header('Location:../homeController/logout');
        }
    }

    public function index(){
        // $this->announcement();
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('receptionist/receptionistView');
    }


    public function register(){
        $this->view->apartments = $this->model->readApartment();
        $this->view->render('receptionist/registerResidentView');
    }

    public function registerSuccess(){

        $firstname = $_POST ['fname'];
        $secondname=$_POST ['lname'];
        $email = $_POST ['email'];
        $apartmentId=$_POST ['apartmentId'];
        $this->view->errors = $this->model->readResidentRegistration($firstname, $secondname, $email, $apartmentId);
        $this->view->apartments = $this->model->readApartment();
        $this->view->render('receptionist/registerResidentView');
    }
    // view profile
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->render('receptionist/profileView');
        $this->model->editProfile();
    }
    public function editProfile(){
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $contact=$_POST["contact_no"];
        $this->model->editProfile($fname,$lname,$email,$contact);
        $this->profile();
    }

    public function changePassword(){
        $opw=$_POST["opw"];
        $npw=$_POST["npw"];
        $rnpw=$_POST["rnpw"];
        $this->model->changePassword($opw,$npw,$rnpw);
        $this->profile();
    }

    // public function announcement(){
    //     $this->loadModel('announcementModel');
    //     $this->view->ann = $this->model->readTable();
    //     $this->view->render('resident/residentView');
    // }
    public function parcels(){
        $this->view->presentApartments = $this->model->getApartment();
        if(isset($_POST["apartmentId"]) and isset($_POST["sender"])) {
            $this->model->recordParcel($_POST["apartmentId"],$_POST["sender"],$_POST["description"]);
            header("Refresh:0; url=parcels");

            // $this->model->sendParcel($_POST["apartmentId"]);
        }    
        $this->view->inLocker=$this->model->getInlocker();
        $this->view->reached=$this->model->getReached(); 
        $this->view->render('receptionist/parcelsView');
    }
    public function putReached(){
        $pid=$_GET["parcel"];
        $this->model->putReachedAway($pid);
        $this->parcels();
    }
    public function visitors(){
        $this->view->todayVisitors = $this->model->readTodayVisitor();
        $this->view->previousVisitors = $this->model->readPreviousVisitor();
        $this->view->render('receptionist/visitorsView');
    }
    public function markVisited(){
        $vid=$_GET['visitor'];
        $this->model->setVisited($vid);
        $this->visitors();
    }
    public function getNotification(){
        $this->view->notification=$this->model->readNotification();
        $this->view->render('receptionist/notificationView');
    }
    public function markRead(){
        $nid=$_GET['notification'];
        $this->model->removeNotification($nid);
        $this->getNotification();
    }
    
}