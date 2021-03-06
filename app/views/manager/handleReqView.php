<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Handle Requests </h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" id="handleReq" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Pending</a></li>
                    <li><a href="#tab2">In Progress</a></li>
                    <li><a href="#tab3">Completed</a></li>
                    <li><a href="#tab4">Declined</a></li>
                </ul>

                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <h2>Todays Requests</h2>
                    </div>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Preferd Date</li>
                                    <li>Category</li>
                                    <li>Request Date</li>
                                    <li>Action</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->TodayPendingReq->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->TodayPendingReq->fetch_assoc()) {
                                    $requestId = "TM" . sprintf("%04d", $row["request_id"]);
                                ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["preferred_date"])) ?></li>
                                                <li><?php echo $row["category"] ?></li>
                                                <li><?php echo date('Y-m-d h:i A', strtotime($row["request_date"])) ?></li>
                                                <li id="<?= $requestId ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $requestId ?>')" class="model-Btn1" title="Decline Request"><i class="fas fa-trash-alt"></i></span>
                                                    &emsp;
                                                    <span onclick="openModel('editModel','model-Btn2', '<?= $requestId ?>'); loadEmployee();" class="model-Btn2" title="Allocate Employee"><i class="fa fa-forward"></i></span>
                                                </li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <span style="margin-right: 20px;">Request No : <?php echo "TM" . sprintf("%04d", $row["request_id"]) ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <ul>
                                    <li style="text-align: center;">No Pending Requests</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>

                    <div id="handleRequest">

                        <div class="pendingreq">
                            <h2>All Pending Requests</h2>
                            <div class="requestsearch">
                                <input type="text" name="search" placeholder="Search.." class="mySearch">
                                <div>
                                    <span style="display: inline-block;"> Technical & Maintenence<i class="fa fa-square" style="color: #EB7655;"></i></span>
                                </div>
                            </div>

                            <div>
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Resident</li>
                                            <li>Preferd Date</li>
                                            <li>Category</li>
                                            <li>Request Date</li>
                                            <li>Action</li>
                                        </ul>
                                    </main>
                                    <?php
                                    if ($this->pendingReq->num_rows > 0) { ?>
                                        <?php
                                        while ($row = $this->pendingReq->fetch_assoc()) {
                                            $requestId = "TM" . sprintf("%04d", $row["request_id"]);
                                        ?>
                                            <span id="searchrow">
                                                <article class="row pga">
                                                    <ul>
                                                        <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small></li>
                                                        <li><?php echo date('D, M d, Y', strtotime($row["preferred_date"])) ?></li>
                                                        <li><?php echo $row["category"] ?></li>
                                                        <li><?php echo date('Y-m-d h:i A', strtotime($row["request_date"])) ?></li>
                                                        <li id="<?= $requestId ?>">
                                                            <span onclick="openModel('deleteModel','model-Btn1','<?= $requestId ?>')" class="model-Btn1" title="Decline Request"><i class="fas fa-trash-alt"></i></span>
                                                            &emsp;
                                                            <span onclick="openModel('editModel','model-Btn2','<?= $requestId ?>'); loadEmployee();" class="model-Btn2" title="Allocate Employee"><i class="fa fa-forward"></i></span>
                                                        </li>
                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <span style="margin-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                            <span style="margin-right: 20px;">Request No : <?php echo $requestId ?></span>
                                                        </li>
                                                    </ul>
                                                </article>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } else {
                                    ?>
                                        <ul>
                                            <li style="text-align: center;">No Pending Requests</li>
                                        </ul>
                                    <?php
                                    }
                                    ?>
                                </section>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="tab2" class="tab">
                    <div>
                        <h2>Inprogress Requests</h2>
                    </div>
                    <div class="requestsearch">
                        <input type="text" name="search" placeholder="Search.." class="mySearch">
                        <div>
                            <span style="display: inline-block;"> Technical & Maintenence<i class="fa fa-square" style="color: #EB7655;"></i></span>
                        </div>
                    </div>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Preferd Date</li>
                                    <li>Category</li>
                                    <li>Technician</li>
                                    <li>Action</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->inprogressReq->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->inprogressReq->fetch_assoc()) {
                                    $requestId = "TM" . sprintf("%04d", $row["request_id"]);
                                ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["preferred_date"])) ?></li>
                                                <li><?php echo $row["category"] ?></li>
                                                <li><?php echo $row["tfname"] . " " . $row["tlname"] ?></li>
                                                <li id="<?= $requestId ?>">
                                                    <span onclick="openModel('deleteModel','model-Btn1','<?= $requestId ?>')" class="model-Btn1" title="Decline Request"><i class="fas fa-trash-alt"></i></span>
                                                    &emsp;
                                                    <span onclick="openModel('addPaymentModel','model-Btn3','<?= $requestId ?>')" class="model-Btn3" title="Complete Task"><i class="fa fa-check-square"></i></span>
                                                </li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <span style="margin-right: 20px;">Request Date : <?php echo date('Y-m-d h:i A', strtotime($row["request_date"])) ?></span>
                                                    <span style="margin-right: 20px;">Request No : <?php echo "TM" . sprintf("%04d", $row["request_id"]) ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <ul>
                                    <li style="text-align: center;">No Inprogress Requests</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>

                <div id="tab3" class="tab">
                    <div>
                        <h2>Completed Requests</h2>
                    </div>
                    <div class="requestsearch">
                        <input type="text" name="search" placeholder="Search.." class="mySearch">
                        <div>
                            <span style="display: inline-block;"> Technical & Maintenence<i class="fa fa-square" style="color: #EB7655;"></i></span>
                        </div>
                    </div>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Preferd Date</li>
                                    <li>Category</li>
                                    <li>Technician</li>
                                    <li>Fee (Rs.)</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->completedReq->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->completedReq->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["preferred_date"])) ?></li>
                                                <li><?php echo $row["category"] ?></li>
                                                <li><?php echo $row["tfname"] . " " . $row["tlname"] ?></li>
                                                <li><?php echo number_format($row["fee"], 2) ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <span style="margin-right: 20px;">Request Date : <?php echo date('Y-m-d h:i A', strtotime($row["request_date"])) ?></span>
                                                    <span style="margin-right: 20px;">Request No : <?php echo "TM" . sprintf("%04d", $row["request_id"]) ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <ul>
                                    <li style="text-align: center;">No Completed Requests</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>

                <div id="tab4" class="tab">
                    <div>
                        <h2>Declines Requests</h2>
                    </div>
                    <div class="requestsearch">
                        <input type="text" name="search" placeholder="Search.." class="mySearch">
                        <div>
                            <span style="display: inline-block;"> Technical & Maintenence<i class="fa fa-square" style="color: #EB7655;"></i></span>
                        </div>
                    </div>
                    <div>
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Resident</li>
                                    <li>Preferd Date</li>
                                    <li>Category</li>
                                    <li>Request Date</li>
                                    <li>Request No</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->declinedReq->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->declinedReq->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["apartment_no"] ?>)</small></li>
                                                <li><?php echo date('D, M d, Y', strtotime($row["preferred_date"])) ?></li>
                                                <li><?php echo $row["category"] ?></li>
                                                <li><?php echo date('Y-m-d h:i A', strtotime($row["request_date"])) ?></li>
                                                <li><?php echo "TM" . sprintf("%04d", $row["request_id"]) ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="margin-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <span style="margin-right: 20px;">Declined Time : <?php echo date('Y-m-d h:i A', strtotime($row["cancelled_time"])) ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <ul>
                                    <li style="text-align: center;">No Declined Requests</li>
                                </ul>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Decline Request</h2>
                    </div>
                    <form action="#" class="removeReservation" method="POST" onsubmit="declineRequest(); return false;">
                        <div>
                            <label>Request No : </label>
                            <span id="answer1"></span>
                        </div>
                        <div>
                            <label>Enter Reason : </label>
                            <textarea name="reason" id="reason" cols="" rows="3" placeholder="Reason..."></textarea>
                        </div>
                        <div>
                            <input class="btnRed" type="submit" name="submit" value="Decline">
                        </div>
                    </form>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Allocate Employee</h2>
                    </div>
                    <form action="#" class="editReservation acceptRequest" onsubmit="acceptRequest(); return false;">
                        <div>
                            <label>Request No : </label>
                            <span id="answer2"></span>
                        </div>
                        <div>
                            <label>Select Technician : </label>
                            <select id="employee" name="employee" class="input-field" required>
                                <option value="">Employee</option>
                            </select>
                        </div>
                        <div>
                            <input class="purplebutton" type="submit" name="submit" value="Accept">
                        </div>
                    </form>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="addPaymentModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h3>Add Request Charge</h3>
                    </div>
                    <form action="#" class="formEdit" onsubmit="addCharge(); return false;">
                        <div>
                            <label>Request No : </label>
                            <span id="answer3"></span>
                        </div>
                        <div>
                            <div>
                                <label>Fee (Rs.)</label><br>
                                <input type="text" name="fee" id="fee" class="input-field" placeholder="1500.00" title="Enter valid amount Eg-1500, 1500.00" pattern="^[0-9]{0,10}(\.[0-9][0-9]?)?" required>
                            </div>
                        </div>
                        <div>
                            <input class="btnPurple" type="submit" name="submit" value="Complete">
                        </div>
                    </form>
                </div>
            </div>

            <!-- success popup -->
            <div class="success" style="display:none;">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="successModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Successful</h2>
                        </div>
                        <form class="formDelete"  onsubmit="previousView(); return false;">
                            <div>
                                <label id="successmsg"></label>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- error popup -->
            <div class="error" style="display:none">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="errorModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Failed</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView(); return false;">
                            <div>
                                <label id="errormsg">Try again later</label>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>