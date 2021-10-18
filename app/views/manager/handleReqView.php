<?php 
    include_once 'sidenav.php';
?>
<style>
.announcement{
    grid-column: 1/span 3;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 100%;
    margin: auto;
    margin-top: 10px;
    text-align: center;
    font-family: arial;
}
.announcement .title{
    color: grey;
    font-size: 15px;
}
</style>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div id="hb" class="hawlockbody animate-bottom" > 
    <h2>Handle Requests</h2>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>