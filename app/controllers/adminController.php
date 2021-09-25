<?php

require_once '../app/core/controller.php';

class adminController extends controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->loadModel('adminModel');
        if(!isset($_SESSION['type'])){
            header('Location:logout');
            }
            else if($_SESSION['type']!='admin'){
            header('Location:logout');
        }
    }

    public function index(){
        // $this->announcement();
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('admin/adminView');
    }

    public function user(){
        $this->view->render('admin/userView');
    }

    public function employee(){
        $this->view->render('admin/employeeView');
    }

    public function service(){
        $this->view->render('admin/serviceView');
    }

    public function announcement(){
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('admin/announcementView');
    }

    public function report(){
        $this->view->render('admin/reportView');
    }

}