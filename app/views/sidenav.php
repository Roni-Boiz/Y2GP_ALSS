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
/* header style */
.header{
    display: grid;
    grid-template-columns: 200px 1fr;
}
.header i{
  padding: 3px;
} 
.header {
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

</style>
</head>
<body>
    <div id="myheader">
        <div class="header">
            <div class="btn"><span class="fas fa-bars"></span></div>
            <h2>AlSS</h2>
            <div class="head">
                <ul>
                    <li class="dropdown"><a href="#"><i class="fa fa-user-circle"></i></a>
                        <ul>
                            <li><a href="#"></li><i class="fa fa-user"></i>Profile</a></li>
                            <li><a href="#"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
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

            </ul>
        </nav>

    </div>
