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
   // side nav
   $('.btn').click(function () {
      $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
   });
    // add profile pic
    const imgDiv = document.querySelector('.profile-pic');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');
 
    imgDiv.addEventListener('mouseenter', function () {
       uploadBtn.style.display = "block";
    });
 
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
 
    document.querySelector('.profile-pic').addEventListener('mouseenter', function () {
       uploadBtn.style.display = "block";
    });
 
    document.querySelector('.profile-pic').addEventListener('mouseleave', function () {
       uploadBtn.style.display = "none";
    });
   // popup
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
      document.getElementById("side").style.transform = "initial";
   } else {
      document.getElementById("hh").style.gridColumn = "1 / span 3";
      document.getElementById("hb").style.gridColumn = "1 / span 3";
      document.getElementById("hh").style.marginLeft = "50px";
      document.getElementById("hb").style.marginLeft = "50px";
      document.getElementById("side").style.transform = "rotateY(180deg)";
   }
}
function confirmSave() {
   alert("Are Your Sure to Save Details?")
}
function confirmDelete() {
   confirm('Are Your Sure to Delete')
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
// delete row and hide for value addition
function deleteRes(id, type) {
   r = confirm("Are you sure?");
   if (r == true) {
      if (type = "hall") {
         $.ajax({
            type: "GET",
            url: "removeReservation",
            data: {
               hallid: id
            },
            success: function () {
               a = "#" + id;
               console.log(a);
               $(a).closest('tr').fadeOut("fast");
            }
         });
      }
      if (type = "fit") {
         $.ajax({
            type: "GET",
            url: "removeReservation",
            data: {
               fitid: id
            },
            success: function () {
               a = "#" + id;
               console.log(a);
               $(a).closest('tr').fadeOut("fast");
            }
         });
      }
      if (type = "hall") {
         $.ajax({
            type: "GET",
            url: "removeReservation",
            data: {
               treatid: id
            },
            success: function () {
               a = "#" + id;
               console.log(a);
               $(a).closest('tr').fadeOut("fast");
            }
         });
      }
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