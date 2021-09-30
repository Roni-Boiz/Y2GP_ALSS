
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

// popup model JS
const model = document.getElementById("model");
const modelBtn = document.getElementById("model-btn");
const ans = document.getElementById("answer");
const closeBtn = document.getElementById("closebtn");

modelBtn.addEventListener("click", ()=>{
    // document.getElementById("myCanvasNav").style.width = "100%";
    // document.getElementById("myCanvasNav").style.opacity = "0.8";
    model.className = "open";
})

closeBtn.addEventListener("click", ()=>{
    model.className = 'close';
    // document.getElementById("myCanvasNav").style.width = "0%";
    // document.getElementById("myCanvasNav").style.opacity = "0";
})

model.addEventListener("click", (e)=>{
    if(e.target.id === "yes-btn"){
        ans.innerText = "Hello Guys";

    }else if(e.target.id === "no-btn"){
        ans.innerText = "Oh no! ";
    }else{
        return;
    }
    model.className = 'close';
})

// function loadData() {
//     var cookies = document.cookie;
//     console.log(cookies);
//     // document.getElementById("emptype").setAttribute('value','Manager');
//     document.getElementById("fname").setAttribute('value',1);

//     // document.getElementById("lname").setAttribute('value',);
//     // document.getElementById("email").setAttribute('value',);
//     // document.getElementById("cno").setAttribute('value',);
// }