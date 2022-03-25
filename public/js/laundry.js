$(function () {

    $("#old_password_error_message").hide();
    $("#new_password_error_message").hide();
    $("#renew_password_error_message").hide();
    $("#acceptBtn").prop('disabled', true);
    $("#acceptBtn").css('cursor', 'not-allowed');

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
    $("#opw").keyup(function () {
        check_oldpassword();
    });
    $("#category1,#category2,#category3").on("change", function () {
        disableDecline();
    });


    $(".tabs-list li a").click(function (e) {
        e.preventDefault();
    });

    $(".tabs-list li").click(function () {
        var tabid = $(this).find("a").attr("href");
        $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
        $(".tab").hide(); // hiding open tab
        $(tabid).show(); // show tab
        if (tabid == "#tab2") {
            $("#tab1").hide();
            $("#tab3").hide();
        }
        if (tabid == "#tab3") {
            $("#tab1").hide();
            $("#tab2").hide();
        }
        if (tabid == "#tab1") {
            $("#tab2").hide();
            $("#tab3").hide();
        }
        $(this).addClass("active"); //  adding active class to clicked tab
    });
    /* show sidebar */
    $('.btn').click(function () {
        $(this).toggleClass("click");
        $('.sidebar').toggleClass("show");
    });



    // popup
    //    const model = document.getElementById("nips");
    //    const modelBtn = document.getElementById("model-btn1");
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

    $("#qty1,#qty2,#qty3,#amt1,#amt2,#amt3").keyup(function () {
        
        addPopup();
    });
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
function closePopup() {
    $("#editModel").hide();
    $("#close").hide();
    console.log("close");
    $("#tab2").css('display', 'none');
    $("#tab1").css('display', 'block');
    $("#tab2").addClass("tab").removeClass("tab active");
    $("#1").addClass("active");
    $("#2").removeClass("active");

    // $(location).attr('href','http://localhost/Y2GP_ALSS/public/laundryController/requests');
}
function closePopup2() {
    console.log(2323);
    // $(location).attr('href','http://localhost/Y2GP_ALSS/public/laundryController/requests');
    $("#deleteModel").hide();
    $("#tab1").css('display', 'none');
    $("#tab2").css('display', 'block');
    $("#tab1").addClass("tab").removeClass("tab active");
    $("#2").addClass("active");
    $("#1").removeClass("active");


}


function disableDecline() {

    $("#acceptBtn").prop('disabled', false);
    $("#acceptBtn").css('cursor', 'pointer');
    if ($("#category1").is(":checked") || $("#category2").is(":checked") || $("#category3").is(":checked")) {
        $("#declineBtn").prop('disabled', true);
        $("#declineBtn").css('cursor', 'not-allowed');
        // console.log("ddd");
    }
    console.log($("#category1").is(":checked"));
    console.log($("#category2").is(":checked"));
    console.log($("#category3").is(":checked"));
    if (!($("#category1").is(":checked")) && !($("#category2").is(":checked")) && !($("#category3").is(":checked"))) {
        $("#acceptBtn").prop('disabled', true);
        $("#acceptBtn").css('cursor', 'not-allowed');
        $("#declineBtn").prop('disabled', false);
        $("#declineBtn").css('cursor', 'pointer');

    }
}
function addPopup() {
    //const w1 = document.getElementById("qty1");
    var w1 = $("#qty1").val();
    var a1 = $("#amt1").val();
    var w2 = $("#qty2").val();
    var a2 = $("#amt2").val();
    var w3 = $("#qty3").val();
    var a3 = $("#amt3").val();

    // console.log(w1,w2,w3);
    // console.log(typeof w1 === 'undefined' );
    // console.log(typeof w2 === 'undefined' );
    // console.log(typeof w3 === 'undefined' );


    if (typeof w1 === 'undefined') {
        if (checkDecimal(w2) && checkDecimal(w3) && checkDecimal(a2) && checkDecimal(a3)) {
            $("#error_msg").hide();
            $("#add").css('cursor', 'pointer');
            $("#add").prop('disabled', false);
            console.log(00);
        } else {
            $("#error_msg").html("Please fill all fields with valid values");
            $("#add").css('cursor', 'not-allowed');
            $("#add").prop('disabled', true);
            $("#error_msg").show();
            console.log(11);
        }
    } else if (typeof w2 === 'undefined') {
        if (checkDecimal(w1) && checkDecimal(w3) && checkDecimal(a1) && checkDecimal(a3)) {
            $("#error_msg").hide();
            $("#add").css('cursor', 'pointer');
            $("#add").prop('disabled', false);
        } else {
            $("#error_msg").html("Please fill all fields with valid values");
            $("#add").css('cursor', 'not-allowed');
            $("#add").prop('disabled', true);
            $("#error_msg").show();
        }
    } else if (typeof w3 === 'undefined') {
        if (checkDecimal(w2) && checkDecimal(w1) && checkDecimal(a2) && checkDecimal(a1)) {
            $("#error_msg").hide();
            $("#add").css('cursor', 'pointer');
            $("#add").prop('disabled', false);
        } else {
            $("#error_msg").html("Please fill all fields with valid values");
            $("#add").css('cursor', 'not-allowed');
            $("#add").prop('disabled', true);
            $("#error_msg").show();
        }
    }


    else {
        if (checkDecimal(w1) && checkDecimal(w2) && checkDecimal(w3) && checkDecimal(a1) && checkDecimal(a2) && checkDecimal(a3)) {

        $("#error_msg").hide();
        $("#add").css('cursor', 'pointer');
        $("#add").prop('disabled', false);

     } else {
        $("#error_msg").html("Please fill all fields with valid values");
        $("#add").css('cursor', 'not-allowed');
        $("#add").prop('disabled', true);
        $("#error_msg").show();
     }
    }

}
function checkDecimal(inputtxt) {
    var decimal = new RegExp(/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/);
    if (decimal.test(inputtxt)) {
        console.log("True");
        return true;
    }
    else {
        console.log("False");
        return false;
    }
}

//confirm pop up
function openModel(amodel, amodelBtn, id) {
    const model = document.getElementById(amodel);
    const modelBtn = document.getElementsByClassName(amodelBtn);
    const ans1 = document.getElementById("answer1");
    const closeBtn = document.getElementsByClassName("closebtn");
    console.log(id);
    console.log(amodel);
    console.log(amodelBtn);

    console.log($("#category1").is(":checked"));
    console.log($("#category2").is(":checked"));
    console.log($("#category3").is(":checked"));


    for (var i = 0; i < modelBtn.length; i++) {
        modelBtn[i].addEventListener('click', showModel, false);
    }

    function showModel() {
        document.getElementById("myCanvasNav").style.width = "100%";
        document.getElementById("myCanvasNav").style.opacity = "0.8";
        console.log(100);
        $("#close").hide();
        model.className = "open";

    }

    for (var i = 0; i < closeBtn.length; i++) {
        closeBtn[i].addEventListener('click', closeModel, false);
    }

    function closeModel() {
        document.getElementById("myCanvasNav").style.width = "0%";
        document.getElementById("myCanvasNav").style.opacity = "0";
        model.className = "close";
        $("#close").show();
        console.log("closeModel eka athule");
    }
    if (ans1 !== null) {
        ans1.innerHTML = id;
    }

}

