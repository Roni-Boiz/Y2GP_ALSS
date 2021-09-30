<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">REQUESTS</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Maintenece</a></li>
                    <li><a href="#tab2">Laundry</a></li>
                    <li><a href="#tab3">Visitors</a></li>
                </ul>
                <div id="tab1" class="tab active">
                    <p style="color:black">
                        Maintenece
                    </p>
                </div>
                <div id="tab2" class="tab">
                    <p style="color:black">
                        Laundry
                    </p>
                </div>
                <div id="tab3" class="tab">
                    <p style="color:black">
                        Visitors
                    </p>
                </div>
            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>
<script>
    $(document).ready(function() {
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
    });
</script>
</html>