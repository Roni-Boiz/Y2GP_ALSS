<?php

require_once '../app/core/controller.php';

class laundryController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('laundryModel');
        session_start();
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='laundry'){
            header('Location:logout');
        }
    }

    public function index(){
        $this->announcement();
        $this->view->render('laundry/laundryView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}