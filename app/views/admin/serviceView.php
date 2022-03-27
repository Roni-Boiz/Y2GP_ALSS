<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock City Services</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div id="serviceCard" style="grid-column:1/span 3">
                <h2>Services Summary</h2>
                <div class="serviceSummary card">
                    <div class="chartContainer1">
                        <div>
                            <h3>No of Reservations</h3>
                            <input type="date" name="date" id="searchStartDate" min="<?= date("Y-m-01", strtotime("2021-01-01")) ?>" max="<?= date("Y-m-d") ?>" style="padding: 5px;" onchange="loadRequestReservations()">
                            -
                            <input type="date" name="date" id="searchEndDate" min="<?= date("Y-m-01", strtotime("2021-01-01")) ?>" max="<?= date("Y-m-d") ?>" style="padding: 5px;" onchange="loadRequestReservations()">
                        </div>

                        <canvas id="serviceChart">
                        </canvas>
                    </div>

                    <div class="chartContainer2">
                        <div>
                            <h3>Service Rate</h3>
                            <h6>Fee / Cancle Fee</h6>
                        </div>
                        <canvas id="serviceRateChart">
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
                        <span style="display: inline-block;"> Parking <i class="fa fa-square" style="color:#4fc0d2;"></i></span>
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
                    <form action="service" class="formAddEmployee formAddService" method="POST">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="servicetype" class="input-field" required>
                                <option value="">Select Service Type...</option>
                                <option value="fhall">Function Hall</option>
                                <option value="chall">Conference Hall</option>
                                <option value="treatment">Treatment</option>
                                <option value="fitness">Fitness</option>
                                <option value="park">Parking</option>
                                <option value="backup">BackUp</option>
                            </select>
                        </div>

                        <div id="col2">
                            <label for="servicename">Service Name</label><br>
                            <input type="text" id="servicename" name="servicename" class="input-field" pattern="^[A-z\s]{0,100}$" title="Service name only with letters. No special characters or numbers allowed" placeholder="Function Hall" required>
                        </div>

                        <div id="col1">
                            <label for="fee">Fee (Rs.)</label><br>
                            <input type="text" id="fee" name="fee" class="input-field" pattern="^[0-9]{0,10}(\.[0-9][0-9]?)?" title="Enter valid amount Eg-1500, 1500.00" placeholder="1000.00" required>
                        </div>

                        <div id="col2">
                            <label for="canclefee">Cancellation Fee (Rs.)</label><br>
                            <input type="text" id="canclefee" name="canclefee" class="input-field" pattern="^[0-9]{0,10}(\.[0-9][0-9]?)?" title="Enter valid amount Eg-200, 200.00" placeholder="500.00" required>
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
                    <form action="#" id="formUpdateRate" class="formEdit" method="POST">
                        <div>
                            <label>Service ID : </label>
                            <span id="answer2"></span>
                            <input type="hidden" id="serviceId" name="serviceId">
                        </div>
                        <div>
                            <div>
                                <label>Upcoming Fee</label><br>
                                <input type="text" id="newfee" name="newfee" class="input-field" pattern="^[0-9]{0,10}(\.[0-9][0-9]?)?" title="Enter valid amount Eg-1500, 1500.00" placeholder="1500.00" required>
                            </div>
                            <div>
                                <label>Upcoming Cancellation Fee</label><br>
                                <input type="text" id="newcancelfee" name="newcancelfee" class="input-field" pattern="^[0-9]{0,10}(\.[0-9][0-9]?)?" title="Enter valid amount Eg-200, 200.00" placeholder="500.00" required>
                            </div>
                            <div>
                                <label>Effect Date</label><br>
                                <input type="date" name="effectdate" class="input-field" min="<?= date("Y-m-d", strtotime("first day of next month")) ?>" max="<?= date("Y-m-d", strtotime("first day of next month")) ?>" required>
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
                        <li>Fee/h</li>
                        <li>Cancel Fee</li>
                        <li>Update Service</li>
                    </ul>
                </main>
                <?php
                if ($this->services->num_rows > 0) { ?>
                    <?php
                    while ($row = $this->services->fetch_assoc()) {
                        $serviceId = $row["service_id"];
                        if ($row["type"] == 'hall') {
                    ?>
                            <span id="searchrow">
                                <article class="row mlb">
                                    <ul>
                                        <li><?php echo $serviceId ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                        } else if ($row["type"] == 'parking') {
                        ?>
                            <span id="searchrow">
                                <article class="row nfl">
                                    <ul>
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                                        <li><?php echo $row["service_id"] ?><span class="small">(update)</span></li>
                                        <li><?php echo $row["name"] ?></li>
                                        <li><?php echo number_format($row["fee"], 2) ?></li>
                                        <li><?php echo number_format($row["cancelation_fee"], 2) ?></li>
                                        <li id="<?= $serviceId ?>"><span onclick="openModel('editModel','model-Btn2','<?= $serviceId ?>'); setCurrentServiceRate('<?= $serviceId ?>');" class="model-Btn2" title="Update Rate"><i class="fa fa-edit"></i></span></li>
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
                } else {
                    echo "0 results";
                }
                ?>
            </section>

             <!-- error popup -->
             <?php
            if (isset($this->error)) { ?>
                <div class="error">
                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                        <div id="errorModel" class="open">

                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Failed</h2>
                            </div>
                            <form action="#" class="formDelete" onsubmit="previousView(); return false;">
                                <div>
                                    <label><?= $this->error ?></label>
                                </div>
                                <div>
                                    <input class="btnRed" type="submit" name="submit" value="  OK  ">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }; ?>
            <!-- success popup -->
            <?php
            if (isset($this->success)) { ?>
                <div class="success">
                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8"></div>
                        <div id="successModel" class="open">

                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Successful</h2>
                            </div>
                            <form action="#" class="formDelete" onsubmit="previousView(); return false;">
                                <div>
                                    <label><?= $this->success ?></label>
                                </div>
                                <div>
                                    <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                                </div>
                            </form>
                        </div>
                    </div>
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

        function loadRequestReservations() {
            var startDate = "2021-01-01";
            var endDate = new Date().toISOString().slice(0, 10);
            const ans1 = $("#searchStartDate").val();
            const ans2 = $("#searchEndDate").val();
            if (ans1 !== '') {
                startDate = $("#searchStartDate").val();
                // $("#searchStartDate" ).datepicker({
                //     maxDate: new Date(ans2)
                // });
            }
            if (ans2 !== '') {
                endDate = $("#searchEndDate").val();
                // $("#searchEndDate" ).datepicker({
                //     minDate: new Date(ans1)
                // });
            }
            //console.log(startDate);
            //console.log(endDate);
            $.ajax({
                url: "getRequestReservations",
                method: "POST",
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    var resType = [];
                    var res = [];
                    var calRes = [];
                    // convert JSON object into array
                    //console.log(data);
                    data = JSON.parse(data);

                    for (var i in data) {
                        resType.push(data[i].type);
                        res.push(parseInt(data[i].totalRes) - parseInt(data[i].cancelRes));
                        calRes.push(data[i].cancelRes);
                    }
                    var chartdata = {
                        labels: resType,
                        datasets: [{
                                label: 'Reservations',
                                data: res,
                                // backgroundColor : '#423D59',
                                backgroundColor: [
                                    'rgba(153,102,255,0.6)'
                                ],
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 1,
                                hoverBorderColor: '#003',
                            },
                            {
                                label: 'Cancels',
                                data: calRes,
                                // backgroundColor : '#423D59',
                                backgroundColor: [
                                    'rgb(187,35,22,0.6)'
                                ],
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 1,
                                hoverBorderColor: '#003',
                            }
                        ]
                    };
                    if (window.barGraph instanceof Chart) {
                        window.barGraph.destroy();
                    }
                    var ctx = $("#serviceChart");
                    // window barGraph;
                    window.barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
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
                                    text: 'No of Services',
                                    fontSize: 25
                                },
                            },
                            // scales: {
                            //     x: {
                            //         stacked: true,
                            //     },
                            //     y: {
                            //         stacked: true
                            //     }
                            // }
                        },
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $(document).ready(function() {
            loadRequestReservations();
            $.ajax({
                url: "getServices",
                method: "GET",
                success: function(data) {
                    var serviceName = [];
                    var fee = [];
                    var cancleFee = [];
                    data = JSON.parse(data);
                    for (var i in data) {
                        serviceName.push(data[i].name);
                        fee.push(data[i].fee);
                        cancleFee.push(data[i].cancelation_fee);
                    }
                    var chartdata = {
                        labels: serviceName,
                        datasets: [{
                                label: 'Fee/h',
                                data: fee,
                                // backgroundColor : '#423D59',
                                backgroundColor: [
                                    'rgba(153,102,255,0.6)'
                                ],
                                borderWidth: 1,
                                borderColor: '#ae98db',
                                hoverBorderWidth: 1,
                                hoverBorderColor: '#003',
                            },
                            {
                                label: 'Cancle Fee',
                                data: cancleFee,
                                // backgroundColor : '#423D59',
                                backgroundColor: [
                                    'rgb(187,35,22,0.6)'
                                ],
                                borderWidth: 1,
                                borderColor: '#a72d22d9',
                                hoverBorderWidth: 1,
                                hoverBorderColor: '#003',
                            }
                        ]
                    };

                    var ctx = $("#serviceRateChart");

                    var barGraph = new Chart(ctx, {
                        type: 'line',
                        data: chartdata,
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
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>