<?php

require_once '../app/core/controller.php';

class residentController extends controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->loadModel('residentModel');
    }

    public function index(){
        $this->view->ann = $this->model->readAnnouncement();
        $this->view->render('resident/residentView');
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
    public function yourReservation(){
        $this->view->render('resident/yourReservationView');
    }
}