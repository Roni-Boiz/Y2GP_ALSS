<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span> Services</h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div id="serviceCard" style="grid-column:1/span 3">
                <div class="serviceSummary card">
                    <h2>Services Summary</h2>
                    <div class="chartContainer1">
                        <div>
                            <h3>No of Reservations</h3>
                            <input type="date" name="date" id="">
                        </div>

                        <canvas id="employeeChart">
                        </canvas>
                    </div>

                    <div class="chartContainer2">
                        <div>
                            <h3>Service Rate</h3>
                            <h6>Fee / Cancle Fee</h6>
                        </div>
                        <canvas id="employeePercentageChart">
                        </canvas>
                    </div>
                </div>

                <div class="servicesearch">
                    <input type="text" name="search" placeholder="Search..">
                    <span onclick="openModel('model')" id="model-btn" class="addBtn"><i class="fa fa-plus"></i></span>
                    <div>
                        <span style="display: inline-block;"> Hall <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Treatment <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Fitness <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> Technical <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> Laundry <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Backup <i class="fa fa-square" style="color: #52D29A;"></i></span>
                    </div>
                </div>
            </div>


            <div class="divPopupModel">

                <!-- <button id="model-btn" onclick="openModel('model')">Add New</button>
                <p id="answer"></p> -->

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">

                    <a href="javascript:void(0)" id="closebtn">&times;</a>
                    <div style="text-align: center;">
                        <h1>New Employee<i class="fa fa-user"></i></i></h1>
                    </div>

                    <form action="#" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Type</label><br>
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

            <section class="wrapper">
                <main class="row title">
                    <ul>
                        <li>Service ID</li>
                        <li>Name</li>
                        <li>Fee</li>
                        <li>Cancel Fee</li>
                        <li>Update Service</li>
                    </ul>
                </main>
                <?php
                if ($this->services->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->services->fetch_assoc()) {
                        if ($row["type"] == 'hall') {
                    ?>
                            <article class="row pga">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php

                        } else if ($row["type"] == 'treatment') {
                        ?>
                            <article class="row nhl">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php
                        } else if ($row["type"] == 'fitness') {
                        ?>
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php
                        } else if ($row["type"] == 'tecnical') {
                        ?>
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php
                        } else if ($row["type"] == 'laundry') {
                        ?>
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php
                        } else if ($row["type"] == 'backup') {
                        ?>
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
                            </article>
                        <?php
                        } else {
                        ?>
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                    <li><?php echo $row["name"] ?></li>
                                    <li><?php echo $row["fee"] ?></li>
                                    <li><?php echo $row["cancelation_fee"] ?></li>
                                    <li><i onclick="openModel('model')" class="fas fa-edit"></i></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">New Fee : <?php echo $row["new_fee"] ?></span>
                                        <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo $row["next_cancelation_fee"] ?></span>
                                        <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                    </li>
                                </ul>
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
        </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->

    <script>
        let chart1 = document.getElementById('employeeChart').getContext('2d');
        let massChart1 = new Chart(chart1, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Manager', 'Reseptionist', 'Trainer', 'Parking Officers'],
                datasets: [{
                    label: 'Employee',
                    data: [
                        8, 3, 4, 5
                    ],
                    // backgroundColor : '#423D59',
                    backgroundColor: [
                        'rgba(153,102,255,0.6)'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 1,
                    hoverBorderColor: '#003'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                        position: 'center',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    title: {
                        display: false,
                        text: 'Employability Rate',
                        fontSize: 25
                    },
                },
            },
        });

        let chart2 = document.getElementById('employeePercentageChart').getContext('2d');
        let massChart2 = new Chart(chart2, {
            type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Manager', 'Reseptionist', 'Trainer', 'Parking Officers'],
                datasets: [{
                    label: 'Employee',
                    data: [
                        3, 4, 5, 6
                    ],
                    // backgroundColor : '#423D59',
                    backgroundColor: [
                        'rgba(153,102,255,0.6)'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 1,
                    hoverBorderColor: '#003'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    title: {
                        display: false,
                        text: 'Employability Rate',
                        fontSize: 25
                    },
                },
            },
        });
    </script>
</body>

</html>