<?php

// require_once '../app/core/database.php';

class model{

    function __construct(){
        
        // $this->db = new database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        
        $this->conn = $this->getConnection();
    }

    public function getConnection(){
        require_once 'database.php';
        return $conn;
    }
}