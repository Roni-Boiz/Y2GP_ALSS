<?php

// class Database extends PDO{

//     function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD)
//     {
//         parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASSWORD);
//     }

//     public function runQuery($query){
//         $stmp = $this->prepare($query);
//         $stmp->execute();
//         return $stmp->fetchAll();
//     }
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "y2gp_alss";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);
}


// <?php
// $id = $_GET['id'];
// $db_connection = new PDO('mysql:host=localhost;dbname=sql_injection_example', 'dbuser', 'dbpasswd');
// //preparing the query
// $sql = "SELECT username 
//             FROM users
//             WHERE id = :id";
// $query = $db_connection->prepare($sql);
// $query->bindParam(':id', $id);
// $query->execute();
// //getting the result
// $query->setFetchMode(PDO::FETCH_ASSOC);
// $result = $query->fetchColumn();
// print(htmlentities($result));