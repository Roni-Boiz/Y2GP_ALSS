$(function () {
   //form input validation

   //profile edit
   $("#old_password_error_message").hide();
   $("#new_password_error_message").hide();
   $("#renew_password_error_message").hide();

   //hall reservation
   $("#member").hide();
   $("#datetodayup").hide();

   //profile details edit
   $("#fnameerr").hide();
   $("#lnameerr").hide();
   $("#nicnoerr").hide();
   $("#pnoerr").hide();
   $("#emailerr").hide();
   $("#vnoerr").hide();
   $("#newmembererr").hide();
   $("#maintenecetypeerr").hide();
   $("#descriptionerr").hide();
   $("#currencyerr").hide();

   //profile edit pw
   $("#opw").keyup(function () {
      check_oldpassword();
   });
   $("#npw").keyup(function () {
      check_newpassword();
   });
   $("#rnpw").keyup(function () {
      check_retypepassword();
   });

   //profile edit other
   $("#fname").keyup(function () {
      check_fname();
   });
   $("#lname").keyup(function () {
      check_lname();
   });
   $("#nic").keyup(function () {
      check_nic();
   });
   $("#phone_no").keyup(function () {
      check_phone();
   });
   $("#email").keyup(function () {
      check_email();
   });
   $("#vehicle_no").keyup(function () {
      check_vehicleno();
   });
   $("#newmem").keyup(function () {
      check_newmember();
   });

   //maintenence request
   $("#description").keyup(function () {
      mainenencevalidation();
   });

   //payment
   $("#amount").keyup(function () {
      currencycheck();
   });

   //hall reservation
   $("#mem50").keyup(function () {
      check_members();
   });
   $("#datepicker").on("change", function () {
      check_uptotoday();
      mainenencevalidation();
      coach();
   });
   $("#stime").on("change", function () {
      check_time();
   });
   $("#etime").on("change", function () {
      check_time();
   });
   

   //laundry form input check
   $("#quantity1,#quantity2,#quantity3").keyup(function () {
      laundry();
   });
   $("#catw1,#catw2,#catw3,#select").on("change", function () {
      laundry();
   });
   $("#selectcoach").on("change", function () {
      coach();
   });

   //tab list
   $(".tabs-list li a").click(function (e) {
      e.preventDefault();
   });

   $(".tabs-list li").click(function () {
      var tabid = $(this).find("a").attr("href");
      $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
      $(".tab").hide(); // hiding open tab
      $(tabid).show(); // show tab
      $(this).addClass("active"); //  adding active class to clicked tab
   });

   // side nav
   $('.btn').click(function () {
      $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
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
   // add profile pic
   //  const imgDiv = document.querySelector('.profile-pic');
   //  const img = document.querySelector('#photo');
   //  const file = document.querySelector('#file');
   //  const uploadBtn = document.querySelector('#uploadBtn');

   //  imgDiv.addEventListener('mouseenter', function () {
   //     uploadBtn.style.display = "block";
   //  });

   //  file.addEventListener('change', function () {
   //     const choosefile = this.files[0];
   //     if (choosefile) {
   //        const reader = new FileReader();
   //        reader.addEventListener('load', function () {
   //           img.setAttribute('src', reader.result);
   //        });
   //        reader.readAsDataURL(choosefile);
   //     }
   //  });

   //  document.querySelector('.profile-pic').addEventListener('mouseenter', function () {
   //     uploadBtn.style.display = "block";
   //  });

   //  document.querySelector('.profile-pic').addEventListener('mouseleave', function () {
   //     uploadBtn.style.display = "none";
   //  });

   //popup
   const model = document.getElementById("model");
   const modelBtn = document.getElementById("model-btn");
   const ans = document.getElementById("answer");
   const closeBtn = document.getElementById("closebtn");

   modelBtn.addEventListener("click", () => {
      document.getElementById("myCanvasNav").style.width = "100%";
      document.getElementById("myCanvasNav").style.opacity = "0.8";
      model.className = "open";
   })

   closeBtn.addEventListener("click", () => {
      model.className = 'close';
      document.getElementById("myCanvasNav").style.width = "0%";
      document.getElementById("myCanvasNav").style.opacity = "0";
   })

});

function uploadPhoto(photo, newfile) {
   const img = document.getElementById(photo);
   const file = document.getElementById(newfile);

   file.addEventListener('change', function () {
      const choosefile = this.files[0];
      if (choosefile) {
         const reader = new FileReader();
         reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
         });
         reader.readAsDataURL(choosefile);
      }
   });
}

