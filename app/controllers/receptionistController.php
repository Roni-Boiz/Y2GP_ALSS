<?php

require_once '../app/core/controller.php';

class receptionistController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('receptionistModel');
    }

    public function index(){
        $this->announcement();
        $this->view->render('receptionist/receptionistView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}