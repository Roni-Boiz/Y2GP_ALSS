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
                        <h2>User Summary</h2>
                        <div class="card" id="usersummary">
                            <?php
                            $admins = 0;
                            $employees = 0;
                            $residents = 0;
                            if ($this->users->num_rows > 0) {
                                while ($row = $this->users->fetch_assoc()) {
                                    if ($row["type"] == 'resident') {
                                        $residents++;
                                    } elseif ($row["type"] == 'admin') {
                                        $admins++;
                                    } else {
                                        $employees++;
                                    }
                                }
                            }
                            ?>
                            <div class="user">
                                <div>
                                    <span><i class="fas fa-user"></i></span>
                                    <h3>Residents</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $residents ?>
                                </div>
                            </div>

                            <div class="user">
                                <div>
                                    <span><i class="fas fa-users"></i></span>
                                    <h3>Employees</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $employees ?>
                                </div>
                            </div>

                            <div class="user">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Admin</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $admins ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->users->data_seek(0); ?>
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
                                $userId = 'UID' . sprintf("%04d", $row["user_id"]);
                                if ($row["type"] == 'resident') {      
                            ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><a href="#" onclick=""><?php echo $userId ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li id="<?php echo $userId?>"><span onclick="openModel('deleteModel','model-Btn1', '<?=$userId?>')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
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
                                                <li><a href="#"><?php echo $userId ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li  id="<?=$userId?>"><span onclick="openModel('deleteModel','model-Btn1', '<?=$userId?>')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
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
                                                <li><a href="#"><?php echo $userId ?><span class="small">(update)</span></a></li>
                                                <li><?php echo $row["user_name"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <li><?php echo $row["hold"] ?></li>
                                                <li id="<?php echo $userId ?>"><span onclick="openModel('deleteModel','model-Btn1', '<?=$userId?>')" class="model-Btn1" title="Remove User"><i class="fas fa-trash-alt"></i></span></li>
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
                            <form action="" class="formDelete" onsubmit="deleteUser();return false;">
                                <div>
                                    <label> Delete User With User ID </label>
                                    <span id="answer"></span>
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
                            <h3>Locked Accounts</h3>
                        </div>
                        <?php
                        if ($this->lockedAccounts->num_rows > 0) {
                            while ($row = $this->lockedAccounts->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <img src="../../uploads/profile/resident/<?=$row["nic"]?>" alt="user"  onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                        <div class="detail-info">
                                            <h5><?=$row["name"]?></h5>
                                            <small><?=$row["user_name"]?></small>
                                        </div>
                                        <span class="acceptBtn" id="unlockId" title="Unlock Account" onclick="unlockAccount('<?=$row['user_name']?>')"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <div class="moreContent">
                                        <span>
                                            <h5>Apartment No : <?=$row["apartment_no"]?></h5>
                                        </span>
                                        <span>
                                            <h5>NIC : <?=$row["nic"]?></h5>
                                        </span>
                                        <span>
                                            <h5>Email : <?=$row["email"]?></h5>
                                        </span>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="detail" style="height: 50px;">
                                <div>
                                    <img src="../../public/img/user1.jpg" alt="user" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                    <div class="detail-info">
                                        <h5>All Accounts</h5>
                                        <small>Unlocked</small>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="activeUsers adminActiveUsers">
                        <div class="head">
                            <h3>Current Online Users</h3>
                        </div>
                        <?php
                        if ($this->activeUsers->num_rows > 0) {
                            $count = $this->activeUsers->num_rows;
                        ?>
                            <div>
                                <div style="text-align: center; font-weight: 600;">
                                    <?= $count ?> Users Online
                                </div>
                            </div>
                            <?php
                            while ($row = $this->activeUsers->fetch_assoc()) {
                            ?>
                                <?php
                                if ($row["type"] == 'resident') {
                                ?>
                                    <div class="detail">
                                        <div>
                                            <img src="../../uploads/profile/resident/<?= $row['profile_pic'] ?>" alt="user" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                            <div class="detail-info">
                                                <h5><?= $row['name'] ?></h5>
                                                <small><?= $row['user_name'] ?></small>
                                            </div>
                                            <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="detail">
                                        <div>
                                            <img src="../../uploads/profile/employee/<?= $row['profile_pic'] ?>" alt="user" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                            <div class="detail-info">
                                                <h5><?= $row['name'] ?></h5>
                                                <small><?= $row['user_name'] ?></small>
                                            </div>
                                            <span class="acceptBtn"><i class="fa fa-circle"></i></span>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            }
                        } else {
                            ?>
                            <div>
                                <div style="text-align: center; font-weight: 600;">
                                    0 Users Online
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> .expand div closed here

    <script>
        fetch_user_login_date();
        setInterval(function() {
            fetch_user_login_date();
        }, 3000);

        function fetch_user_login_date() {
            var action = "fetch_data";
            $.ajax({
                url: "user",
                method: "POST",
                data: {
                    action: action
                },
                success: function(data) {

                }
            });
        }
    </script>
</body>

</html>