function expand() {
   if (document.getElementById("hh").style.gridColumn == "1 / span 3") {
      document.getElementById("hh").style.gridColumn = "2";
      document.getElementById("hb").style.gridColumn = "2";
      document.getElementById("hh").style.marginLeft = "20px";
      document.getElementById("hb").style.marginLeft = "20px";
      document.getElementById("side").style.left = "0px";
      document.getElementById("side").style.transform = "initial";
   } else {
      document.getElementById("hh").style.gridColumn = "1 / span 3";
      document.getElementById("hb").style.gridColumn = "1 / span 3";
      document.getElementById("hh").style.marginLeft = "50px";
      document.getElementById("hb").style.marginLeft = "50px";
      document.getElementById("side").style.left = "-200px";
      document.getElementById("side").style.transform = "rotateY(180deg)";
   }
}

function confirmSave() {
   alert("Are Your Sure to Save Details?")
}

function confirmDelete() {
   confirm('Are Your Sure to Delete')
}

function successcomplaint() {
   alert("your complaint will be considered soon.. thank you for your feedback")
}

// add new field in profile
function newVehicle() {
   if ($("#newveh").is(':hidden')) {
      $("#newveh").show(500);
   } else {
      $("#newveh").hide();
   }
}

function newMember() {
   if ($("#newmem").is(':hidden')) {
      $("#newmem").show(500);
   } else {
      $("#newmem").hide();
   }
}

function showmembers() {
   if ($("#showmem").is(':hidden')) {
      $("#showmem").show(500);
   } else {
      $("#showmem").hide();
   }
}

//payment
function showcardpayment() {
   if ($("#cardpayment").is(':hidden')) {
      $("#cardpayment").show(500);
   } else {
      $("#cardpayment").hide();
   }
}


//confirm pop up
function openModel(amodel, amodelBtn, id, type) {
   const model = document.getElementById(amodel);
   const modelBtn = document.getElementsByClassName(amodelBtn);
   const ans1 = document.getElementById("answer1");
   const ans2 = document.getElementById("answer2");
   const closeBtn = document.getElementsByClassName("closebtn");
   console.log(id);
   console.log(model);
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
   if (ans1 !== null) {
      ans1.innerHTML = id;
   }
   if (ans2 !== null) {
      ans2.innerHTML = type;
   }
}

// edit profile
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

//form validation in profile
function check_oldpassword() {
   var password_length = $("#opw").val().length;

   if (password_length == 0) {
      $("#old_password_error_message").html("Enter old password");
      $("#old_password_error_message").show();
      $("#opw").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
   }
   else if (password_length < 8) {
      $("#old_password_error_message").html("Atleast 8 Characters");
      $("#old_password_error_message").show();
      $("#opw").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
   }

   else {
      $("#old_password_error_message").hide();
      $("#opw").css("border-bottom", "2px solid #34F458");
      $("#disablebutton1").prop('disabled', false);
      $("#disablebutton1").css('cursor', 'pointer');
   }

}


function check_newpassword() {
   var password_length = $("#npw").val().length;

   if (password_length == 0) {
      $("#new_password_error_message").html("Enter password");
      $("#new_password_error_message").show();
      $("#npw").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
      error_rpassword = true;
   }
   else if (password_length < 8) {
      $("#new_password_error_message").html("Atleast 8 Characters");
      $("#new_password_error_message").show();
      $("#npw").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
      error_rpassword = true;
   }
   else {
      $("#new_password_error_message").hide();
      $("#npw").css("border-bottom", "2px solid #34F458");
      $("#disablebutton1").prop('disabled', false);
      $("#disablebutton1").css('cursor', 'pointer');
   }
}


