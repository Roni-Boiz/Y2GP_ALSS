<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">VISITOR <span id="city">APPROVAL</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card1" style="grid-column:1/span2;margin:auto">
                <div class="data">
                    <div class="photo" style="background-image:url(../../public/img/visitor.jpg);"></div>
                    <ul class="details" >
                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                        <li class="author"><?php echo date("H:i"); ?> </li>
                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                    </ul>
                </div>
                <div class="description">
                    <form action="#" class="reservationtime" method="GET">
                    <div id="">
                        <label>Name</label><br>
                        <input type="text" name="name" class="input-field"><br>
                        <label>Visiting Date</label><br>
                        <input type="date"  name="vdate" class="input-field"><br>
                        <label>Description</label><br>
                        <input type="textarea" name="description" id="description"><br>
                        <input class="purplebutton" type="submit" name="Submit" value="Send" style="grid-column:2">
                    </div>

                </form>
                </div>
            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>