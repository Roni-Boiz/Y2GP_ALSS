<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">TREATMENT ROOM <br><span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="divPopupModel">

                <button id="model-btn" class="purplebutton">Reserve Now</button>
                <p id="answer"></p>

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">


                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>

                    <form action="#" class="reservationtime" method="GET">
                        <div id="col1">
                            <label for="fname">Treatment Type</label><br>
                            <select id="starttime" name="endtime" class="input-field" placeholder="Start Time">
                                <option value="">Select Type</option>
                                <option value="">Herbal body wrap</option>
                                <option value="">Full Body Massage</option>
                                <option value="">Full-body facia</option>
                                <option value="">Water Therapy</option>
                            </select><br>
                        </div>
                        <div id="col1">
                            <label for="type">Start Time</label><br>
                            <select id="starttime" name="endtime" class="input-field" placeholder="Start Time">
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
                            </select><br>
                            <label for="type">End Time</label><br>
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
            </form>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>