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
                                        <input type="radio" name="type" value="function">
                                        <label>Function</label>
                                        <input type="radio" name="type" value="conference">
                                        <label>Conference</label><br>
                                        <label>Date</label><br>
                                        <input type="date" name="date" class="input-field"><br>
                                        <input class="purplebutton" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">
                                            <h3>Reservations of the day</h3><br>
                                            <?php
                                            if (isset($this->day->num_rows)) {
                                                while ($row = $this->day->fetch_assoc()) {
                                            ?>
                                                    <!-- show reservation -->
                                                    <div class="detail">
                                                        <div>
                                                            <div class="detail-info">
                                                                <h5><?php echo $row["date"]?></h5>
                                                                <small><?php echo $row["start_time"]."-".$row["end_time"]."  Reserved" ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                            <?php
                                                }
                                            } else {
                                                echo "No Reservations...<br>";
                                            } ?>

                                        </div>
                                        <br>

                                    </div>
                                </form><button id="model-btn" class="purplebutton">Reserve Now</button>
                                <!-- reservation success message -->
                                <?php 
                                if(isset($this->available)){ 
                                    echo "<br>".$this->available;
                                };?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
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
        </div>

        <div class="divPopupModel">

            <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
            <div id="model">

                <div style="text-align: center;">
                    <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                </div>

                <form action="hall" class="reservationtime" method="POST">
                    <div id="col1">
                        <input type="radio" name="type" value="function">
                        <label>Function </label>
                        <input type="radio" name="type" value="conference">
                        <label>Conference</label><br><br>
                    </div>

                    <div id="col1">
                        <label>No of Members</label><br>
                        <input type="text" name="members" class="input-field" placeholder="MAX 50">
                    </div>

                    <div id="col">
                        <label>Date</label><br>
                        <input type="date" name="date" class="input-field" placeholder="Date">
                    </div>
                           
                    <div id="col1">
                         
                        <label>Start Time</label><br>
                        <select name="starttime" class="input-field" placeholder="Start Time">
                            <option >Select Time</option>
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
                        <select name="endtime" class="input-field" placeholder="End Time">
                            <option >Select Time</option>
                            <?php
                            for ($hours = 6; $hours < 24; $hours++) {
                                for ($mins = 0; $mins < 60; $mins += 30) {
                            ?>
                                    <option ><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <input class="purplebutton" type="submit" name="Submit" value="Booking Now..." style="grid-column:1">
                </form>
            </div>

        </div>


    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>