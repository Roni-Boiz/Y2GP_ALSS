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
    
        $(".tabs-list li a").click(function(e) {
            e.preventDefault();
        });

        $(".tabs-list li").click(function() {
            var tabid = $(this).find("a").attr("href");
            $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
            $(".tab").hide(); // hiding open tab
            $(tabid).show(); // show tab
            $(this).addClass("active"); //  adding active class to clicked tab
        });
        /* show sidebar */
        $('.btn').click(function() {
            $(this).toggleClass("click");
            $('.sidebar').toggleClass("show");
        });
    
     // popup
//    const model = document.getElementById("model");
//    const modelBtn = document.getElementById("model-btn");
//    const ans = document.getElementById("answer");
//    const closeBtn = document.getElementById("closebtn");

//    modelBtn.addEventListener("click", () => {
//       document.getElementById("myCanvasNav").style.width = "100%";
//       document.getElementById("myCanvasNav").style.opacity = "0.8";
//       model.className = "open";
//    })

//    closeBtn.addEventListener("click", () => {
//       model.className = 'close';
//       document.getElementById("myCanvasNav").style.width = "0%";
//       document.getElementById("myCanvasNav").style.opacity = "0";
//    })



   
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
function openModel(amodel, amodelBtn) {

    const model = document.getElementById(amodel);
    const modelBtn = document.getElementsByClassName(amodelBtn);
    const ans = document.getElementById("answer");
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
    

    // model.addEventListener("click", (e) => {
    //     if (e.target.id === "yes-btn") {
    //         ans.innerText = "Hello Guys";

    //     } else if (e.target.id === "no-btn") {
    //         ans.innerText = "Oh no! ";
    //     } else {
    //         return;
    //     }
    //     model.className = 'close';
    // });
}
/* hide the sidenav */
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
        document.getElementById("side").style.transform = "rotateY(180deg)"; /* icon only */
    }
}
function closePopup(){
    $("#editModel").hide();

}

