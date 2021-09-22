<?php

class controller{

    function __construct(){
        require 'view.php';
        $this->view = new view();
    }

    public function loadModel($modelName){
        $path = '../app/models/'.$modelName.'.php';
        if(file_exists($path)){
            require $path;
            $this->model = new $modelName;
        }
       
    }

    public function logout(){
        session_start();

        $_SESSION = array();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '' , time() -86400, '/');
        }

        session_destroy();

        $this->view->render('homeView');
    }

        // view profile
        // public function profile(){
        //     // session_start();
        //     $type = $_SESSION['type'];
        //     $this->loadModel($type.'Model');
        //     $this->view->users = $this->model->readTable();
        //     $this->view->render($type.'/profileView');
        // }

}