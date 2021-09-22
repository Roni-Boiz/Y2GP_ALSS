<?php

require_once '../app/core/controller.php';

class receptionistController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('receptionistModel');
        session_start();
    }

    public function index(){
        // $this->announcement();
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
        $this->model->readResidentRegistration($firstname, $secondname, $email, $apartmentId);
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

}