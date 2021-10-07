$(function () {

   $("#old_password_error_message").hide();
   $("#new_password_error_message").hide();
   $("#renew_password_error_message").hide();

   $("#opw").keyup(function () {
      check_oldpassword();
   });
   $("#npw").keyup(function () {
      check_newpassword();
   });
   $("#rnpw").keyup(function () {
      check_retypepassword();
   });
   
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

   model.addEventListener("click", (e) => {
      if (e.target.id === "yes-btn") {
         ans.innerText = "Hello Guys";

      } else if (e.target.id === "no-btn") {
         ans.innerText = "Oh no! ";
      } else {
         return;
      }
      model.className = 'close';
   });
   // pop up modal
   const imgDiv = document.querySelector('.profile-pic');
   const img = document.querySelector('#photo');
   const file = document.querySelector('#file');
   const uploadBtn = document.querySelector('#uploadBtn');

   imgDiv.addEventListener('mouseenter', function () {
      uploadBtn.style.display = "block";
   });

   // imgDiv.addEventListener('mouseleave', function(){
   //     uploadBtn.style.display = "none";
   // });

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


   // function loadData() {
   //     var cookies = document.cookie;
   //     console.log(cookies);
   //     // document.getElementById("emptype").setAttribute('value','Manager');
   //     document.getElementById("fname").setAttribute('value',1);

   //     // document.getElementById("lname").setAttribute('value',);
   //     // document.getElementById("email").setAttribute('value',);
   //     // document.getElementById("cno").setAttribute('value',);
   // } 



});

function confirmSave() {
   alert("Are Your Sure to Save Details?")
}
function confirmDelete() {
   alert('Are Your Sure to Delete')
}
// add new field
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
// add announcement slide JS

// btnAddAnnouncement.addEventListener("click", ()=>{
//     openNav(); openOffcanvas();
// })

function openOffcanvas() {
   document.getElementById("mySidenavform").style.width = "400px";
   document.getElementById("hh").style.marginRight = "410px";
   document.getElementById("hb").style.marginRight = "410px";
}

function openNav() {
   document.getElementById("myCanvasNav").style.width = "100%";
   document.getElementById("myCanvasNav").style.opacity = "0.8";
}

function closeOffcanvas() {
   document.getElementById("mySidenavform").style.width = "0%";
   document.getElementById("hh").style.marginRight = "10px";
   document.getElementById("hb").style.marginRight = "10px";
   document.getElementById("myCanvasNav").style.width = "0%";
   document.getElementById("myCanvasNav").style.opacity = "0";
}
/////////////////////////////////////////////////////////////////