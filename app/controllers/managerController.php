<?php

require_once '../app/core/controller.php';

class managerController extends controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->loadModel('managerModel');
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='manager'){
            header('Location:logout');
        }
    }

    public function index(){
        // $this->announcement();
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('manager/managerView');
    }

    public function request(){
        $this->view->render('manager/handleReqView');
    }

    public function reservation(){
        $this->view->render('manager/manageResView');
    }

    public function complaint(){
        $this->view->render('manager/complaintView');
    }

    public function announcement(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('manager/announcementView');
    }

    public function report(){
        $this->view->render('manager/reportView');
    }

}