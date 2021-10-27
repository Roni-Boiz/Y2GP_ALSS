<?php
include_once 'sidenav.php';
?>

</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">LAUNDRY REQUESTS</h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">New</a></li>
                    <li><a href="#tab2">Cleaning</a></li>
                    <li><a href="#tab3">Completed</a></li>
                </ul>
                <div id="tab1" class="tab active">
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyNewRequests->num_rows > 0) { ?>
                                <?php
                                while ($row1 = $this->laundyNewRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row1['request_id']; ?>"><?php echo $row1["request_id"]; ?></li>
                                                <!-- <td><a method="get" href="putReached?parcel=<?php echo $row1["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                <li><?php echo $row1["apartment_no"]; ?></li>
                                                <li><?php echo $row1["type"]; ?></li>
                                                <li><?php echo $row1["request_date"]; ?></li>
                                                <li><?php echo $row1["request_time"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Weight: <?php echo $row1["description"] ?></span>
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
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyCleaningRequests->num_rows > 0) { ?>
                                <?php
                                while ($row2 = $this->laundyCleaningRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row2['request_id']; ?>"><?php echo $row2["request_id"]; ?></li>
                                                <!-- <td><a method="get" href="putReached?parcel=<?php echo $row2["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                <li><?php echo $row2["apartment_no"]; ?></li>
                                                <li><?php echo $row2["type"]; ?></li>
                                                <li><?php echo $row2["request_date"]; ?></li>
                                                <li><?php echo $row2["request_time"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Weight: <?php echo $row2["description"] ?></span>
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
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyCompletedRequests->num_rows > 0) { ?>
                                <?php
                                while ($row2 = $this->laundyCompletedRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row2['request_id']; ?>"><?php echo $row2["request_id"]; ?></li>
                                                <!-- <td><a method="get" href="putReached?parcel=<?php echo $row2["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                <li><?php echo $row2["apartment_no"]; ?></li>
                                                <li><?php echo $row2["type"]; ?></li>
                                                <li><?php echo $row2["request_date"]; ?></li>
                                                <li><?php echo $row2["request_time"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Weight: <?php echo $row2["description"] ?></span>
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
            </div>
            <div class="divPopupModel">
                <p id="answer"></p>

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">


                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>

                    <form action="#" class="reservationtime" method="GET">
                        <div id="col1">
                            <label>Treatment Type</label><br>
                            <select name="type" class="input-field">
                                <option value="">Select Type</option>
                                <option value="">Herbal body wrap</option>
                                <option value="">Full Body Massage</option>
                                <option value="">Full-body facia</option>
                                <option value="">Water Therapy</option>
                            </select><br>
                        </div>
                        <div id="col1">
                            <label>Start Time</label><br>
                            <select name="starttime" class="input-field">
                                <option value="">Select Time</option>
                                <?php
                                for ($hours = 6; $hours < 24; $hours++) {
                                    for ($mins = 0; $mins < 60; $mins += 30) {
                                ?>
                                        <option value="starttime"><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($mins, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select><br>
                            <label>End Time</label><br>
                            <select id="endtime" name="endtime" class="input-field" placeholder="End Time">
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
                            </select>
                        </div>
                        <br>
                        <input class="purplebutton" type="submit" name="Submit" value="Booking Now..." style="grid-column:1">
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
<script>
    $(document).ready(function() {
        $(".tabs-list li a").click(function(e) {
            e.preventDefault();
        });

        $(".tabs-list li").click(function() {
            var tabid = $(this).find("a").attr("href");
            $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
            $(".tab").hide(); // hiding open tab
            $(tabid).show(); // show tab
            $(this).addClass("active"); //  adding active class to clicked tab
        });
    });
</script>