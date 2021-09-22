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

    public function request(){
        $this->view->render('admin/userView');
    }

    public function reservation(){
        $this->view->render('admin/employeeView');
    }

    public function complaint(){
        $this->view->render('admin/serviceView');
    }

    public function announcement(){
        $this->view->render('admin/announcementView');
    }

    public function report(){
        $this->view->render('admin/reportView');
    }

}