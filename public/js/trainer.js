$(function () {

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
  

});

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

}

