<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span> Users</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom" onload="myFunction();">
            <div class="card" id="userCard">
                <div class="leftPanel">
                    <div>
                        <h4>User Summary</h4>
                        <div class="card" id="usersummary">

                            <div class="user">
                                <div>
                                    <span><i class="fas fa-user"></i></span>
                                    <h3>Residents</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    100
                                </div>
                            </div>

                            <div class="user">
                                <div>
                                    <span><i class="fas fa-users"></i></span>
                                    <h3>Employees</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    200
                                </div>
                            </div>

                            <div class="user">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>

                                    <h3>Admin</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    3
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="usersearch">
                        <input type="text" name="search" placeholder="Search..">
                        <div style="float: right;">
                            <span style="display: inline-block;"> Resident <i class="fa fa-square" style="color: #EB7655;"></i></span>
                            <span style="display: inline-block;"> Employee <i class="fa fa-square" style="color: #52D29A;"></i></span>
                            <span style="display: inline-block;"> Admin <i class="fa fa-square" style="color: #AA9150;"></i></span>
                            <span onclick="openModel('model')" id="model-btn" class="addBtn"><i class="fas fa-user-plus"></i></span>
                        </div>
                    </div>
                    <section class="wrapper">
                        <main class="row title">
                            <ul>
                                <li>User ID</li>
                                <li>User Name</li>
                                <li>Type</li>
                                <li>Hold</li>
                                <li>Remove User</li>
                            </ul>
                        </main>
                        <?php
                        if ($this->users->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->users->fetch_assoc()) {
                                if ($row["type"] == 'resident') {
                            ?>
                                    <article class="row pga">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php

                                } else if ($row["type"] == 'admin') {
                                ?>
                                    <article class="row nhl">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php
                                } else {
                                ?>
                                    <article class="row mlb">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php
                                }
                                ?>

                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </section>

                    <div class="divPopupModel">

                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model">

                            <a href="javascript:void(0)" id="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <h1>User Account<i class="fa fa-user"></i></i></h1>
                            </div>

                            <form action="#" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                                <div id="col1">
                                    <label for="type">User Name</label><br>
                                    <select id="emptype" name="emptype" class="input-field" placeholder="New Announcement" required>
                                        <option value="">Select Employee Type...</option>
                                        <option value="manager">Manager</option>
                                        <option value="reseptionist">Reseptionist</option>
                                        <option value="parking_officer">Parking Officer</option>
                                        <option value="trainer">Trainer</option>
                                        <option value="treater">Treater</option>
                                        <option value="technician">Technician</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="profile-pic" id="col2">
                                    <img src="../../public/img/blank-profile.png" id="photo">
                                    <input type="file" id="file" name="file">
                                    <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Choose Photo</label>
                                </div>

                                <div id="col1">
                                    <label for="fname">First Name</label><br>
                                    <input type="text" id="fname" name="fname" class="input-field" placeholder="John" required>
                                </div>

                                <div id="col2">
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" class="input-field" placeholder="Smith" required>
                                </div>

                                <div id="col1">
                                    <label for="email">Email Address</label><br>
                                    <input type="email" id="email" name="email" class="input-field" placeholder="example@email.com" required>
                                </div>

                                <div id="col2">
                                    <label for="cno">Contact Number</label><br>
                                    <input type="text" id="cno" name="cno" class="input-field" placeholder="071-1234567" required>
                                </div>

                                <input style="grid-column: 1/span 2;" type="submit" name="Submit" value="submit">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="rightPanel">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Hold Accounts</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5>Ronila Sanjula</h5>
                                    <small>AD001</small>
                                </div>
                                <span class="acceptBtn"><i class="fas fa-user-check"></i></span>
                            </div>
                            <div class="moreContent">More Details About me</div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5>Chatura Mano</h5>
                                    <small>RA001</small>
                                </div>
                                <span class="acceptBtn"><i class="fas fa-user-check"></i></span>
                            </div>

                            <div class="moreContent">More Details About me</div>
                        </div>

                    </div>
                    <br>
                    <div class="activeUsers">
                        <div class="head">
                            <h3>Active Users</h3>
                        </div>
                        <div class="detail">
                            <img src="../../public/img/user.png" alt="user" />
                            <div class="detail-info">
                                <h5>Ronila Sanjula</h5>
                                <small>AD001</small>
                            </div>
                            <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>


</html>