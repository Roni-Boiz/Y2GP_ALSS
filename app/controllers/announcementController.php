<?php

require_once '../app/core/controller.php';

class announcementController extends controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'I am home 123';
    }

    public function announcement(){
        $this->loadModel('announcementModel');
        $this->view->ann = $this->model->readTable();
        $this->view->render('resident/residentView');
    }
}