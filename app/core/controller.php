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

}