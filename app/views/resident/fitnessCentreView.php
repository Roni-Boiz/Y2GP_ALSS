<?php
include_once 'sidenav.php';
?>
</head>
<style>

</style>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">FITNESS CENTRE<br> <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody">

            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/gym.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="#" class="reservationtime" method="GET">
                                    <div id="">
                                        <label>Date</label><br>
                                        <input type="date" name="date" class="input-field"><br>
                                        <label>Coach</label><br>
                                        <select name="type" class="input-field">
                                            <option value="">Select coach</option>
                                            <option value="">coach 1</option>
                                            <option value="">coach 1</option>
                                            <option value="">coach 1</option>
                                            <option value="">coach 1</option>
                                        </select><br>
                                        <input class="purplebutton" type="submit" value="View" style="grid-column:2"><br><br>
                                        <div id="available">
                                            <h3>Reservations of the day</h3><br>6:00 - 6:30 4/5<br>6:30 - 7:00 4/5<br>11:00 - 12:30 4/5<br>12:30 - 2:00 4/5
                                        </div>
                                        <br>
                                        <button id="model-btn" class="purplebutton">Reserve Now</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Reservations</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>2021-10-28 - 16:00</h5>
                                    <small>Coach Kasun</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>2021-10-30 - 10:00</h5>
                                    <small>Coach Kasun</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Coach List</h3>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Nimal Ranathunga</h5>
                                <small>TR001</small>
                            </div>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Kasun Silva</h5>
                                <small>TR002</small>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">
                    <div style="text-align: center;">
                        <h3>Reservation details<i class="fa fa-calendar-plus"></i></i></h3><a href="javascript:void(0)" id="closebtn" style="right:0">&times;</a>
                    </div>
                    <form action="#" class="reservationtime" method="GET">
                        <div id="col1">
                            <label>Start Time</label><br>
                            <select name="starttime" class="input-field" placeholder="Start Time">
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
                            <select name="endtime" class="input-field" placeholder="End Time">
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
                        <input class="purplebutton" type="submit" name="Submit" value="Reserve" style="grid-column:1">
                    </form>

                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>