<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">CONTACT US<span id="city"> </span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card" id="userCard">
                <div class="leftPanel">
                    <div>
                        <h4>Complaints</h4>
                        <div class="card" id="usersummary">
                            <div>
                                <form action="complaint" class="reservationtime" method="post">
                                    <div>
                                        <label>Complaint</label><br>
                                        <input type="textarea" name="description" id="description" style="margin:20px 10px 20px 0" placeholder="Enter here..."><br>
                                        your complaint will be considered soon.. thank you for your feedback<br>
                                        <input class="purplebutton"  type="submit" value="Send" id="model-btn" style="grid-column:2" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rightPanel">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5>Admin</h5>
                                    <small>Mr.Sadaruwan</small><br>
                                    <small>011-1524587</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5>Managing Directer</h5>
                                    <small>Mr. Tharaka</small><br>
                                    <small>011-145872</small>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5>Receptionist Desk</h5>
                                    <small>011-145872</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Privacy Policy</h3>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>Lorem ipsum dolor, sit amet consectetur corporis.a suscipit quod doloribus consequatur officia! Dolore consectetur delectus nobis.</h5>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-info">
                                <h5>Lorem ipsum dolor, sit amet consectetur corporis.a suscipit quod doloribus consequatur officia! Dolore consectetur delectus nobis.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>