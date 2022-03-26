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
                                    <li class="date"><?php echo  date("F j, Y"); ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="fitness" class="reservationtime" method="POST">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" id="datepicker" min="<?= date("Y-m-d") ?>" max="<?= date('Y-m-d', strtotime('+14 days')); ?>" class="input-field" required value="<?php if (isset($this->selectdate)) {
                                                                                                                                                                                                                echo $this->selectdate;
                                                                                                                                                                                                            }; ?>">
                                        <span onclick="openModel('editModel','addBtn')" class="addBtn"><i class="fas fa-info-circle"></i></span><br>
                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>

                                        <label>Coach</label><br>
                                        <select name="coach" class="input-field" id="selectcoach" required>
                                            <option  value="">Select coach</option>
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

                                            <h3>Description</h3><br>
                                            <?php if (isset($this->selectdate)) {
                                                echo $this->selectdate . "<br> Please check availability and select time slot<br>"; ?>
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

                <div class="rightPanel" style="margin-top:30px;max-height:500px;overflow:scroll">


                    <?php if (isset($this->selectdate)) { ?><h3>Reservations of the day</h3>
                    <?php echo $this->selectdate . "\n";

                        $emp = explode(" ", $this->selectcoach);
                        echo $emp[0] . " " . $emp[1];
                        // echo ":>".$this->shiftno;
                        if (isset($this->shiftno) && $this->shiftno == 1) {
                            $s = 6;
                            $e = 12;
                            $count = 1;
                            echo "<br>available on 6.00 am to 12.00 pm";
                        } elseif (isset($this->shiftno) && $this->shiftno == 2) {
                            $s = 12;
                            $e = 18;
                            $count = 13;
                            echo "<br>available on 12.00 pm to 18.00 pm";
                        } elseif (isset($this->shiftno) && $this->shiftno == 3) {
                            $s = 18;
                            $e = 24;
                            $count = 25;
                            echo "<br>available on 18.00 pm to 24.00 pm";
                        }
                    };
                    ?>
                    <?php
                    if (isset($this->day->num_rows)) { ?>
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

                                    for ($hours = $s; $hours < $e; $hours++) {
                                        for ($mins = 0; $mins < 60; $mins += 30) {
                                    ?>
                                            <tr>
                                                <td><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php if ($mins + 30 == 60) {
                                                        echo str_pad($hours + 1, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins - 30, 2, '0', STR_PAD_LEFT);
                                                    } else {
                                                        echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins + 30, 2, '0', STR_PAD_LEFT);
                                                    } ?>
                                                </td>
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

                            </table>
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

                                for ($hours = $s; $hours < $e; $hours++) {
                                    for ($mins = 0; $mins < 60; $mins += 30) {
                            ?>
                                    <tr>
                                        <td><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></td>
                                        <td><?php if ($mins + 30 == 60) {
                                                echo str_pad($hours + 1, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins - 30, 2, '0', STR_PAD_LEFT);
                                            } else {
                                                echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins + 30, 2, '0', STR_PAD_LEFT);
                                            } ?>
                                        </td>
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
                <!-- <div class="activeUsers">
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
                </div> -->

                <div class="activeUsers">
                            <div class="head">
                                <h3>Coaches </h3>
                            </div>
                            <?php
                            if ($this->coach->num_rows > 0) {
                                while ($row = $this->coach->fetch_assoc()) {
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
                                            <h5><?php echo "No available coaches . . ."; ?></h5>
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
                                    for ($hours = $s; $hours < $e; $hours++) {
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
                                    for ($hours = $s; $hours < $e; $hours++) {
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
                        </div>
                        <br>
                        <input class="purplebutton" id="disablebutton2" type="submit" name="Submit" value="Reserve" style="grid-column:1">
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