//REGISTRATION VALIDATION

$(function() {

    $("#fname_error_message").hide();
    $("#sname_error_message").hide();
    $("#email_error_message").hide();
    $("#rpassword_error_message").hide();
    $("#retype_password_error_message").hide();

    var error_fname = false;
    var error_sname = false;
    var error_email = false;
    var error_rpassword = false;
    var error_retype_password = false;

    $("#form_fname").focusout(function(){
       check_fname();
    });
    $("#form_sname").focusout(function() {
       check_sname();
    });
    $("#form_email").focusout(function() {
       check_email();
    });
    $("#form_rpassword").focusout(function() {
       check_rpassword();
    });
    $("#form_retype_password").focusout(function() {
       check_retype_password();
    });

    function check_fname() {
       var pattern = /^[a-z A-Z]*$/;
       var fname = $("#form_fname").val();
       if (fname == '') {
        $("#fname_error_message").html("Enter first name");
        $("#fname_error_message").show();
        $("#fnameId.input-field-signup i").css("color","#F90A0A");
        $("#fnameId").css("border-bottom","2px solid #F90A0A");
        error_fname = true;
       }
        else if (pattern.test(fname) && fname !== '') {
          $("#fname_error_message").hide();
          $("#fnameId.input-field-signup i").css("color","#34F458");
          $("#fnameId").css("border-bottom","2px solid #34F458");
       } else {
          $("#fname_error_message").html("Should contain only Characters");
          $("#fname_error_message").show();
          $("#fnameId.input-field-signup i").css("color","#F90A0A");
          $("#fnameId").css("border-bottom","2px solid #F90A0A");
          error_fname = true;
       }
    }

    function check_sname() {
       var pattern = /^[a-z A-Z]*$/;
       var sname = $("#form_sname").val()
       if (sname == '') {
        $("#sname_error_message").html("Enter last name");
        $("#sname_error_message").show();
        $("#snameId.input-field-signup i").css("color","#F90A0A");
        $("#snameId").css("border-bottom","2px solid #F90A0A");
     }
       else if (pattern.test(sname) && sname !== '') {
          $("#sname_error_message").hide();
          $("#snameId.input-field-signup i").css("color","#34F458");
          $("#snameId").css("border-bottom","2px solid #34F458");
       } else {
          $("#sname_error_message").html("Should contain only Characters");
          $("#sname_error_message").show();
          $("#snameId.input-field-signup i").css("color","#F90A0A");
          $("#snameId").css("border-bottom","2px solid #F90A0A");
          error_sname = true;
       }
    }

    function check_rpassword() {
       var password_length = $("#form_rpassword").val().length;

       if (password_length == 0) {
        $("#rpassword_error_message").html("Enter password");
        $("#rpassword_error_message").show();
        $("#rpasswordId.input-field-signup i").css("color","#F90A0A");
        $("#rpasswordId").css("border-bottom","2px solid #F90A0A");
        error_rpassword = true;
     }
       else if (password_length < 8) {
          $("#rpassword_error_message").html("Atleast 8 Characters");
          $("#rpassword_error_message").show();
          $("#rpasswordId.input-field-signup i").css("color","#F90A0A");
          $("#rpasswordId").css("border-bottom","2px solid #F90A0A");
          error_rpassword = true;
       } 

       else {
          $("#rpassword_error_message").hide();
          $("#rpasswordId.input-field-signup i").css("color","#34F458");
          $("#rpasswordId").css("border-bottom","2px solid #34F458");
       }

    }

    function check_retype_password() {
       var rpassword = $("#form_rpassword").val();
       var retype_password = $("#form_retype_password").val();
       if (rpassword == retype_password && retype_password != "" ) {
        $("#retype_password_error_message").hide();
        $("#retype_passwordfnameId.input-field-signup i").css("color","#34F458");
        $("#retype_passwordfnameId").css("border-bottom","2px solid #34F458");

          error_retype_password = true;
       } else {
        $("#retype_password_error_message").html("Passwords did not Match");
        $("#retype_password_error_message").show();
        $("#retype_passwordfnameId.input-field-signup i").css("color","#F90A0A");
        $("#retype_passwordfnameId").css("border-bottom","2px solid #F90A0A");
       }
    }

    function check_email() {
       var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       var email = $("#form_email").val();
       if (email == '') {
        $("#email_error_message").html("Enter Email");
          $("#email_error_message").show();
          $("#emailId.input-field-signup i").css("color","#F90A0A");
          $("#emailId").css("border-bottom","2px solid #F90A0A");
          error_email = true;
       }
        else if (pattern.test(email) && email !== '') {
          $("#email_error_message").hide();
          $("#emailId.input-field-signup i").css("color","#34F458");
          $("#emailId").css("border-bottom","2px solid #34F458");
       } else {
          $("#email_error_message").html("Invalid Email");
          $("#email_error_message").show();
          $("#emailId.input-field-signup i").css("color","#F90A0A");
          $("#emailId").css("border-bottom","2px solid #F90A0A");
          error_email = true;
       }
    }

    $("#registration_form").submit(function() {
      error_fname = false;
      error_sname = false;
      error_email = false;
      error_password = false;
      error_retype_password = false;

      check_fname();
      check_sname();
      check_email();
      check_rpassword();
      check_retype_password();

      if (error_fname === false && error_sname === false && error_email === false && error_rpassword === false && error_retype_password === false) {
         alert("Registration Successfull");
         return true;
      } else {
         alert("Please Fill the form Correctly");
         return false;
      }
   });

   

 });