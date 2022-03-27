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

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
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
    public function reservationview(){
        $this->view->Residents = $this->model->LoadResidents();
        $this->view->Trainers = $this->model->LoadTrainers();
        $this->view->history = $this->model->getReservationHistory();
        $this->view->today = $this->model->getReservationToday();
        $this->view->upcoming = $this->model->getReservationUpcoming();
        $this->view->render('trainer/reservationView');
    }

    public function addscheduleview(){
        $this->view->Residents = $this->model->LoadResidents();
        $this->view->Trainers = $this->model->LoadTrainers();
        $this->view->history = $this->model->getReservationHistory();
        $this->view->today = $this->model->getReservationToday();
        $this->view->upcoming = $this->model->getReservationUpcoming();
        $this->view->render('trainer/addScheduleView');
    }

    //make fitness centre reservation
    public function fitness()
    {
        $id = $_SESSION['userId'];

        if (isset($_POST["date"]) && isset($_POST["coach"])  && isset($_POST["starttime"])  && isset($_POST["endtime"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];
            $stime = $_POST["starttime"] . ":00";
            $etime = $_POST["endtime"] . ":00";
            //check valid time
            if ($stime < $etime) {
                $result = $this->model->reservefitness($d, $coach, $stime, $etime);
                if ($result == 0) {
                    $this->view->error = "Already reserved.Please select another time slot!.";
                } else {
                    $this->view->success = true;
                }
            } else if ($stime > $etime) {
                $this->view->error = "Select valid time slot!";
            }
        } else if (isset($_POST["date"]) && isset($_POST["coach"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];
            //to display availability in new view 

            $this->view->day = $this->model->dayfitness($d, $coach);
            $this->view->shiftno = $this->model->getshiftno($d, $coach);
            //to display availability in new view 
            $this->view->selectdate = $d;
            $this->view->selectcoach = $coach;
        }
        $this->view->latest = $this->model->latestfitness($id);
        $this->view->coach = $this->model->getcoaches();
        $this->view->c = $this->model->getcoaches();
        $this->view->render('resident/fitnessCentreView');
    }

    public function addSchedule(){
        $id = $_SESSION['userId'];

        if (isset($_POST["date"]) && isset($_POST["coach"])  && isset($_POST["starttime"])  && isset($_POST["endtime"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];
            $resident = $_POST["resident"];
            $stime = $_POST["starttime"] . ":00";
            $etime = $_POST["endtime"] . ":00";
            //check valid time
            if ($stime < $etime) {
                $result = $this->model->reservefitness($d, $coach, $stime, $etime);
                if ($result == 0) {
                    $this->view->error = "Already reserved.Please select another time slot!.";
                } else {
                    $this->view->success = true;
                }
            } else if ($stime > $etime) {
                $this->view->error = "Select valid time slot!";
            }
        } else if (isset($_POST["date"]) && isset($_POST["coach"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];

            $this->view->coach = $coach;
            if ($d <= date('Y-m-d')) {
                $this->view->error[] = "Pick upcoming date";
            } else {
                $this->view->day = $this->model->dayfitness($d, $coach);
                $this->view->shiftno = $this->model->getshiftno($d, $coach);
                $this->view->selectdate = $d;
                $this->view->selectcoach = $coach;
            }
        }
        $this->view->latest = $this->model->latestfitness($id);
        $this->view->coach = $this->model->getcoaches();
        $this->view->render('resident/fitnessCentreView');
    }
    

}