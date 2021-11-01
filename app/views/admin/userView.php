<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock City Users</h1>
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
                        <input type="text" name="search" placeholder="Search.." id="searchUser" class="mySearch">
                        <div style="float: right;">
                            <span style="display: inline-block;"> Resident <i class="fa fa-square" style="color: #EB7655;"></i></span>
                            <span style="display: inline-block;"> Employee <i class="fa fa-square" style="color: #52D29A;"></i></span>
                            <span style="display: inline-block;"> Admin <i class="fa fa-square" style="color: #AA9150;"></i></span>
                            <!-- <span onclick="openModel('model','addBtn')" class="addBtn" id="addUser" title="Add User"><i class="fas fa-user-plus"></i></span> -->
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
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><a href="#" onclick=""><?php echo 'UID' . sprintf("%04d", $row["user_id"]) ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
                                            </ul>
                                            <!-- <ul class="more-content">
                                            <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                            </ul> -->
                                        </article>
                                    </span>
                                <?php

                                } else if ($row["type"] == 'admin') {
                                ?>
                                    <span id="searchrow">
                                        <article class="row nhl">
                                            <ul>
                                                <li><a href="#"><?php echo 'UID' . sprintf("%04d", $row["user_id"]) ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
                                            </ul>
                                            <!-- <ul class="more-content">
                                                <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                            </ul> -->
                                        </article>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><a href="#"><?php echo 'UID' . sprintf("%04d", $row["user_id"]) ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
                                            </ul>
                                            <!-- <ul class="more-content">
                                                <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                            </ul> -->
                                        </article>
                                    </span>
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

                            <a href="javascript:void(0)" class="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <h1>Create User Account<i class="fa fa-user"></i></i></h1>
                            </div>

                            <form action="#" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                                <div id="col1">
                                    <label for="type">Enter Employee ID</label><br>
                                    <input type="text" id="eid" name="eid" class="input-field" placeholder="Employee ID" required autofocus>
                                </div>

                                <div class="profile-pic" id="col2">
                                    <img src="../../public/img/blank-profile.png" id="photo">
                                    <input type="file" id="file" name="file">
                                    <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Choose Photo</label>
                                </div>

                                <div id="col1">
                                    <label for="fname">First Name</label><br>
                                    <input type="text" id="fname" name="fname" class="input-field" placeholder="John" readonly>
                                </div>

                                <div id="col2">
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" class="input-field" placeholder="Smith" readonly>
                                </div>

                                <div id="col1">
                                    <label for="email">Email Address</label><br>
                                    <input type="email" id="email" name="email" class="input-field" placeholder="example@email.com" readonly>
                                </div>

                                <div id="col2">
                                    <label for="cno">Contact Number</label><br>
                                    <input type="text" id="cno" name="cno" class="input-field" placeholder="071-1234567" readonly>
                                </div>

                                <input style="grid-column: 1/span 2;" type="submit" name="Submit" value="Create">
                            </form>
                        </div>
                    </div>

                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="deleteModel">
                            <a href="javascript:void(0)" class="closebtn">&times;</a>
                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Are You Sure ?</h2>
                            </div>
                            <form action="#" class="formDelete" method="GET">
                                <div>
                                    <label> Delete User With User ID </label>
                                    <span><?= "UID1234" ?></span>
                                </div>
                                <div>
                                    <input class="btnRed" type="submit" name="submit" value="Delete">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="rightPanel">
                    <div class="holdAccount adminHoldAccount">
                        <div class="head">
                            <h3>Hold Accounts</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user3.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Ronila Sanjula</h5>
                                    <small>RA0001</small>
                                </div>
                                <span class="acceptBtn"><i class="fas fa-user-check"></i></span>
                            </div>
                            <div class="moreContent">
                                <span><h5>Apartment No : AP001</h5></span>
                                <span><h5>NIC : 882323343v</h5></span>
                                <span><h5>Email : ronila@gmail.com</h5></span>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user1.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Chatura Mano</h5>
                                    <small>RA0002</small>
                                </div>
                                <span class="acceptBtn"><i class="fas fa-user-check"></i></span>
                            </div>

                            <div class="moreContent">
                                <span><h5>Apartment No : AP002</h5></span>
                                <span><h5>NIC : 852323343v</h5></span>
                                <span><h5>Email : chatura@gmail.com</h5></span>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="activeUsers adminActiveUsers">
                        <div class="head">
                            <h3>Current Online Users</h3>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user4.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Ronila Sanjula</h5>
                                    <small>AD0001</small>
                                </div>
                                <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                            </div>

                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user1.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Nishad Yashintha</h5>
                                    <small>RE0002</small>
                                </div>
                                <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user3.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Chatura Manohara</h5>
                                    <small>RA0003</small>
                                </div>
                                <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                            </div>
                        </div>
                        <div class="detail">
                            <div>
                                <img src="../../public/img/user2.jpg" alt="user" />
                                <div class="detail-info">
                                    <h5>Nipuna Dasanayaka</h5>
                                    <small>LA0004</small>
                                </div>
                                <span class="acceptBtn"><i class="fa fa-circle"></i></span>
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