<?php
include_once 'sidenav.php';
?>

</head>

<body style="background-color: gray; background-image:none;">
    <!-- <div id="loader"></div> -->
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock City</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="homeCard" style="grid-column:1/span 3">
                <div class="leftPanel">
                    <div class="apartment">
                        <div>
                            <h2>Apartments</h2>
                            <span onclick="openModel('model','addBtn')" class="addBtn" title="Add More Apartments"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="card" id="apartmentSummary">
                            <!-- <h4>Graphical View</h4> -->
                            <div>
                                <?php
                                $apartments = $this->apartments->num_rows;
                                if ($this->apartments->num_rows > 0) {
                                    $remaining = 0; ?>
                                    <?php
                                    while ($row = $this->apartments->fetch_assoc()) { ?>
                                        <div>
                                            <?php
                                            if ($row["status"]) { ?>
                                                <span title="Floor No - <?= $row["floor_no"] ?>">
                                                    <strong class="text-primary" style="font-size: 14px;"><?php echo $row["apartment_no"]; ?></strong>
                                                    <i class="fa fa-home" style="color:red;font-size:40px;padding: 0px;text-align: center;width: 80px;" title="Not Available"></i>
                                                </span>
                                            <?php
                                            } else {
                                                $remaining++; ?>
                                                <span title="Floor No - <?= $row["floor_no"] ?>">
                                                    <strong class="text-primary" style="font-size: 14px;"><?php echo $row["apartment_no"]; ?></strong>
                                                    <i class="fa fa-home" style="color:gray;font-size:40px;padding: 0px;text-align: center;width: 80px;" title="Available"></i>
                                                </span>
                                            <?php

                                            } ?>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </div>
                            <hr>
                            <div>
                                <h3 style="padding: 0px; text-align: center;">
                                    <large>Total : <?= number_format("$apartments") ?></large>
                                </h3>
                                <h3 style="padding: 0px; text-align: center;">
                                    <large>Remainning : <?= number_format("$remaining") ?></large>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model">
                            <a href="javascript:void(0)" class="closebtn">&times;</a>
                            <div style="text-align: center; margin-bottom: 10px;">
                                <h3>New Apartment<i class="fa fa-home"></i></i></h3>
                            </div>
                            <form action="index" class="formEdit" method="POST">
                                <div>
                                    <label>Apartment No : </label>
                                    <?php
                                    $row = $this->lastApartmentNo->fetch_assoc();
                                    $apartmentNo = (int)substr($row['apartment_no'], 2);
                                    $apartmentNo = $apartmentNo + 1;
                                    $apartmentNo = "AP" . sprintf('%03u', $apartmentNo);
                                    ?>
                                    <span><?= $apartmentNo ?></span>
                                    <input type="hidden" name="apartmentNo" value="<?= $apartmentNo ?>">
                                </div>
                                <div>
                                    <div>
                                        <label>Floor No</label><br>
                                        <select id="emptype" name="floor" class="input-field" required>
                                            <option value="">Select Floor...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Default Parking Slot</label><br>
                                        <select id="emptype" name="parkingslot" class="input-field" required>
                                            <?php
                                            while ($row = $this->slots->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $row['slot_no'] ?>"><?= $row['slot_no'] ?></option>";
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <input class="btnPurple" type="submit" name="submit" value="Add Apartment">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <h2>Total Monthly Income</h2>
                        <div class="card" id="income">
                            <?php
                            $row1 = $this->payments->fetch_assoc();
                            $row2 = $this->overdues->fetch_assoc();
                            ?>
                            <div>
                                <h4>Payment Received</h4>
                                <div>
                                    <img src="../../public/img/cash.png" alt="cash icon">
                                    <h3>Rs.<?= number_format($row1['income'], 2) ?></h3>
                                </div>
                            </div>
                            <div>
                                <h4>Overdues</h4>
                                <div>
                                    <img src="../../public/img/overdue.png" alt="overdue icon">
                                    <h3>Rs.<?= number_format($row2['due'], 2) ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2>Earning Summary</h2>
                        <div class="card" id="earning">
                            <canvas id="earningChart">
                            </canvas>
                        </div>
                    </div>

                    <div>
                        <h2>Service Usage Summary</h2>
                        <div class="card" id="serviceusage">
                            <canvas id="reservationChart">
                            </canvas>
                        </div>
                    </div>
                </div>

                <div class="rightPanel">
                    <div class="myDoList">
                        <div>
                            <div class="head">
                                <h3>To Do List</h3>
                            </div>
                            <div class="doListAdd">
                                <input type="text" id="myInput" placeholder="Title...">
                                <span id="addBtn"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div>
                            <ul id="myUL">
                                <!-- <li>Update Services</li> -->
                                <!-- <li class="checked">Make Announcement</li> -->
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h3>Server Status :<span><i style="color: #389967;" class="fa fa-server"></i></span><small style="font-size: small; color: #6e6e6e;">(Active)</small></h3>
                        <div class="card" id="serverstatus">
                            <div>
                                <h4>Storage</h4>
                                <figure class="chart-three animate">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle-background" />
                                        <circle class="circle-foreground" />
                                    </svg>
                                    <figcaption></figcaption>
                                </figure>
                            </div>

                            <div>
                                <h4>Performance</h4>
                                <figure class="chart-three animate">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle-background" />
                                        <circle class="circle-foreground" />
                                    </svg>
                                    <figcaption></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- error success message -->
            <?php
            if (isset($this->error)) { ?>
                <div class="error">
                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                        <div id="errorModel" class="open">

                            <div style="text-align: center; margin-bottom: 10px;">
                                <h2>Insert Failed</h2>
                            </div>
                            <form action="#" class="formDelete" onsubmit="previousView(); return false;">
                                <div>
                                    <label>Try again later</label>
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
                                    <label>New Apartment Added</label>
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


            <!-- <div id="upactivities">
                <h2>Upcomming Activities</h2>
                <div class="card">
                    <div style="font-size: small;color: #545d7a;">Currently you do not have any upcomming activities</div>
                </div>
            </div> -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#ok").click(function() {
                $(".message").fadeOut(600, "linear");
            });
        });

        var input = document.getElementById("myInput");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("addBtn").click();
            }
        });

        $(document).ready(function() {
            let newListItem = $("#myInput");
            for (i = 0; i < localStorage.length; i++) {
                let newLi1 = $("<li></li>");
                x = localStorage.key(i);
                console.log(x);
                var span = document.createElement("SPAN");
                var txt = document.createTextNode("\u00D7");
                span.className = "close";
                span.appendChild(txt);
                newLi1.append(localStorage.getItem(x)).append(span);
                $("#myUL").append(newLi1);
            }

            $("#addBtn").on("click", function() {
                if (myInput.value === '') {
                    alert("You must write something!");
                } else {
                    let valueToBeAdded = createNewLi(myInput.value);
                    $("#myUL").append(valueToBeAdded);
                }
                $("#myInput").val("");
            })

            let createNewLi = function(newListItem) {

                let newLi = $("<li></li>");
                var span = document.createElement("SPAN");
                var txt = document.createTextNode("\u00D7");
                span.className = "close";
                span.appendChild(txt);
                newLi.append(newListItem).append(span);

                key = "toDo" + localStorage.length; // Math.floor(Math.random() * 100) + 1
                localStorage.setItem(key, newListItem);
                console.log(localStorage);
                return newLi;
            }

            $("#myUL").on("click", ".close", function() {
                console.log(localStorage.length);
                $(this).parent().remove();
                var testi = localStorage.key($(this).parent().value);
                console.log(testi);
                localStorage.removeItem(testi);
            })

        });

        //  My do list Function
        // Create a "close" button and append it to each list item
        // var myDoList = document.getElementById("myUL");
        // var myNodelist = myDoList.getElementsByTagName("LI");
        // var i;
        // for (i = 0; i < myNodelist.length; i++) {
        //     var span = document.createElement("SPAN");
        //     var txt = document.createTextNode("\u00D7");
        //     span.className = "close";
        //     span.appendChild(txt);
        //     myNodelist[i].appendChild(span);
        // }

        // Click on a close button to hide the current list item
        // var close = document.getElementsByClassName("close");
        // for (i = 0; i < close.length; i++) {
        //     close[i].onclick = function() {
        //         console.log("this");
        //         $(this).parent().remove();
        //         var testi = localStorage.key(this);
        //         localStorage.removeItem(testi);
        //     }
        // }

        // Add a "checked" symbol when clicking on a list item
        var list = document.getElementById('myUL');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
            }
        }, false);


        // Create a new list item when clicking on the "Add" button
        // $("#addBtn").on("click", function() {
        //     var li = document.createElement("li");
        //     var inputValue = document.getElementById("myInput").value;
        //     var t = document.createTextNode(inputValue);
        //     li.appendChild(t);
        //     if (inputValue === '') {
        //         alert("You must write something!");
        //     } else {
        //         document.getElementById("myUL").appendChild(li);
        //     }
        //     document.getElementById("myInput").value = "";

        //     var span = document.createElement("SPAN");
        //     var txt = document.createTextNode("\u00D7");
        //     span.className = "close";
        //     span.appendChild(txt);
        //     li.appendChild(span);

        //     randomId = "toDO" + Math.floor(Math.random() * 100) + 1;
        //     localStorage.setItem(randomId, myUL);

        //     for (i = 0; i < close.length; i++) {
        //         close[i].onclick = function() {
        //             var div = this.parentElement;
        //             div.style.display = "none";
        //         }
        //     }
        // });

        $.ajax({
            url: "getEarningSummary",
            method: "POST",
            success: function(data) {
                var date = [];
                var amount = [];
                // convert JSON object into array
                data = JSON.parse(data);

                for (var i in data) {
                    date.unshift(data[i].monthYear);
                    amount.unshift(data[i].total);
                }

                var chartdata = {
                    labels: date,
                    datasets: [{
                        label: 'Income',
                        data: amount,
                        backgroundColor: [
                            'rgba(153,102,255,0.6)'
                        ],
                        borderWidth: 1,
                        borderColor: '#777',
                        hoverBorderWidth: 1,
                        hoverBorderColor: '#003',
                        lineTension: 0.4,
                        fill: true,
                        // radius: 6,
                    }]
                };
                var ctx = $("#earningChart");
                // window barGraph;
                window.barGraph = new Chart(ctx, {
                    type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data: chartdata,
                    options: {
                        scales: {
                            y: {
                                    suggestedMin: 0,
                            },
                            xAxes: [{
                                ticks: {
                                    display: false,
                                    autoSkip: false,
                                    maxRotation: 90,
                                    minRotation: 90
                                }
                            }]
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
                                text: 'Earn Chart',
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

        $.ajax({
            url: "getServiceSummary",
            method: "POST",
            success: function(data) {
                var date = [];
                var hall = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var fitness = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var treatment = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var parking = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var maintenence = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var laundry = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                // convert JSON object into array
                data = JSON.parse(data);

                var monthName = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                var d = new Date();
                d.setDate(1);
                for (i = 0; i <= 11; i++) {
                    date.unshift(monthName[d.getMonth()] + ' ' + d.getFullYear());
                    d.setMonth(d.getMonth() - 1);
                }
                for (var i in data) {
                    console.log(i);
                    for (var j in data[i]) {
                        if (i == 'hall') {
                            hall[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        } else if (i == 'fitness') {
                            fitness[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        } else if (i == 'treatment') {
                            treatment[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        } else if (i == 'parking') {
                            parking[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        } else if (i == 'maintenence') {
                            maintenence[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        } else if (i == 'laundry') {
                            laundry[date.indexOf(data[i][j].monthYear)] = parseInt(data[i][j].total);
                        }
                    }
                }

                var chartdata = {
                    labels: date,
                    datasets: [{
                            label: 'Hall',
                            data: hall,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        },
                        {
                            label: 'Fitness',
                            data: fitness,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        },
                        {
                            label: 'Treatment',
                            data: treatment,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        },
                        {
                            label: 'Parking',
                            data: parking,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        },
                        {
                            label: 'Laundry',
                            data: laundry,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        },
                        {
                            label: 'Maintenence',
                            data: maintenence,
                            // backgroundColor : '#423D59',
                            backgroundColor: [
                                'rgba(153,102,255,0.6)'
                            ],
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 1,
                            hoverBorderColor: '#003'
                        }
                    ]
                };
                var ctx = $("#reservationChart");
                // window barGraph;
                window.barGraph = new Chart(ctx, {
                    type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data: chartdata,
                    options: {
                        // responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                // position: 'center',
                                labels: {
                                    fontColor: '#000'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Total Reservations and Requests',
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
    </script>
</body>

</html>