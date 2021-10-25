<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='resident'){
                header('Location:../homeController/logout');
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
        header("Refresh:0; url=profile");
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
    public function removeRequest(){
        $this->model->removeRequest();
        header("Refresh:0; url=yourRequest");
        // $this->yourRequest();
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
        $id=$_SESSION['userId'];
        $this->view->pay=$this->model->pay($id);
        $this->view->render('resident/paymentView');
    }

    public function bill(){
        $id=$_SESSION['userId'];
        // particular month
        if(isset($_POST["month"]) && isset($_POST["year"])){
            $this->view->bill=$this->model->bill($id,$_POST["year"],$_POST["month"]);
            // convert-number-to-month-name
            $this->view->y=$_POST["year"]." ".date("F", mktime(0, 0, 0,$_POST["month"], 10));;
            $this->view->billtotal=$this->model->billtotal($id,$_POST["year"],$_POST["month"]);
            // this month
        }else{
            $this->view->bill=$this->model->bill($id,date('Y'),date('m'));
            $this->view->y=date('Y')." ".date('F');
            $this->view->billtotal=$this->model->billtotal($id,date('Y'),date('m'));
        }
        $this->view->render('resident/billView');
    }
    
    public function yourRequest(){
        $id=$_SESSION['userId'];
        $this->view->maintenence=$this->model->maintenence($id);
        $this->view->laundry=$this->model->laundry($id);
        $this->view->visitor=$this->model->visitor($id);
        $this->view->render('resident/yourRequestView');
    }

    public function maintenence(){
        $id=$_SESSION['userId'];
        $this->view->latest=$this->model->latestmaintenence($id);
        $this->view->render('resident/maintenenceView');
    }

    public function laundry(){
        $this->view->render('resident/laundryView');
    }

    public function visitor(){
        if(isset($_POST["name"]) && isset($_POST["vdate"]) && isset($_POST["description"]) ){
            $des=$_POST["description"];
            $vdate=$_POST["vdate"];
            $name=$_POST["name"];
            $this->model->requestVisitor($name,$vdate,$des);
        }
        $this->view->render('resident/visitorView');
    }
    public function getNotification(){
        $this->view->notification=$this->model->readNotification();
        $this->view->render('resident/notificationView');
    }
    public function markReached(){
        $nid=$_GET['notification'];
        $this->model->setReached($nid);
        $this->getNotification();
    }
    public function markRead(){
        $nid=$_GET['notification'];
        $this->model->removeNotification($nid);
        $this->getNotification();
    }
    public function complaint(){
        if(isset($_POST["description"])){
            $des=$_POST["description"];
            $this->model->complaint($des);
        }
        $this->view->render('resident/complaintView');
    }
}