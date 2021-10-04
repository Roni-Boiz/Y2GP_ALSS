//REGISTRATION VALIDATION

$(function() {
    $("#email_error_message").hide();
    var error_email = false;

    });
    $("#form_email").keyup(function() {
       check_email();

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


 });