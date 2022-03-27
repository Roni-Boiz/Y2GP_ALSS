<?php

require_once '../app/core/controller.php';

class parkingController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('parkingModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='parking'){
            header('Location:../homeController/logout');

        }
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('parkingOfficer/parkingofficerView');
    }

    public function parkingslot(){
        // $this->view->ann = $this->model->readTable();
        
        $this->view->outgoingVehicles=$this->model->getOutgoingVehicles();
        $this->view->overdueVehicles=$this->model->getOverdueVehicles();
        if(isset($_POST["vehicle_no"])){
            $vid=$_POST["vehicle_no"];
            $this->view->parkingStatus=$this->model->getParkingStatus($vid);
        }
        $this->view->render('parkingOfficer/parkingslotView');
    }
    public function parkingspace(){
        $this->view->overdueVehicles=$this->model->getOverdueVehicles();
        $this->view->parkingSpace=$this->model->getParkingState();
        $this->view->render('parkingOfficer/parkingspaceView');
    }
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->render('parkingOfficer/profileView');
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
    public function searchVehicle(){
        $vid=$_POST["vehicle_no"];
        $this->view->parkingStatus=$this->model->getParkingStatus($vid);
        $this->view->render('parkingOfficer/parkingslotView');
        ;
    }
    public function markTime(){
        $id=$_POST["reservation_id"];
        
        if(isset($_POST["Check-in"])){
            $this->model->checkinVehicle($id);
        }
        if(isset($_POST["Check-out"])){
            $this->model->checkoutVehicle($id);
        }
        
        $this->parkingslot();

    }


}