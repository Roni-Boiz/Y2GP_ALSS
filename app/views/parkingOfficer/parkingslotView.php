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
                                    <form method="POST" action="parkingslot">
                                        <label>Vehicle No</label><br>
                                        <input type="text" id="vehicle_no" name="vehicle_no" class="input-field">
                                        <input class="purplebutton" id="disablebutton2" type="submit" name="Submit" value="View" disabled style="cursor:not-allowed;"><br>
                                        <span class="error_form" id="vnoerr" style="font-size:10px;"></span><br><br>
                                    </form>
                                </div>

                            </div>
                            <?php if (isset($this->parkingStatus)) {
                                if ($this->parkingStatus->num_rows > 0) { ?>
                                    <div>
                                        <?php while ($row1 = $this->parkingStatus->fetch_assoc()) { ?>
                                            <div class="employee">
                                                <div>
                                                    <span><i class="fas fa-car"></i></span>
                                                </div>
                                                <form action="markTime" class="reservationtime" method="POST">
                                                    <input type="hidden" name="reservation_id" id="reservation_id" value="<?php echo $row1["reservation_id"]; ?>" readonly>
                                                    <h3>Reservation Id:</h3> <?php echo $row1["reservation_id"] ?><br><br>
                                                    <h3>On:</h3>
                                                    <?php echo $row1["date"] ?>
                                                    <br><br>
                                                    <h3>FROM :</h3><?php echo $row1["start_time"] ?><h3> TO :</h3> <?php echo $row1["end_time"] ?><br><br>
                                                    <br>
                                                    <div>
                                                        <?php if ((($row1["checkin_time"]==NULL) && ($row1["checkout_time"]==NULL)) || (($row1["checkin_time"]) && ($row1["checkout_time"])))  { ?>
                                                                <input class="purplebutton" type="submit" name="Check-in" value="Check-in">
                                                            <?php
                                                            } else { ?>
                                                                CHECKED-IN :<br> <?php echo $row1["checkin_time"] ?>
                                                                <input class="purplebutton" type="submit" name="Check-out" value="Check-out">
                                                        <?php
                                                            }
                                                         ?>
                                                    </div>

                                                </form>
                                            </div>


                                        <?php } ?>
                                    </div>
                                    

                                <?php 
                                } else {
                                    echo "0 results";
                                }
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
                        <?php if ($this->outgoingVehicles->num_rows > 0) { ?>
                            <?php while ($row4 = $this->outgoingVehicles->fetch_assoc()) { ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <b>Slot no: </b><small><?php echo $row4['slot_no'] ;?></small><br>
                                            <b>Vehicle: </b><small><?php echo $row4['vehicle_no'] ;?></small><br>
                                            <b>End time: </b><small> <?php echo $row4['end_time'] ;?></small><br>
                                            <b>Apartment no: </b><small> <?php echo $row4['apartment_no'] ;?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        <?php } ?>



                    </div>
                    <br>
                    
                </div>



            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>