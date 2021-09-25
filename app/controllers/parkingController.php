<?php

require_once '../app/core/controller.php';

class parkingController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('parkingModel');
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='parkingofficer'){
            header('Location:logout');
        }
    
    }

    public function index(){
        $this->announcement();
        $this->view->render('parking/parkingView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}