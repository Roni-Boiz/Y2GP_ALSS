<?php
include_once 'sidenav.php';
?>
<link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />
<script src="vendor/pnotify/pnotify.custom.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<body style="background-color: gray; background-image:none;">

    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Hall</a></li>
                    <li><a href="#tab2">Fitness Centre</a></li>
                    <li><a href="#tab3">Treatment Room</a></li>
                    <li><a href="#tab4">Parking Slot</a></li>
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="search">
                    <input type="text" id="mySearch" placeholder="Search..." style="width:50%;margin: 5px 20px"><i class="fa fa-history" aria-hidden="true" title="Search previous..." onclick="previousreservation()"></i>
                </div>

                <div id="tab1" class="tab active">

                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- hall -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Reservation ID</li>
                                    <li>Reservation Date</li>
                                    <li>Reservation Time</li>
                                    <li>Hall Type</li>
                                </ul>
                            </main>

                            <?php
                            if ($this->hall->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->hall->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['reservation_id']; ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['reservation_id'] ?>','hall')" class="model-Btn1" title="Remove Reservation"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo "H" . sprintf("%04d", $row["reservation_id"]) ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["type"] ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                    <span style="padding-right: 20px;">Member : <?php echo $row["no_of_members"] ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations yet...<br><a href= 'hall' style='color:black'> Reserve Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>

                <div id="tab2" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- fitness -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Reservation ID</li>
                                    <li>Reservation Date</li>
                                    <li>Reservation Time</li>
                                    <li>Coach</li>
                                </ul>
                            </main>

                            <?php
                            if ($this->fitness->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->fitness->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['reservation_id']; ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['reservation_id'] ?>','fit')" class="model-Btn1" title="Remove Reservation"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo "F" . sprintf("%04d", $row["reservation_id"]) ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"]; ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations yet...<br><a href= 'fitness' style='color:black'> Reserve Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <p style="color:black">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- treatment -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Reservation ID</li>
                                    <li>Reservation Date</li>
                                    <li>Reservation Time</li>
                                    <li>Type</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->treatment->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->treatment->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['reservation_id']; ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['reservation_id'] ?>','treat')" class="model-Btn1" title="Remove Reservation"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo "T" . sprintf("%04d", $row["reservation_id"]) ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["type"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations yet...<br><a href= 'treatment' style='color:black'> Reserve Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                    </p>
                </div>
                <div id="tab4" class="tab">
                    <p style="color:black">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- parking -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Reservation ID</li>
                                    <li>Reservation Date</li>
                                    <li>Reservation Time</li>
                                    <li>Vehicle No</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->parking->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->parking->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['reservation_id']; ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['reservation_id']; ?>','parking')" class="model-Btn1" title="Remove Reservation"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo "P" . sprintf("%04d", $row["reservation_id"]) ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["vehicle_no"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations yet...<br><a href= 'parking' style='color:black'> Reserve Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                    </p>
                </div>
            </div>
          
            <!-- delete confirmation -->
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Are You Sure ?</h2>
                    </div>
                    <form class="formDelete" onsubmit="deletereservation() ;return false;">
                        <div>
                            <label> Delete <span id="answer2"></span> reservation with reservation ID </label>
                            <span id="answer1"></span>
                        </div>
                        <div>
                            <input class="btnRed" type="submit" name="submit" value="Delete">
                        </div>

                    </form>
                </div>
            </div>


            <!-- reservation success message -->
            <div class="error" style="display:none;z-index:5">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Failed</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView() ;return false;">
                            <div>
                                <label> <span id="answer2"></span>Try again later</label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- success popup -->
            <div class="success" style="display:none;">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Reservation Removed!</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView() ;return false;">
                            <div>
                                <label> <span id="answer2"></span>Penalty fee add your account </label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>




        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>