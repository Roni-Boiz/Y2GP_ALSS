<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../public/css/style.css">
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
  display: grid;
  grid-template-columns: 1fr 1fr;
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
  grid-column-start: 2;
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
  font-weight:bold;  
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

#apartment{

  width: 450px;
  height: 400px;
  margin-left:120px;
  /* border-radius:20%; */
  /* grid-column: 1 split/2; */
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


.signin_container{
    grid-column:2;
    height: 450px;
}
.signin_container form {
    margin-top: 10px;
    margin-bottom: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0 5rem;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
}

.title{  
    margin-top: 40px; 
    font-family: Arial;
    font-size: 30px;
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
    margin: 0px;
    width: 300px;
    height: 55px;
    background-color: #f0f0f0;
    margin: 20px 0px;
    border-radius: 55px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
}

.input-field i{
    padding: 13px;
    text-align: center;
    line-height: 25px;
    color: #acacac;
    font-size: 1.5rem;
}

.input-field input{
    background: none;
    outline: none;
    border: solid 0px;
    line-height: 1;
    font-weight: 600;
    font-size: 1.2rem;
    color: #333; 
}

.input-field input:placeholder-shown{
    
    color: rgb(43, 36, 36);
    font-weight: 500;
    border: none;
    background: none;
    outline: none;
}

input[type=text] , input[type=password]{
    width: 100%;
    padding: 10px 15px;
    margin: 8px 5px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    border: none;
    box-sizing: border-box;
}
input[type=submit] {
    width: 100px;
    background-color: #2a225a;
    color: white;
    padding: 5px 0px;
    margin: 10px 30px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    grid-column: 3;
}
input[type=submit]:hover {
    background-color: #02000c;
}

label{
    margin-left: 5px;
}

.red_alert {
  margin-top: 20px;
  padding: 20px;
  width: 50%;
  max-width:280px;
  border-radius:50px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}
.red_alert .closebtn{
  margin-right:20px;
  background-color: transparent;
  color: black;
  border: none;
  outline: none;
}

/* responsive */
@media(max-width:1200px) {
  .box{
      
    display: flex;
    flex-direction: column;
    align-items: center;
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
  font-weight:bold;  
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

.signin_container{
  margin-top: 70px;
    height: 450px;
}

  .header{
    font-size: 15px;
  }
  
  #apartment{
      position: relative;
      margin:0px;
      opacity: 50%;
    width: 100%;
    height:100%;
    object-fit: cover;
    
  }

  .signin_container{
      position: absolute;
    grid-column:1 split/3;
    height: 450px;
}

.title{  
    margin-top: 70px; 
    font-family: Arial;
    font-size: 30px;
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
          
            <li><button><a href="home"><span>Home</span></a></button></li>
        </ul>
        </nav>
        </div>
        <div>
            <center><img src="../../public/img/21.jpg" id="apartment"></center>
        </div>

        <div class="signin_container">

            <div class="title"><center>Login</center></div>
            <div class="signup">
              <?php 
              if(isset($this->errors) && sizeof($this->errors)>0){ ?>
                <center>
                <div class="red_alert">
                <button class="closebtn" onclick="this.parentElement.style.display='none';">&times;</button>
                <?php 
                $error = implode("<br>",$this->errors[0]);
                echo $error;
                ?>
                </div>
              </center>

              <?php 
              }
              ?>
                
               
                <form action="loginSuccess" class="sign-in-form" method= "POST">

                     <div class="input-field" id ="nameId">
                        <i class="fas fa-user"></i>
                        <input id="form_name" class="name" type="text" placeholder="Username" name= "name" autofocus required>
                        <br>
                        <span class="error_form" id="name_error_message"></span>
                    </div>

                    <div class="input-field" id ="passwordId">
                        <i class="fas fa-lock"></i>
                        <input id="form_password" type="password" placeholder="password" name = "password" required>
                        <br>
                        <span class="error_form" id="password_error_message"></span>
                    </div>

                    <input type="submit" class="btn solid" value="Login"/> 
                    
                </form>
                <div><center>Forgot Password <a href="#">Reset Password</a></center></div>
            
            </div> 
        </div>
        
  </div>
  
  <div class="footer">
      <p>&COPY;  2021,All rights reserved by Hawlock City</p>
  </div>
  
  <script type="text/javascript" src="../../public/js/login.js"></script>
  <script src="../../main.js"></script>
</body>
</html>