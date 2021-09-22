<?php

require_once '../app/core/controller.php';

class trainerController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('trainerModel');
    }

    public function index(){
        $this->announcement();
        $this->view->render('trainer/trainerView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}