<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="staffDetails">
                        <h4>Slot Allocations</h4>

                        <div class="card" id="employeeSummary">
                            <div>
                                <div>
                                    <form method="POST" action="searchVehicle">
                                        <label>Vehicle No</label><br>
                                        <input type="text" id="vehicle_no" name="vehicle_no" class="input-field">
                                        <input class="purplebutton" type="submit" name="Submit" value="View"><br><br>
                                    </form>
                                </div>

                            </div>
                            <?php if ($this->parkingStatus->num_rows > 0) { ?>
                                <div>
                                    <?php if ($row1 = $this->parkingStatus->fetch_assoc()) { ?>
                                        <div class="employee">
                                            <div>
                                                <span><i class="fas fa-car"></i></span>
                                            </div>
                                            <form action="#" class="reservationtime" method="GET">
                                                <?php echo $row1["date"] ?>
                                                <br><br>FROM :<br><?php echo $row1["start_time"] ?><br> TO :<br> <?php echo $row1["end_time"] ?><br><br>
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </form>
                                        </div>


                                    <?php } ?>
                                    <?php if ($row2 = $this->parkingStatus->fetch_assoc()) { ?>
                                        <div class="employee">
                                            <div>
                                                <span><i class="fas fa-car"></i></span>
                                            </div>
                                            <form action="#" class="reservationtime" method="GET">
                                                <?php echo $row2["date"] ?>
                                                <br><br>FROM :<br><?php echo $row2["start_time"] ?><br> TO :<br> <?php echo $row2["end_time"] ?><br><br>
                                                <br>
                                                <div>
                                                    <?php if (!(isset($row2["checkout_time"]))) {
                                                        if (!(isset($row2["checkin_time"]))) { ?>
                                                            <input class="purplebutton" type="submit" name="submit" value="Check-in">
                                                        <?php
                                                        } else { ?>
                                                            CHECKED-IN :<br> <?php echo $row2["checkin_time"] ?>
                                                            <input class="purplebutton" type="submit" name="submit" value="Check-out">
                                                    <?php
                                                        }
                                                    } ?>
                                                </div>

                                            </form>
                                        </div>


                                    <?php } ?>
                                </div>

                            <?php
                            } else {
                                echo "0 results";
                            }
                            ?>
                            <div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Outgoing Vehicles . . .</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>SSD-5868</h5>
                                    <small>R. Siripala</small><small> 01:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>DDD-7897</h5>
                                    <small>S. Ranathunga</small><small> 12:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>ZZZ-1478</h5>
                                    <small>S. Gunasekara</small><small> 12:30</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>OverDue Vehicles . . .</h3>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>AAA-1257</h5>
                                <small>R.K. Rathnayake</small><small> 12:30</small>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>ABC-1238</h5>
                                <small>C.B Silva</small><small> 12:30</small>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>