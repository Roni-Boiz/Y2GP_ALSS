<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="staffDetails">
                        <h4>Slot Allocations</h4>

                        <div class="card" id="employeeSummary">
                            <div>
                                <div>
                                    <label>Vehicle No</label><br>
                                    <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php  echo "AAA123" ?>>
                                    <input class="purplebutton" type="submit" name="Submit" value="View"><br><br>
                                </div>

                            </div>
                            <div>
                                <div class="employee">
                                    <div>
                                        <span><i class="fas fa-car"></i></span>
                                    </div>
                                    <form action="#" class="reservationtime" method="GET">
                                        <br>FROM :<br> 21-10-2021 12:00 <br>TO :<br> 21-10-2021 01:30<br><br>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </div>
                                <div class="employee">
                                    <div>
                                        <span><i class="fas fa-car"></i></span>
                                    </div>
                                    <form action="#" class="reservationtime" method="GET">
                                        <br>FROM :<br> 21-10-2021 12:00 <br>TO :<br> 21-10-2021 01:30<br><br>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </div>
                                <div class="employee">
                                    <div>
                                        <span><i class="fas fa-car"></i></span>
                                    </div>
                                    <form action="#" class="reservationtime" method="GET">
                                        <br>FROM :<br> 21-10-2021 12:00 <br>TO :<br> 21-10-2021 01:30<br><br>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Outgoing . . .</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>SSD-5868</h5>
                                    <small>R. Siripala</small><small> 01:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5>DDD-7897</h5>
                                    <small>S. Ranathunga</small><small> 12:30</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>OverDue</h3>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>AAA-1257</h5>
                                <small>R.K. Rathnayake</small><small> 12:30</small>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>ABC-1238</h5>
                                <small>C.B Silva</small><small> 12:30</small>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>