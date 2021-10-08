<?php

require_once '../app/core/controller.php';

class parkingController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('parkingModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='parking'){
            header('Location:../homeController/logout');

        }
    
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('parkingOfficer/parkingofficerView');
    }

    public function parkingslot(){
        // $this->view->ann = $this->model->readTable();
        $this->view->render('parkingOfficer/parkingslotView');
    }

}