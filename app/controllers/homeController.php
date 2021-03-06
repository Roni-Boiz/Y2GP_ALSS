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
        session_start();
        if(isset($_SESSION['type'])){
            if($_SESSION['type'] == "admin"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/{$type}Controller/index");
            }
            if($_SESSION['type'] == "manager"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/{$type}Controller/index");
            }
            if($_SESSION['type'] == "receptionist"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/{$type}Controller/index");
            }
            if($_SESSION['type'] == "parking_officer"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/parkingController/index");
            }
            if($_SESSION['type'] == "trainer"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/{$type}Controller/index");
            }
            if($_SESSION['type'] == "resident"){
                $type = $_SESSION['type'];
                header("location: /Y2GP_ALSS/public/{$type}Controller/index");
            }

        }
        $this->view->render('loginView');
    }

    public function contactus(){
        $this->view->render('contactusView');
    }

    public function fogotPassword(){
        
        $this->view->render('fogotPasswordView');
    
    }

    public function resetPassword(){
        if (isset($_POST['email']) && isset($_POST['username'])){
            $username = $_POST ['username'];
            $email=$_POST ['email'];
            $this->view->errors[] = $this->model->readFogot($username, $email );
        }
        $this->view->render('fogotPasswordView');
    
    }

    public function test(){
        // $this->loadModel('homeModel');
        // $this->view->users = $this->model->readTable();
        $this->view->render('testView');
    }

    public function loginSuccess(){
        $username = $_POST ['name'];
        $password=$_POST ['password'];

        $this->view->errors[] = $this->model->readLogin($username, $password);

        if(session_id()){
            $type = $_SESSION['type'];
            if($type == "parking_officer"){
                header('Location: /Y2GP_ALSS/public/parkingController/index');
            } else {
                header('Location: /Y2GP_ALSS/public/'.$type.'Controller/index');
            }
            // $this->view->render($type.'/'.$type.'View');
        }
        else{
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



    
    
    // public function announcement(){
    //     $this->loadModel('announcementModel');
    //     $this->view->ann = $this->model->readTable();
    //     $this->view->render('resident/residentView');
    // }
}