function check_retypepassword() {
   var rpassword = $("#npw").val();
   var retype_password = $("#rnpw").val();
   if (rpassword == retype_password && retype_password != "") {
      $("#renew_password_error_message").hide();
      $("#rnpw").css("border-bottom", "2px solid #34F458");
      $("#disablebutton1").prop('disabled', false);
      $("#disablebutton1").css('cursor', 'pointer');

      error_retype_password = true;
   } else {
      $("#renew_password_error_message").html("Passwords did not Match");
      $("#renew_password_error_message").show();
      $("#rnpw").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
   }
}

//check name not having numbers or other symbols
function check_fname() {
   var fn = $("fname").val();
   var firstname = new RegExp(/^[a-zA-Z ]+$/);

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

//check name not having numbers or other symbols
function check_lname() {
   var ln = $("#lname").val();
   var lastname = new RegExp(/^[a-zA-Z ]+$/);

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

//check NIC xxxxxxxxxV format
function check_nic() {
   var ni = $("#nic").val();
   var nicno = new RegExp(/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/);

   if (nicno.test(ni)) {
      $("#nicnoerr").hide();
      $("#nic").css("border-bottom", "2px solid #34F458");
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');

   } else {
      $("#nicnoerr").html("NIC not valid");
      $("#nicnoerr").show();
      $("#nic").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
   }
}

//check phone no format widely used
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

function check_vehicleno() {
   var vn = $("#vehicle_no").val();
   console.log(vn);
   var vehicle = new RegExp(/^([A-Z]{1,3})-[0-9]{4}$/);

   if (vehicle.test(vn)) {
      $("#vnoerr").hide();
      $("#vehicle_no").css("border-bottom", "2px solid #34F458");
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');

   } else {
      $("#vnoerr").html("Vehicle no not valid");
      $("#vnoerr").show();
      $("#vehicle_no").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
   }
}

function check_newmember() {
   var nm = $("#newmem").val();
   var memname = new RegExp(/^[a-zA-Z]+$/);

   if (memname.test(nm)) {
      // $("#newmembererr").hide();
      // $("#newmem").css("border-bottom", "2px solid #34F458");

   } else {
      // $("#newmembererr").html("Name not valid");
      // $("#newmembererr").show();
      // $("#newmem").css("border-bottom", "2px solid #F90A0A");
   }
}


//form validation in reservation
function check_members() {
   var count = $("#mem50").val();
   var c = new RegExp(/^[0-9]{1,2}$/);
   if (count > 50) {
      $("#member").html("Member should be less than 50");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
      $("#member").show();
   }
   //check is it number
   else if (!c.test(count)) {
      $("#member").html("Enter valid member");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
      $("#member").show();
   }
   else {
      $("#member").hide();
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');
   }

}


function check_uptotoday() {
   var mydate = $("#datepicker").val();
   var today = new Date();
   console.log(Math.floor(today.getDate() / 10));
   console.log(Math.floor(today.getMonth() / 10));

   // if (!Math.floor(today.getDate() / 10)) {
   //    if (!Math.floor(today.getMonth() % 10)) {
   //       var date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-0' + (today.getDate());
   //    } else {
   //       var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-0' + (today.getDate());
   //    }
   // } else{
   //    if (!Math.floor(today.getMonth() % 10)) {
   //       var date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + (today.getDate());
   //    } else {
   //       var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + (today.getDate());
   //    }
   // }

   console.log(date);
   console.log(mydate)
   // if ($("#datepicker").val() && (date > mydate)) {
   //    $("#datetodayup").html("Enter upcoming date");
   //    $("#datetodayup").show();
   //    $("#canreserve").hide();
   //    //button disabled for wrong date
   //    $("#disablebutton1").css('cursor', 'not-allowed')
   //    $("#disablebutton1").prop('disabled', true);
   // } else {
   //    $("#disablebutton1").prop('disabled', false);
   //    $("#disablebutton1").css('cursor', 'pointer');
   //    $("#datetodayup").hide();
   // }
   //maintenence type select for easy
   if ($("#select").val() == "") {
      $("#maintenecetype").html("Select type first");
      $("#maintenecetype").show();
   } else {
      $("#maintenecetype").hide();
   }
}


function coach() {
   // fitness reservation coach
   if ($("#selectcoach").val() == "") {
      $("#coach").html("Select coach");
      $("#disablebutton1").prop('disabled', true);
      $("#disablebutton1").css('cursor', 'not-allowed');
      $("#coach").show();
   } else {
      $("#coach").hide();
      $("#disablebutton1").prop('disabled', false);
      $("#disablebutton1").css('cursor', 'pointer');
      check_uptotoday();
   }
}
// function treatmenttype(){
//    // fitness reservation coach
//    if ($("#trtype").val()=="") {
//       $("#ttype").html("Select treatment");
//       $("#disablebutton2").prop('disabled', true);
//       $("#disablebutton2").css('cursor','not-allowed');
//       $("#ttype").show();
//    }else{
//       $("#ttype").hide();
//       $("#disablebutton2").prop('disabled', false);
//       $("#disablebutton2").css('cursor','pointer');
//       //check_time();
//    }
// }


function check_time() {
   var stime = $("#stime").val();
   var etime = $("#etime").val();
   var mydate = $("#datepicker").val();
   //current date in yyyy-mm-dd format
   var todayDate = new Date().toISOString().slice(0, 10);
   console.log("today : ", todayDate);
   console.log(mydate);
   var dt = new Date();


   var h = dt.getHours();
   var m = dt.getMinutes();
   console.log(h, m);
   //difference of time
   s = stime.split(':');
   e = etime.split(':');

   min = e[1] - s[1];
   hour_carry = 0;
   if (min < 0) {
      min += 60;
      hour_carry += 1;
   }
   hour = e[0] - s[0] - hour_carry;
   diff = hour + ":" + min;
   console.log(diff);
   console.log(h);
   console.log(s[0]);
   if (todayDate == mydate && s[0] <= h) {
      console.log("start err");
      $("#endtime").html("Start time should be next hour");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
      $("#endtime").show();
   }
   else if (stime >= etime) {
      $("#endtime").html("Select valid time slot");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
      $("#endtime").show();

   }
   else if ((hour > 6) || (hour == 6) && (min == 30)) {
      $("#endtime").html("Maxium booking time 6 hours");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
      $("#endtime").show();
   }
   else {
      $("#endtime").hide();
      $("#disablebutton2").prop('disabled', false);
      $("#disablebutton2").css('cursor', 'pointer');
   }
   if ($("#datepicker1").val() == date) {

      if (s[0] > h) {
         console.log("can");
      } else {
         $("#endtime").html("Can't reserve this time for today");
         $("#disablebutton2").prop('disabled', true);
         $("#disablebutton2").css('cursor', 'not-allowed');
         $("#endtime").show();
      }
   }
}

// laundry validation
function laundry() {
   console.log($("#catw1").val());

   if (($("#quantity1").val() && $("#catw1").val() == "") || ($("#quantity3").val() && $("#catw3").val() == "") || ($("#quantity2").val() && $("#catw2").val() == "")) {
      $("#category").html("Please select net weight of respective category");
      $("#disablebutton3").css('cursor', 'not-allowed');
      $("#disablebutton3").prop('disabled', true);
      $("#category").show();
   } else {
      $("#category").hide();
      $("#disablebutton3").css('cursor', 'pointer');
      $("#disablebutton3").prop('disabled', false);
   }
   if ($("#select").val() == "") {
      $("#laundrytype").html("Select type first");
      $("#disablebutton3").css('cursor', 'not-allowed');
      $("#disablebutton3").prop('disabled', true);
      $("#laundrytype").show();
   } else {
      // $("#laundrytype").hide();
      // $("#disablebutton3").css('cursor', 'pointer');
      // $("#disablebutton3").prop('disabled', false);
   }
}
//maintenence validation
function mainenencevalidation() {
   if (!$("#select").val() && $("#description").val()) {
      $("#maintenecetypeerr").html("Select type first");
      $("#disablebutton3").css('cursor', 'not-allowed');
      $("#disablebutton3").prop('disabled', true);
      $("#maintenecetypeerr").show();
   } else {
      $("#maintenecetypeerr").hide();
      $("#disablebutton3").css('cursor', 'pointer');
      $("#disablebutton3").prop('disabled', false);
   }
   if ($("#select").val() && !$("#description").val()) {
      $("#descriptionerr").html("Description is required");
      $("#disablebutton3").css('cursor', 'not-allowed');
      $("#disablebutton3").prop('disabled', true);
      $("#descriptionerr").show();

   } else {
      $("#descriptionerr").hide();
      $("#disablebutton3").css('cursor', 'pointer');
      $("#disablebutton3").prop('disabled', false);
   }

}

//currency validation
function currencycheck() {
   var am = $("#amount").val();
   var c = new RegExp(/^(?!0\.00)\d{1,6}(,\d{3})*(\.\d\d)?$/);

   if (c.test(am)) {
      $("#currencyerr").hide();
      $("#amount").css("border-bottom", "2px solid #34F458");
      $("#disablebutton2").css('cursor', 'pointer');
      $("#disablebutton2").prop('disabled', false);

   } else {
      $("#currencyerr").html("Enter valid amount");
      $("#currencyerr").show();
      $("#amount").css("border-bottom", "2px solid #F90A0A");
      $("#disablebutton2").prop('disabled', true);
      $("#disablebutton2").css('cursor', 'not-allowed');
   }
}



// delete row and hide for value addition
function deleteReq(id, type) {
   r = confirm("Are you sure to remove your request ?");
   if (r == true) {

   }
}

//close success pop up
function previousView() {
   $(".success").css('display', 'none');
}
//save payment ti database
function payafter(amount) {
   console.log("payment save to database");
   $.ajax({
      type: "GET",
      url: "payafter",
      data: {
         amt: amount
      },
      success: function () {

      }
   });
}
// Make payment
function payNow(userId) {
   var amount = $("#amount").val();
   console.log(amount);
   var response = '';
   $.ajax({
      type: "GET",
      url: "makePayment",
      data: {
         amt: amount
      },
      success: function (text) {
         var r = JSON.parse(text);
         payhere.onCompleted = function onCompleted() {
            alert("Payment completed");
            //call to payafter() for save payment details to database
            //payafter(amount);
         };

         payhere.onDismissed = function onDismissed() {
            alert("Payment dismissed");
         };

         payhere.onError = function onError(error) {
            alert("Error:" + error);
         };

         // Put the payment variables here
         var payment = {
            "sandbox": true,
            "merchant_id": "1219029",    // Replace your Merchant ID
            "return_url": undefined,     // Important
            "cancel_url": undefined,     // Important
            "notify_url": "http://sample.com/notify",
            "order_id": r.apartmentNo,
            "items": r.residentId,
            "amount": r.amount,
            "currency": "LKR",
            "first_name": r.fname,
            "last_name": r.lname,
            "email": "",
            "phone": "",
            "address": r.apartmentNo,
            "city": "Colombo",
            "country": "Sri Lanka",
            "delivery_address": r.apartmentNo,
            "delivery_city": "Kalutara",
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
         };
         payhere.startPayment(payment);
      }
   });
   payafter(amount);
}

//close pop up
function closePopup() {
   document.getElementById("myCanvasNav").style.width = "0%";
   document.getElementById("myCanvasNav").style.opacity = "0";
   model.className = 'close';
}

// delete row and hide for value addition
function deletereservation() {
   let id = document.getElementById("answer1").innerText;
   console.log(id);
   let t = document.getElementById("answer2").innerText;
   console.log(t);

   if (t == "hall") {
      $.ajax({
         type: "GET",
         url: "removeReservation",
         data: {
            hallid: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $(a).closest('article').fadeOut("fast");
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $("#deleteModel").toggleClass('close');
            $(".success").css('display', 'block');
         }
      });
   }

   if (t == "fit") {
      $.ajax({
         type: "GET",
         url: "removeReservation",
         data: {
            fitid: id,

         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });
   }

   if (t == "treat") {
      $.ajax({
         type: "GET",
         url: "removeReservation",
         data: {
            treatid: id,

         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });
   }

   if (t == "parking") {
      $.ajax({
         type: "GET",
         url: "removeReservation",
         data: {
            parkingid: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });
   }

}

// delete row and hide for value addition

function deleterequest() {
   let id = document.getElementById("answer1").innerText;
   console.log(id);
   let type = document.getElementById("answer2").innerText;
   console.log(type);

   if (type == "laundry") {
      $.ajax({
         type: "GET",
         url: "removeRequest",
         data: {
            laundryid: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });
   }

   if (type == "maintenence") {
      $.ajax({
         type: "GET",
         url: "removeRequest",
         data: {
            maintenenceid: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });

   }

   if (type == "visitor") {
      $.ajax({
         type: "GET",
         url: "removeRequest",
         data: {
            visitorid: id
         },
         success: function () {
            a = "#" + id;
            console.log(a);
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $(a).closest('article').fadeOut("fast");
            $(".success").css('display', 'block');
            $("#deleteModel").toggleClass('close');

         }
      });
   }

}

//get previous reservation
function previousreservation() {
   console.log("test");
   console.log($("#tab1").css('display') == 'block');
   if($("#tab1").css('display') == 'block') {
      window.location = "preReservation?type=1";
   }
   else if($("#tab2").css('display') == 'block'){
      window.location = "preReservation?type=2";

   }else if($("#tab3").css('display') == 'block'){
      window.location = "preReservation?type=3";

   }else if($("#tab4").css('display') == 'block'){
      window.location = "preReservation?type=4";

   }

}

//get previous reservation
function previousrequest() {
   console.log("test");
   // console.log($("#tab1").css('display') == 'block');
   if ($("#tab1").css('display') == 'block') {
      window.location = "preRequest?type=1";
   }
   else if($("#tab2").css('display') == 'block'){
      window.location = "preRequest?type=2";

   }else if($("#tab3").css('display') == 'block'){
      window.location = "preRequest?type=3";

   }else{
      window.location = "preRequest?type=4";

   }

}


//view complaints
function complaintlist() {
   if ($("#com").css('display') == 'block') {
      $("#com").css('display', 'none');
   }
   else {
      $("#com").css('display', 'block');
   }


}

$(window).resize(function(e) {
   screen_resize();
});

function screen_resize() {
   var h = parseInt(window.innerHeight);
   var w = parseInt(window.innerWidth);

   if(w <= 768) {
      document.getElementById("hh").style.gridColumn = "1 / span 3";
      document.getElementById("hb").style.gridColumn = "1 / span 3";
      document.getElementById("hh").style.marginLeft = "50px";
      document.getElementById("hb").style.marginLeft = "50px";
      document.getElementById("side").style.left = "-200px";
      document.getElementById("side").style.transform = "rotateY(180deg)";
   } else {
      document.getElementById("hh").style.gridColumn = "2";
      document.getElementById("hb").style.gridColumn = "2";
      document.getElementById("hh").style.marginLeft = "20px";
      document.getElementById("hb").style.marginLeft = "20px";
      document.getElementById("side").style.left = "0px";
      document.getElementById("side").style.transform = "initial";
   }
}
