<?php

require_once '../app/core/controller.php';

class receptionistController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('receptionistModel');
        session_start();
        if(!isset($_SESSION['type'])){
        header('Location:logout');
        }
        else if($_SESSION['type']!='receptionist'){
        header('Location:logout');
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
        $this->view->render('receptionist/registerResidentView');
    }
    

}