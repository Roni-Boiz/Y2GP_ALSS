<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="homeCard" style="grid-column:1/span 3">
                <div class="leftPanel">
                    <div id="upactivities">
                        <h3>Upcomming Activities and Events</h3>
                        <!-- Upcomming Activities -->
                        <?php
                        if ($this->upcommingReq->num_rows || $this->upcommingHallRes->num_rows) {
                        ?>
                            <!-- Reservations  -->
                            <!-- hall -->
                            <?php
                            if ($this->upcommingHallRes->num_rows > 0) {
                            ?>
                                <h4>Reservations</h4>
                                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                                    <?php
                                    while ($row = $this->upcommingHallRes->fetch_assoc()) {
                                    ?>
                                        <div style="display: flex; flex-direction: row; width: 370px;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="detail request">
                                                        <img src="../../uploads/profile/resident/<?= $row["profile_pic"] ?>" alt="profile picture" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                                        <div class="detail-info request-info">
                                                            <div>
                                                                <h4><?php echo $row["fname"] . " " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small> </h4>
                                                            </div>
                                                            <div>
                                                                <h4>Hall Reservation <small>(<?php echo date('Y-m-d H:i', strtotime($row["reserved_time"])) ?>)</small></h4>
                                                                <h5>On : <?php echo  date('D, F d, Y', strtotime($row["date"])) ?> </h5>
                                                                <h5>From : <?php echo date('h:i A', strtotime($row["start_time"])) . " - " . date('h:i A', strtotime($row["end_time"])) ?> </h5>
                                                            </div>
                                                            <div>
                                                                <h4>Type : <?php echo $row["type"] ?></h4>
                                                                <h5>No. of Members : <?php echo $row["no_of_members"] ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- requests -->
                            <?php
                            if ($this->upcommingReq->num_rows > 0) {
                            ?>
                                <h4>Requests</h4>
                                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                                    <?php
                                    while ($row = $this->upcommingReq->fetch_assoc()) {
                                    ?>
                                        <div style="display: flex; flex-direction: row; width: 370px">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="detail request">
                                                        <img src="../../uploads/profile/resident/<?= $row["profile_pic"] ?>" alt="profile picture" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                                        <div class="detail-info request-info">
                                                            <div>
                                                                <h4><?php echo $row["fname"] . " " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small> </h4>
                                                            </div>
                                                            <div>
                                                                <h4>Technical Request <small>(<?php echo date('Y-m-d H:i', strtotime($row["request_date"])) ?>)</small></h4>
                                                                <h5>On : <?php echo  date('D, F d, Y', strtotime($row["preferred_date"])) ?> <small><?php echo date('h:i A', strtotime($row["preferred_time"])) ?></small></h5>
                                                            </div>
                                                            <div>
                                                                <h4>Category : <?php echo $row["category"] ?></h4>
                                                                <h5>Description : <?php echo $row["description"] ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <div class="card">
                                <div style="font-size: small;color: #545d7a;">Currently you do not have any upcomming activities</div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>

                <div class="rightPanel">
                    <div class="myDoList calender" style="margin-bottom: 25px;">
                        <div class="head">
                            <h3>Calander</h3>
                        </div>
                        <div style="text-align: center; font-size: 150px;">
                            <i style="padding: 10px;" class="fa fa-calendar-plus"></i>
                        </div>
                    </div>

                    <div class="myDoList">
                        <div>
                            <div class="head">
                                <h3>To Do List</h3>
                            </div>
                            <div class="doListAdd">
                                <input type="text" id="myInput" placeholder="Title...">
                                <span onclick="newElement()" class="addBtn"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div>
                            <ul id="myUL" onload="myDoList()">
                                <li>Update Services</li>
                                <li class="checked">Make Announcement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->

    <script>
        //  My do list Function
        // Create a "close" button and append it to each list item
        var myDoList = document.getElementById("myUL");
        var myNodelist = myDoList.getElementsByTagName("LI");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }

        // Add a "checked" symbol when clicking on a list item
        var list = document.getElementById('myUL');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
            }
        }, false);

        // Create a new list item when clicking on the "Add" button
        function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var t = document.createTextNode(inputValue);
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                document.getElementById("myUL").appendChild(li);
            }
            document.getElementById("myInput").value = "";

            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            li.appendChild(span);

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>