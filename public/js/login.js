
// LOGIN VALIDATION
$(function() {

$("#name_error_message").hide();
$("#password_error_message").hide();

//var error_name = false;
//var error_password = false;

$("#form_name").keyup(function(){
check_name();
});

$("#form_password").keyup(function() {
check_password();
});

// $("#form_name").focusout(function(){
//   check_name();
//   });
  
//   $("#form_password").focusout(function() {
//   check_password();
//   });



function check_name() {
var pattern = /^[a-zA-Z0-9]*$/;
var name = $("#form_name").val();
if (pattern.test(name) && name !== '') {
  $("#name_error_message").hide(300);
  $("#nameId.input-field i").css("color","#34F458");
  $("#nameId").css("border-bottom","2px solid #34F458");
} else {
  $("#name_error_message").html("Enter valid username!");
  $("#name_error_message").show(300);
  $("#nameId.input-field i").css("color","#F90A0A");
  $("#nameId").css("border-bottom","2px solid #F90A0A");
  //error_name = true;
}
}

function check_password() {
var password_length = $("#form_password").val().length;
if (password_length < 8) {
  $("#password_error_message").html("Enter valid password!");
  $("#password_error_message").show(300);
  $("#passwordId.input-field i").css("color","#F90A0A");
  $("#passwordId").css("border-bottom","2px solid #F90A0A");
  //error_password = true;
} else {
  $("#password_error_message").hide(300);
  $("#passwordId.input-field i").css("color","#34F458");
  $("#passwordId").css("border-bottom","2px solid #34F458");
}
}
});

