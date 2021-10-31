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

        <div id="hb" class="hawlockbody animate-bottom">
            <div id="employeeCard" style="grid-column:1/span 3">
                <div class="staffDetails">
                    <h4>Employee Summary</h4>
                    <div class="card" id="employeeSummary">
                        <div>
                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Manager</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    8
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
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
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Treaters</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    4
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
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
                                    15
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="staffPlotDetaills card">
                    <div class="chartContainer">
                        <canvas id="employeeGrowthChart">
                        </canvas>
                    </div>

                    <div class="chartContainer">
                        <canvas id="employeePercentageChart">
                        </canvas>
                    </div>
                </div>

                <div class="empsearch">
                    <input type="text" name="search" placeholder="Search.." class="mySearch">
                    <span onclick="openModel('model','addBtn')" class="addBtn" title="Add Employee"><i class="fas fa-user-plus"></i></span>
                    <div>
                        <span style="display: inline-block;"> Manager <i class="fa fa-square" style="color: #52D29A;"></i></span>
                        <span style="display: inline-block;"> Receptionist <i class="fa fa-square" style="color: #AA9150;"></i></span>
                        <span style="display: inline-block;"> P. Officer <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Trainer <i class="fa fa-square" style="color: #4fc0d2;"></i></span>
                        <span style="display: inline-block;"> Treater <i class="fa fa-square" style="color: #d91393;"></i></span>
                        <span style="display: inline-block;"> Techinician <i class="fa fa-square" style="color: #1ccf52;"></i></span>
                        <!-- <span style="display: inline-block;"> Other <i class="fa fa-square" style="color: #AA9150;"></i></span> -->
                    </div>
                </div>
            </div>

            <div class="divPopupModel">

                <!-- <button id="model-btn" onclick="openModel('model')">Add New</button>
                <p id="answer"></p> -->

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">

                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center;">
                        <h1>New Employee<i class="fa fa-user"></i></i></h1>
                    </div>

                    <form action="addEmployee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="emptype" class="input-field" required>
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

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h3>Update Shift</h3>
                    </div>
                    <form action="#" class="formEdit" method="GET">
                        <div>
                            <label>Employee ID : </label>
                            <span><?= "EMP1234" ?></span>
                        </div>
                        <div>
                            <div>
                                <label>Week 01</label><br>
                                <select id="week1" name="week1" class="input-field" required>
                                    <option value="">Select Working Hour...</option>
                                    <option value="0">6AM - 12PM</option>
                                    <option value="1">12PM - 6PM</option>
                                    <option value="2">6PM - 12AM</option>
                                </select>
                            </div>
                            <div>
                                <label>Week 02</label><br>
                                <select id="week2" name="week2" class="input-field" required>
                                    <option value="">Select Working Hour...</option>
                                    <option value="0">6AM - 12PM</option>
                                    <option value="1">12PM - 6PM</option>
                                    <option value="2">6PM - 12AM</option>
                                </select>
                            </div>
                            <div>
                                <label>Week 03</label><br>
                                <select id="week3" name="week3" class="input-field" required>
                                    <option value="">Select Working Hour...</option>
                                    <option value="0">6AM - 12PM</option>
                                    <option value="1">12PM - 6PM</option>
                                    <option value="2">6PM - 12AM</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <input class="btnPurple" type="submit" name="submit" value="Update">
                        </div>
                    </form>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h3>Are You Sure ?</h3>
                    </div>
                    <form action="#" class="formDelete" method="GET">
                        <div>
                            <label> Delete Employee With EMP ID </label>
                            <span><?= "EMP1234" ?></span>
                        </div>
                        <div>
                            <input class="btnRed" type="submit" name="submit" value="Delete">
                        </div>

                    </form>
                </div>
            </div>

            <section class="wrapper">
                <main class="row title">
                    <ul>
                        <li>Employee ID</li>
                        <li>Full Name</li>
                        <li>Contact Number</li>
                        <li>Email</li>
                        <li>Actions</li>
                    </ul>
                </main>
                <!-- manager -->
                <?php
                if ($this->managers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->managers->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row mlb">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove Manager"><i class="fas fa-trash-alt"></i></span></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Manager" ?></span>
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
                <!-- receptionist -->
                <?php
                if ($this->receptionists->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->receptionists->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row nhl">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove Receptionist"><i class="fas fa-trash-alt"></i></span></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Receptionist" ?></span>
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
                <!-- parking officer -->
                <?php
                if ($this->parkingOfficers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->parkingOfficers->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row pga">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove P. Officer"><i class="fas fa-trash-alt"></i></span></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Parking Officer" ?></span>
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
                <!--trainer -->
                <?php
                if ($this->trainers->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->trainers->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row nfl">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li>
                                        <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove Trainer"><i class="fas fa-trash-alt"></i></span>
                                        &emsp;
                                        <span onclick="openModel('editModel','model-Btn2')" class="model-Btn2" title="Update Shift"><i class="fa fa-calendar-check"></i></span>
                                    </li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Trainer" ?></span>
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
                <!-- Techinician -->
                <?php
                if ($this->technicians->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->technicians->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row bfg">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove Technician"><i class="fas fa-trash-alt"></i></span></li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Technician" ?></span>
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
                <!-- Treater -->
                <?php
                if ($this->treaters->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->treaters->fetch_assoc()) {
                    ?>
                        <span id="searchrow">
                            <article class="row mba">
                                <ul>
                                    <li><a href="#"><?php echo "EMP" . sprintf("%04d", $row["employee_id"]) ?><span class="small">(update)</span></a></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li>
                                        <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1" title="Remove Treater"><i class="fas fa-trash-alt"></i></span>
                                        &emsp;
                                        <span onclick="openModel('editModel','model-Btn2')" class="model-Btn2" title="Update Shift"><i class="fa fa-calendar-check"></i></span>
                                    </li>
                                </ul>
                                <ul class="more-content">
                                    <li>
                                        <span style="padding-right: 20px;">Start Job : <?php echo date('F j, Y', strtotime($row["start_date"])) ?></span>
                                        <span style="padding-right: 20px;">Job Title : <?= "Treater" ?></span>
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
            </section>

        </div> <!-- .hawlockbody div closed here -->
    </div>

    <script>
        let chart1 = document.getElementById('employeeGrowthChart').getContext('2d');
        let massChart1 = new Chart(chart1, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['2018', '2019', '2020', '2021'],
                datasets: [{
                    label: 'Employee',
                    data: [
                        10, 15, 25, 30
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
                        text: 'Growth of Employees by Year',
                        fontSize: 25
                    },
                },
            },
        });

        let chart2 = document.getElementById('employeePercentageChart').getContext('2d');
        let massChart2 = new Chart(chart2, {
            type: 'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Managers', 'Reseptionists', 'Trainers', 'Treaters', 'Parking Officers', 'Others'],
                datasets: [{
                    label: 'Employee',
                    data: [
                        8, 3, 4, 4, 5, 15
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
                        position: 'bottom',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Employee Percentage Chart',
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