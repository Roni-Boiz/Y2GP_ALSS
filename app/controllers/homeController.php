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
    public function profileView(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('ProfileView');
    }

    public function test(){
        $this->loadModel('homeModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('testView');
    }

    public function login(){
        $this->view->render('loginView');
    }

    public function register(){
        
        $this->view->render('registerResidentView');
    }
    
}