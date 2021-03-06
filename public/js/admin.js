
//  Search Bar
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        // console.log(i,a.innerHTML.toUpperCase(),filter,a.innerHTML.toUpperCase().includes(filter),li[i]);
        // console.log(a.innerHTML.replace(/(<([^>]+)>)/ig,""));
        if (a.innerHTML.toUpperCase().includes(filter)) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
///////////////////////////////////////////////////////

// add announcement slide JS
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

// popup model JS
// function openModel(amodel) {
//     const model = document.getElementById(amodel);
//     const modelBtn = document.getElementById("model-btn");
//     const ans = document.getElementById("answer");
//     const closeBtn = document.getElementById("closebtn");

//     modelBtn.addEventListener("click", () => {
//         document.getElementById("myCanvasNav").style.width = "100%";
//         document.getElementById("myCanvasNav").style.opacity = "0.8";
//         model.className = "open";
//     })

//     closeBtn.addEventListener("click", () => {
//         model.className = 'close';
//         document.getElementById("myCanvasNav").style.width = "0%";
//         document.getElementById("myCanvasNav").style.opacity = "0";
//     })

//     model.addEventListener("click", (e) => {
//         if (e.target.id === "yes-btn") {
//             ans.innerText = "Hello Guys";

//         } else if (e.target.id === "no-btn") {
//             ans.innerText = "Oh no! ";
//         } else {
//             return;
//         }
//         model.className = 'close';
//     });
// }
/////////////////////////////////////////////////////

//  Function to Collide the do list
function collide() {
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
}
//////////////////////////////////////////////
var profile = document.querySelector('.profile-pic');
if (profile) {
    profile.addEventListener('mouseenter', function () {
        uploadBtn.style.display = "block";
    });
    profile.addEventListener('mouseleave', function () {
        uploadBtn.style.display = "none";
    });
}

function uploadPhoto(phpto, newfile) {
    const img = document.getElementById(phpto);
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

$(function () {
    //call a function to handle file upload on select file
    $('.profilePto').on('change', fileUpload);
});

function fileUpload(event) {
    //notify user about the file upload status
    $("#uploadBtn").html("Uploading...");

    //get selected file
    files = event.target.files;

    //form data check the above bullet for what it is  
    var data = new FormData();

    //file data is presented as an array
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image.*')) {
            //check file type
            $("#uploadBtn").html("Images Only");
        } else if (file.size > 10485760) {
            //check file size (in bytes)
            $("#uploadBtn").html("Select Size (< 10 MB)");
        } else {
            //append the uploadable file to FormData object
            data.append('file', file, file.name);

            //create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();

            //post file data for upload
            xhr.open('POST', 'editProfilePhoto', true);
            console.log(xhr);
            xhr.send(data);
            xhr.onload = function () {
                //get response and show the uploading status
                var response = JSON.parse(xhr.responseText);
                if (xhr.status === 200 && response.status == 'ok') {
                    $("#uploadBtn").html("Change Photo");
                } else if (response.status == 'type_err') {
                    $("#uploadBtn").html("Images Only");
                } else {
                    $("#uploadBtn").html("Error try again");
                }
            };
        }
    }
}

// Edit Profile show/hide
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
/////////////////////////////////////////////////////////

// Password validity check
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

////////////////////////////////////////////////////
function openModel(amodel, amodelBtn, id) {
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
    if (ans1 !== null) {
        ans1.innerHTML = id;
    }
    if (ans2 !== null) {
        ans2.innerHTML = id;
        $("#serviceId").val(id);
    }
}

$(".mySearch").on('keyup', function () {
    var value = $(this).val().toLowerCase();
    $("#searchrow article").each(function () {
        if ($(this).text().toLowerCase().search(value) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
})

function unlockAccount(user_name) {
    var msg = "Are you sure to Unlock this Account (user_name =" + user_name + ")?";
    r = confirm(msg);
    if (r == true) {
        $.ajax({
            type: "POST",
            url: "unclockThisAccount",
            data: {
                user_name: user_name
            },
            success: function () {
                // console.log($("#unlockID").closest('detail').text);
                $("#unlockId").closest('.detail').fadeOut("slow");
                $("#successmsg").html("User account unlocked");
                $(".success").css('display', 'block');
            },
            error: function () {
                $("#errormsg").html("Oops something went wrong. Please try again");
                $(".error").css('display', 'block');
            }
        });
    }
}

function deleteUser() {
    let id = document.getElementById("answer1").innerText;
    user_id = parseInt(id.substring(3));
    console.log(user_id);
    $.ajax({
        type: "POST",
        url: "deleteUserAccount",
        data: {
            user_id: user_id
        },
        success: function () {
            a = "#" + id;
            // console.log(a);
            $(a).closest('article').fadeOut("slow");
            $("#successmsg").html("User account deleted");
            $("#deleteModel").toggleClass('close');
            $(".success").css('display', 'block');
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');          
        },
        error: function(data) {
            $("#errormsg").html("Oops something went wrong. Please try again");
            $(".error").css('display', 'block');
            console.log(data);
        }
    });
}

function previousView(){
    $(".success").css('display', 'none');
    $(".error").css('display', 'none');
}

function deleteEmployee() {
    let id = document.getElementById("answer1").innerText;
    employee_id = parseInt(id.substring(3));
    // console.log(employee_id);
    $.ajax({
        type: "POST",
        url: "deleteEmployee",
        data: {
            employee_id: employee_id
        },
        success: function () {
            a = "#" + id;
            $(a).closest('article').fadeOut("slow");
            $("#successmsg").html("Employee record deleted");
            $("#deleteModel").toggleClass('close');
            $(".success").css('display', 'block');
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');    
        },
        error: function(){
            $("#errormsg").html("Oops something went wrong. Please try again");
            $(".error").css('display', 'block');
            // console.log(data);
        }
    });
}

function updateShift() {
    let id = document.getElementById("answer2").innerText;
    var employee_id = parseInt(id.substring(3));
    var week1 = document.getElementById("newWeek1").value;
    var week2 = document.getElementById("newWeek2").value;
    var week3 = document.getElementById("newWeek3").value;
    $.ajax({
        type: "POST",
        url: "updateEmployeeShift",
        data: {
            employee_id: employee_id,
            week1: week1,
            week2: week2,
            week3: week3,
        },
        success: function (msg) {
            $("#successmsg").html("Employee shift updated");
            $("#editModel").toggleClass('close');
            $(".success").css('display', 'block');
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');      
            $("#formUpdateShift")[0].reset();
        },
        error: function(){
            $("#errormsg").html("Oops something went wrong. Please try again");
            $(".error").css('display', 'block');
            console.log(data);
        }
    });
}

function setCurrentShiftData(id) {
    var employee_id = parseInt(id.substring(3));
    $.ajax({
        type: "POST",
        url: "getEmployeeShift",
        data: {
            employee_id: employee_id,
        },
        success: function (data) {
            data = JSON.parse(data);
            $('#newWeek1').val(data[0].shift_no).change();
            $('#newWeek2').val(data[1].shift_no).change();
            $('#newWeek3').val(data[2].shift_no).change();
            $('option').prop('disabled', false);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function setCurrentServiceRate(service_id){
    $.ajax({
        type: "POST",
        url: "getServiceRate",
        data: {
            service_id: service_id,
        },
        success: function (data) {
            $("#formUpdateRate")[0].reset();
            data = JSON.parse(data);
            // console.log(data);
            $('#newfee').val(data[0].fee).change();
            $('#newcancelfee').val(data[0].cancelation_fee).change();
        }
    });
}