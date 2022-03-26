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
//////////////////////////////////////////////

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
///////////////////////////////////////////////////


// Edit profile
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
//////////////////////////////////////////////

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

function openModel(amodel, amodelBtn, id) {
    const model = document.getElementById(amodel);
    const modelBtn = document.getElementsByClassName(amodelBtn);
    const ans1 = document.getElementById("answer1");
    const ans2 = document.getElementById("answer2");
    const ans3 = document.getElementById("answer3");
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
    }
    if (ans3 !== null) {
        ans3.innerHTML = id;
    }
}

$(".tabs-list li a").click(function (e) {
    e.preventDefault();
});

$(".tabs-list li").click(function () {
    var tabid = $(this).find("a").attr("href");
    $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
    $(".tab").hide(); // hiding open tab
    $(tabid).show(); // show tab
    $(this).addClass("active"); //  adding active class to clicked tab
    $(".mySearch").val('');
    $("#searchrow article").show();
});

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

setInterval(function () {
    update_user_activity();
}, 3000);

function update_user_activity() {
    var action = 'update_time';
    $.ajax({
        url: "updateLastActivity",
        method: "POST",
        data: { action: action },
        success: function (data) {
        }
    });
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

$(window).resize(function (e) {
    screen_resize();
});

function screen_resize() {
    var h = parseInt(window.innerHeight);
    var w = parseInt(window.innerWidth);

    if (w <= 768) {
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

function previousView(){
    $(".success").css('display', 'none');
    $(".error").css('display', 'none');
    location.reload();
}

function declineRequest() {
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
            $(".success").css('display', 'block');
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');
            $("#deleteModel").toggleClass('close');
        },
        error: function () {
            $("#errormsg").html("Oops something went wrong. Please try again");
            $(".error").css('display', 'block');
            // console.log(data);
        }
    });
}

function loadEmployee() {
    $.ajax({
        type: "POST",
        url: "getFreeTechnicians",
        success: function (data) {
            data = JSON.parse(data);
            var optionText = '';
            var optionValue = '';
            $('#employee').empty();
            $('#employee').append(new Option("Employee", ""));
            for (var i in data) {
                // console.log(data);
                optionText = data[i].fname + " " + data[i].lname;
                optionValue = data[i].employee_id;
                $('#employee').append(new Option(optionText, optionValue));
            }
        }
    });
}

function acceptRequest() {
    let id = document.getElementById("answer2").innerText;
    var request_id = parseInt(id.substring(3));
    var employee = document.getElementById("employee");
    var employee_id = parseInt(employee.options[employee.selectedIndex].value);
    var employee_name = employee.options[employee.selectedIndex].text;
    console.log(id);
    $.ajax({
        type: "POST",
        url: "acceptThisRequest",
        data: {
            request_id: request_id,
            employee_id: employee_id,
            employee_name: employee_name,
        },
        success: function () {
            a = "#" + id;
            $(a).closest('article').fadeOut("slow");
            $("#successmsg").html("Request updated. And inform the resident");
            $("#editModel").toggleClass('close');
            $(".success").css('display', 'block');
            $("#myCanvasNav").css('width', '0%');
            $("#myCanvasNav").css('opacity', '0');     
        },
        error: function(){
            $("#errormsg").html("Oops something went wrong. Please try again");
            $(".error").css('display', 'block');
            console.log(data);
        }
    });
}



