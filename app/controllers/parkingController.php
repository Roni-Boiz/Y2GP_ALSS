<?php

require_once '../app/core/controller.php';

class parkingController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('parkingModel');
    }

    public function index(){
        $this->announcement();
        $this->view->render('parking/parkingView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}