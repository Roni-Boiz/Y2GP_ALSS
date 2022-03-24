// Password validity check
$(function () {

    $("#old_password_error_message").hide();
    $("#new_password_error_message").hide();
    $("#renew_password_error_message").hide();

    //profile details edit
    $("#fnameerr").hide();
    $("#lnameerr").hide();
    $("#pnoerr").hide();
    $("#emailerr").hide();

    //profile edit other
    $("#fname").keyup(function () {
        check_fname();
    });
    $("#lname").keyup(function () {
        check_lname();
    });
    $("#phone_no").keyup(function () {
        check_phone();
    });
    $("#email").keyup(function () {
        check_email();
    });

    $("#opw").keyup(function () {
        check_oldpassword();
    });
    $("#npw").keyup(function () {
        check_newpassword();
    });
    $("#rnpw").keyup(function () {
        check_retypepassword();
    });
});
//profile edit
function check_fname() {
    var fn = $("fname").val();
    var firstname = new RegExp(/^[a-zA-Z]+$/);

    if (firstname.test(fn)) {
        $("#fnameerr").hide();
        $("#fname").css("border-bottom", "2px solid #34F458");
        $("#disablebutton2").prop('disabled', false);
        $("#disablebutton2").css('cursor', 'pointer');
    } else {
        $("#fnameerr").html("Name not valid");
        $("#fnameerr").show();
        $("#fname").css("border-bottom", "2px solid #F90A0A");
        $("#disablebutton2").prop('disabled', true);
        $("#disablebutton2").css('cursor', 'not-allowed');
    }

}
//profile check
function check_lname() {
    var ln = $("#lname").val();
    var lastname = new RegExp(/^[a-zA-Z]+$/);

    if (lastname.test(ln)) {
        $("#lnameerr").hide();
        $("#lname").css("border-bottom", "2px solid #34F458");
        $("#disablebutton2").prop('disabled', false);
        $("#disablebutton2").css('cursor', 'pointer');

    } else {
        $("#lnameerr").html("Name not valid");
        $("#lnameerr").show();
        $("#lname").css("border-bottom", "2px solid #F90A0A");
        $("#disablebutton2").prop('disabled', true);
        $("#disablebutton2").css('cursor', 'not-allowed');
    }
}

function check_phone() {
    var pn = $("#phone_no").val();
    var phone = new RegExp(/^(\+)?(\d{1,2})?[( .-]*(\d{3})[) .-]*(\d{3,4})[ .-]?(\d{4})$/);

    if (phone.test(pn)) {
        $("#pnoerr").hide();
        $("#phone_no").css("border-bottom", "2px solid #34F458");
        $("#disablebutton2").prop('disabled', false);
        $("#disablebutton2").css('cursor', 'pointer');

    } else {
        $("#pnoerr").html("Phone number not valid");
        $("#pnoerr").show();
        $("#phone_no").css("border-bottom", "2px solid #F90A0A");
        $("#disablebutton2").prop('disabled', true);
        $("#disablebutton2").css('cursor', 'not-allowed');
    }
}

function check_email() {
    var em = $("#email").val();
    var email = new RegExp(/^[\w.]+@[\w.]+\.\w{2,3}$/);

    if (email.test(em)) {
        $("#emailerr").hide();
        $("#email").css("border-bottom", "2px solid #34F458");
        $("#disablebutton2").prop('disabled', false);
        $("#disablebutton2").css('cursor', 'pointer');

    } else {
        $("#emailerr").html("Email not valid");
        $("#emailerr").show();
        $("#email").css("border-bottom", "2px solid #F90A0A");
        $("#disablebutton2").prop('disabled', true);
        $("#disablebutton2").css('cursor', 'not-allowed');
    }
}

function check_oldpassword() {
    var password_length = $("#opw").val().length;

    if (password_length == 0) {
       $("#old_password_error_message").html("Enter old password");
       $("#old_password_error_message").show();
       $("#opw").css("border-bottom", "2px solid #F90A0A");
    }
    else if (password_length < 8) {
       $("#old_password_error_message").html("Atleast 8 Characters");
       $("#old_password_error_message").show();
       $("#opw").css("border-bottom", "2px solid #F90A0A");
    }

    else {
       $("#old_password_error_message").hide();
       $("#opw").css("border-bottom", "2px solid #34F458");
    }

 }
 function check_newpassword() {
    var password_length = $("#npw").val().length;

    if (password_length == 0) {
       $("#new_password_error_message").html("Enter password");
       $("#new_password_error_message").show();
       $("#npw").css("border-bottom", "2px solid #F90A0A");
       error_rpassword = true;
    }
    else if (password_length < 8) {
       $("#new_password_error_message").html("Atleast 8 Characters");
       $("#new_password_error_message").show();
       $("#npw").css("border-bottom", "2px solid #F90A0A");
       error_rpassword = true;
    }
    else {
       $("#new_password_error_message").hide();
       $("#npw").css("border-bottom", "2px solid #34F458");
    }
 }

 function check_retypepassword() {
    var rpassword = $("#npw").val();
    var retype_password = $("#rnpw").val();
    if (rpassword == retype_password && retype_password != "") {
       $("#renew_password_error_message").hide();
       $("#rnpw").css("border-bottom", "2px solid #34F458");

       error_retype_password = true;
    } else {
       $("#renew_password_error_message").html("Passwords did not Match");
       $("#renew_password_error_message").show();
       $("#rnpw").css("border-bottom", "2px solid #F90A0A");
    }
 }

