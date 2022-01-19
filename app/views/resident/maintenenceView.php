<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">MAINTENANCE AND TECHNICAL<br> <span id="city">SERVICES</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

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
                                <form action="maintenence" class="reservationtime" method="POST">

                                    <label for="type">Type</label><br>
                                    <select name="type" class="input-field" id="select">
                                        <option value="">Select Type</option>
                                        <option>Electricity</option>
                                        <option>Painting</option>
                                        <option>AC</option>
                                        <option>Other</option>
                                    </select><br>
                                    <span class="error_form" id="maintenecetype" style="font-size:10px;"></span><br>
                                    <div id="">
                                        <label>Prefered Date</label><br>
                                        <input type="date" min="<?= date("Y-m-d") ?>" name="pdate" id="datepicker" class="input-field" required><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
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
                            <h3>Upcoming Activities . . .</h3>
                        </div>

                        <?php
                        if ($this->latest->num_rows > 0) {
                            while ($row = $this->latest->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["preferred_date"]; ?></h5>
                                            <small><?php echo $row["category"]; ?></small><br>
                                            <small><?php echo $row["description"]; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="detail">
                                <div>
                                    <div class="detail-info">
                                        <h5><?php echo "No Upcomings . . ."; ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>