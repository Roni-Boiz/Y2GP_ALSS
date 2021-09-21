<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'I am home 123';
    }
    // view profile
    public function profile(){
        $this->loadModel('profileModel');
        $this->view->users = $this->model->readTable();
        $this->view->render('resident/profileView');
    }
    public function announcement(){
        $this->loadModel('announcementModel');
        $this->view->ann = $this->model->readTable();
        $this->view->render('resident/residentView');
    }
}