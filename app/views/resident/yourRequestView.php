<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">REQUESTS</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Laundry</a></li>
                    <li><a href="#tab2">Maintenece</a></li>
                    <li><a href="#tab3">Visitors</a></li>
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="search">
                    <input type="text" id="mySearch" placeholder="Type to filter rows.." style="width:50%;margin: 5px 20px"><i class="fa fa-history" aria-hidden="true" title="Search previous..." onclick="previousrequest()"></i>
                </div>

                <div id="tab2" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- maintenence -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Prefered Date</li>
                                    <li>Type</li>
                                    <li>State</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->maintenence->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->maintenence->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['request_id']; ?>">
                                                    <?php if ($row["state"] == "p") { ?>

                                                    <?php } else {
                                                    ?>
                                                        <span><i class='fa fa-times' aria-hidden='true' title="cant take action"></i></span>

                                                    <?php
                                                    } ?>
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['request_id']; ?>','maintenence')" class="model-Btn1" title="Remove Request"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo "M" . sprintf("%04d", $row["request_id"]) ?></li>
                                                <li><?php echo $row["preferred_date"]; ?></li>
                                                <li><?php echo $row["category"]; ?></li>
                                                <li>
                                                    <?php
                                                    if ($row["state"] == "p") echo "Pending";
                                                    if ($row["state"] == "d") echo "Rejected";
                                                    if ($row["state"] == "i") echo "In-Progress";
                                                    if ($row["state"] == "c") echo "Completed";

                                                    ?>
                                                </li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Requested Date : <?php echo $row["request_date"] ?></span>
                                                    <span style="padding-right: 20px;">Description : <?php echo $row["description"]  ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "<br>No requests yet...<br><a href= 'maintenence' style='color:black'> Make Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- laundry -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Preferred Date</li>
                                    <li>State</li>
                                    <li>Type</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundry->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->laundry->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['request_id']; ?>">
                                                    <?php if ($row["state"] == "0") { ?>
                                                        <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['request_id']; ?>','laundry')" class="model-Btn1" title="Remove Request"><i class="fas fa-trash-alt"></i></span>

                                                    <?php } else {
                                                    ?>
                                                        <span><i class='fa fa-times' aria-hidden='true' title="cant take action"></i></span>

                                                    <?php
                                                    } ?>

                                                </li>
                                                <li><?php echo "L" . sprintf("%04d", $row["request_id"]) ?></li>
                                                <li><?php echo $row["preferred_date"]; ?></li>
                                                <li>
                                                    <?php
                                                    if ($row["state"] == "0") echo "Pending";
                                                    if ($row["state"] == "-1") echo "Rejected";
                                                    if ($row["state"] == "1") echo "In-Progress";
                                                    if ($row["state"] == "2") echo "Completed";

                                                    ?>
                                                </li>
                                                <li><?php echo $row["type"]; ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Requested Date : <?php echo $row["request_date"] ?></span>
                                                    <span style="padding-left: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <a style="padding-left: 20px;padding-top:10px" href="yourRequest?reqid=<?php echo $row['request_id']; ?>" style="color:white"><i class="fas fa-angle-double-right" title="See more..."></i></a>

                                                </li>


                                            </ul>

                                        </article>

                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "<br>   No requests yet...<br><a href= 'laundry' style='color:black'> Make Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- laundry -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Name</li>
                                    <li>Arrive Date</li>
                                    <!-- <li>Arrived Time</li> -->
                                </ul>
                            </main>
                            <?php
                            if ($this->visitor->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->visitor->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row['visitor_id']; ?>">
                                                    <?php if ($row["arrive_time"] == NULL) { ?>
                                                        <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['visitor_id']; ?>','visitor')" class="model-Btn1" title="Remove Request"><i class="fas fa-trash-alt"></i></span>

                                                    <?php } else {
                                                    ?>
                                                        <span><i class='fa fa-times' aria-hidden='true' title="cant take action"></i></span>

                                                    <?php
                                                    } ?>
                                                </li>
                                                <li><?php echo "V" . sprintf("%04d", $row["visitor_id"]) ?></li>
                                                <li><?php echo $row["name"]; ?></li>
                                                <li><?php echo $row["arrive_date"]; ?></li>
                                                <!-- <?php if (!$row["arrive_time"] == NULL) { ?>
                                                    <li><?php echo $row["arrive_time"]; ?></li>
                                                <?php } else { ?>
                                                    <li><?php echo "Not arrive yet"; ?></li>
                                                <?php } ?> -->

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "<br>No requests yet...<br><a href= 'visitor' style='color:black'> Make Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <!-- delete confirmation -->
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="deleteModel">
                        <a href="javascript:void(0)" class="closebtn">&times;</a>
                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Are You Sure ?</h2>
                        </div>
                        <form class="formDelete" onsubmit="deleterequest() ;return false;">
                            <div>
                                <label> Delete <span id="answer2"></span> request with request ID </label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="Delete">
                            </div>

                        </form>
                    </div>
                </div>



                <?php
                if (isset($this->reqSelected)) {
                ?>
                    <div class="divPopupModel">
                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model" class="open">
                        <a href="yourRequest" class="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <?php
                                if ($this->reqSelected->num_rows > 0) {
                                    $count = 0;
                                ?>
                                    <?php
                                    while ($row = $this->reqSelected->fetch_assoc()) {
                                    ?>
                                        <?php if ($count == 0) echo "<h2>Categories</h2>L" . sprintf("%04d", $row["request_id"]);
                                        $count++;
                                        ?>
                                        <div id="col1">
                                            <label for="categories"><?php echo "Category  " . $row["category_no"] ?> </label>
                                            <input type="text" name="quantiy1" id="quantiy1" value="Qty :<?php echo $row["qty"] ?>" readonly>

                                        </div>

                                        <div id="col2">

                                            <input type="text" name="quantiy1" id="quantiy1" value="Net weight :<?php echo $row["weight"] ?>" readonly>
                                        </div>

                                    <?php
                                    }
                                    ?>
                            </div>


                        </div>
                    </div>
            <?php }
                            } ?>


            <!-- request success message -->
            <div class="error" style="display:none;z-index:5">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Failed!</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView() ;return false;">
                            <div>
                                <label> <span id="answer2"></span>Try again later</label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- success popup -->
            <div class="success" style="display:none;">
                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Request Removed!</h2>
                        </div>
                        <form class="formDelete" onsubmit="previousView() ;return false;">
                            <div>
                                <label> <span id="answer2"></span>Penalty fee add your account </label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            </div>



            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>