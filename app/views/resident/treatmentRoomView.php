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
                                <form action="treatment" class="reservationtime" method="POST">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" min="<?= date("Y-m-d") ?>" max="<?= date('Y-m-d', strtotime('+14 days')); ?>" id="datepicker" class="input-field" required value="<?php if (isset($this->selectdate)) {
                                                                                                                                                                                                                echo $this->selectdate;
                                                                                                                                                                                                            }; ?>">
                                        <span onclick="openModel('editModel','addBtn')" class="addBtn"><i class="fas fa-info-circle"></i></span><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
                                        <input class="purplebutton" id="disablebutton1" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">
                                            <h3>Description</h3><br>

                                            <?php if (isset($this->selectdate)) {
                                                echo $this->selectdate . "<br> 
                                                Please check availability and  <br>select time slot.<br>";
                                            ?>

                                                <span class="fa-stack">
                                                    <span style="color:red" class="fa fa-circle fa-stack-2x"></span>
                                                    <strong class="fa-stack-1x">
                                                        <?php echo "--" ?>
                                                    </strong>
                                                </span>Not avail

                                                <span class="fa-stack">
                                                    <span style="color:yellow" class="fa fa-circle fa-stack-2x"></span>
                                                    <strong class="fa-stack-1x">
                                                        <?php echo "--" ?>
                                                    </strong>
                                                </span>Avail some

                                                <span class="fa-stack">
                                                    <span style="color:lime" class="fa fa-circle fa-stack-2x"></span>
                                                    <strong class="fa-stack-1x">
                                                        <?php echo "--" ?>
                                                    </strong>
                                                </span>Avail all
                                            <?php
                                            }; ?>
                                            <br>


                                        </div><br>
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

                <div class="rightPanel" style="margin-top:30px;max-height:500px;overflow:scroll">
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
                                    <th>Availability</th>
                                </tr>

                                <?php while ($row = $this->day->fetch_assoc()) {
                                ?>
                                    <!-- show reservation -->

                                    <?php
                                    $count = 1;
                                    for ($hours = 6; $hours < 24; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <tr>
                                                <td><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php if ($mins + 30 == 60) {
                                                        echo str_pad($hours + 1, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins - 30, 2, '0', STR_PAD_LEFT);
                                                    } else {
                                                        echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins + 30, 2, '0', STR_PAD_LEFT);
                                                    } ?></td>
                                                <td>
                                                    <span class="fa-stack">
                                                        <!-- color with available -->
                                                        <span <?php if ($row[$count] == 5) { ?> style="color:red" <?php } elseif ($row[$count] > 0 && $row[$count] < 5) { ?> style="color:yellow" <?php } else { ?> style="color:lime" <?php } ?> class="fa fa-circle fa-stack-2x"></span>
                                                        <strong class="fa-stack-1x">
                                                            <?php echo $row[$count]; ?>
                                                        </strong>
                                                    </span>
                                                </td>

                                            </tr>
                                    <?php
                                            $count++;
                                        }
                                    }
                                    ?>


                                <?php
                                }
                            } else {
                                echo "There are no reservations yet.";
                                ?>
                                <table class="avail">
                                    <tr>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Availability</th>
                                    </tr>
                                    <?php
                                    for ($hours = 6; $hours < 24; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <tr>
                                                <td><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php if ($mins + 30 == 60) {
                                                        echo str_pad($hours + 1, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins - 30, 2, '0', STR_PAD_LEFT);
                                                    } else {
                                                        echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins + 30, 2, '0', STR_PAD_LEFT);
                                                    } ?></td>
                                                <td>
                                                    <span class="fa-stack">
                                                        <!-- color with available -->
                                                        <span style="color:lime" class="fa fa-circle fa-stack-2x"></span>
                                                        <strong class="fa-stack-1x">
                                                            <?php echo 0 ?>
                                                        </strong>
                                                    </span>
                                                </td>

                                            </tr>
                                    <?php

                                        }
                                    }
                                    ?>

                                </table>


                        <?php
                            }
                        }
                        ?>
                        <hr>
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
                                <h3>Treaters </h3>
                            </div>
                            <?php
                            if ($this->treater->num_rows > 0) {
                                while ($row = $this->treater->fetch_assoc()) {
                            ?>
                                    <div class="detail">
                                        <div>
                                            <img src="../../public/img/user.png" alt="user" />
                                            <div class="detail-info">
                                                <h5><?php echo "Water Theropy"  ?></h5>
                                                <h5><?php echo $row["fname"] . " " . $row["lname"]  ?></h5>
                                                <small><?php echo "Contact : " . $row["contact_no"]; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else { ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo "No available treaters . . ."; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
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

                    <form action="treatment" class="reservationtime" method="POST">
                        <div id="col1">
                            <label>Treatment Type</label><br>
                            <select name="trtype" class="input-field" required>
                                <option value="">Select Type</option>
                                <option>Herbal body wrap</option>
                                <option>Full Body Massage</option>
                                <option>Full-body facia</option>
                                <option>Water Therapy</option>
                            </select><br>
                            <span class="error_form" id="ttype" style="font-size:10px;"></span><br>
                        </div>
                        <div id="col">
                            <label>Date</label><br>
                            <input type="date" name="date" id="datepicker" class="input-field" readonly value="<?php if (isset($this->selectdate)) {
                                                                                                                    echo $this->selectdate;
                                                                                                                }; ?>">
                        </div>
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
                <!-- reservation success message -->
                <?php
                if (isset($this->error)) { ?>

                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                        <div id="deleteModel" class="open">

                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Reservation Failed!</h2>
                            </div>
                            <form class="formDelete">
                                <div>
                                    <label> <span id="answer2"></span><?php echo $this->error; ?></label>
                                    <span id="answer1"></span>
                                </div>
                                <div>
                                    <input class="btnRed" type="submit" name="submit" value="  OK  ">
                                </div>

                            </form>
                        </div>
                    </div>
                <?php
                }; ?>
                <!-- success popup -->
                <?php
                if (isset($this->success)) { ?>

                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                        <div id="deleteModel" class="open">

                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Successfull!</h2>
                            </div>
                            <form class="formDelete">
                                <div>
                                    <label> <span id="answer2"></span>Reservation charges added.
                                        Check notification for more details. </label>
                                    <span id="answer1"></span>
                                </div>
                                <div>
                                    <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                                </div>

                            </form>
                        </div>
                    </div>
                <?php
                }; ?>
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
                            <label> Only 5 reservations for each time slot! </label>
                            <label> Can reserve only before 14 days. </label>

                            <span><?= "" ?></span>
                        </div>
                        <div>
                            <!-- <input class="btnRed" type="submit" name="submit" value="Delete"> -->
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>