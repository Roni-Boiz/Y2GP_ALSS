<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PREVIOUS <span id="city">REQUESTS</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <br>
                <!-- <input type="submit" onclick="yourRequest" value="Back"></input> -->

                <?php if ($this->type == '1') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Laundry Requests</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preRequest?type=1">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php
                } else if ($this->type == '2') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Maintenence and Technical Requests</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preRequest?type=2">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php
                } elseif ($this->type == '3') {
                ?>
                    <section class="wrapper">
                        <main class="row title">
                            <ul style="text-align:center">
                                <li>Previous Visitors</li>
                            </ul>
                        </main>
                    </section>
                    <div class="search">
                        <form method="post" action="preRequest?type=3">
                            <input type="date" name="date" id="mySearch" placeholder="Search.." max="<?= date("Y-m-d") ?>" style="width:50%;margin: 5px 20px">
                            <input type="submit" value="Search"></input>
                        </form>
                    </div>
                <?php }
                ?>


                <?php
                if (isset($this->maintenence)) { ?>

                    <div id="tab2" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">
                            <!-- maintenence -->
                            <section class="wrapper">
                                <main class="row title">

                                    <ul>
                                        <li>Request ID</li>
                                        <li>Prefered Date</li>
                                        <li>Type</li>
                                        <li>State</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->maintenence->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["request_id"]; ?></li>
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
                                                    <span style="padding-right: 20px;"> <?php if (!$row["cancelled_time"] == NULL) echo "Removed"; ?></span>
                                                </li>
                                            </ul>

                                        </article>
                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- laundry -->
                <?php
                if (isset($this->laundry)) { ?>

                    <div id="tab1" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">

                            <section class="wrapper">
                                <main class="row title">
                                    <ul>
                                        <li>Request ID</li>
                                        <li>Preferred Date</li>
                                        <li>State</li>
                                        <li>Type</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->laundry->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>

                                                <li><?php echo $row["request_id"]; ?></li>
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
                                                    <!-- <a style="padding-left: 20px;padding-top:10px" href="yourRequest?reqid=<?php echo $row['request_id']; ?>" style="color:white"><i class="fas fa-angle-double-right" title="See more..."></i></a> -->

                                                </li>


                                            </ul>

                                        </article>

                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($this->visitor)) { ?>

                    <div id="tab3" class="tab" style="display:block">
                        <div style="overflow-x:auto;grid-column:1/span2">
                            <!-- laundry -->
                            <section class="wrapper">
                                <main class="row title">
                                    <ul>
                                        <li>Request ID</li>
                                        <li>Name</li>
                                        <li>Arrive Date</li>
                                        <li>Arrived Time</li>
                                    </ul>
                                </main>
                                <?php
                                while ($row = $this->visitor->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>

                                                <li><?php echo $row["visitor_id"]; ?></li>
                                                <li><?php echo $row["name"]; ?></li>
                                                <li><?php echo $row["arrive_date"]; ?></li>
                                                <?php if ($row["arrive_time"] == NULL) { ?>
                                                    <li><?php echo $row["arrive_time"]; ?></li>
                                                <?php } else { ?>
                                                    <li><?php echo "Not arrived"; ?></li>
                                                <?php } ?>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                </li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                } ?>
                            </section>
                        </div>
                    </div>
                <?php
                }
                ?>
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

                            <a onclick="closePopup()">&times;</a>
                            <div style="text-align: center;">
                                <?php
                                if ($this->reqSelected->num_rows > 0) {
                                    $count = 0;
                                ?>
                                    <?php
                                    while ($row = $this->reqSelected->fetch_assoc()) {
                                    ?>
                                        <?php if ($count == 0) echo "<h2>Categories</h2>" . $row["request_id"];
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


            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>