<?php

require_once '../app/core/controller.php';

class parkingController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('parkingModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='parkingofficer'){
            header('Location:logout');
        }
    
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('parking/parkingView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}