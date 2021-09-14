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
        $this->view->render('homeView');
    }

    // public function test(){
    //     $this->loadModel('homeModel');
    //     $this->view->users = $this->model->readTable();
    //     $this->view->render('testView');
    // }
    
}