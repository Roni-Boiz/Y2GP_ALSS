<?php

require_once '../app/core/controller.php';
// require_once 'announcementController.php';

class homeController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('homeModel');
    }

    public function index(){
        $this->view->render('404errorView');
    }

    public function home(){
        $this->view->render('homeView');
    }

    public function login(){
        $this->view->render('loginView');
    }

    public function test(){
        // $this->loadModel('homeModel');
        // $this->view->users = $this->model->readTable();
        $this->view->render('testView');
    }

    public function loginSuccess(){
        $username = $_POST ['name'];
        $password=$_POST ['password'];

        $this->model->readLogin($username, $password);

        echo $_SESSION['type'];
        if($_SESSION['type']=='resident'){
            $this->view->render('resident/residentView');
        }
        else if($_SESSION['type']=='admin'){
            echo "Admin";
            $this->view->render('admin/adminView');
        }
        else if($_SESSION['type']=='manager'){
            $this->view->render('manager/managerView');
        }
        else if($_SESSION['type']=='receptionist'){
            $this->view->render('receptionist/receptionistView');
        }
        else if($_SESSION['type']=='parkingofficer'){
            $this->view->render('parkingofficer/parkingofficerView');
        }
        else if($_SESSION['type']=='trainer'){
            $this->view->render('trainer/trainerView');
        }
        else if($_SESSION['type']=='laundry'){
            $this->view->render('laundry/laundryView');
        }
        else {
            $this->view->render('loginView');
        }
    }

    public function logout(){
        session_start();

        $_SESSION = array();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '' , time() -86400, '/');
        }

        session_destroy();

        $this->view->render('homeView');
    }

    public function register(){
        session_start();
        $this->view->render('receptionist/registerResidentView');
    }

    // view profile
    public function profile(){
        $type="";
        $this->loadModel('profileModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('resident/ProfileView');
    }

    
    // public function announcement(){
    //     $this->loadModel('announcementModel');
    //     $this->view->ann = $this->model->readTable();
    //     $this->view->render('resident/residentView');
    // }
}