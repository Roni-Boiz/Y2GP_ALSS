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
                                    <li>Cancel / Update</li>
                                </ul>
                            </main>
                            <!-- Today Hall -->
                            <?php
                            if ($this->todayHallRes->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->todayHallRes->fetch_assoc()) {
                                ?>
                                    <article class="row pga">
                                        <ul>
                                            <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                            <li>
                                                <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><i class="fas fa-trash-alt"></i></span>
                                            </li>
                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                <span style="margin-right: 20px;">No of Members : <?php echo $row["no_of_members"] ?></span>
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
                                ?>
                                    <article class="row nhl">
                                        <ul>
                                            <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                            <li>
                                                <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><i class="fas fa-trash-alt"></i></span>
                                                &emsp;
                                                <span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span>
                                            </li>
                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="margin-right: 20px;">Reservation Type : Fitness</span>
                                                <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
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
                                ?>
                                    <article class="row mlb">
                                        <ul>
                                            <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                            <li>
                                                <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><i class="fas fa-trash-alt"></i></span>
                                                &emsp;
                                                <span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span>
                                            </li>
                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="margin-right: 20px;">Reservation Type : <?php echo $row["type"] ?></span>
                                                <span style="margin-right: 20px;">Treater : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                            </li>
                                        </ul>
                                    </article>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div class="reservationsearch">
                    <input type="text" name="search" placeholder="Search.." />
                    <div>
                        <span style="display: inline-block;"> Hall <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Fitness <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> Treatment <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Canceled <i class="fa fa-square" style="color: #e90909;"></i></span>
                    </div>
                </div>
                <div class="allreservations">
                    <h2>All Reservations</h2>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Date</li>
                                    <li>Duration</li>
                                    <li>Fee (Rs.)</li>
                                    <li>Reserved Date</li>
                                    <li>Update</li>
                                </ul>
                            </main>
                            <!-- Hall -->
                            <?php
                            if ($this->allHallRes->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->allHallRes->fetch_assoc()) {
                                ?>
                                    <article class="row pga">
                                        <ul>
                                            <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                            </li>
                                        </ul>
                                    </article>
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
                                ?>
                                    <article class="row nhl">
                                        <ul>
                                            <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                                    <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
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
                                                <span style="margin-right: 20px;">Trainer : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                            </li>
                                        </ul>
                                    </article>
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
                                ?>
                                    <article class="row mlb">
                                        <ul>
                                            <li><?php echo $row["rfname"][0] . ". " . $row["rlname"] ?></li>
                                            <li><?php echo $row["date"] ?></li>
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
                                                    <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
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
                                                <span style="margin-right: 20px;">Treater : <?php echo $row["tfname"][0] . ". " . $row["tlname"] ?></span>
                                            </li>
                                        </ul>
                                    </article>
                                <?php
                                }
                                ?>
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
                    <form action="#" class="removeReservation" method="GET">
                        <div>
                            <label>Reservation No : </label>
                            <span><?= 1234 ?></span>
                        </div>
                        <div>
                            <label>Enter Reason : </label>
                            <textarea name="reason" id="reason" cols="" rows="3" placeholder="Reason..."></textarea>
                        </div>
                        <div>
                            <input class="purplebutton" type="submit" name="submit" value="Done">
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
                            <span><?= 1234 ?></span>
                        </div>
                        <div>
                            <label>Select Employee : </label>
                            <select id="employee" name="employee" class="input-field" required>
                                <option value="">Employees</option>
                                <option value="1">Employee 1</option>
                                <option value="2">Employee 2</option>
                                <option value="3">Employee 3</option>
                                <option value="4">Employee 4</option>
                                <option value="5">Employee 5</option>
                            </select>
                        </div>
                        <div>
                            <label>Enter Reason : </label>
                            <textarea name="reason" id="reason" cols="" rows="3" placeholder="Reason..."></textarea>
                        </div>
                        <div>
                            <input class="purplebutton" type="submit" name="submit" value="Done">
                        </div>
                    </form>
                </div>
            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>