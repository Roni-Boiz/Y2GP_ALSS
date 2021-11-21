<?php
include_once 'sidenav.php';
?>
</head>
<style>

</style>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">FITNESS CENTRE</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/gym.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="fitness" class="reservationtime" method="POST">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" id="datepicker" class="input-field" required><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>

                                        <label>Coach</label><br>
                                        <select name="coach" class="input-field" id="selectcoach" required>
                                            <option value="">Select coach</option>
                                            <?php
                                            if (isset($this->coach->num_rows)) {
                                                while ($row1 = $this->coach->fetch_assoc()) {
                                            ?>
                                                    <option><?php echo $row1["fname"] . " " . $row1["lname"] . " " . $row1["employee_id"] ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No Coaches...<br>";
                                            } ?>

                                        </select><br>
                                        <span class="error_form" id="coach" style="font-size:10px;"></span><br>

                                        <input class="purplebutton" id="disablebutton1" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">
                                            
                                            <h3>Reservations of the day</h3><br>
                                            <?php if (isset($this->selectdate)) {
                                                echo $this->selectdate;
                                            }; ?>
                                            <br>
                                            <?php
                                            if (isset($this->day->num_rows)) { ?>
                                                <table class="avail">
                                                    <tr>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Availability</th>
                                                    </tr>
                                                    <?php while ($row = $this->day->fetch_assoc()) {
                                                    ?>
                                                        <!-- show reservation -->

                                                        <tr>
                                                            <td><?php echo $row["start_time"] ?></td>
                                                            <td><?php echo $row["end_time"] ?></td>
                                                            <td><?php echo "" ?></td>
                                                        </tr>

                                                    <?php
                                                    } ?>
                                                </table>
                                            <?php
                                            } else {
                                                echo "Select date first...<br>";
                                            } ?>

                                        </div>
                                        <br>
                                        <?php
                                        if (isset($this->selectdate)) {
                                            echo "<span id='canreserve'><button type='button' id='model-btn' class='purplebutton '>Reserve Now</button></span>";
                                        }; ?>
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
                                            <small><?php echo $row["fname"] . " " . $row["lname"] ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="detail">
                                <div>
                                    <div class="detail-info">
                                        <h5><?php echo "No Upcomings . . ." ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>

                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Coach List</h3>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Chamara Supun</h5>
                                <small>TR001</small>
                            </div>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Saman Silva</h5>
                                <small>TR002</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">
                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>
                    <form action="fitness" class="reservationtime" method="POST">
                        <div id="col1">
                            <label>Date</label><br>
                            <input type="date" name="date" id="datepicker" required class="input-field" readonly value="<?php if (isset($this->selectdate)) {
                                                                                                                            echo $this->selectdate;
                                                                                                                        }; ?>"><br>
                            <label>Coach</label><br>
                            <input type="text" name="coach" id="coach" required class="input-field" readonly value="<?php if (isset($this->selectcoach)) {
                                                                                                                        echo $this->selectcoach;
                                                                                                                    }; ?>"><br>
                            <div id="col1">

                                <label>Start Time</label><br>
                                <select name="starttime" class="input-field" id="stime" placeholder="Start Time" required>
                                    <option value="">Select Time</option>
                                    <?php
                                    for ($hours = 6; $hours < 24; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <option><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>

                                <label>End Time</label><br>
                                <select name="endtime" class="input-field" id="etime" placeholder="End Time">
                                    <option value="">Select Time</option>
                                    <?php
                                    for ($hours = 6; $hours < 24; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <option><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>
                                <span class="error_form" id="endtime" style="font-size:10px;"></span><br>

                            </div>
                            <br>
                        </div>
                        <br>
                        <input class="purplebutton" id="disablebutton2" type="submit" name="Submit" value="Reserve" style="grid-column:1">
                    </form>

                </div>
                <!-- reservation success message -->
                <?php
                if (isset($this->error)) { ?>
                    <!-- error popup -->
                    <div class='b'></div>
                    <div class='bb'></div>
                    <div class='message'>
                        <div class='check' style="background:red;">
                            &#10006;
                        </div>
                        <p>
                            Reservation Unsuccess!
                        </p>
                        <p>
                            <?php echo $this->error; ?>
                        </p>
                        <button id='ok' onclick='window.location = "fitness" ' style="background:red;">
                            OK
                        </button>
                    </div>
                <?php
                }; ?>
                <!-- success popup -->
                <?php
                if (isset($this->success)) { ?>
                    <div class='b'></div>
                    <div class='bb'></div>
                    <div class='message'>
                        <div class='check'>
                            &#10004;
                        </div>
                        <p>
                            Reservation Success!
                        </p>
                        <p>
                            Check your email for a booking confirmation. We'll see you soon!
                        </p>
                        <button id='ok' onclick='window.location = "fitness" '>
                            OK
                        </button>
                    </div>
                <?php
                }; ?>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>