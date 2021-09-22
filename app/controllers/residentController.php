<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('residentModel');
    }

    public function index(){
        $this->view->ann = $this->model->readAnnouncement();
        $this->view->render('resident/residentView');
    }

    // view profile
    public function profile(){
        $this->view->users = $this->model->readResident();
        $this->view->render('resident/profileView');
    }

    public function announcement(){
        // $rst = $this->model->readAnnouncement();
        $this->view->ann = $this->model->readAnnouncement();
        $this->view->render('resident/residentView');
    }
}