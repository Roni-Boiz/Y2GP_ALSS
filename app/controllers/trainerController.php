<?php

require_once '../app/core/controller.php';

class trainerController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('trainerModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='trainer'){
            header('Location:logout');
        }    
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('trainer/trainerView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}