<?php

require_once '../app/core/controller.php';

class trainerController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('trainerModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='trainer'){
                header('Location:../homeController/logout');
        }    
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('trainer/trainerView');
    }

    public function reservations(){
        $this->view->reserve = $this->model->getReservation();
        $this->view->render('trainer/checkGymReservationsView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->render('trainer/profileView');
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
    public function addSchedule(){
        $this->view->history = $this->model->getReservationHistory();
        $this->view->today = $this->model->getReservationToday();
        $this->view->upcoming = $this->model->getReservationUpcoming();
        $this->view->render('trainer/addScheduleView');
    }
    

}