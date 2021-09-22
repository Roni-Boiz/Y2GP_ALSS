<?php

require_once '../app/core/controller.php';

class managerController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('managerModel');
    }

    public function index(){
        $this->announcement();
        $this->view->render('manager/managerView');
    }

    public function announcement(){
        $this->view->ann = $this->model->readTable();
    }

}