
<?php include 'slidenav.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/body.css">
    <link rel="stylesheet" href="../../public/css/register.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      classorigin = "anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background-color: gray; background-image:none;">
    <div class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Sign<span id="city"> Up</span></h1></div>
    <div class="hawlockbody">
    <div class="signup_container">
            <div class="signup">
                
                <form action="registerSuccess" class="sign-up-form" method= "POST">

                    <div class="input-field" id ="fnameId">
                        <i class="fas fa-user"></i>
                        <input id="form_fname" class="fname" type="text" placeholder="First Name" name= "fname" autofocus required>
                        <span class="error_form" id="fname_error_message"></span>
                    </div>

                    <div class="input-field" id ="snameId">
                        <i class="fas fa-user"></i>
                        <input id="form_sname" class="lname" type="text" placeholder="Last Name" name = "lname" required>
                        <span class="error_form" id="sname_error_message"></span>
                    </div>

                    <div class="input-field" id ="emailId">
                        <i class="fas fa-envelope"></i>
                        <input id="form_email" type="email" placeholder="email" name = "email" required>
                        <span class="error_form" id="email_error_message"></span>
                    </div>

                    <div class="input-field" id ="rpasswordId">
                        <i class="fas fa-lock"></i>
                        <input id="form_rpassword" type="password" placeholder="password" name = "rpassword" required>
                        <span class="error_form" id="rpassword_error_message"></span>
                    </div>

                    <div class="input-field" id ="retype_passwordfnameId">
                        <i class="fas fa-lock"></i>
                        <input id="form_retype_password" type="password" placeholder="Confirm Password" name = "retype_password" required>
                        <span class="error_form" id="retype_password_error_message"></span>
                    </div>

                    <input type="submit" class="btn solid" value="Sign Up"/>
                    
                </form>
            
        </div> 
        
     
    </div>

    <script type="text/javascript" src="../../public/js/register.js"></script>
    </div>
    
</body> 
</html>
