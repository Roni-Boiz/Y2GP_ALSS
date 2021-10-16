<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">COMPLAINT<span id="city"> </span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <!-- payment form -->
            <div class="card1" style="grid-column:1/span2;margin:auto">
                <div class="data">
                    <div class="photo" style="background-image:url(../../public/img/.jpg);"></div>
                    <ul class="details">
                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                        <li class="author"><?php echo date("H:i"); ?> </li>
                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                    </ul>
                </div>
                <div class="description">
                    <form action="#" class="reservationtime" method="GET">
                        <div>
                            <label>Complaint</label><br>
                            <input type="textarea" name="description" id="description" style="margin:20px 10px 20px 0"><br>
                            <input class="purplebutton" type="submit" value="Send" id="model-btn" style="grid-column:2">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>
your complaint will be considered soon.. thank you for your feedback