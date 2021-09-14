<?php

class view{

    function __construct(){

    }

    public function render($viewName){
        require '../app/views/'.$viewName.'.php';
    }
}