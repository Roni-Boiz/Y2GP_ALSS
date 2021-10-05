//REGISTRATION VALIDATION

$(function() {
    $("#email_error_message").hide();
    $("#email_error_message").hide();


    });
    $("#form_email").keyup(function() {
       check_email();
      });
      $("#form_username").keyup(function() {
         check_username();
        });
       function check_username() {
         var pattern = /^[a-zA-Z10-9]*$/;
         var fname = $("#form_username").val();
         if (fname == '') {
          $("#username_error_message").html("Enter first name");
          $("#username_error_message").show();
          $("#username.input-field i").css("color","#F90A0A");
          $("#username").css("border-bottom","2px solid #F90A0A");
  
         }
          else if (pattern.test(fname) && fname !== '') {
            $("#username_error_message").hide();
            $("#username.input-field i").css("color","#34F458");
            $("#username").css("border-bottom","2px solid #34F458");
         } else {
            $("#username_error_message").html("Should contain only Characters");
            $("#username_error_message").show();
            $("#username.input-field i").css("color","#F90A0A");
            $("#username").css("border-bottom","2px solid #F90A0A");
  
         }
      }

    function check_email() {
       var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       var email = $("#form_email").val();
       if (email == '') {
        $("#email_error_message").html("Enter Email");
          $("#email_error_message").show();
          $("#emailId.input-field i").css("color","#F90A0A");
          $("#emailId").css("border-bottom","2px solid #F90A0A");
          error_email = true;
       }
        else if (pattern.test(email) && email !== '') {
          $("#email_error_message").hide();
          $("#emailId.input-field i").css("color","#34F458");
          $("#emailId").css("border-bottom","2px solid #34F458");
       } else {
          $("#email_error_message").html("Invalid Email");
          $("#email_error_message").show();
          $("#emailId.input-field i").css("color","#F90A0A");
          $("#emailId").css("border-bottom","2px solid #F90A0A");
          error_email = true;
       }
    }


