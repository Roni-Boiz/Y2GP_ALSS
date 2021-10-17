<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">MAINTENENCE AND TECHNICAL<br> <span id="city">SERVICES</span></h1>
        </div>
        <div id="hb" class="hawlockbody">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/tech.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="#" class="reservationtime" method="GET">

                                    <label for="type">Type</label><br>
                                    <select name="type" class="input-field">
                                        <option>Select Type</option>
                                        <option>Electricity</option>
                                        <option>Painting</option>
                                        <option>AC</option>
                                        <option>Other</option>
                                    </select><br>
                                    <div id="">
                                        <label>Prefered Date</label><br>
                                        <input type="date" name="date" class="input-field"><br>
                                        <label>Description</label><br>
                                        <input type="textarea" name="description" id="description"><br>
                                        <input class="purplebutton" type="submit" name="Submit" value="Send Request" style="grid-column:2">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Activities</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>2021-10-28 - 16:00</h5>
                                    <small>AC Maintenence</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>2021-10-30 - 10:00</h5>
                                    <small>Water Supply</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>