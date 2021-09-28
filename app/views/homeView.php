<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../public/css/style.css">

    <link rel="manifest" href="../../manifest.json">
    <meta name="theme-color" content="white">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../../public/img/android/android-launchericon-144-144.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="ALSS">
    <meta name="msapplication-TileImage" content="../../public/img/windows10/SmallTile.scale-400.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
<style>
*{
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}
body{
  background-image: url(../img/bg_3.jpg);
  background-size: cover;
  background-repeat: no-repeat;
}
.box{
  background-color:rgb(255, 255, 255);
  display: grid;
  grid-template-columns: 200px 1fr 1fr;
  border-radius: 5px;
  border: gray solid 1px;
  height:100%;
  width:90%;
  margin: 5%;
}
nav{
  margin: 0;
}
nav ul{
  float: right;
}
.header{
  grid-column-start: 3;
  font-weight:5px; 
  font-size: 20px;
}
nav ul li{
  list-style: none;
  display: inline-block;
  padding: 30px 20px ;
}
nav ul li a{
  text-decoration: none;
  color: black;   
}
nav ul li a:hover{
  font-weight:600; 
}
.box .header nav ul li button{
  border-radius: 20px;
  background-color: #211a49;
  border-style: none;
  padding:8px 40px ;
  font-size: 15px;
  font-weight:5px;  
}
.box .header nav ul li button span{
  color: white;
}
#logo{
  grid-column-start: 1;
  height: 200px;
  width: 200px;
  object-fit: cover;
  grid-row-start: 2;
  margin-left: 50px;
}
#title{
  color: #2a225a;
  font-size: 50px;
  grid-row-start: 2;
  margin-top: 70px;
}
#city{
  font-weight: lighter;
}
#ALSS{
  font-size:40px ;
  grid-column: 1/span 2;
  margin-left: 100px;
}
#mission{
  font-size:10px;
  font-weight: bold;
}
#apartment{
  width: 400px;
  height: 250px;
  margin:50px;
  grid-row: 2/span 3;
}
#content{
  font-size: 15px;
  margin: 100px;
  margin-top: 0;
  grid-column: 1/span 2;
}
.footer{
	height: 25px;
  width:100%;
  background:linear-gradient(to right,#211a49,#927ffc);
	text-align: center;
	font-size: 10px;
	padding-top: 20px;
}
.centre{
   align-items: center;
}
/* responsive */
@media(max-width:1260px) {
  .box{
    display: flex;
    flex-direction: column;
    align-items: center;
  }  
  #logo{
    height: 150px;
    width: 150px;
    margin:-30px;
      } 
  #title{
    font-size: 40px;
    margin-top: 0;
  }
  #ALSS{
    margin: 0;
    font-size: 30px;
  }
  nav ul li{
    padding: 10px 15px ;
  }
  .header{
    font-size: 15px;
  }
  #apartment{
    width: 300px;
    height: 175px;
    margin-top:10px;
  }
  #content{
    margin: 10px 50px;
  }
  .box .header nav ul li button{
    border-radius: 20px;
    padding:8px 30px ;
    font-size: 15px;
    font-weight: bold;  
  }
}
</style>
</head>
<body>
  <div class="center">
    <div class="box">
    <div class="header">     
    <nav>
      <ul>
        <li><a href="#">Map</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><button><a href="login"><span>LOGIN</span></a></button></li>
      </ul>
    </nav>
    </div>
      <img src="../../public/img/image.png" alt="" id="logo"/>
      <h1 id="title">Hawlock <span id="city">City</span></h1>
      <img src="../../public/img/1.jpg" id="apartment">
      <p id="ALSS">Apartment Life</br> Support System<span id="mission"><br>Make Your Life Easier</span><br><p id ="content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti unde mollitia, repudiandae </p></p>        
    </div>
  </div>
  <div class="footer">
      <p>&COPY;  2021,All rights reserved by Hawlock City</p>
  </div>
  <script src="../../main.js"></script>
</body>
</html>