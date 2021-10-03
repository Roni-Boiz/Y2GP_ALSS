<?php

require_once '../app/core/controller.php';

class laundryController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('laundryModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:../homeController/logout');
            }
            else if($_SESSION['type']!='laundry'){
            header('Location:../homeController/logout');
        }
    }

    public function index(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('laundry/laundryView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}