<?php
include_once 'sidenav.php';
?>

<body style="background-color: gray">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody" >
            <div class="card1" style="grid-column:1/span2;min-height:300px;max-width:100%">
                <div class="data">
                    <div class="photo" style="background-image:url(../../public/img/park.jpg);"></div>
                    <ul class="details">
                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                        <li class="author"><?php echo date("H:i"); ?> </li>
                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                    </ul>
                </div>
                <div class="description" >
                    <form action="#" class="reservationtime" method="GET">
                        <div id="col1">
                            <div>
                                <label>Date</label><br>
                                <input type="date" name="date" class="input-field">
                            </div>
                            </select><br>
                            <label>Start Time</label><br>
                            <select name="time" class="input-field" placeholder="Start Time">
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
                            </select><br>
                            <input class="purplebutton" type="submit" name="Submit" value="View" style="grid-column:2">
                        </div>
                    </form>
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
                                <button id="model-btn" class="slotbutton"><i class="fas fa-car" style="color:red;font-size:40px"></i></button>
                            <?php echo $row["slot_no"];
                            } else { ?>
                                <button id="model-btn" class="slotbutton"><i class="fas fa-car" style="color:green;font-size:40px"></i></button>
                            <?php
                                echo $row["slot_no"];
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