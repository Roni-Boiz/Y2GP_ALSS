<?php

require_once '../app/core/controller.php';

class adminController extends controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('adminModel');
    }

    public function index(){
        $this->announcement();
        $this->view->render('admin/adminView');
    }

}