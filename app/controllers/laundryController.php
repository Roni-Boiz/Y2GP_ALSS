<?php

require_once '../app/core/controller.php';

class laundryController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('laundryModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='laundry'){
            header('Location:../homeController/logout');
        }
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('laundry/laundryView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->profile();
        $this->view->render('laundry/profileView');
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

}