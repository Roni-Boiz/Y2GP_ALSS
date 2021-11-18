<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">TREATMENT ROOM </h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/treatment.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="#" class="reservationtime" method="GET">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" class="input-field"><br>

                                        <input class="purplebutton" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">
                                            <h3>Reservations of the day</h3><br>
                                            <?php
                                            if (isset($this->day->num_rows)) {
                                                while ($row = $this->day->fetch_assoc()) {
                                            ?>
                                                    <div class="detail">
                                                        <div>
                                                            <div class="detail-info">
                                                                <h5><?php echo $row["date"] ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    for ($hours = 6; $hours < 24; $hours++) {
                                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                                            echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT);
                                                        }
                                                        echo "<br>";
                                                    }
                                                    ?>
                                            <?php
                                                }
                                            } else {
                                                echo "No Reservations...<br>";
                                            } ?>

                                        </div><br>
                                        <button id="model-btn" class="purplebutton">Reserve Now</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Reservations. . .</h3>
                        </div>
                        <?php
                        if ($this->latest->num_rows > 0) {
                            while ($row = $this->latest->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["date"] . " " . $row["start_time"]; ?></h5>
                                            <small><?php echo "Type : " . $row["type"]; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
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
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Treatment Types</h3>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Full Body Massage</h5>
                                <small>Nirupama Rajapaksha</small>
                            </div>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Full-body facia</h5>
                                <small>Shiranthi Rajapaksha</small>
                            </div>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Water Therapy</h5>
                                <small>Chandrika</small>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="divPopupModel">
                <p id="answer"></p>

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">


                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>

                    <form action="#" class="reservationtime" method="GET">
                        <div id="col1">
                            <label>Treatment Type</label><br>
                            <select name="type" class="input-field">
                                <option value="">Select Type</option>
                                <option value="">Herbal body wrap</option>
                                <option value="">Full Body Massage</option>
                                <option value="">Full-body facia</option>
                                <option value="">Water Therapy</option>
                            </select><br>
                        </div>
                        <div id="col1">
                            <label>Start Time</label><br>
                            <select name="starttime" class="input-field">
                                <option value="">Select Time</option>
                                <?php
                                for ($hours = 6; $hours < 24; $hours++) {
                                    for ($mins = 0; $mins < 60; $mins += 30) {
                                ?>
                                        <option value="starttime"><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select><br>
                            <label>End Time</label><br>
                            <select id="endtime" name="endtime" class="input-field" placeholder="End Time">
                                <option value="">Select Time</option>
                                <?php
                                for ($hours = 6; $hours < 24; $hours++) {
                                    for ($mins = 0; $mins < 60; $mins += 30) {
                                ?>
                                        <option value="endtime"><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <input class="purplebutton" type="submit" name="Submit" value="Booking Now..." style="grid-column:1">
                    </form>
                    <!-- <div id="btn-grp" style="grid-column: 1;">
<button id="yes-btn">Yes</button>
<button id="no-btn">No</button>
</div> -->
                </div>

            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>