<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">FITNESS CENTER <span id="city">RESERVATIONS</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Reservation History</a></li>
                    <li><a href="#tab2">Today Reservations</a></li>
                    <li><a href="#tab3">Upcoming Reservations</a></li>
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="search">
                    <input type="text" id="mySearch"  placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                </div>

                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- History -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->history->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->history->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["employee_id"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Resident Name <?php echo $row["resident_id"] ?></span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab2" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- Today -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->today->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->today->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["employee_id"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Resident Name <?php echo $row["resident_id"] ?></span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations today";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
<!-- laundry -->
<section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->upcoming->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->upcoming->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["employee_id"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Resident Name <?php echo $row["resident_id"] ?></span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No upcoming reservations";
                            }
                            ?>
                        </section>
                    </div>
                </div>

            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
        
</body>

</html>