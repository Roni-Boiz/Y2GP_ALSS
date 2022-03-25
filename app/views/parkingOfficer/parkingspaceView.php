<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SPACE <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="card" style="padding:auto;">
                        <h3 style="margin:10px">Current Allocation</h3>
                        <?php
                        

                        
                        if ($this->parkingSpace->num_rows > 0) { ?>

                            <?php
                            while ($row = $this->parkingSpace->fetch_assoc()) { ?>
                                <a class="pslots" href="#">
                                    <?php
                                    if ($row["status"] == 2) { ?>
                                        <?php

                                        while ($row1 = $this->overdueVehicles->fetch_assoc()) {
                                            $s = $row1['slot_no'];
                                            echo 'A';
                                            if ($row['slot_no'] == $row1['slot_no']) {
                                                break;
                                            }
                                        } ?>

                                        <button id="model-btn" class="slotbutton">
                                            <span class="fa-stack">
                                                <i class="fa fa-car fa-stack-1x" style="color:red;font-size:40px" title="Vehicle no: <?php echo $row1['vehicle_no'] ?>"></i>
                                                <strong class="fa-stack text-primary"><?php echo $row["slot_no"]; ?></strong>
                                            </span>
                                            <!-- <i class="fas fa-car" style="color:red;font-size:40px"></i> -->
                                        </button>
                                    <?php
                                    } else if ($row["status"] == 0) { ?>
                                        <button id="model-btn" class="slotbutton">
                                            <span class="fa-stack">
                                                <i class="fa fa-car fa-stack-1x" style="color:green;font-size:40px;"></i>
                                                <strong class="fa-stack text-primary"><?php echo $row["slot_no"]; ?></strong>
                                            </span>
                                            <!-- <i class="fas fa-car" style="color:green;font-size:40px"></i> -->
                                        </button>
                                    <?php

                                    } else { ?>
                                        <button id="model-btn" class="slotbutton">
                                            <span class="fa-stack">
                                                <i class="fa fa-car fa-stack-1x" style="color:blue;font-size:40px;"></i>
                                                <strong class="fa-stack text-primary"><?php echo $row["slot_no"]; ?></strong>
                                            </span>
                                            <!-- <i class="fas fa-car" style="color:green;font-size:40px"></i> -->
                                        </button>

                                    <?php } ?>
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

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="rightPanel" style="margin-top:30px">
                <div class="holdAccount">
                    <div class="head">
                        <h3>Overdue Vehicles . . .</h3>
                    </div>
                    <?php if ($this->overdueVehicles->num_rows > 0) { ?>
                        <?php while ($row4 = $this->overdueVehicles->fetch_assoc()) { ?>55
                            <div class="detail">
                                <div>
                                    <div class="detail-info">
                                        <b>Slot no: </b><small><?php echo $row4['slot_no']; ?></small><br>
                                        <b>Vehicle: </b><small><?php echo $row4['vehicle_no']; ?></small><br>
                                        <b>End time: </b><small> <?php echo $row4['end_time']; ?></small><br>
                                        <b>Apartment no: </b><small> <?php echo $row4['apartment_no']; ?></small>
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