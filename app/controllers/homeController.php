<?php

require_once '../app/core/controller.php';

class homeController extends controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'I am home 123';
    }

    public function home(){
        $this->loadModel('homeModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('homeView');
    }
    // view profile
    public function profile(){

        $type="";
        $this->loadModel('profileModel');
        $this->view->users = $this->model->readTable();
        //include_once '../views/include/sidenav.php';
        $this->view->render('resident/ProfileView');
    }

    public function test(){
        $this->loadModel('homeModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('testView');
    }

    public function login(){
        $this->view->render('loginView');
    }

    public function loginSuccess(){
        $username = $_POST ['name'];
        $password=$_POST ['password'];

        $this->loadModel('loginModel');
        $result=$this->view->users = $this->model->readLogin($username, $password);
        if($result=='resident'){
            $this->view->render('resident/residentView');
        }
        else if($result=='admin'){
            $this->view->render('admin/adminView');
        }
        else if($result=='manager'){
            $this->view->render('manager/managerView');
        }
        else if($result=='receptionist'){
            $this->view->render('receptionist/receptionistView');
        }
        else if($result=='parkingofficer'){
            $this->view->render('parkingofficer/parkingofficerView');
        }
        else if($result=='trainer'){
            $this->view->render('trainer/trainerView');
        }
        else if($result=='laundry'){
            $this->view->render('laundryView');
        }
        else{
            $this->view->render('laundry/loginView');
        }
        // $result ? $this->view->render('userView') : $this->view->render('loginView');
    }

    public function register(){
        
        $this->view->render('registerResidentView');
    }
    public function announcement(){
        $this->loadModel('announcementModel');
        $this->view->ann = $this->model->readTable();
        $this->view->render('resident/residentView');
    }
}