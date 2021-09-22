<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('residentModel');
    }

    public function index(){
        echo 'I am home 123';
    }
    // view resident profile
    public function profile(){
        $this->view->users = $this->model->readResident();
        $this->view->render('resident/profileView');
    }
    // view resident announcement
    public function announcement(){
        $this->view->ann = $this->model->readAnnouncement();
        $this->view->render('resident/residentView');
    }
}