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
<style>
*{
  margin: 0;
  padding: 0;
  user-select: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body {
  margin: 0;
}
/* for fixed header and side bar */
/* header style */
.header{
    display: grid;
    grid-template-columns: 200px 1fr;
}
.header i{
  padding: 3px;
} 
.header {
  width: 100%;
  position: fixed;
  padding: 15px;
  background: #110b2e;
  color: white;
}
.header h2{
  padding-left: 20px;
}
.head ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
.head ul li {
  float: right;
}
.head ul li a {
  display: block;
  color: white;
  text-align: center;
  padding-left: 30px;
  text-decoration: none;
}
.head ul li a:hover {
  background-color: #111;
}
.head ul .dropdown:hover ul{
    display: initial;
    top:40px;
    right: 0;
} 
.head ul ul{
    display: none; 
    position: absolute;
    width: 130px;
    padding: 10px 20px 0 0;
    background: #110b2e;
}
/* expand button */
.btn{
  position: fixed;
  top: 5px;
  left: 10px;
  text-align: center;
  background:none;
  cursor: pointer;
  transition: left 0.4s ease;
}
.btn span{
  color: white;
  font-size: 20px;
  line-height: 45px;
}
/* sidebar style */
.sidebar{
  top: 65px;
  position: fixed;
  width: 240px;
  height: 100%;
  left: 0px;
  background: #110b2e;
  transition: left 0.4s ease;
}
.sidebar.show{
  left: -200px;
}
.sidebar .text{
  color: white;
  font-size: 25px;
  font-weight: 400;
  line-height: 65px;
  text-align: center;
  letter-spacing: 1px;
}
.sidebar i{
  padding-right:15px;
}
nav ul{
  background: #110b2e;
  width: 100%;
  list-style: none;
}
nav ul li{
  line-height: 50px;
  border-top: 1px solid rgba(255,255,255,0.1);
}
nav ul li a{
  position: relative;
  color: white;
  text-decoration: none;
  font-size: 16px;
  padding-left: 5px;
  font-weight: 500;
  display: block;
  width: 100%;
}
nav ul li a:hover{
  background: rgb(138, 138, 138);
}
nav ul li a:focus{
  background: rgb(138, 138, 138);
}
nav ul ul{
  display: none;
  position: absolute;
  left: 240px;
  top:0;
}
nav ul ul li{
  line-height: 42px;
  border-top: none;
}
nav ul ul li a{
  font-size: 15px;
  color: #e6e6e6;
  padding-left: 20px;
  border-left: 1px solid transparent;
  border-left-color: white;
}
nav ul ul li a:hover{
  background: rgb(138, 138, 138);
}
nav ul li.dropdown{
    position: relative;
    padding: 0;
}
nav ul .dropdown:hover ul{
    display: initial;
}
nav i{
  padding: 5px;
} 

</style>
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
                            <li><a href="profileView"></li><i class="fa fa-user"></i>Profile</a></li>
                            <li><a href="home"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                        </ul>    
                            <li><a href="#">id</a></li>
                            <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>  
                    </li>
                </ul>
            </div>
        </div>
    
        <nav class="sidebar" id="side">
            <ul>
                <li><a href="#"><i class="fa fa-home" ></i>HOME</a></li>
                <!-- for resident -->
                <?php if($type=="re"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus" ></i>RESERVATIONS </a>
                    <ul>
                        <li><a href="#">YOUR RESERVATIONS</a></li>
                        <li><a href="#">PARKING SLOT</a></li>
                        <li><a href="#">FITNESS CENTRE</a></li>
                        <li><a href="#">HALL</a></li>
                        <li><a href="#">TREATMENT ROOM</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><i class="fa fa-handshake"></i>REQUESTS</a>
                    <ul>
                        <li><a href="#">YOUR REQUESTS</a></li>
                        <li><a href="#">MAINTENANCE</a> </li>
                        <li><a href="#">LAUNDRY</a></li>
                        <li><a href="#">VISITOR APPROVAl</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"></i>PAYMENTS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note"></i>BILLS</a></li>
                <li><a href="#"><i class="fa fa-home" ></i>HOME</a></li>
                <?php
                }?>
                <!-- resident end -->
                <!-- for manager -->
                <?php if($type=="ma"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"  ></i>MANAGE RESERVATIONS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>COMPLAINTS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note"  ></i>VIEW RESIDENT</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>VIEW REPORTS</a></li>
        
                <?php
                }?>
                <!-- end manager -->
                <!-- for admin -->
                <?php if($type=="ad"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>COMPLAINTS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note"  ></i>VIEW RESIDENT</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>VIEW REPORTS</a></li>
        
                <?php
                }?>
                <!-- end admin -->
                <!-- for receptionist -->
                <?php if($type=="rp"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"  ></i>MANAGE RESERVATIONS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>COMPLAINTS</a></li>
        
                <?php
                }?>
                <!-- end receptionist -->
                <!-- for parking officer -->
                <?php if($type=="pa"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"  ></i>MANAGE RESERVATIONS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>
        
                <?php
                }?>
                <!-- end parking officer -->
                <!-- for trainer -->
                <?php if($type=="tr"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"  ></i>MANAGE RESERVATIONS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>
        
                <?php
                }?>
                <!-- end trainer -->
                <!-- for laundry -->
                <?php if($type=="la"){?>
                <li class="dropdown"><a href="#"><i class="fa fa-calendar-plus"></i>HANDLE REQUESTS </a>
                <ul>
                    <li><a href="#">SUB 1</a></li>
                    <li><a href="#">SUB 2</a></li>
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-credit-card"  ></i>MANAGE RESERVATIONS</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" ></i>ANNOUNCEMENT</a></li>

                <?php
                }?>
                <!-- end laundry -->
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
