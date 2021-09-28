<?php 
    include_once 'sidenav.php';
?>
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