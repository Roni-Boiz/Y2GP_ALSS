<?php


class model{

    function __construct(){
        
        $this->conn = $this->getConnection();
    }

    public function getConnection(){
        require_once 'database.php';
        return $conn;
    }
}