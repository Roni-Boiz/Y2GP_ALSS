<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">HELP<span id="city"> </span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard">
                <div class="leftPanel">
                    <h2>Privacy Policy</h2>
                    <div class="tabs" style="grid-column:1/span3">
                        <ul class="tabs-list">
                            <li class="active"><a href="#tab1">User account</a></li>
                            <li><a href="#tab2">Reservations</a></li>
                            <li><a href="#tab3">Requests</a></li>
                            <li><a href="#tab4">Payment</a></li>
                        </ul>
                        <br>
                        <!-- for search row --><br>
                        <!-- <div class="search">
                            <input type="text" id="mySearch" placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                        </div> -->

                        <div id="tab1" class="tab active">

                            <div style="overflow-x:auto;grid-column:1/span2">
                                <div class="activeUsers">
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Registration</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                            <small>Once the registration process completed, apartment owner will recieve an email of confirmation with his username and password. </small><br>

                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Login</h5>
                                            <small>Apartment owner can login in to the system using username and password recieved to his/her email.</small><br>
                                            <small>After the login into the system for the first time, it is his/her responsibility to change the password interms of security concerns.</small><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab2" class="tab">
                            <div style="overflow-x:auto;grid-column:1/span2">
                                <div class="activeUsers">
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Hall Reservation</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Fitness Centre Reservation</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Treatment Room Reservation</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Parking Slot Reservation</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Cancel Reservation</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="tab3" class="tab">
                            <p style="color:black">
                            <div style="overflow-x:auto;grid-column:1/span2">
                                <div class="activeUsers">
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Maintenence and Technical Services</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Laundry Services</h5>
                                            <small>Apartment owner can login in to the system using username and password recieved to his/her email.</small><br>
                                            <small>After the login into the system for the first time, it is his/her responsibility to change the password interms of security concerns.</small><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </p>
                        </div>
                        <div id="tab4" class="tab">
                            <p style="color:black">
                            <div style="overflow-x:auto;grid-column:1/span2">
                                <div class="activeUsers">
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Card Payments</h5>
                                            <small>Each person who buys an apartment will get a user account of type "resident".</small><br>
                                            <small>After validationg the identity of apartment buyer, registration of resident accounts is done by the receptionist at the receptionist desk.</small><br>

                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-info">
                                            <h5>Login</h5>
                                            <small>Apartment owner can login in to the system using username and password recieved to his/her email.</small><br>
                                            <small>After the login into the system for the first time, it is his/her responsibility to change the password interms of security concerns.</small><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </p>
                        </div>
                    </div>


                </div>

                <div class="rightPanel">
                    <span onclick="openModel('editModel','addBtn')" class="addBtn"> Make your complaints<i class="fa fa-plus"></i></span>

                    <div class="holdAccount">
                        <div class="head">
                            <h3>Contact Details . . .</h3>
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
                                    <small>Hawlock City</small><br>
                                    <small>011-145872</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
        <!-- firstmodel -->
        <div class="divPopupModel">
            <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
            <div id="editModel">
                <a href="javascript:void(0)" class="closebtn">&times;</a>
                <div style="text-align: center; margin-bottom: 10px;">
                    <h3>Complaints</h3>
                </div>
                <form action="complaint" class="reservationtime" method="post">
                    <div>
                        <input type="textarea" name="description" id="description" style="margin:20px 10px 20px 0" placeholder="Enter here..."><br>
                        your complaint will be considered soon.. thank you for your feedback<br>
                        <input class="purplebutton" type="submit" value="Send" id="model-btn" style="grid-column:2;padding:5px 15px">
                    </div>
                </form>
            </div>


        </div>
    </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>