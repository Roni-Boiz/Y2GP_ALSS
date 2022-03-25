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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
</head>

<body>
    <div id="myheader">
        <div class="header">
            <div class="btn"><span class="fas fa-bars" onclick="expand()"></span></div>
            <img src="../../public/img/logo-04.png" alt="" id="logo" style="margin:-15px 10px"/>
            <!-- <h2>AlSS</h2> -->
            <div class="head">
                <ul>
                    <li class="dropdown"><a href="#"><img src="../../uploads/profile/resident/<?php echo $_SESSION["profilePic"] ?>" onerror="this.onerror=null; this.src='../../public/img/profile.png'"></a>
                        <ul>
                            <li><a href="profile" ></li><i class="fa fa-user" ></i>Profile</a></li>
                            <li><a href="../homeController/logout"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                        </ul>    
                            <li><a><?php echo  $_SESSION['userName'];?></a></li>
                            <li><a href="getNotification"><i class="fa fa-bell" aria-hidden="true"></i></a></li>  
                    </li>
                </li>
                </ul>
            </div>
        </div>

        <nav class="sidebar" id="side">
            <ul >
                <li><a href="../residentController/index"><i class="fa fa-home"></i>HOME</a></li>
                <!-- for resident -->
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>RESERVATIONS </a>
                    <ul>
                        <li><a href="yourReservation">YOUR RESERVATIONS</a></li>
                        <li><a href="parking">PARKING SLOT</a></li>
                        <li><a href="fitness">FITNESS CENTRE</a></li>
                        <li><a href="hall">HALL</a></li>
                        <li><a href="treatment">TREATMENT ROOM</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><i class="fa fa-handshake"></i>REQUESTS</a>
                    <ul>
                        <li><a href="yourRequest">YOUR REQUESTS</a></li>
                        <li><a href="maintenence">MAINTENANCE</a> </li>
                        <li><a href="laundry">LAUNDRY</a></li>
                        <li><a href="visitor">VISITOR APPROVAl</a></li>
                    </ul>
                </li>
                <li><a href="bill"><i class="fa fa-sticky-note"></i>BILLS</a></li>
                <li><a href="payment"><i class="fa fa-credit-card"></i>PAYMENTS</a></li>
                
                <li><a href="complaint"><i class="fas fa-question-circle"></i>HELP</a></li>
            </ul>
        </nav>

        <script type="text/javascript" src="../../public/js/resident.js"></script>

        