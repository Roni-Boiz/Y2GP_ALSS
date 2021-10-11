<?php
include_once 'sidenav.php';
?>
<style>
    

    .nfl a,
    .mlb a,
    .nhl a,
    .pga a {
        text-decoration: none;
        transition: color 0.2s ease-out;
    }

    .nfl a {
        color: #4fc0d2;
    }

    .nfl a:hover {
        color: #268695;
    }

    .mlb a {
        color: #52d29a;
    }

    .mlb a:hover {
        color: #279766;
    }

    .nhl a {
        color: rgba(231, 196, 104, 0.7);
    }

    .nhl a:hover {
        color: rgba(201, 154, 32, 0.7);
    }

    .pga a {
        color: #eb7655;
    }

    .pga a:hover {
        color: #c33d17;
    }

    /* wrapper */
    .wrapper {
        width: 100%;
        /* max-width: 1000px; */
        margin: 20px auto 20px auto;
        padding: 0;
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        overflow: hidden;
        grid-column: 1/ span 3;
        background: rgba(0, 0, 0, 0.9);
        box-sizing: unset;
    }

    /* lists */
    .row ul {
        margin: 0;
        padding: 0;
    }

    .row ul li {
        margin: 0;
        font-size: 14px;
        font-weight: normal;
        list-style: none;
        display: inline-block;
        width: 20%;
        box-sizing: border-box;
    }

    @media only screen and (max-width: 700px) and (min-width: 500px) {
        .row ul li {
            font-size: 14.5px;
        }
    }

    @media only screen and (max-width: 499px) {
        .row ul li {
            font-size: 15px;
        }
    }

    .title ul li {
        padding: 15px 13px;
    }

    .row ul li {
        padding: 3px 10px;
    }

    /* rows */
    .row {
        padding: 20px 0;
        height: 30px;
        font-size: 0;
        position: relative;
        overflow: hidden;
        transition: all 0.2s ease-out;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: unset;
    }

    .row:hover {
        background-color: rgba(26, 26, 26, 0.9);
        height: 80px;
    }

    @media only screen and (max-width: 900px) and (min-width: 700px) {
        .row:hover {
            height: 100px;
        }
    }

    @media only screen and (max-width: 700px) and (min-width: 500px) {
        .row:hover {
            height: 110px;
        }
    }

    @media only screen and (max-width: 499px) {
        .row:hover {
            height: 120px;
        }
    }

    .title {
        padding: 25px 0 5px 0;
        height: 45px;
        font-size: 0;
        background-color: rgba(255, 255, 255, 0.1);
        border-left: 3px solid rgba(255, 255, 255, 0.1);
        box-sizing: unset;
    }

    .title:hover {
        height: 45px;
        background-color: rgba(255, 255, 255, 0.1);
        border-left: 3px solid rgba(255, 255, 255, 0.1);
    }

    @media only screen and (max-width: 767px) {
        .title-hide {
            display: none;
        }
    }

    .nfl {
        border-left: 3px solid #1c616c;
    }

    .nfl:hover {
        border-left: 3px solid #4fc0d2;
    }

    .mlb {
        border-left: 3px solid #1d6e4b;
    }

    .mlb:hover {
        border-left: 3px solid #52d29a;
    }

    .nhl {
        border-left: 3px solid rgba(157, 121, 25, 0.7);
    }

    .nhl:hover {
        border-left: 3px solid rgba(231, 196, 104, 0.7);
    }

    .pga {
        border-left: 3px solid #952f12;
    }

    .pga:hover {
        border-left: 3px solid #eb7655;
    }

    /* row one - fadeIn */
    .row-fadeIn-wrapper {
        opacity: 0;
        font-size: 0;
        height: 0;
        overflow: hidden;
        position: relative;
        transition: all 0.2s ease-out;
        -webkit-animation: fadeIn 0.4s ease-out 2s 1 alternate;
        animation: fadeIn 0.4s ease-out 2s 1 alternate;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

    .row-fadeIn-wrapper:hover {
        height: 35px;
    }

    @media only screen and (max-width: 767px) {
        .row-fadeIn-wrapper:hover {
            height: 55px;
        }
    }

    @media only screen and (max-width: 359px) {
        .row-fadeIn-wrapper:hover {
            height: 75px;
        }
    }

    .fadeIn {
        padding: 20px 0;
        font-size: 0;
        transition: all 0.2s ease-out;
        width: 100%;
    }

    .fadeIn:hover {
        background-color: rgba(26, 26, 26, 0.9);
    }

    /* row two - fadeOut */
    .row-fadeOut-wrapper {
        font-size: 0;
        overflow: hidden;
        position: relative;
        transition: all 0.2s ease-out;
        -webkit-animation: fadeOut 0.4s ease-out 8s 1 alternate;
        animation: fadeOut 0.4s ease-out 8s 1 alternate;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        opacity: 1;
        height: 65px;
    }

    .row-fadeOut-wrapper:hover {
        height: 100px;
    }

    /* update content */
    .update-row {
        -webkit-animation: update 0.5s ease-out 12s 1 alternate;
        animation: update 0.5s ease-out 12s 1 alternate;
    }

    .update1 {
        position: absolute;
        top: 25px;
        display: inline-block;
        opacity: 1;
        -webkit-animation: update1 1s ease-out 12s 1 alternate;
        animation: update1 1s ease-out 12s 1 alternate;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

    .update2 {
        position: absolute;
        top: 25px;
        display: inline-block;
        opacity: 0;
        -webkit-animation: update2 4s ease-out 13s 1 alternate;
        animation: update2 4s ease-out 13s 1 alternate;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

    /* more content */
    ul.more-content li {
        position: relative;
        top: 22px;
        font-size: 13px;
        margin: 0;
        padding: 10px 13px;
        display: block;
        height: 50px;
        width: 100%;
        color: rgba(128, 128, 128, 0.9);
    }

    @media only screen and (max-width: 767px) {
        ul.more-content li {
            font-size: 12px;
        }
    }

    /* small content */
    .small {
        color: rgba(102, 102, 102, 0.9);
        font-size: 10px;
        padding: 0 10px;
        margin: 0;
    }

    @media only screen and (max-width: 767px) {
        .small {
            display: none;
        }
    }

    /* keyframe animations */
    @-webkit-keyframes fadeIn {
        from {
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            padding: 0;
        }

        to {
            background: rgba(51, 51, 51, 0.1);
            opacity: 1;
            padding: 0 0 65px 0;
        }
    }

    @keyframes fadeIn {
        from {
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            padding: 0;
        }

        to {
            background: rgba(51, 51, 51, 0.1);
            opacity: 1;
            padding: 0 0 65px 0;
        }
    }

    @-webkit-keyframes fadeOut {
        from {
            background: rgba(51, 51, 51, 0.1);
            opacity: 1;
            height: 65px;
        }

        to {
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            height: 0;
        }
    }

    @keyframes fadeOut {
        from {
            background: rgba(51, 51, 51, 0.1);
            opacity: 1;
            height: 65px;
        }

        to {
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            height: 0;
        }
    }

    @-webkit-keyframes update {
        0% {
            background: rgba(51, 51, 51, 0.1);
        }

        50% {
            background: rgba(255, 255, 255, 0.1);
        }

        100% {
            background: rgba(51, 51, 51, 0.1);
        }
    }

    @keyframes update {
        0% {
            background: rgba(51, 51, 51, 0.1);
        }

        50% {
            background: rgba(255, 255, 255, 0.1);
        }

        100% {
            background: rgba(51, 51, 51, 0.1);
        }
    }

    @-webkit-keyframes update1 {
        0% {
            opacity: 0;
        }

        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @keyframes update1 {
        0% {
            opacity: 0;
        }

        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @-webkit-keyframes update2 {
        0% {
            opacity: 0;
            color: rgba(255, 255, 255, 0.9);
        }

        20% {
            opacity: 1;
            color: #52d29a;
        }

        100% {
            opacity: 1;
            color: rgba(255, 255, 255, 0.9);
        }
    }

    @keyframes update2 {
        0% {
            opacity: 0;
            color: rgba(255, 255, 255, 0.9);
        }

        20% {
            opacity: 1;
            color: #52d29a;
        }

        100% {
            opacity: 1;
            color: rgba(255, 255, 255, 0.9);
        }
    }

    
</style>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span> Users</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom" onload="myFunction();">
            <div class="card" id="userCard" style="grid-column:1/span 3">
                <div class="leftPanel">
                    <div>
                        <h4>User Summary</h4>
                        <div class="card" id="usersummary">

                            <div class="resident">
                                <div>
                                    <span><i class="fas fa-user"></i></span>
                                    <h3>Residents</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    100
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-users"></i></span>
                                    <h3>Employees</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    200
                                </div>
                            </div>

                            <div class="admin">
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
                                    <article class="row pga" onload="addClassName('<?= $row['type'] ?>')">
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
                                    <article class="row nhl" onload="addClassName('<?= $row['type'] ?>')">
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
                                    <article class="row mlb" onload="addClassName('<?= $row['type'] ?>')">
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

                            <form action="addEmployee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
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