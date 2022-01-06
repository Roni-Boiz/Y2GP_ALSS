<?php
include_once 'sidenav.php';
?>

<style>
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 120px;
        height: 120px;
        margin: -76px 0 0 -76px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    /* .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active,
    .collapsible:hover {
        background-color: #555;
    }

    .collapsible:after {
        content: '\002B';
        color: white;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    } */

    .chart-three {
        width: 200px;
        height: 200px;
        margin: 0;
        position: relative;
    }

    .chart-three.animate svg .circle-foreground {
        -webkit-animation: offset 3s ease-in-out forwards;
        animation: offset 3s ease-in-out forwards;
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    .chart-three.animate figcaption:after {
        -webkit-animation: chart-three-label 3s steps(90) forwards;
        animation: chart-three-label 3s steps(90) forwards;
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    .chart-three svg {
        width: 100%;
        height: 100%;
    }

    .chart-three svg .circle-background,
    .chart-three svg .circle-foreground {
        r: 87.5px;
        cx: 50%;
        cy: 50%;
        fill: none;
        stroke: #305556;
        stroke-width: 25px;
    }

    .chart-three svg .circle-foreground {
        stroke: #389967;
        stroke-dasharray: 494.55px 549.5px;
        stroke-dashoffset: 494.55px;
        stroke-linecap: round;
        transform-origin: 50% 50%;
        transform: rotate(-90deg);
    }

    .chart-three figcaption {
        display: inline-block;
        width: 100%;
        height: 2.5rem;
        overflow: hidden;
        text-align: center;
        color: #c6e8d7;
        position: absolute;
        top: calc(50% - 1.25rem);
        left: 0;
        font-size: 0;
    }

    .chart-three figcaption:after {
        display: inline-block;
        content: "0%\a 1%\a 2%\a 3%\a 4%\a 5%\a 6%\a 7%\a 8%\a 9%\a 10%\a 11%\a 12%\a 13%\a 14%\a 15%\a 16%\a 17%\a 18%\a 19%\a 20%\a 21%\a 22%\a 23%\a 24%\a 25%\a 26%\a 27%\a 28%\a 29%\a 30%\a 31%\a 32%\a 33%\a 34%\a 35%\a 36%\a 37%\a 38%\a 39%\a 40%\a 41%\a 42%\a 43%\a 44%\a 45%\a 46%\a 47%\a 48%\a 49%\a 50%\a 51%\a 52%\a 53%\a 54%\a 55%\a 56%\a 57%\a 58%\a 59%\a 60%\a 61%\a 62%\a 63%\a 64%\a 65%\a 66%\a 67%\a 68%\a 69%\a 70%\a 71%\a 72%\a 73%\a 74%\a 75%\a 76%\a 77%\a 78%\a 79%\a 80%\a 81%\a 82%\a 83%\a 84%\a 85%\a 86%\a 87%\a 88%\a 89%\a 90%\a 91%\a 92%\a 93%\a 94%\a 95%\a 96%\a 97%\a 98%\a 99%\a 100%\a";
        white-space: pre;
        font-size: 2.5rem;
        line-height: 2.5rem;
    }

    @keyframes chart-three-label {
        100% {
            transform: translateY(-225rem);
        }
    }

    @keyframes offset {
        100% {
            stroke-dashoffset: 0;
        }
    }

    .apartment>div:nth-child(1) {
        display: flex;
    }

    .apartment>div:nth-child(1) h2 {
        width: 93%;
    }

    .apartment .addBtn {
        background: #d9d9d9;
        color: #555;
        float: right;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 45%);
    }

    .apartment .addBtn i {
        padding: 11px;
        font-size: 30px;
        color: #110B2E;
    }

    .apartment .addBtn:hover {
        background-color: #bbb;
        display: block;
    }

    #apartmentSummary {
        display: flex;
        flex-direction: column;
    }

    #apartmentSummary>div:nth-child(1) {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    #apartmentSummary>div:nth-child(1) div {
        padding: 10px;
    }

    #apartmentSummary>div:nth-child(1)>div>span {
        display: flex;
        flex-direction: column;
    }

    #apartmentSummary>div:nth-last-child(1) {
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-content: center;
        padding: 0px 0px 15px 0px;
    }

    #apartmentSummary div:nth-last-child(1) h4:nth-child(1) {
        grid-column: 1;
    }

    #apartmentSummary div:nth-last-child(1) h4:nth-child(2) {
        grid-column: 2;
    }
</style>

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
                                                    <strong class="text-primary"><?php echo $row["apartment_no"]; ?></strong>
                                                    <i class="fa fa-home" style="color:red;font-size:40px;padding: 0px;"></i>
                                                </span>
                                            <?php
                                            } else {
                                                $remaining++; ?>
                                                <span title="Floor No - <?= $row["floor_no"] ?>">
                                                    <strong class="text-primary"><?php echo $row["apartment_no"]; ?></strong>
                                                    <i class="fa fa-home" style="color:green;font-size:40px;padding: 0px;"></i>
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

            <!-- reservation success message -->
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
                        New Apartment Added!
                    </p>
                    <button id='ok'>
                        OK
                    </button>
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
    </script>

    <script>
        
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

        //Charts
        let chart1 = document.getElementById('earningChart').getContext('2d');
        let massChart1 = new Chart(chart1, {
            type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Income',
                    data: [
                        100, 1500, 500, 500, 100, 1000, 100, 1500, 500, 500, 100, 1000
                    ],
                    // backgroundColor : '#423D59',
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
            },
            options: {
                // scales: {
                //     x: {
                //         ticks: {
                //             maxTicksLimit: 10
                //         }
                //     }
                // },
                scales: {
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

        let chart2 = document.getElementById('reservationChart').getContext('2d');
        let massChart2 = new Chart(chart2, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                        label: 'Hall',
                        data: [
                            10, 15, 44, 23, 54, 65, 3, 23, 63, 23, 34, 45, 20
                        ],
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
                        data: [
                            97, 54, 65, 78, 54, 45, 35, 12, 32, 45, 41, 78, 36
                        ],
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
                        data: [
                            75, 35, 45, 12, 45, 56, 10, 30, 30, 85, 62, 33, 10
                        ],
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
                        data: [
                            32, 63, 45, 21, 32, 45, 25, 26, 28, 73, 45, 55, 62
                        ],
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
                        data: [
                            20, 30, 25, 40, 30, 35, 20, 30, 25, 40, 30, 35, 20
                        ],
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
                        data: [
                            60, 50, 54, 70, 23, 45, 68, 78, 34, 87, 44, 53, 35
                        ],
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
            },
            options: {
                // responsive: true,
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
                        text: 'Total Reservations and Requests',
                        fontSize: 25
                    },
                },
            },
        });
    </script>
</body>

</html>