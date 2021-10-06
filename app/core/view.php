<?php

class view{

    function __construct(){
        date_default_timezone_set("Asia/Colombo");
    }

    public function render($viewName){
        require '../app/views/'.$viewName.'.php';
    }
}