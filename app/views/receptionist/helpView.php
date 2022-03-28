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

                    <div class="holdAccount">
                        <div class="head">
                            <h3>Contact Details . . .</h3>
                        </div>
                        
                    </div>
                    <br>
                    <div class="holdAccount">

                        <div>
                            <form method="POST" action="help">
                                <label>Type</label><br>
                                <select name="type" class="input-field" required>
                                    <option value="">Select Type</option>
                                    <option>Manager</option>
                                    <!-- <option>Admin</option> -->
                                    <option>Resident</option>
                                    <option>Parking Officer</option>
                                    <option>Laundry</option>
                                    <option>Trainer</option>
                                    <option>Treater</option>
                                </select><br>
                                <!-- <label>Name</label><br> -->
                                <input type="hidden" id="name" name="name" class="input-field" value="" ><br>
                                <input class="purplebutton" type="submit" name="Submit" value="View"><br>
                            </form>
                        </div>
                    </div>
                    <div class="activeUsers">
                   
                    <?php
                    if (isset($this->contact)) {
                        while ($row = $this->contact->fetch_assoc()) {
                    ?>
                            <div class="detail">
                                <div>
                                    <!-- <img src="../../public/img/user.png" alt="user" /> -->
                                    <div class="detail-info">
                                        <h5><?php echo $row["fname"] . " " . $row["lname"]  ?></h5>
                                        <small><?php echo "Contact : " ;if(isset($row["contact_no"])) echo $row["contact_no"];else echo $row["phone_no"] ?></small>
                                        <br>
                                        <small><?php echo "Email : ". " " . $row["email"]   ?></small>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5><?php echo "Not available  . . ."; ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>

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