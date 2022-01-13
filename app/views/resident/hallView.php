<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">



    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">HALL <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/hall.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="hall" class="reservationtime" method="POST">
                                    <div id="">
                                        <input type="radio" name="type" value="function" <?php if (isset($this->type) && $this->type == 'function') { ?> checked="checked" ; <?php }; ?> required>
                                        <label>Function</label>
                                        <input type="radio" required name="type" value="conference" <?php if (isset($this->type) && $this->type == 'conference') { ?> checked="checked" ; <?php }; ?>>
                                        <label>Conference</label><span onclick="openModel('editModel','addBtn')" class="addBtn"><i class="fas fa-info-circle"></i></span><br>

                                        <label>Date</label><br>
                                        <input type="date" name="date" id="datepicker" min="<?= date("Y-m-d") ?>" required class="input-field" value="<?php if (isset($this->selectdate)) {
                                                                                                                                echo $this->selectdate;
                                                                                                                            }; ?>"><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
                                        <input class="purplebutton " id="disablebutton1" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">

                                            <h3>Reservations of the day</h3><br>
                                            <?php if (isset($this->selectdate)) {
                                                echo $this->selectdate . "<br> 
                                                Please check availability and select time slot.";
                                            }; ?>
                                            <br>


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
                    <?php
                    if (isset($this->day->num_rows)) { ?>
                        <h3>Reservations of the day</h3>
                        <?php if (isset($this->selectdate)) {
                            echo $this->selectdate;
                        }; ?>
                        <br>
                        <?php if ($this->day->num_rows > 0) { ?>
                        <table class="avail">
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Other Details</th>
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
                            } 
                        } else {
                            echo "There is no reservations yet.";
                        } ?>
                        </table>
                    <?php } ?>
                    <hr>
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Functions . . .</h3>
                        </div>
                        <?php
                        if ($this->latestfun->num_rows > 0) {
                            while ($row = $this->latestfun->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["date"] . " " . $row["start_time"]; ?></h5>
                                            <small><?php echo "Members : " . $row["no_of_members"]; ?></small>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No Upcomings...";
                        } ?>


                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Upcoming Meetings. . .</h3>
                        </div>
                        <?php
                        if ($this->latestcon->num_rows > 0) {
                            while ($row = $this->latestcon->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["date"] . " " . $row["start_time"]; ?></h5>
                                            <small><?php echo "Members : " . $row["no_of_members"]; ?></small>
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


            <div class="divPopupModel">

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">

                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>

                    <form action="hall" class="reservationtime" method="POST">
                        <div id="col1">
                            <input type="radio" name="type" value="function" <?php if (isset($this->type) && $this->type == 'function') { ?> checked="checked" ; <?php }; ?>>
                            <label>Function </label>
                            <input type="radio" name="type" value="conference" <?php if (isset($this->type) && $this->type == 'conference') { ?> checked="checked" ; <?php }; ?>>
                            <label>Conference</label><br><br>
                        </div>

                        <div id="col1">
                            <label>No of Members</label><br>
                            <input type="text" name="members" id="mem50" class="input-field" placeholder="MAX 50" pattern="[0-9]{1,2}" required><br>
                            <span class="error_form" id="member" style="font-size:10px;"></span><br>
                        </div>

                        <div id="col">
                            <label>Date</label><br>
                            <input type="date" name="date" min="<?= date("Y-m-d") ?>" class="input-field" readonly value="<?php if (isset($this->selectdate)) {
                                                                                                    echo $this->selectdate;
                                                                                                }; ?>">
                        </div>

                        <div id="col1">

                            <label>Start Time</label><br>
                            <select name="starttime" class="input-field" id="stime" placeholder="Start Time" required>
                                <option>Select Time</option>
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
                                <option>Select Time</option>
                                <?php
                                for ($hours = 6; $hours < 24; $hours++) {
                                    for ($mins = 0; $mins < 60; $mins += 30) {
                                ?>
                                        <option>
                                            <?php if ($mins + 30 == 60) {
                                                echo str_pad($hours + 1, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins - 30, 2, '0', STR_PAD_LEFT);
                                            } else {
                                                echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins + 30, 2, '0', STR_PAD_LEFT);
                                            } ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select><br>
                            <span class="error_form" id="endtime" style="font-size:10px;"></span><br>

                        </div>
                        <br>
                        <input class="purplebutton" id="disablebutton2" type="submit" name="Submit" value="Booking Now..." style="grid-column:1">

                    </form>
                </div>

            </div>

            <!-- firstmodel -->
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h3>Consider below</h3>
                    </div>
                    <form action="#" class="formDelete" method="GET">
                        <div>
                            <label> Members should be less than 50 </label>
                            <span><?= "" ?></span>
                        </div>
                        <div>
                            <!-- <input class="btnRed" type="submit" name="submit" value="Delete"> -->
                        </div>

                    </form>

                </div>
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
                    <button id='ok' onclick='window.location = "hall" ' style="background:red;">
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
                    <button id='ok' onclick='window.location = "hall" '>
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