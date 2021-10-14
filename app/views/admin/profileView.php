<?php
include_once('sidenav.php');
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand">
        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div class="hawlockbody" id="hb">
            <?php
            $row = $this->profileDetails->fetch_assoc()
            ?>

            <div class="card" id="profileCard" style="grid-column:1/span2;margin:auto">
                <div class="bio">
                    <div class="profile-pic">
                        <img id="photo" src="../../uploads/profile/employee/<?= $_SESSION['profilePic'] ?>" alt="profile picture" onerror="this.onerror=null; this.src='../../public/img/profile.png'">
                        <input type="file" id="file" class="profilePto" name="file">
                        <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Change Photo</label>
                    </div>

                    <h4> <?php echo $row["user_name"]; ?></h4>

                    <form action="editProfile" id="profileView" method="post">
                        <label for="fname">Name</label><br>
                        <input type="text" id="name" name="name" class="input-field" value=<?php echo $row["name"] ?> required><br>

                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email" class="input-field" value=<?php echo $row["email"] ?>><br>

                        <input type="submit" value="Save">
                    </form>

                    <input type="submit" id="editprofile" value="Edit Profile" onclick="setVisibility1('profileView');">
                </div>
                <div class="data">

                    <div>
                        <h4>Overview</h4>
                        <div class="card" id="overview">
                            <div>
                                <label>Full Name : </label>
                                <label><?php echo $row["name"] ?></label>
                            </div>
                            <hr>
                            <div>
                                <label>Email : </label>
                                <label><?php echo $row["email"] ?></label>
                            </div>
                            <div style="font-size: small;color: #545d7a;">You currently do not have any ongoing activities</div>
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
                            <form action="changePassword" id="passwordView" method="post">
                                <label for="fname">Old Password</label>
                                <input type="password" id="opw" name="opw" class="input-field" placeholder="old password"><br>
                                <span class="error_form" id="old_password_error_message"></span><br>

                                <label for="lname">New Password</label>
                                <input type="password" id="npw" name="npw" class="input-field" placeholder="new password"><br>
                                <span class="error_form" id="new_password_error_message"></span><br>

                                <label for="fname">Re-New Password</label>
                                <input type="password" id="rnpw" name="rnpw" class="input-field" placeholder="new password again"><br>
                                <span class="error_form" id="renew_password_error_message"></span><br>

                                <input type="submit" value="Save">
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
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>