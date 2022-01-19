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
                    <input type="text" id="mySearch" placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                </div>

                <div id="tab2" class="tab active">
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
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['request_id']; ?>','maintenence')" class="model-Btn1" title="Remove Manager"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo $row["request_id"]; ?></li>
                                                <li><?php echo $row["preferred_date"]; ?></li>
                                                <li><?php echo $row["category"]; ?></li>
                                                <li><?php echo $row["state"]; ?></li>

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
                                echo "<br>No requests yet...<br><a href= 'maintenence'> Make Now...</a>";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab1" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- laundry -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>

                                    <li>Requested Time</li>
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
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['request_id']; ?>','laundry')" class="model-Btn1" title="Remove Request"><i class="fas fa-trash-alt"></i></span>

                                                </li>
                                                <li><?php echo $row["request_id"]; ?></li>
                                                <li><?php echo $row["request_date"]; ?></li>
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
                                                    <span style="padding-right: 20px;">Description : <?php echo $row["description"] ?></span>
                                                    <a href="yourRequest?reqid=?php echo $row['request_id']; ?>" style="color:white">View more...</a>
                                                </li>
                                            </ul>

                                        </article>

                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "<br>No requests yet...<br><a href= 'laundry'> Make Now...</a>";
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
                                    <li>Arrived Date</li>
                                    <li>Arrived Time</li>
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
                                                    <span onclick="openModel('deleteModel','model-Btn1', '<?= $row['visitor_id']; ?>','visitor')" class="model-Btn1" title="Remove Manager"><i class="fas fa-trash-alt"></i></span>
                                                </li>
                                                <li><?php echo $row["visitor_id"]; ?></li>
                                                <li><?php echo $row["name"]; ?></li>
                                                <li><?php echo $row["arrive_date"]; ?></li>
                                                <li><?php echo $row["arrive_date"]; ?></li>

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
                                echo "<br>No requests yet...<br><a href= 'visitor'> Make Now...</a>";
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
                        <div id="editModel" class="open">

                            <a onclick="closePopup()">&times;</a>
                            <div style="text-align: center;">
                                <?php
                                if ($this->reqSelected->num_rows > 0) {
                                ?>
                                    <?php
                                    while ($row = $this->reqSelected->fetch_assoc()) {
                                    ?>
                                        <li><?php echo $row['category_no']; ?></li>
                                        <li><?php echo $row['qty']; ?></li>
                                        <li><?php echo $row['weight']; ?></li>

                                    <?php
                                    }
                                    ?>
                            </div>
                            <h2><b>Categories:</b></h2>

                        </div>
                    </div>
            <?php }
                            } ?>
            <!-- reservation success message -->
            <!-- error popup -->
            <div class="error" style="display:none;">
                <div class='message'>
                    <div class='check' style="background:red;">
                        &#10006;
                    </div>
                    <p>
                        Request Removed Failed!
                    </p>
                    <p>
                        Try again later
                    </p>
                    <button id='ok' onclick="previousView()" style="background:red;">
                        OK
                    </button>
                </div>
            </div>
            <!-- success popup -->
            <div class="success" style="display:none;">
                <div class='message'>
                    <div class='check'>
                        &#10004;
                    </div>
                    <p>

                        Request Removed Successfully!
                    </p>
                    <p>
                        Check your email for confirmation. We'll see you soon!
                    </p>
                    <button id='ok' onclick="previousView()">
                        OK
                    </button>
                </div>
            </div>



            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>