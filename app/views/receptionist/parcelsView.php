<?php 
    include_once 'sidenav.php';
?>
/* tab for change*/
.tabs{
  width:100%;
  height:auto;
  margin:0 auto;
}

/* tab list item */
.tabs .tabs-list{
  list-style:none;
  margin:10px;
  padding:10px;
}
.tabs .tabs-list li{
  width:200px;
  float:left;
  margin:2px 2px;
  
  padding:10px 5px;
  text-align: center;
  background-color:#5747b4;
  border-radius:3px;
}
.tabs .tabs-list li:hover{
  cursor:pointer;
}
.tabs .tabs-list li a{
  text-decoration: none;
  color:white;
}

/* Tab section */
.tabs .tab{
  display:none;
  width:96%;
  min-height:250px;
  height:auto;
  border-radius:3px;
  padding:20px 15px;
  color:white;
  clear:both;
}
.tabs .tab h3{
  letter-spacing:1px;
  font-weight:normal;
  padding:5px;
}
.tabs .tab p{
  line-height:20px;
  letter-spacing: 1px;
}

/*active state */
.active{
  display:block !important;
}
.tabs .tabs-list li.active{
  background-color:lavender !important;
  color:black !important;
}
.active a{
  color:black !important;
}

/* media query */
@media screen and (max-width:360px){
  .tabs{
      margin:0;
      width:96%;
  }
  .tabs .tabs-list li{
      width:80px;
  }
}
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">PARCELS</h1></div>
    <div id="hb" class="hawlockbody" > 
    <div class="tabs" style="grid-column:1/span3">
        <ul class="tabs-list">
            <li class="active"><a href="#tab1">Hall</a></li>
            <li ><a href="#tab2">Fitness Centre</a></li>
            <li ><a href="#tab3">Treatment Room</a></li>
        </ul>
        <div id="tab1" class="tab active">
            <p style="color:black">content
            </p>
        </div>
        <div id="tab2" class="tab">
                <p style="color:black">
                    Content...
                </p>
        </div>
        <div id="tab3" class="tab">
                <p style="color:black">
                Content...
                </p>
                </div>
            </div>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>