<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Manage Reservations</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <!-- <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Hall</a></li>
                    <li><a href="#tab2">Fitness Centre</a></li>
                    <li><a href="#tab3">Treatment Room</a></li>
                </ul>

                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                    <h2>Todays Reservations</h2>
                    </div>
                </div>

                <div id="tab2" class="tab">
                    2
                </div>

                <div id="tab3" class="tab">
                    3
                </div>

            </div> -->
            <div id="manageReservations">
                <div class="todayreservations">
                    <h2>Todays Reservations</h2>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Date</li>
                                    <li>Duration</li>
                                    <li>Fee (Rs.)</li>
                                    <li>Reserved Date</li>
                                    <li>Action</li>
                                </ul>
                            </main>
                            <!-- Today Hall -->
                            <?php
                            if ($this->todayHallRes->num_rows || $this->todayFitnessRes->num_rows || $this->todayTreatmentRes->num_rows) {
                                if ($this->todayHallRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->todayHallRes->fetch_assoc()) {
                                        $reservationId = "H" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                <?php
                                                $stime =  $row["start_time"];
                                                $etime =  $row["end_time"];
                                                $stime = date('h:i A', strtotime($stime));
                                                $etime = date('h:i A', strtotime($etime));
                                                ?>
                                                <li><?php echo $stime . ' - ' . $etime ?></li>
                                                <li><?php echo number_format($row["fee"], 2) ?></li>
                                                <?php
                                                $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                ?>
                                                <li><?php echo $datetime ?></li>
                                                <li id="<?= $reservationId ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1','<?= $reservationId ?>')" class="model-Btn1" title="Emergency Remove"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                    <span style="margin-right: 20px;">No of Members : <?php echo $row["no_of_members"] ?></span>
                                                    <span style="margin-right: 20px;">Reservation No : <?php echo  $reservationId ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <!-- Today Fitness -->
                                <?php
                                if ($this->todayFitnessRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->todayFitnessRes->fetch_assoc()) {
                                        $reservationId = "F" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <article class="row nhl">
                                            <ul>
                                                <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                <?php
                                                $stime =  $row["start_time"];
                                                $etime =  $row["end_time"];
                                                $stime = date('h:i A', strtotime($stime));
                                                $etime = date('h:i A', strtotime($etime));
                                                ?>
                                                <li><?php echo $stime . ' - ' . $etime ?></li>
                                                <li><?php echo number_format($row["fee"], 2) ?></li>
                                                <?php
                                                $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                ?>
                                                <li><?php echo $datetime ?></li>
                                                <li id="<?= $reservationId ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1','<?= $reservationId ?>')" class="model-Btn1" title="Emergency Remove"><i class="fas fa-trash-alt"></i></span>
                                                    &emsp;
                                                    <span onclick="openModel('editModel','model-Btn2','<?= $reservationId ?>'); loadAvailableStaff('fitness', '<?= $row['employee_id'] ?>', '<?= $row['date'] ?>');" class="model-Btn2" title="Substitute Staff"><i class="fa fa-edit"></i></span>
                                                </li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Reservation Type : Fitness</span>
                                                    <?php
                                                    if (isset($row["tfname"]) && isset($row["tlname"])) {
                                                    ?>
                                                        <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-right: 20px;">Reservation No : <?php echo  $reservationId ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <!-- Today Treatement -->
                                <?php
                                if ($this->todayTreatmentRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->todayTreatmentRes->fetch_assoc()) {
                                        $reservationId = "T" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                <?php
                                                $stime =  $row["start_time"];
                                                $etime =  $row["end_time"];
                                                $stime = date('h:i A', strtotime($stime));
                                                $etime = date('h:i A', strtotime($etime));
                                                ?>
                                                <li><?php echo $stime . ' - ' . $etime ?></li>
                                                <li><?php echo number_format($row["fee"], 2) ?></li>
                                                <?php
                                                $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                ?>
                                                <li><?php echo $datetime ?></li>
                                                <li id="<?= $reservationId ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1','<?= $reservationId ?>')" class="model-Btn1" title="Emergency Remove"><i class="fas fa-trash-alt"></i></span>
                                                    &emsp;
                                                    <span onclick="openModel('editModel','model-Btn2','<?= $reservationId ?>'); loadAvailableStaff('treatment', '<?= $row['employee_id'] ?>', '<?= $row['date'] ?>');" class="model-Btn2" title="Substitute Staff"><i class="fa fa-edit"></i></span>
                                                </li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                    <?php
                                                    if (isset($row["tfname"]) && isset($row["tlname"])) {
                                                    ?>
                                                        <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-right: 20px;">Reservation No : <?php echo  $reservationId ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                            } else {
                                ?>
                                <ul>
                                    <li style="text-align: center;">No Reservations Today</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>

                <div class="allreservations">
                    <h2>All Reservations</h2>
                    <div class="reservationsearch">
                        <input type="text" name="search" placeholder="Search.." class="mySearch" />
                        <div>
                            <span style="display: inline-block;"> Hall <i class="fa fa-square" style="color: #EB7655;"></i></span>
                            <span style="display: inline-block;"> Fitness <i class="fa fa-square" style="color: #AA9150;"></i></span>
                            <span style="display: inline-block;"> Treatment <i class="fa fa-square" style="color: #52D29A;"></i></span>
                            <span style="display: inline-block;"> Canceled <i class="fa fa-square" style="color: #e90909;"></i></span>
                        </div>
                    </div>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Date</li>
                                    <li>Duration</li>
                                    <li>Fee (Rs.)</li>
                                    <li>Reserved Date</li>
                                    <li>Action</li>
                                </ul>
                            </main>
                            <!-- Hall -->
                            <?php
                            if ($this->allHallRes->num_rows || $this->allFitnessRes->num_rows || $this->allTreatmentRes->num_rows) {
                                if ($this->allHallRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->allHallRes->fetch_assoc()) {
                                        $reservationId = "H" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <span id="searchrow">
                                            <article class="row pga">
                                                <ul>
                                                    <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?></li>
                                                    <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                    <?php
                                                    $stime =  $row["start_time"];
                                                    $etime =  $row["end_time"];
                                                    $stime = date('h:i A', strtotime($stime));
                                                    $etime = date('h:i A', strtotime($etime));
                                                    ?>
                                                    <li><?php echo $stime . ' - ' . $etime ?></li>
                                                    <li><?php echo number_format($row["fee"], 2) ?></li>
                                                    <?php
                                                    $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                    ?>
                                                    <li><?php echo $datetime ?></li>
                                                    <?php
                                                    if (empty($row['cancelled_time'])) {
                                                        if (date('Y-m-d') <= $row["date"]) {
                                                    ?>
                                                            <li>No Permission</li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li>Completed</li>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <li>
                                                            <?php
                                                            $datetime = date('Y-m-d h:i A', strtotime($row["cancelled_time"]));
                                                            ?>
                                                            <span>Cancelled : <?php echo $datetime ?></span>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                        <span style="margin-right: 20px;">No of Members : <?php echo $row["no_of_members"] ?></span>
                                                        <span style="margin-right: 20px;">Reservation No : <?php echo $reservationId ?></span>
                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <!-- Fitness -->
                                <?php
                                if ($this->allFitnessRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->allFitnessRes->fetch_assoc()) {
                                        $reservationId = "F" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <span id="searchrow">
                                            <article class="row nhl">
                                                <ul>
                                                    <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                                    <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                    <?php
                                                    $stime =  $row["start_time"];
                                                    $etime =  $row["end_time"];
                                                    $stime = date('h:i A', strtotime($stime));
                                                    $etime = date('h:i A', strtotime($etime));
                                                    ?>
                                                    <li><?php echo $stime . ' - ' . $etime ?></li>
                                                    <li><?php echo number_format($row["fee"], 2) ?></li>
                                                    <?php
                                                    $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                    ?>
                                                    <li><?php echo $datetime ?></li>
                                                    <?php
                                                    if (empty($row['cancelled_time'])) {
                                                        if (date('Y-m-d') <= $row["date"]) {
                                                    ?>
                                                            <li id="<?= $reservationId ?>">
                                                                <span onclick="openModel('editModel','model-Btn2','<?= $reservationId ?>'); loadAvailableStaff('fitness', '<?= $row['employee_id'] ?>', '<?= $row['date'] ?>');" class="model-Btn2" title="Substitute Staff"><i class="fa fa-edit"></i></span>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li>Completed</li>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <li>
                                                            <?php
                                                            $datetime = date('Y-m-d h:i A', strtotime($row["cancelled_time"]));
                                                            ?>
                                                            <span>Cancelled : <?php echo $datetime ?></span>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="margin-right: 20px;">Reservation Type : Fitness</span>
                                                        <?php
                                                        if (isset($row["tfname"]) && isset($row["tlname"])) {
                                                        ?>
                                                            <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                        <span style="margin-right: 20px;">Reservation No : <?php echo $reservationId ?></span>
                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <!-- Treatment -->
                                <?php
                                if ($this->allTreatmentRes->num_rows > 0) { ?>
                                    <?php
                                    while ($row = $this->allTreatmentRes->fetch_assoc()) {
                                        $reservationId = "T" . sprintf("%04d", $row["reservation_id"]);
                                    ?>
                                        <span id="searchrow">
                                            <article class="row mlb">
                                                <ul>
                                                    <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                                    <li><?php echo date('D, M d, Y', strtotime($row["date"])) ?></li>
                                                    <?php
                                                    $stime =  $row["start_time"];
                                                    $etime =  $row["end_time"];
                                                    $stime = date('h:i A', strtotime($stime));
                                                    $etime = date('h:i A', strtotime($etime));
                                                    ?>
                                                    <li><?php echo $stime . ' - ' . $etime ?></li>
                                                    <li><?php echo number_format($row["fee"], 2) ?></li>
                                                    <?php
                                                    $datetime = date('Y-m-d h:i A', strtotime($row["reserved_time"]));
                                                    ?>
                                                    <li><?php echo $datetime ?></li>
                                                    <?php
                                                    if (empty($row['cancelled_time'])) {
                                                        if (date('Y-m-d') <= $row["date"]) {
                                                    ?>
                                                            <li id="<?= $reservationId ?>">
                                                                <span onclick="openModel('editModel','model-Btn2','<?= $reservationId ?>'); loadAvailableStaff('treatment', '<?= $row['employee_id'] ?>', '<?= $row['date'] ?>');" class="model-Btn2" title="Substitute Staff"><i class="fa fa-edit"></i></span>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li>Completed</li>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <li>
                                                            <?php
                                                            $datetime = date('Y-m-d h:i A', strtotime($row["cancelled_time"]));
                                                            ?>
                                                            <span>Cancelled : <?php echo $datetime ?></span>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                        <?php
                                                        if (isset($row["tfname"]) && isset($row["tlname"])) {
                                                        ?>
                                                            <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                        <span style="margin-right: 20px;">Reservation No : <?php echo $reservationId ?></span>
                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                            } else {
                                ?>
                                <ul>
                                    <li style="text-align: center;">No Reservations Yet</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Remove Reservation</h2>
                    </div>
                    <form action="#" class="removeReservation" onsubmit="emergencyRemove(); return false;">
                        <div>
                            <label>Reservation No : </label>
                            <span id="answer1"></span>
                        </div>
                        <div>
                            <label>Enter Reason : </label>
                            <textarea name="reason" id="reason" cols="" rows="3" placeholder="Reason..."></textarea>
                        </div>
                        <div>
                            <input class="btnRed" type="submit" name="submit" value="Remove">
                        </div>
                    </form>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Substitute Staff</h2>
                    </div>
                    <form action="#" class="editReservation" method="GET">
                        <div>
                            <label>Reservation No : </label>
                            <span id="answer2"></span>
                        </div>
                        <div>
                            <label>Select Employee : </label>
                            <select id="employee" name="employee" class="input-field" required>
                            </select>
                        </div>
                        <div>
                            <label>Enter Reason : </label>
                            <textarea name="reason" id="reason" cols="" rows="3" placeholder="Reason..." required></textarea>
                        </div>
                        <div>
                            <input class="purplebutton" type="submit" name="submit" value="Done">
                        </div>
                    </form>
                </div>
            </div>

            <!-- success popup -->
            <div class="success" style="display:none;">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="successModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Successful</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView(); return false;">
                            <div>
                                <label id="successmsg"></label>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- error popup -->
            <div class="error" style="display:none">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="errorModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Failed</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView(); return false;">
                            <div>
                                <label id="errormsg">Try again later</label>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>