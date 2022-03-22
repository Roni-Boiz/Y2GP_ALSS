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
            <h1 id="title">Hawlock City Employees</h1>
        </div>

        <div id="hb" class="hawlockbody animate-bottom">
            <div id="employeeCard" style="grid-column:1/span 3">
                <div class="staffDetails">
                    <h2>Employee Summary</h2>
                    <div class="card" id="employeeSummary">
                        <div>
                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Managers</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->managers->num_rows ?>
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Reseptionists</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->receptionists->num_rows ?>
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>P. Officers</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->parkingOfficers->num_rows ?>
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>

                                    <h3>Trainers</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->trainers->num_rows ?>
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>
                                    <h3>Treaters</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->treaters->num_rows ?>
                                </div>
                            </div>

                            <div class="employee">
                                <div>
                                    <span><i class="fas fa-user-tie"></i></span>

                                    <h3>Techinicians</h3>
                                </div>
                                <div style="font-size: 40px;">
                                    <?= $this->technicians->num_rows ?>
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

                    <form action="employee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="emptype" class="input-field" title="Job Title" required>
                                <option value="">Select Job Title...</option>
                                <option value="manager">Manager</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="parking_officer">Parking Officer</option>
                                <option value="trainer">Trainer</option>
                                <option value="treater">Treater</option>
                                <option value="technician">Technician</option>
                            </select>
                        </div>

                        <div class="profile-pic" id="col2">
                            <img src="../../public/img/blank-profile.png" id="photo">
                            <input type="file" id="file" name="file">
                            <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Choose Photo</label>
                        </div>

                        <div id="col1">
                            <label for="fname">First Name</label><br>
                            <input type="text" id="fname" name="fname" class="input-field" pattern="^[A-z]{1}[a-z]{0,29}$" title="Single name only with letters. No space or special characters allowed" placeholder="John" required>
                        </div>

                        <div id="col2">
                            <label for="lname">Last Name</label><br>
                            <input type="text" id="lname" name="lname" class="input-field" pattern="^[A-z]{1}[a-z]{0,29}$" title="Single name only with letters. No space or special characters allowed" placeholder="Smith" required>
                        </div>

                        <div id="col1">
                            <label for="email">Email Address</label><br>
                            <input type="email" id="email" name="email" class="input-field" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="valid emails only" placeholder="example@email.com" required>
                        </div>

                        <div id="col2">
                            <label for="cno">Contact Number</label><br>
                            <input type="text" id="cno" name="cno" class="input-field" pattern="^07[0-9]{8}$|^\+[0-9]{2}[0-9]?[0-9]{9}$" title="valid contact numbers only (do not allow special characters, letters)" placeholder="0711234567" required>
                        </div>

                        <div class="formEmpShift">
                            <h4>Employee Shift</h4>
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
                        <h2>Update Shift</h2>
                    </div>
                    <form action="#" id="formUpdateShift" class="formEdit" onsubmit="updateShift();return false;">
                        <div>
                            <label>Employee ID : </label>
                            <span id="answer2"></span>
                        </div>
                        <div>
                            <div>
                                <label>Week 01</label><br>
                                <select id="newWeek1" name="newWeek1" class="input-field" required>
                                    <option value="">Select Working Hour...</option>
                                    <option value="0">6AM - 12PM</option>
                                    <option value="1">12PM - 6PM</option>
                                    <option value="2">6PM - 12AM</option>
                                </select>
                            </div>
                            <div>
                                <label>Week 02</label><br>
                                <select id="newWeek2" name="newWeek2" class="input-field" required>
                                    <option value="">Select Working Hour...</option>
                                    <option value="0">6AM - 12PM</option>
                                    <option value="1">12PM - 6PM</option>
                                    <option value="2">6PM - 12AM</option>
                                </select>
                            </div>
                            <div>
                                <label>Week 03</label><br>
                                <select id="newWeek3" name="newWeek3" class="input-field" required>
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
                        <h2>Are You Sure ?</h2>
                    </div>
                    <form action="#" class="formDelete" onsubmit="deleteEmployee();return false;">
                        <div>
                            <label> Delete Employee With EMP ID </label>
                            <span id="answer1"></span>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row mlb">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>"><span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove Manager"><i class="fas fa-trash-alt"></i></span></li>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row nhl">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>"><span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove Receptionist"><i class="fas fa-trash-alt"></i></span></li>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row pga">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>"><span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove P. Officer"><i class="fas fa-trash-alt"></i></span></li>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row nfl">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>">
                                        <span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove Trainer"><i class="fas fa-trash-alt"></i></span>
                                        &emsp;
                                        <span onclick="openModel('editModel','model-Btn2', '<?= $employeeId ?>'); setCurrentShiftData('<?= $employeeId ?>');" class="model-Btn2" title="Update Shift"><i class="fa fa-calendar-check"></i></span>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row bfg">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>" id="<?= $employeeId ?>"><span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove Technician"><i class="fas fa-trash-alt"></i></span></li>
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
                        $employeeId = 'EMP' . sprintf("%04d", $row["employee_id"]);
                    ?>
                        <span id="searchrow">
                            <article class="row mba">
                                <ul>
                                    <li><?php echo $employeeId ?><span class="small">(update)</span></li>
                                    <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                    <li><?php echo $row["contact_no"] ?></li>
                                    <li><?php echo $row["email"] ?></li>
                                    <li id="<?= $employeeId ?>">
                                        <span onclick="openModel('deleteModel','model-Btn1', '<?= $employeeId ?>')" class="model-Btn1" title="Remove Treater"><i class="fas fa-trash-alt"></i></span>
                                        &emsp;
                                        <span onclick="openModel('editModel','model-Btn2', '<?= $employeeId ?>'); setCurrentShiftData('<?= $employeeId ?>');" class="model-Btn2" title="Update Shift"><i class="fa fa-calendar-check"></i></span>
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

            <!-- error popup -->
            <?php
            if (isset($this->error)) { ?>
                <!-- error popup -->
                <!-- <div class='b'></div>
                <div class='bb'></div> -->
                <div class='message'>
                    <div class='check' style="background:red;">
                        &#10006;
                    </div>
                    <p>
                        Insert Unsuccess!
                    </p>
                    <p>
                        <?php echo $this->error; ?>
                    </p>
                    <button id='ok' style="background:red;">
                        OK
                    </button>
                </div>
            <?php
            }; ?>
            <!-- success popup -->
            <?php
            if (isset($this->success)) { ?>
                <!-- <div class='b'></div>
                <div class='bb'></div> -->
                <div class='message'>
                    <div class='check'>
                        &#10004;
                    </div>
                    <p>
                        Insert Success!
                    </p>
                    <p>
                        New Employee Added
                    </p>
                    <button id='ok'>
                        OK
                    </button>
                </div>
            <?php
            }; ?>
        </div> <!-- .hawlockbody div closed here -->
    </div>

    <script>
        $(document).ready(function() {
            $("#ok").click(function() {
                $(".message").fadeOut(600, "linear");
            });
        });

        $(document).ready(function() {
            $("#emptype").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'trainer' || optionValue == 'treater') {
                        $("#week1").attr("required", true);
                        $("#week2").attr("required", true);
                        $("#week3").attr("required", true);
                        $(".formEmpShift").show(200);
                    } else {
                        $('#week1').removeAttr('required');
                        $('#week2').removeAttr('required');
                        $('#week3').removeAttr('required');
                        $(".formEmpShift").hide(200);
                    }
                });
            }).change();
        });

        $(document).ready(function() {
            $.ajax({
                url: "getEmployees",
                method: "GET",
                success: function(data) {
                    var year = [];
                    var emps = [];
                    data = JSON.parse(data);
                    var preSum = 0;
                    for (var i in data) {
                        year.push(data[i].year);
                        emps.push(preSum + parseInt(data[i].no_emps));
                        preSum = parseInt(data[i].no_emps);
                    }
                    var chartdata = {
                        labels: year,
                        datasets: [{
                            label: 'Employees',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            data: emps
                        }]
                    };

                    var ctx = $("#employeeGrowthChart");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
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
                                    // fullSize: true,
                                    display: true,
                                    text: 'Growth of Employees by Year',
                                    font: {
                                        size: 20,
                                    },
                                },
                            },
                        },
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });

            $.ajax({
                url: "getEmployeesType",
                method: "GET",
                success: function(data) {
                    var type = [];
                    var count = [];
                    // console.log(data);
                    data = JSON.parse(data);
                    for (var i in data) {
                        type.push(data[i].type);
                        count.push(data[i].no_emps);
                    }
                    var chartdata = {
                        labels: type,
                        datasets: [{
                            label: 'Employees',
                            backgroundColor: [
                                'rgb(158, 102, 255, 0.6)',
                                'rgb(142, 77, 255, 0.6)',
                                'rgb(126, 51, 255, 0.6)',
                                'rgb(110, 26, 255, 0.6)',
                                'rgb(93, 0, 255, 0.6)',
                                'rgb(84, 0, 230, 0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003',
                            data: count
                        }]
                    };

                    var ctx = $("#employeePercentageChart");

                    var barGraph = new Chart(ctx, {
                        type: 'doughnut',
                        data: chartdata,
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
                                    font: {
                                        size: 20,
                                    },
                                },
                            },
                        },
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>