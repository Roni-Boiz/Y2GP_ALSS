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
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="search">
                    <input type="text" id="mySearch"  placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
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
                                                <li id="<?php echo $row['reservation_id']; ?>"><a onclick="deleteRes(<?php echo $row['reservation_id']; ?>,'hall')">
                                                        <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                                <li><?php echo $row["reservation_id"]; ?></li>
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
                                echo "0 results";
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
                                            <li id="<?php echo $row['reservation_id']; ?>"><a onclick="deleteRes(<?php echo $row['reservation_id']; ?>,'fit')">
                                                    <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                            <li><?php echo $row["reservation_id"]; ?></li>
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
                                echo "0 results";
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
                                            <li id="<?php echo $row['reservation_id']; ?>"><a onclick="deleteRes(<?php echo $row['reservation_id']; ?>,'treat')">
                                                    <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                            <li><?php echo $row["reservation_id"]; ?></li>
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
                                echo "0 results";
                            }
                            ?>
                        </section>
                    </div>
                    </p>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>