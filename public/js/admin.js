
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
