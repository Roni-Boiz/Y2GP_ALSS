<?php
include_once 'sidenav.php';
?>
<link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />
<script src="vendor/pnotify/pnotify.custom.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<body style="background-color: gray; background-image:none;">

    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PREVIOUS <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <br>
                <a href="yourRequest"><input type="submit" onclick="yourReservation" value="Back"></input></a>
                <?php if ($this->type == '1') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Hall Reservations</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preReservation?type=1">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php
                } else if ($this->type == '2') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Fitness Reservations</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preReservation?type=2">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php
                } elseif ($this->type == '3') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Treatment Room Reservations</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preReservation?type=3">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php
                } elseif ($this->type == '4') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Parking Slot Reservations</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preReservation?type=4">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php }
                ?>

                <!-- hall -->
                <?php
                if (isset($this->hall)) { ?>
                    <div id="tab1" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">

                            <section class="wrapper">
                                <main class="row title">

                                    <ul>
                                        <li>Reservation ID</li>
                                        <li>Reservation Date</li>
                                        <li>Reservation Time</li>
                                        <li>Hall Type</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->hall->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["reservation_id"]; ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["type"] ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                    <span style="padding-right: 20px;">Member : <?php echo $row["no_of_members"] ?></span>
                                                    <span style="padding-right: 20px;"><?php if ($row["fee"] == 0) echo "Removed by apartment complex";
                                                                                        else if (!$row["cancelled_time"] == NULL) echo "Cancelled by you"; ?></span>

                                                </li>
                                            </ul>

                                        </article>
                                    </span>

                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>


                <!-- fitness -->
                <?php
                if (isset($this->fitness)) { ?>
                    <div id="tab2" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">
                            <section class="wrapper">

                                <main class="row title">
                                    <ul>
                                        <li>Reservation ID</li>
                                        <li>Reservation Date</li>
                                        <li>Reservation Time</li>
                                        <li>Coach</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->fitness->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["reservation_id"]; ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"]; ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                    <span style="padding-right: 20px;"><?php if ($row["fee"] == 0) echo "Removed by apartment complex";
                                                                                        else if (!$row["cancelled_time"] == NULL) echo "Cancelled by you"; ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>


                <!-- treatment -->
                <?php
                if (isset($this->treatment)) { ?>
                    <div id="tab3" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">
                            <!-- laundry -->
                            <section class="wrapper">

                                <main class="row title">
                                    <ul>
                                        <li>Reservation ID</li>
                                        <li>Reservation Date</li>
                                        <li>Reservation Time</li>
                                        <li>Type</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->treatment->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["reservation_id"]; ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["type"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                    <span style="padding-right: 20px;"><?php if ($row["fee"] == 0) echo "Removed by apartment complex";
                                                                                        else if (!$row["cancelled_time"] == NULL) echo "Cancelled by you"; ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- parking -->
                <?php
                if (isset($this->parking)) { ?>
                    <div id="tab4" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">
                            <section class="wrapper">
                                <main class="row title">
                                    <ul>
                                        <li>Reservation ID</li>
                                        <li>Reservation Date</li>
                                        <li>Reservation Time</li>
                                        <li>Vehicle No</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->parking->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["reservation_id"]; ?></li>
                                                <li><?php echo $row["date"]; ?></li>
                                                <li><?php echo $row["start_time"] . " - " . $row["end_time"]; ?></li>
                                                <li><?php echo $row["vehicle_no"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                                    <span style="padding-right: 20px;"><?php if ($row["fee"] == 0) echo "Removed by apartment complex";
                                                                                        else if (!$row["cancelled_time"] == NULL) echo "Cancelled by you"; ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>