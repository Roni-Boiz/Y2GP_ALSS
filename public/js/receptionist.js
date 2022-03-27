$(function () {

   $("#old_password_error_message").hide();
   $("#new_password_error_message").hide();
   $("#renew_password_error_message").hide();
   $("#visitorSearch").css('display', 'none');

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
   

   //Select apartment in receptionist views(add visitor,add parcel)
   $("#name").keyup(function () {
      check_add_visitor();
   });

   $("#selectapartment").on("change", function () {
      check_add_visitor();
      check_add_parcel();
   });
   $("#sender").keyup(function () {
      check_add_parcel();
   });

   // search row
   $("#mySearch").on('keyup', function () {
      var value = $(this).val().toLowerCase();
      $("#searchrow article").each(function () {
         if ($(this).text().toLowerCase().search(value) > -1) {
            $(this).show();
         } else {
            $(this).hide();
         }
      });
   })
   $("#mySearch2").on('keyup', function () {
      var value = $(this).val().toLowerCase();
      $("#searchrow article").each(function () {
         if ($(this).text().toLowerCase().search(value) > -1) {
            $(this).show();
         } else {
            $(this).hide();
         }
      });
   })

   $(".tabs-list li a").click(function (e) {
      e.preventDefault();
   });

   $(".tabs-list li").click(function () {
      var tabid = $(this).find("a").attr("href");
      $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
      $(".tab").hide(); // hiding open tab
      $(tabid).show(); // show tab
      $(this).addClass("active"); //  adding active class to clicked tab

      if ($("#tab0").css('display') == 'block') {
         $("#visitorSearch").css('display', 'none');
      }
      else {
         $("#visitorSearch").css('display', 'block');
      }
   });

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
   // popup model JS not working tabs
   // const model = document.getElementById("model");
   // const modelBtn = document.getElementById("model-btn");
   // const ans = document.getElementById("answer");
   // const closeBtn = document.getElementById("closebtn");

   // modelBtn.addEventListener("click", () => {
   //    document.getElementById("myCanvasNav").style.width = "100%";
   //    document.getElementById("myCanvasNav").style.opacity = "0.8";
   //    model.className = "open";
   // })

   // closeBtn.addEventListener("click", () => {
   //    model.className = 'close';
   //    document.getElementById("myCanvasNav").style.width = "0%";
   //    document.getElementById("myCanvasNav").style.opacity = "0";
   // })

   // model.addEventListener("click", (e) => {
   //    if (e.target.id === "yes-btn") {
   //       ans.innerText = "Hello Guys";

   //    } else if (e.target.id === "no-btn") {
   //       ans.innerText = "Oh no! ";
   //    } else {
   //       return;
   //    }
   //    model.className = 'close';
   // });
});
function deleteparcel(id) {
   console.log(id);
   r = confirm("Are you sure?");
   if (r == true) {

      $.ajax({
         type: "GET",
         url: "putReached",
         data: {
            parcel: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $(a).closest('article').fadeOut("fast");
         }
      });

   }
}
function setVisibility1(id) {
   if (document.getElementById('editprofile').value == 'Edit Profile') {
      document.getElementById('editprofile').value = 'Cancel';
      document.getElementById('editprofile').style.width = 'fit-content';
      document.getElementById(id).style.display = 'inline';
   } else {
      document.getElementById('editprofile').value = 'Edit Profile';
      document.getElementById('editprofile').style.width = '100%';
      document.getElementById(id).style.display = 'none';
   }
}
// Change Password show/hide
function setVisibility2(id) {
   if (document.getElementById('changepassword').value == 'Change Password') {
      document.getElementById('changepassword').value = 'Cancel';
      document.getElementById(id).style.display = 'inline';
   } else {
      document.getElementById('changepassword').value = 'Change Password';
      document.getElementById(id).style.display = 'none';
   }
}

