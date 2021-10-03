

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
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
///////////////////////////////////////////////////////

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
    document.getElementById("myCanvasNav").style.width = "100%";
    document.getElementById("myCanvasNav").style.opacity = "0.8";
    model.className = "open";
})

closeBtn.addEventListener("click", ()=>{
    model.className = 'close';
    document.getElementById("myCanvasNav").style.width = "0%";
    document.getElementById("myCanvasNav").style.opacity = "0";
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
});

const imgDiv = document.querySelector('.profile-pic');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

// imgDiv.addEventListener('mouseleave', function(){
//     uploadBtn.style.display = "none";
// });

file.addEventListener('change', function(){
    const choosefile = this.files[0];
    if(choosefile){
        const reader = new FileReader();
        reader.addEventListener('load', function(){
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