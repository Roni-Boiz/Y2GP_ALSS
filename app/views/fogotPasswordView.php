<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../../public/css/body.css"> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      classorigin = "anonymous"
    />
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>

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
  display: flex;
  flex-direction: column;
  /* grid-template-columns: 200px 200px 1fr; */
  /* grid-template-rows: 100px 1fr; */
  border-radius: 5px;
  border: gray solid 1px;
  min-height: 600px;
  width:90%;
  margin: 5%;
}
nav{
  margin: 0;
}
nav ul{
  float: right;
}
#logo{
  height: 200px;
  width: 200px;
  object-fit: cover;
  margin:  -60px auto;
}
#title{
  color: #2a225a;
  font-size: 40px;
  margin: 0 auto;
  margin-bottom: 20px;
  }
#city{
  font-weight: lighter;
}
.header{
  font-weight:5px; 
  font-size: 20px;
}
nav ul li{
  list-style: none;
  display: inline-block;
  padding: 30px 20px 0 0 ;
}
nav ul li a{
  text-decoration: none;
  color: black;   
}
nav ul li a:hover{
  font-weight:bold;  
}
.header nav ul li button{
  border-radius: 20px;
  background-color: #211a49;
  border-style: none;
  padding:8px 40px ;
  font-size: 15px;
  font-weight:5px;  
}
.header nav ul li button span{
  color: white;
}
.error_form {
  margin-top: 3px;
  margin-left: 40px;
  font-family: Arial;
  font-size: 13px;
  color: #ff0808;
  width: 250px;
}
.input-field{
  width: 250px;
  height: 45px;
  background-color: #f0f0f0;
  margin:30px auto;
  border-radius: 55px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}
.input-field i{
  padding: 13px;
  text-align: center;
  line-height: 20px;
  color: #acacac;
  font-size: 1rem;
}
.input-field input{
  background: none;
  outline: none;
  border: solid 0px;
  line-height: 1;
  font-weight: 600;
  font-size: 1rem;
  color: #333; 
}
.input-field input:placeholder-shown{
  color: rgb(43, 36, 36);
  font-weight: 500;
  border: none;
  background: none;
  outline: none;
}

input[type=email]{
  border: none;
  padding: 10px 15px;
}

input[type=submit] {
  width: 130px;
  background-color: #2a225a;
  color: white;
  padding: 5px 0px;
  margin: 20px auto;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  grid-column: 1/span3;
}
input[type=submit]:hover {
  background-color: #02000c;
}

#form_apartment{
  background-color: transparent;
  border: none;
  outline: none;
  padding: 10px 15px;
  font-weight: 500;
  font-size: 1rem;
}

/* error part */
.red_alert {
  padding: 5px 10px;
  width: 200px;
  border-radius:50px;
  background-color: #f44336; /* Red */
  color: white;
  margin:20px auto 0 auto;
  text-align: center;
}
.red_alert .closebtn{
  margin-right:5px;
  background-color: transparent;
  color: black;
  border: none;
  outline: none;
  float:right;
}
/* card */
.fogotcontainer {
  display:flex;
  flex-direction: column;
  box-shadow: 0 3px 7px -1px #110b2e;
  background: #fff;
  line-height: 1.4;
  border-radius: 5px;
  overflow: hidden;
  margin: auto;
  margin-bottom: 50px;
  width:90%;
  height: 400px;
}
.fogotcontainer:hover .photo {
  transform: scale(1.3) rotate(3deg);
}
.fogotcontainer .data {
  position: relative;
  z-index: 0;
}
.fogotcontainer .photo {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-size: cover;
  background-position: center;
  transition: transform 0.2s;
}
.fogotcontainer .details ul {
  margin: auto;
  padding: 0;
  list-style: none;
}
.fogotcontainer .details {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -110%;
  /* margin: auto; */
  transition: left 0.2s;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 10px;
  width: 100%;
  font-size: 0.9rem;
}
.fogotcontainer .details:before {
  margin-right: 10px;
  content: "";
}
.fogotcontainer .description {
  padding: 1rem;
  background: #fff;
  position: relative;
  z-index: 1;
}
.fogotcontainer .description h1 {
  line-height: 1;
  color:indigo;
  font-weight:bold;
  font-size:2rem;
  text-align:center;
  padding:20px 0 30px 0;
}
.fogotcontainer .description .read-more {
  padding-top: 20px;
  text-align: right;
  margin: 0;
}
.fogotcontainer .description .read-more a {
  color: #110b2e;
  display: inline-block;
  position: relative;
}
.fogotcontainer .description .read-more a:after {
  content: "...";
  margin-left: -10px;
  opacity: 0;
  transition: margin 0.3s, opacity 0.3s;
}
.fogotcontainer .description .read-more a:hover:after {
  margin-left: 5px;
  opacity: 1;
}
.fogotcontainer p {
  margin: 1rem 0 0;
}
.fogotcontainer:hover .details {
  left: 0%;
}
@media (min-width: 640px) {
  .fogotcontainer {
    flex-direction: row;
    max-width: 700px;
  }
  .fogotcontainer .data {
    flex-basis: 40%;
    height: auto;
  }
  .fogotcontainer .description {
    flex-basis: 60%;
  }
  .fogotcontainer .description:before {
    transform: skewX(-3deg);
    content: "";
    background: #fff;
    width: 30px;
    position: absolute;
    left: -10px;
    top: 0;
    bottom: 0;
    z-index: -1;
  }
  #title{
    font-size: 50px;
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
        <li><button><a href="home"><span>HOME</span></a></button></li>
        <li><button><a href="login"><span>LOGIN</span></a></button></li>
      </ul>
    </nav>
    </div>
    <img src="../../public/img/image.png" alt="" id="logo"/>
    <h1 id="title">Hawlock <span id="city">City</span></h1>
    <div class="fogotcontainer" style="grid-column:3;grid-row:2/span3">
        <div class="data">
          <div class="photo" style="background-image:url(../../public/img/1.jpg);"></div>
            <ul class="details">
              <?php date_default_timezone_set("Asia/Colombo"); ?>
              <li class="author"><?php echo date("H:i"); ?>  </li>
              <li class="date"><?php echo  date("F j, Y");  ?></li>
            </ul>
        </div>
        <div class="description">
          <h1>Fogot Password</h1>
          
          <?php 
              if(isset($this->errors) && sizeof($this->errors['0'])>0){ ?>
                <center>
                <div class="red_alert">
                <button class="closebtn" onclick="this.parentElement.style.display='none';">&times;</button>
                <?php 
                $error = implode("<br>",$this->errors['0']);
                 echo $error;
                ?>
                </div>
              </center>

              <?php 
              }
              ?>
            <form action="resetPassword" class="fogotPasswordForm" method= "POST">

            <div class="input-field" id ="username">
              <i class="fas fa-envelope"></i>
              <input id="form_username" type="text" placeholder="Username" name = "username" required>
              <br>
              <span class="error_form" id="username_error_message"></span>

            </div>

            <div class="input-field" id ="emailId">
              <i class="fas fa-envelope"></i>
              <input id="form_email" type="email" placeholder="Email" name = "email" required>
              <br>
              <span class="error_form" id="email_error_message"></span>

              <input type="submit" class="btn" value="Reset Password"/> 
            </div>
            
            </form>
                      
        </div>
      </div> 
    </div>
</div>

<script type="text/javascript" src="../../public/js/fogot.js"></script>
<script src="../../main.js"></script>
</body>
</html>