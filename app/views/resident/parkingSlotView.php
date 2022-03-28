<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">



    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
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
                                <form action="parking" id="parking" class="reservationtime" method="POST">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" id="datepicker" min="<?= date("Y-m-d") ?>" max="<?= date('Y-m-d', strtotime('+30 days')); ?>" required class="input-field" value="<?php if (isset($this->selectdate)) {
                                                                                                                                                                                                                echo $this->selectdate;
                                                                                                                                                                                                            }; ?>"><br>
                                        <label>Vehicle No</label><br>
                                        <input type="vehicleno" name="vehicleno" id="vehicleno" required class="input-field" value="<?php if (isset($this->vehicleno)) {
                                                                                                                                        echo $this->selectdate;
                                                                                                                                    }; ?>"><br>




                                        <label>Start Time</label><br>
                                        <select name="starttime" class="input-field" id="stime" placeholder="Start Time" required>
                                            <!-- <option>Select Time</option> -->
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
                                        <select name="endtime" class="input-field" id="etime" placeholder="End Time" required>
                                            <!-- <option>Select Time</option> -->
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

                                        <?php

                                        // if (isset($this->selectdate) && isset($this->stime)  && isset($this->etime) && isset($this->availability)) {


                                        // 
                                        ?>

                                        <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
                                        <input class="purplebutton " id="disablebutton1" type="submit" value="View" style="grid-column:2"><br><br>




                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px;">

                    <?php
                    if (isset($this->availability)) { ?>
                        <!-- add the variable -->

                        <div class="holdAccount">
                    <div class="head">
                        <div style="margin: auto; justify-content: center; text-align: center; align-items: center;">
                            <h1>Available Slot Is</h1>
                            <h1>
                                <?php
                                echo $this->availability ?>
                            </h1>
                        </div>
                        </div>

                        </div>


                        <form action="reservepark">
                            <input class="purplebutton " id="disablebutton1" type="submit" value="reserve" style="grid-column:2"><br><br>

                        </form>
                    <?php
                    } ?>

                    <!-- <?php
                            if (isset($this->selectdate)) {
                                echo "<span id='canreserve'><button type='button' onClick='parking()' id='model-btn' class='purplebutton '>Reserve Now</button></span>";
                            }; ?> -->


                </div>

                
                        <h3>Upcoming Reservations. . .</h3>
                    </div>
                    

                </div>
            </div>

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
                <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                <div id="deleteModel" class="open">

                    <div style="text-align: center; margin-bottom: 10px;">
                        <?php unset($this->success); ?>
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


    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>
<script>
    function parking() {
        document.getElementById("parking").submit();
    }
</script>

</html>