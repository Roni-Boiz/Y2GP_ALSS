<?php
include_once 'sidenav.php';
?>

<body style="background-color: gray">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="card1" style="grid-column:1/span2;margin:auto">
                        <div class="data">
                            <div class="photo" style="background-image:url(../../public/img/park.jpg);"></div>
                            <ul class="details">
                                <?php date_default_timezone_set("Asia/Colombo"); ?>
                                <li class="author"><?php echo date("H:i"); ?> </li>
                                <li class="date"><?php echo  date("F j, Y");  ?></li>
                            </ul>
                        </div>
                        <div class="description">
                            <div class="reservationtime">
                                <div id="col1">
                                    <div>
                                        <label>Date</label><br>
                                        <input type="date" name="date" id="datepicker" class="input-field"><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
                                    </div>
                                    </select><br>
                                    <label>Reserve For</label><br>
                                    <!-- <select name="time" class="input-field" placeholder="Start Time">
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
                                    </select><br> -->

                                    <select name="duration" class="input-field" id="duration" placeholder="Duration">
                                        <option value="#">Select Duration</option>
                                        <option value="1">1 Day</option>
                                        <option value="2">2 Days</option>
                                        <option value="3">3 Days</option>
                                        <option value="4">4 Days</option>
                                        <option value="5">5 Days</option>
                                    </select> <br>


                                    <button class="purplebutton" onclick="CheckParking()" style="grid-column:2">View</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Reservations . . . </h3>
                        </div>
                        <?php
                        if ($this->latest->num_rows > 0) {
                            while ($row = $this->latest->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["date"] . " " . $row["start_time"]; ?></h5>
                                            <small><?php echo $row["vehicle_no"]; ?></small>
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
                </div>
            </div>


            <div class="card" style="padding:auto;">
                <h3 style="margin:10px">Current Allocation</h3>


                <?php
                if ($this->slots->num_rows > 0) { ?>

                    <?php
                    while ($row = $this->slots->fetch_assoc()) { ?>
                        <a class="pslots" href="#">
                            <?php
                            if ($row["status"]) { ?>
                                <button id="model-btn" class="slotbutton">
                                    <span class="fa-stack">
                                        <i class="fa fa-car fa-stack-1x" style="color:red;font-size:40px"></i>
                                        <strong class="fa-stack text-primary"><?php echo $row["slot_no"]; ?></strong>
                                    </span>
                                    <!-- <i class="fas fa-car" style="color:red;font-size:40px"></i> -->
                                </button>
                            <?php
                            } else { ?>
                                <button id="model-btn" class="slotbutton">
                                    <span class="fa-stack">
                                        <i class="fa fa-car fa-stack-1x" style="color:green;font-size:40px;"></i>
                                        <strong class="fa-stack text-primary"><?php echo $row["slot_no"]; ?></strong>
                                    </span>
                                    <!-- <i class="fas fa-car" style="color:green;font-size:40px"></i> -->
                                </button>
                            <?php

                            } ?>
                        </a>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>

                <div class="divPopupModel">

                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="model">


                        <div style="text-align: center;">
                            <h3>Slot NO 01<i class="fa fa-car"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                        </div>
                        <form action="#" class="reservationtime" method="GET">
                            <div id="col1">
                                <label>Available Time</label><br>8.00:9.00<br><br>
                                <label>Vehicle No</label><br>
                                <select name="vehicleno" class="input-field" placeholder="Start Time">
                                    <option>Select Vehicle</option>
                                    <option>AAA123</option>
                                    <option>ABC123</option>
                                </select><br>
                                <label>Start Time</label><br>
                                <select id="starttime" name="endtime" class="input-field" placeholder="Start Time">
                                    <option>Select Time</option>
                                    <?php
                                    for ($hours = 6; $hours < 24; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <option value="endtime"><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>
                                <label for="type">End Time</label><br>
                                <select name="endtime" class="input-field" placeholder="End Time">
                                    <option>Select Time</option>
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
                            <input class="purplebutton" type="submit" name="Submit" value="Reserve" style="grid-column:1">
                        </form>
                    </div>

                </div>
            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
        <script>
            function CheckParking() {
                let Date = document.getElementById('datepicker').value;
                let Duration = document.getElementById('duration').value;

                let obj = {
                    Date: Date,
                    Duration: Duration
                }

                fetch('http://localhost/Y2GP_ALSS/public/residentController/CheckPark', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: JSON.stringify(obj)
                    })
                    .then(Response => Response.json())
                    .then(data => {
                        console.log(data)
                    })
            }
        </script>
</body>

</html>