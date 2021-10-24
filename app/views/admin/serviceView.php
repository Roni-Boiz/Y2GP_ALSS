<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span> Services</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div id="serviceCard" style="grid-column:1/span 3">
                <div class="serviceSummary card">
                    <h2>Services Summary</h2>
                    <div class="chartContainer1">
                        <div>
                            <h3>No of Reservations</h3>
                            <input type="date" name="date" id="" style="padding: 5px;">
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
                    <input type="text" name="search" placeholder="Search.." class="mySearch">
                    <span onclick="openModel('model','addBtn')" class="addBtn"><i class="fa fa-plus"></i></span>
                    <div>
                        <span style="display: inline-block;"> Hall <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Treatment <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> Fitness <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <!-- <span style="display: inline-block;"> Technical <i class="fa fa-square" style="color: #4fc0d2;"></i></span>
                        <span style="display: inline-block;"> Laundry <i class="fa fa-square" style="color: #d91393;"></i></span> -->
                        <span style="display: inline-block;"> Backup <i class="fa fa-square" style="color: #1ccf52;"></i></span>
                    </div>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center;">
                        <h1>New Service<i class="fa fa-user"></i></i></h1>
                    </div>
                    <form action="#" class="formAddEmployee" method="POST">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="servicetype" class="input-field" required>
                                <option value="">Select Service Type...</option>
                                <option value="hall">Hall</option>
                                <option value="treatment">Treatment</option>
                                <option value="fitness">Fitness</option>
                                <!-- <option value="technnical">Technical</option>
                                <option value="laundry">Laundry</option> -->
                                <option value="backup">BackUp</option>
                            </select>
                        </div>

                        <div id="col2">
                            <label for="servicename">Service Name</label><br>
                            <input type="text" id="servicename" name="servicename" class="input-field" placeholder="Function Hall" required>
                        </div>

                        <div id="col1">
                            <label for="fee">Fee (Rs.)</label><br>
                            <input type="text" id="fee" name="fee" class="input-field" placeholder="1000.00" required>
                        </div>

                        <div id="col2">
                            <label for="canclefee">Cancellation Fee (Rs.)</label><br>
                            <input type="text" id="canclefee" name="canclefee" class="input-field" placeholder="500.00" required>
                        </div>

                        <input style="grid-column: 1/span 2;" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h3>Update Service Rate</h3>
                    </div>
                    <form action="#" class="formEdit" method="GET">
                        <div>
                            <label>Service ID : </label>
                            <span><?= "BA1234" ?></span>
                        </div>
                        <div>
                            <div>
                                <label>Upcoming Fee</label><br>
                                <input type="text" name="newfee" class="input-field" placeholder="1500.00" required>
                            </div>
                            <div>
                                <label>Upcoming Cancellation Fee</label><br>
                                <input type="text" name="newcancelfee" class="input-field" placeholder="500.00" required>
                            </div>
                            <div>
                                <label>Effect Date</label><br>
                                <input type="date" name="effectdate" class="input-field" min="<?= date("Y-m-d", strtotime("+2 week")) ?>" required>
                            </div>
                        </div>
                        <div>
                            <input class="btnPurple" type="submit" name="submit" value="Update">
                        </div>
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
                            <span id="searchrow">
                                <article class="row mlb">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php

                        } else if ($row["type"] == 'treatment') {
                        ?>
                            <span id="searchrow">
                                <article class="row nhl">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php
                        } else if ($row["type"] == 'fitness') {
                        ?>
                            <span id="searchrow">
                                <article class="row pga">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php
                        } else if ($row["type"] == 'tecnical') {
                        ?>
                            <span id="searchrow">
                                <article class="row nfl">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php
                        } else if ($row["type"] == 'laundry') {
                        ?>
                            <span id="searchrow">
                                <article class="row mba">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php
                        } else if ($row["type"] == 'backup') {
                        ?>
                            <span id="searchrow">
                                <article class="row bfg">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
                                </article>
                            </span>
                        <?php
                        } else {
                        ?>
                            <span id="searchrow">
                                <article class="row">
                                    <ul>
                                        <li><a href="#"><?php echo $row["service_id"] ?></a><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li><span onclick="openModel('editModel','model-Btn2')" class="model-Btn2"><i class="fa fa-edit"></i></span></li>
                                    </ul>
                                    <ul class="more-content">
                                        <li>
                                            <span style="padding-right: 20px;">Service Type : <?php echo $row["type"] ?></span>
                                            <span style="padding-right: 20px;">New Fee : <?php echo number_format($row["new_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Next Cancellation Fee : <?php echo number_format($row["next_cancelation_fee"], 2) ?></span>
                                            <span style="padding-right: 20px;">Effect From : <?php echo $row["effect_date"] ?></span>
                                        </li>
                                    </ul>
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
        </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->

    <script>
        let chart1 = document.getElementById('employeeChart').getContext('2d');
        let massChart1 = new Chart(chart1, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Hall', 'Treatment', 'Fitness', 'Parking Slot', 'Technical', 'Laundry', 'Backup'],
                datasets: [{
                    label: 'Employee',
                    data: [
                        8, 10, 15, 5, 6, 10, 20
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
                labels: ['Hall', 'Treatment', 'Fitness', 'Parking Slot', 'Technical', 'Laundry', 'Backup'],
                datasets: [{
                        label: 'Fee/h',
                        data: [
                            1000, 1500, 500, 500, 800, 1000, 750
                        ],
                        // backgroundColor : '#423D59',
                        backgroundColor: [
                            'rgba(153,102,255,0.6)'
                        ],
                        borderWidth: 1,
                        borderColor: '#ae98db',
                        hoverBorderWidth: 1,
                        hoverBorderColor: '#003'
                    },
                    {
                        label: 'Cancle Fee',
                        data: [
                            100, 250, 100, 150, 100, 50, 0
                        ],
                        // backgroundColor : '#423D59',
                        backgroundColor: [
                            'rgb(187,35,22,0.6)'
                        ],
                        borderWidth: 1,
                        borderColor: '#a72d22d9',
                        hoverBorderWidth: 1,
                        hoverBorderColor: '#003'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 0,
                    }
                },
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
                        text: 'Service Rate',
                        fontSize: 25
                    },
                },
            },
        });
    </script>
</body>

</html>