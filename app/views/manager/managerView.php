<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card" id="homeCard" style="grid-column:1/span 3">
                <div class="leftPanel">
                    <div id="upactivities">
                        <h4>Upcomming Activities and Events</h4>
                        <div class="card">
                            <div style="font-size: small;color: #545d7a;">Currently you do not have any upcomming activities</div>
                        </div>
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
</body>
</html>