<?php

class controller{

    function __construct(){
        require 'view.php';
        $this->view = new view();
    }

}