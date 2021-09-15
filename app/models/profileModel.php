<?php

require '../app/core/model.php';

class profileModel extends model {
    function __construct(){
         parent::__construct();
    }

    public function readTable(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM resident";
        $result = $this->conn->query($sql);   
        return $result;
    }
}
?>