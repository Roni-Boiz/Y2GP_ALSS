<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "y2gp_alss";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);
}