<?php
include_once('sidenav.php');
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand">
        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div class="hawlockbody animate-bottom" id="hb">
            <?php
            $row = $this->users->fetch_assoc()
            ?>

            <div class="card" id="profileCard" style="grid-column:1/span2;margin:auto">
                <div class="bio">
                    <div class="profile-pic">
                        <img id="photo" src="../../uploads/profile/employee/<?= $_SESSION['profilePic'] ?>" alt="profile picture" onerror="this.onerror=null; this.src='../../public/img/profile.png'">
                        <input type="file" id="file" name="file">
                        <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Change Photo</label>
                    </div>

                    <h4> <?php echo  $_SESSION['userName']; ?></h4>

                    <form action="editprofile" id="profileView" method="post">
                        <input type="hidden" name="res_id" class="input-field" value=<?php echo $row["resident_id"] ?>>

                        <label>First Name</label>
                        <input type="text" id="fname" name="firstname" class="input-field" value=<?php echo $row["fname"] ?>><br>
                        <span class="error_form" id="fnameerr" style="font-size:10px"></span><br>

                        <label>Last Name</label>
                        <input type="text" id="lname" name="lastname" class="input-field" value=<?php echo $row["lname"] ?>><br>
                        <span class="error_form" id="lnameerr" style="font-size:10px"></span><br>

                        <label>NIC</label>
                        <input type="text" id="nic" name="nic" class="input-field" pattern="[0-9]{9}V" value=<?php echo $row["nic"] ?>><br>
                        <span class="error_form" id="nicnoerr" style="font-size:10px"></span><br>

                        <label>Contact</label>
                        <input type="text" id="phone_no" name="phone_no" class="input-field" pattern="[0-9]{10}" value=<?php echo $row["phone_no"] ?>><br>
                        <span class="error_form" id="pnoerr" style="font-size:10px"></span><br>

                        <label>Email</label>
                        <input type="email" id="email" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="input-field" value=<?php echo $row["email"] ?>><br>
                        <span class="error_form" id="emailerr" style="font-size:10px"></span><br>

                        <label>Vehicle NO</label>
                        <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php echo $row["vehicle_no"] ?>><br>
                        <span class="error_form" id="vnoerr" style="font-size:10px"></span><br>

                        <label>New Member</label>
                        <!-- add new field -->
                        <i class="fas fa-plus-circle" style="padding:0" onclick="newMember();"></i><br>
                        <span id="newmem" style="display:none">

                            <label>new member</label>
                            <input type="text" id="" name="fam" class="input-field" placeholder="add new member">
                            <span class="error_form" id="newmembererr" style="font-size:10px"></span><br>

                        </span>
                        <br>
                        <input type="submit" value="Save" onclick="confirmSave">
                    </form>
                    <input type="submit" id="editprofile" value="Edit Profile" onclick="setVisibility1('profileView');"><br><br>
                    <label>Family Members</label>
                    <i class="fas fa-chevron-circle-down" style="padding:0" onclick="showmembers();"></i><br>
                    <div id="showmem" style="display:none;">
                        <?php $m = 1;
                        while ($mem = $this->members->fetch_assoc()) { ?>
                            <form action="removeMember" method="post" class="form1" id="removedmem">
                                <label for="member">member<?php echo " " . $m++ ?></label><button type="submit" onclick="confirmDelete()" style="background-color: transparent;border:none;"><i id="removeicon" class="fas fa-minus-circle" style="display:visible;padding:0"></i></button><br>
                                <input type="text" id="fam" name="removedmem" class="input-field" value=<?php echo $mem["membername"] ?> READONLY>
                            </form>
                        <?php } ?>
                    </div>

                </div>
                <div class="data">
                    <div>
                        <h4>Overview</h4>
                        <div class="card" id="overview">
                            <div>
                                <label>Full Name : </label>
                                <label><?php echo $row["fname"] . " " . $row["lname"] ?></label>
                            </div>
                            <hr>
                            <div>
                                <label>Apartment No: </label>
                                <label><?php echo $row["apartment_no"] ?></label>
                            </div>
                            <hr>
                            <div>
                                <label>Email : </label>
                                <label><?php echo $row["email"] ?></label>
                            </div>
                            <hr>
                            <div>
                                <label>NIC</label>
                                <label><?php echo $row["nic"] ?></label>
                            </div>
                            <hr>
                            <div>
                                <label>Contact</label>
                                <label><?php echo $row["phone_no"] ?></label>
                            </div>
                            <hr>
                            <hr>
                            <div>
                                <div>
                                    <label>Vehicle NO</label>
                                    <label><?php echo $row["vehicle_no"] ?></label>
                                </div>
                                <hr>
                                <label>Balance</label>
                                <label><?php echo $row["balance"] ?></label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4>Security</h4>
                        <div class="card" id="security">
                            <div>
                                <div>
                                    <h2>Your account is protected</h2>
                                    <div style="font-size: small;color: #545d7a;">The Security Check-Up examinied your account and found no recomended actions</div>
                                </div>
                                <picture>
                                    <source media="(max-width: 660px)" srcset="../../public/img/small-acount-protected.png">
                                    <img src="../../public/img/account-protected.png">
                                </picture>
                            </div>
                            <!-- change password -->
                            <form action="changePassword" id="passwordView" method="post">
                                <label for="fname">Old Password</label>
                                <input type="password" id="opw" name="opw" class="input-field" placeholder="old password"><br>
                                <span class="error_form" id="old_password_error_message" style="font-size:10px"></span><br>

                                <label for="lname">New Password</label>
                                <input type="password" id="npw" name="npw" class="input-field" placeholder="new password"><br>
                                <span class="error_form" id="new_password_error_message" style="font-size:10px"></span><br>

                                <label for="fname">Re-New Password</label>
                                <input type="password" id="rnpw" name="rnpw" class="input-field" placeholder="new password again"><br>
                                <span class="error_form" id="renew_password_error_message" style="font-size:10px;"></span><br>

                                <input type="submit" onclick="confirm" value="Save">
                            </form>

                            <input type="submit" id="changepassword" value="Change Password" onclick="setVisibility2('passwordView');">
                        </div>
                    </div>
                    <a href="javascript:setVisibility3('alldevices')" id="showmore">Show More</a>

                    <div id="alldevices">
                        <h4>Session</h4>
                        <div class="card" id="session">
                            <div>
                                <h3>Your Devices</h3>
                                <div style="font-size: small;color: #545d7a;">You’re currently signed in to your Account on these devices.</div>

                                <?php
                                if ($this->loginDevices->num_rows > 0) {
                                    while ($row = $this->loginDevices->fetch_assoc()) {
                                ?>
                                        <div class="loginDevicesDetails">
                                            <div id="sec1">
                                                <img src="../../public/img/computer.png" alt="lap">
                                            </div>
                                            <div id="sec2">
                                                <div><span style="font-size: 1rem; font-weight:600">Time Zone : </span><span style="font-size: .9rem; font-weight:400"><?= $row['time_zone'] ?></span></div>
                                                <div>
                                                    <?php $names = json_decode(file_get_contents("http://country.io/names.json"), true); ?>
                                                    <span style="font-size: 1rem; font-weight:600">Country : </span><span style="font-size: .9rem; font-weight:400"><?= $names[$row['country_code']] ?></span>
                                                </div>
                                                <div><span style="font-size: 1rem; font-weight:600">Region : </span><span style="font-size: .9rem; font-weight:400"><?= $row['region'] ?></span></div>
                                                <div><span style="font-size: 1rem; font-weight:600">City : </span><span style="font-size: .9rem; font-weight:400"><?= $row['city'] ?></span></div>
                                                <div><span style="font-size: 1rem; font-weight:600">Ip address : </span><span style="font-size: .9rem; font-weight:400"><?= $row['ip_address'] ?></span></div>
                                            </div>
                                        </div>

                                        <div class="loginDevicesDetails">
                                            <div id="sec1">
                                                <img src="../../public/img/smartphone.png" alt="phone">
                                            </div>
                                            <div id="sec2">
                                                <div><span style="font-size: 1rem; font-weight:600">Time Zone : </span><span style="font-size: .9rem; font-weight:400"><?= $row['time_zone'] ?></span></div>
                                                <div>
                                                    <?php $names = json_decode(file_get_contents("http://country.io/names.json"), true); ?>
                                                    <span style="font-size: 1rem; font-weight:600">Country : </span><span style="font-size: .9rem; font-weight:400"><?= $names[$row['country_code']] ?></span>
                                                </div>
                                                <div><span style="font-size: 1rem; font-weight:600">Region : </span><span style="font-size: .9rem; font-weight:400"><?= $row['region'] ?></span></div>
                                                <div><span style="font-size: 1rem; font-weight:600">City : </span><span style="font-size: .9rem; font-weight:400"><?= $row['city'] ?></span></div>
                                                <div><span style="font-size: 1rem; font-weight:600">Ip address : </span><span style="font-size: .9rem; font-weight:400"><?= $row['ip_address'] ?></span></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="loginDevicesDetails">
                                        <div id="sec1">
                                            <img src="../../public/img/local-area-network.png" alt="local">
                                        </div>
                                        <div id="sec2">
                                            <div><span style="font-size: 1rem; font-weight:600">Time Zone : </span><span style="font-size: .9rem; font-weight:400">Local Host</span></div>
                                            <div><span style="font-size: 1rem; font-weight:600">Country : </span><span style="font-size: .9rem; font-weight:400">Local Host</span></div>
                                            <div><span style="font-size: 1rem; font-weight:600">Region : </span><span style="font-size: .9rem; font-weight:400">Local Host</span></div>
                                            <div><span style="font-size: 1rem; font-weight:600">City : </span><span style="font-size: .9rem; font-weight:400">Local Host</span></div>
                                            <div><span style="font-size: 1rem; font-weight:600">Ip address : </span><span style="font-size: .9rem; font-weight:400">127.0.0.1</span></div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--success message -->
            <?php
            if (isset($this->error) || isset($this->pwerror)) { ?>

                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Unsuccessfull!</h2>
                        </div>
                        <form class="formDelete">
                            <div>
                                <label> <span id="answer2"></span> <?php if (isset($this->error)) {
                                                                        echo  "please fill required field or enter valid details";
                                                                    } ?></label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>

            <?php
            }; ?>
            <!-- success popup -->
            <?php
            if (isset($this->success)) { ?>

                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Edit Success!</h2>
                        </div>
                        <form class="formDelete">
                            <div>
                                <label> <span id="answer2"></span>Profile updated
                                </label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            <?php
            }; ?>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>