//REGISTRATION VALIDATION

$(function() {

   $("#old_password_error_message").hide();
   $("#new_password_error_message").hide();
   $("#renew_password_error_message").hide();

   $("#opw").keyup(function(){
      check_oldpassword();
   });
   $("#npw").keyup(function() {
      check_newpassword();
   });
   $("#rnpw").keyup(function() {
      check_retypepassword();
   });

function check_oldpassword() {
      var password_length = $("#opw").val().length;

      if (password_length == 0) {
        $("#old_password_error_message").html("Enter old password");
        $("#old_password_error_message").show();
        $("#opw").css("border-bottom","2px solid #F90A0A");
     }
      else if (password_length < 8) {
         $("#old_password_error_message").html("Atleast 8 Characters");
         $("#old_password_error_message").show();
         $("#opw").css("border-bottom","2px solid #F90A0A");
      } 

      else {
         $("#old_password_error_message").hide();
         $("#opw").css("border-bottom","2px solid #34F458");
       }

}
function check_newpassword() {
      var password_length = $("#npw").val().length;
 
      if (password_length == 0) {
         $("#new_password_error_message").html("Enter password");
         $("#new_password_error_message").show();
         $("#npw").css("border-bottom","2px solid #F90A0A");
         error_rpassword = true;
      }
      else if (password_length < 8) {
         $("#new_password_error_message").html("Atleast 8 Characters");
         $("#new_password_error_message").show();
         $("#npw").css("border-bottom","2px solid #F90A0A");
         error_rpassword = true;
      }
      else {
         $("#new_password_error_message").hide();
         $("#npw").css("border-bottom","2px solid #34F458");
      }
   }

function check_retypepassword() {
      var rpassword = $("#npw").val();
      var retype_password = $("#rnpw").val();
      if (rpassword == retype_password && retype_password != "" ) {
        $("#renew_password_error_message").hide();
        $("#rnpw").css("border-bottom","2px solid #34F458");

         error_retype_password = true;
      } else {
        $("#renew_password_error_message").html("Passwords did not Match");
        $("#renew_password_error_message").show();
        $("#rnpw").css("border-bottom","2px solid #F90A0A");
      }
    }
});
 function funedit() { 
   $("#editbtn1").hide();
   $("#editbtn2").show();
   $("#view").hide();
   $("#pw").hide();
   $("#editview").show();
   $("#removedmem").show();
   //$("#removeicon").show();
}  
function changePw() {
   $("#editbtn1").show(); 
   $("#editbtn2").hide();
   $("#editview").hide();
   $("#view").hide();
   $("#pw").show();
   $("#removedmem").hide();
   //$("#removeicon").hide();
} 
function confirmSave(){
   alert("Are Your Sure to Save Details?")
}
function confirmDelete(){
   alert('Are Your Sure to Delete')
}
// add new field
function newVehicle() {
   if($("#newveh").is(':hidden')){
      $("#newveh").show(500);
   }else{
      $("#newveh").hide();
   }
}
function newMember() {
   if($("#newmem").is(':hidden')){
      $("#newmem").show(500);
   }else{
      $("#newmem").hide();
   }
}
function showmembers() {
   if($("#showmem").is(':hidden')){
      $("#showmem").show(500);
   }else{
      $("#showmem").hide();
   }  
} 
   
