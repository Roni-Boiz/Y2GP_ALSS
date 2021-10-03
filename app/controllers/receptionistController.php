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
    // public function profile(){
    //     $this->loadModel('profileModel');
    //     $this->view->users = $this->model->readTable();
    //     $this->view->render('resident/profileView');
    // }
    // public function announcement(){
    //     $this->loadModel('announcementModel');
    //     $this->view->ann = $this->model->readTable();
    //     $this->view->render('resident/residentView');
    // }
    public function parcels(){
        if(isset($_POST["Save"])){
            $this->model->recordParcel($_POST["apartmentId"],002,$_POST["sender"]);
        }    
        $this->view->inLocker=$this->model->getInlocker();
        $this->view->reached=$this->model->getReached();
        if(isset($_GET["parcel"])){
            $pid=$_GET["parcel"];
            $this->model->updateInlocker($pid);
        }    
        $this->view->render('receptionist/parcelsView');
    }

    public function visitors(){
        $this->view->visitors = $this->model->readVisitor();
        $this->view->render('receptionist/visitorsView');
    }
    
}