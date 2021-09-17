<?php session_start(); ?>

<!-- <?php include 'slidenav.php'?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/body.css">
    <link rel="stylesheet" href="../../public/css/login.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      classorigin = "anonymous"
    />
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>
</head>
<body style="background-color: gray; background-image:none;">
    <div class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Sign<span id="city"> Up</span></h1></div>
    <div class="hawlockbody">
    <div class="signin_container">
            <div class="signup">
                
                <form action="loginSuccess" class="sign-in-form" method= "POST">

                    <div class="input-field" id ="nameId">
                        <i class="fas fa-user"></i>
                        <input id="form_name" class="name" type="text" placeholder="Username" name= "name" autofocus required>
                        <span class="error_form" id="name_error_message"></span>
                    </div>

                    

                    <div class="input-field" id ="passwordId">
                        <i class="fas fa-lock"></i>
                        <input id="form_password" type="password" placeholder="password" name = "password" required>
                        <span class="error_form" id="password_error_message"></span>
                    </div>

                    <input type="submit" class="btn solid" value="Sign Up"/>
                    
                </form>
            
        </div> 
        
     
    </div>

    
    <script type="text/javascript" src="../../public/js/login.js"></script>
</body> 
</html>
