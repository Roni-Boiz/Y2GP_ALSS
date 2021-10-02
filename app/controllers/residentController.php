<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='resident'){
            header('Location:logout');
        }
    
        $this->loadModel('residentModel');
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('resident/residentView');
    }
    // view resident profile
    public function profile(){
        $this->view->users = $this->model->readResident();
        $this->view->members = $this->model->readMembers();
        $this->view->render('resident/profileView');
    }
    // edit profile
    public function editProfile(){
        $this->model->editProfile();
        $this->profile();
    }
    public function removeMember(){
        $id=$_POST["removedmem"];
        $this->model->removeMember($id);
        $this->profile();
    }
    public function changePassword(){
        $opw=$_POST["opw"];
        $npw=$_POST["npw"];
        $rnpw=$_POST["rnpw"];
        $this->model->changePassword($opw,$npw,$rnpw);
        $this->profile();
    }
    // view resident announcement
    // public function announcement(){
    //     $this->view->ann = $this->model->getAnnouncement();
    //     $this->view->render('resident/residentView');
    // }

    public function yourReservation(){
        $id=$_SESSION['userId'];
        $this->view->hall=$this->model->hallReservation($id);
        $this->view->fitness=$this->model->fitnessReservation($id);
        $this->view->treatment=$this->model->treatmentReservation($id);
        $this->view->render('resident/yourReservationView');
    }
    public function removeReservation(){
        $this->model->removeReservation();
        header("Refresh:0; url=yourReservation");
        // $this->yourReservation();
    }

    public function fitness(){
        $this->view->render('resident/fitnessCentreView');
    }

    public function treatment(){
        $this->view->render('resident/treatmentRoomView');
    }

    public function hall(){
        $this->view->render('resident/hallView');
    }

    public function parking(){
        $this->view->slots=$this->model->viewSlots();
        $this->view->render('resident/parkingSlotView');
    }

    public function payment(){
        $this->view->render('resident/paymentView');
    }

    public function bill(){
        $this->view->render('resident/billView');
    }
    
    public function yourRequest(){
        $this->view->render('resident/yourRequestView');
    }

    public function maintenence(){
        $this->view->render('resident/maintenenceView');
    }

    public function laundry(){
        $this->view->render('resident/laundryView');
    }

    public function visitor(){
        $this->view->render('resident/visitorView');
    }
}