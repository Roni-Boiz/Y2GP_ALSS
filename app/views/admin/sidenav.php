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
    
    <script src="../../public/js/admin.js" defer></script>

    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="myheader">
        <div class="header">
            <div class="btn"><span class="fas fa-bars" onclick="expand()"></span></div>
            <h2>AlSS</h2>
            <div class="head">
                <ul>
                    <li class="dropdown"><a href="#"><i class="fa fa-user-circle"></i></a>
                        <ul>
                            <li><a href="profile"></li><i class="fa fa-user"></i>Profile</a></li>
                            <li><a href="../homeController/logout"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                        </ul>    
                            <li><a href="#"><?php echo  $_SESSION['userName'];?></a></li>
                            <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>  
                    </li>
                </ul>
            </div>
        </div>
    
        <nav class="sidebar" id="side">
            <ul>
                <li><a href="index"><i class="fa fa-home" ></i>HOME</a></li>
                
                <li class="dropdown"><a href="user"><i class="fas fa-user-cog"></i>USERS</a>
                <ul>
                    <li ><a href="#"><i class="fas fa-user-plus"></i>ADD USER</a></li>
                    <li><a href="#"><i class="fas fa-user-times"></i>REMOVE USER</a></li>
                </ul>
                </li>
                <li class="dropdown"><a href="employee"><i class="fas fa-users-cog"></i>EMPLOYEES</a>
                <ul>
                    <li><a href="#"><i class="fas fa-user-plus"></i>ADD EMPLOYEES</a></li>
                    <li><a href="#"><i class="fas fa-users-slash"></i>REMOVE EMPLOYEES</a></li>
                </ul>
                </li>
                <li><a href="service"><i class="fas fa-chart-line"></i>UPDATE SERVICE</a></li>
                <li><a href="announcement"><i class="fa fa-bullhorn" ></i>MAKE ANNOUNCEMENT</a></li>
                <li><a href="report"><i class="fas fa-chart-pie"  ></i>REPORTS</a></li>
                
            </ul>
        </nav>

    
<script>
    /* show sidebar */
    $('.btn').click(function(){                                                                                                                                                                                    
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
    });
    /* hide the sidenav */
    function expand(){
        if(document.getElementById("hh").style.gridColumn=="1 / span 3"){ 
            document.getElementById("hh").style.gridColumn="2";
            document.getElementById("hb").style.gridColumn="2"; 
            document.getElementById("hh").style.marginLeft="20px";
            document.getElementById("hb").style.marginLeft="20px";
            document.getElementById("side").style.transform="initial";
        }else{
            document.getElementById("hh").style.gridColumn="1 / span 3";
            document.getElementById("hb").style.gridColumn="1 / span 3"; 
            document.getElementById("hh").style.marginLeft="50px";
            document.getElementById("hb").style.marginLeft="50px";
            document.getElementById("side").style.transform="rotateY(180deg)";/* icon only */ 
        } 
    }
</script>
