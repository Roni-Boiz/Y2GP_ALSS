<?php
include_once 'sidenav.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap');

    button {
        padding: 16px 24px;
        min-width: 8rem;
        font-size: 1.25rem;
        text-transform: uppercase;
        border: none;
        outline: none;
        border-radius: 20px;
        background-image: linear-gradient(to right, #605C73, #110B2E);
        /*#ff3c7d, #ff7637*/
        color: #ffffff;
        cursor: pointer;
        transition: transform 0.25s;
        margin-left: 10px;
    }

    #answer {
        margin-top: 1rem;
        font-size: 1.2rem;
    }

    button:hover {
        background-image: linear-gradient(to right, #201C32, #1B1536);
        transform: translate(-0.25rem);
    }
</style>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span> Employees</h1>
        </div>

        <div id="hb" class="hawlockbody">
            <div id="employeeCard" style="grid-column:1/span 3">
                <div class="staffDetails">
                    <h4>Employee Summary</h4>
                    <div class="card" id="employeeSummary">
                        <div>
                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user"></i></span>
                                    <h3>Manager</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    8
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-users"></i></span>
                                    <h3>Reseptionist</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    3
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>

                                    <h3>Trainer</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    4
                                </div>
                            </div>
                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user"></i></span>
                                    <h3>Treaters</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    4
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-users"></i></span>
                                    <h3>P. Officers</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    5
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>

                                    <h3>Other</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    30
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="staffPlotDetaills card">
                    <div class="chartContainer">
                        <canvas id="employeeChart">
                        </canvas>
                    </div>

                    <div class="chartContainer" style="height: 360px; width: 360px;">
                        <canvas id="employeePercentageChart">
                        </canvas>
                    </div>
                </div>

                <div class="empsearch">
                    <input type="text" name="search" placeholder="Search..">
                    <span onclick="openModel('model')" id="model-btn" class="addBtn"><i class="fas fa-user-plus"></i></span>
                    <div>
                        <span style="display: inline-block;"> Manager <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Reseptionist <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Trainer <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> Treater <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> P. Officer <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Other <i class="fa fa-square" style="color: #AA9150;"></i></span>    
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

                    <form action="addEmployee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="emptype" class="input-field" placeholder="New Announcement" required>
                                <option value="">Select Employee Type...</option>
                                <option value="manager">Manager</option>
                                <option value="receptionist">Receptionist</option>
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

                        <input style="grid-column: 1/span 2;" type="submit" name="submit" value="Submit">
                    </form>
                    <!-- <div id="btn-grp" style="grid-column: 1;">
                        <button id="yes-btn">Yes</button>
                        <button id="no-btn">No</button>
                    </div> -->
                </div>

            </div>

            <section class="wrapper">
                <main class="row title">
                    <ul>
                        <li>Employee ID</li>
                        <li>Full Name</li>
                        <li>Contact Number</li>
                        <li>Email</li>
                        <li>Start Date</li>
                    </ul>
                </main>
                <!-- manager -->
                <?php
                if ($this->managers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->managers->fetch_assoc()) {
                    ?>
                        <article class="row mlb">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
                <!-- receptionist -->
                <?php
                if ($this->receptionists->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->receptionists->fetch_assoc()) {
                    ?>
                        <article class="row nhl">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
                <!-- parking officer -->
                <?php
                if ($this->parkingOfficers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->parkingOfficers->fetch_assoc()) {
                    ?>
                        <article class="row pga">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
                <!--trainer -->
                <?php
                if ($this->trainers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->trainers->fetch_assoc()) {
                    ?>
                        <article class="row mlb">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
                <!-- Techinition -->
                <?php
                if ($this->technicians->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->technicians->fetch_assoc()) {
                    ?>
                        <article class="row nfl">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
                <!-- Treater -->
                <?php
                if ($this->treaters->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->treaters->fetch_assoc()) {
                    ?>
                        <article class="row nhl">
                            <ul>
                                <li><a href="#"><?php echo $row["employee_id"] ?></a><span class="small">(update)</span></li>
                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                <li><?php echo $row["contact_no"] ?></li>
                                <li><?php echo $row["email"] ?></li>
                                <li><?php echo $row["start_date"] ?></li>
                                <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
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
            </section>

        </div> <!-- .hawlockbody div closed here -->
    </div>

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
                        // position: 'center',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Employability Rate',
                        fontSize: 25
                    },
                },
            },
        });

        let chart2 = document.getElementById('employeePercentageChart').getContext('2d');
        let massChart2 = new Chart(chart2, {
            type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
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
                        display: true,
                        // position: 'center',
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

        // $(document).ready(function() {
        //     $.ajax({
        //         url: "employeeView",
        //         type: "GET",
        //         success: function(data) {
        //             var type = [];
        //             var count = [];
        //             var date = [];

        //             for (var i in data) {
        //                 type.push("Type " + data[i].type);
        //                 count.push(data[i].count);
        //                 date.push(data[i].start_date);
        //             }

        //             var chartdata = {
        //                 labels: type,
        //                 datasets: [
        //                     {
        //                         lable: "Employee",
        //                         fill: false,
        //                         backgroundColor: '#423D59',
        //                         pointHoverBackgroundColor: "rgba(32,343,545,23)",
        //                         pointHoverBorderColor: "rgba(232,21,21,434)",
        //                         data: count
        //                     },
        //                     {
        //                         lable: "Employee",
        //                         fill: false,
        //                         backgroundColor: '#423D59',
        //                         pointHoverBackgroundColor: "rgba(32,343,545,23)",
        //                         pointHoverBorderColor: "rgba(232,21,21,434)",
        //                         data: date
        //                     }
        //                 ]
        //             };
        //             var ctx = $("#employeeChart");
        //             var LineGraph = new Chart(ctx, {
        //                 type:'line',
        //                 data: chartdata
        //             });
        //         },
        //         error: function(data) {

        //         }
        //     });
        // });
    </script>
</body>

</html>