function setVisibility3(id) {
   if (document.getElementById(id).style.display == 'none') {
      document.getElementById('showmore').text = 'Show Less';
      document.getElementById(id).style.display = 'inline';
   } else {
      document.getElementById('showmore').text = 'Show More';
      document.getElementById(id).style.display = 'none';
   }
}
////////////////////////////////////////////////////
function openModel(amodel, amodelBtn) {

   const model = document.getElementById(amodel);
   const modelBtn = document.getElementsByClassName(amodelBtn);
   const ans1 = document.getElementById("answer1");
   const ans2 = document.getElementById("answer2");
   const closeBtn = document.getElementsByClassName("closebtn");

   for (var i = 0; i < modelBtn.length; i++) {
      modelBtn[i].addEventListener('click', showModel, false);
   }

   function showModel() {
      document.getElementById("myCanvasNav").style.width = "100%";
      document.getElementById("myCanvasNav").style.opacity = "0.8";
      model.className = "open";
   }

   for (var i = 0; i < closeBtn.length; i++) {
      closeBtn[i].addEventListener('click', closeModel, false);
   }

   function closeModel() {
      document.getElementById("myCanvasNav").style.width = "0%";
      document.getElementById("myCanvasNav").style.opacity = "0";
      model.className = "close";
   }

   if ($("#name").val() && $("#selectapartment").val() ) {
      var n = $("#name").val();
      var apno = $("#selectapartment").val();
      if (ans1 !== null) {
         ans1.innerHTML = apno;
      }
      if (ans2 !== null) {
         ans2.innerHTML = n;
      }
   }
   if ($("#sender").val() && $("#selectapartment").val() ) {
      var s = $("#sender").val();
      var apno = $("#selectapartment").val();
      if (ans1 !== null) {
         ans1.innerHTML = apno;
      }
      if (ans2 !== null) {
         ans2.innerHTML = s;
      }
   }
   //for registration
   // if ($("#name").val() && $("#selectapartment").val() ) {
   //    var n = $("#name").val();
   //    var apno = $("#selectapartment").val();
   //    if (ans1 !== null) {
   //       ans1.innerHTML = apno;
   //    }
   //    if (ans2 !== null) {
   //       ans2.innerHTML = n;
   //    }
   // }
}


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
//vaildate add visitor
function check_name() {
   var n = $("#name").val();
   var name = new RegExp(/^[a-zA-Z ]+$/);

   if (name.test(n)) {
      $("#name").css("border-bottom", "2px solid #34F458");
      $("#nameerr").hide();
      return true;

   } else {
      $("#name").css("border-bottom", "2px solid #F90A0A");
      $("#nameerr").html("Name not valid");
      $("#nameerr").show();
      return false;
   }
}
function check_apartment() {
   if ($("#selectapartment").val() == "") {
      $("#apartmenterr").html("Select apartment");
      $("#apartmenterr").show();
      return false;
   }
   else {
      $("#apartmenterr").hide();
      return true;
   }
}
function check_sender() {
   if ($("#sender").val() == "") {
      $("#sender").css("border-bottom", "2px solid #F90A0A");
      $("#sendererr").html("Enter a sender");
      $("#sendererr").show();
      return false;
   }
   else {
      $("#sendererr").hide();
      $("#sender").css("border-bottom", "2px solid #34F458");      
      return true;
   }
}
function check_add_parcel() {
   if (!(check_apartment()) && !(check_sender())) {
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (!(check_apartment()) && check_sender()) {
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (check_apartment() && !(check_sender())) {

      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (check_apartment() && check_sender()) {
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');
   }

}
function check_add_visitor() {
   if (!(check_apartment()) && !(check_name())) {
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (!(check_apartment()) && check_name()) {
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (check_apartment() && !(check_name())) {
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');

   }
   if (check_apartment() && check_name()) {
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');
   }

}
function addvisitor() {
   console.log(1000);
   var n = $("#name").val();
   var apno = $("#selectapartment").val();
   var d = $("#description").val();
   $.ajax({
      type: "POST",
      url: "markIn",
      data: {
         name: n,
         apartmentId: apno,
         description: d
      },
      success: function () {

         console.log(200);


      }
   });
}
//add parcel confimation popup with ajax to pass values to controller function
function addparcel() {
   console.log(1000);
   var s = $("#sender").val();
   var apno = $("#selectapartment").val();
   var d = $("#description").val();
   $.ajax({
      type: "POST",
      url: "parcels",
      data: {
         sender: s,
         apartmentId: apno,
         description: d
      },
      success: function () {

         console.log(200);


      }
   });
}



