<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALSS</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="../../public/css/body.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="myheader">
        <div class="header">
            <div class="btn"><span class="fas fa-bars" onclick="expand()"></span></div>
            <h2>AlSS</h2>
            <div class="head">
                <ul>
                    <li class="dropdown"><a href="#"><img src="../../uploads/profile/employee/<?php echo $_SESSION["profilePic"] ?>" onerror="this.onerror=null; this.src='../../public/img/profile.png'"></a>
                        <ul>
                            <li><a href="profile"></li><i class="fa fa-user"></i>Profile</a></li>
                            <li><a href="../homeController/logout"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                        </ul>    
                            <li><a><?php echo  $_SESSION['userName'];?></a></li>
                            <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>  
                    </li>
                </ul>
            </div>
        </div>
    
        <nav class="sidebar" id="side">
            <ul>
            <li><a href="index"><i class="fa fa-home" ></i>HOME</a></li>
                <li><a href="addSchedule"><i class="fa fa-credit-card"  ></i>RESERVATIONS</a></li>
            </ul>
        </nav>


<script type="text/javascript" src="../../public/js/trainer.js"></script>
