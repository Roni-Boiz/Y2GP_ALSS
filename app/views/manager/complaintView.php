<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock City Complaints</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div id="complaint">
                <div>
                    <h2>New Complaints</h2>
                    <div class="complaintHead">
                        <div class="card" id="newcomplaints" style="grid-column: 1;">
                            <?php
                            if ($this->complaints->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->complaints->fetch_assoc()) {
                                    if (empty($row["employee_id"])) {
                                ?>
                                        <div>
                                            <div>
                                                <div>
                                                    <h3><i style="padding: 5px;" class="fa fa-building" aria-hidden="true"></i> <?= $row["apartment_no"] ?></h3>
                                                    <h4><i style="padding: 5px;" class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["resident_id"] ?>)</small></h4>
                                                    <h4><?php echo $row["type"] ?></h4>
                                                </div>

                                                <div>
                                                    <?php
                                                    $datetime =  $row["date_time"];
                                                    $date = date('Y-m-d', strtotime($datetime));
                                                    $time = date('h:i:s A', strtotime($datetime));
                                                    ?>
                                                    <h5><?php echo  $date ?></h5>
                                                    <dd><?php echo $time ?></dd>
                                                </div>
                                            </div>
                                            <p><?= $row["description"] ?></p>
                                            <input type="submit" value="Consider" class="model-Btn2" onclick="openModel('editModel','model-Btn2','<?= $row['complaint_id'] ?>')">
                                            <input type="submit" class="btnRed" id="<?=$row['complaint_id']?>" value="Dismiss" style="margin-right: 10px;" onclick="dismissComplaint('<?= $row['complaint_id'] ?>')">
                                        </div>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <h4>No complaints</h4>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="holdAccount adminHoldAccount" style="grid-column: 2;">
                            <div class="head">
                                <h3>Contact Details . . .</h3>
                            </div>
                            <div class="detail">
                                <div>
                                    <img src="../../public/img/user.png" alt="user" />
                                    <div class="detail-info">
                                        <h5>Front Desk</h5>
                                        <small>Miss. Rupa</small>
                                    </div>
                                </div>
                                <div class="moreContent">
                                    <span>
                                        <h5>Email : hawlock@gmail.com</h5>
                                    </span>
                                    <span>
                                        <h5>Mobile No : 011-1234567</h5>
                                    </span>
                                </div>
                            </div>
                            <div class="detail">
                                <div>
                                    <img src="../../public/img/user.png" alt="user" />
                                    <div class="detail-info">
                                        <h5>Trainer</h5>
                                        <small>Mr. Saman</small>
                                    </div>
                                </div>
                                <div class="moreContent">
                                    <span>
                                        <h5>Email : trainer@gmail.com</h5>
                                    </span>
                                    <span>
                                        <h5>Mobile No : 011-1234567</h5>
                                    </span>
                                </div>
                            </div>
                            <div class="detail">
                                <div>
                                    <img src="../../public/img/user.png" alt="user" />
                                    <div class="detail-info">
                                        <h5>Treater</h5>
                                        <small>Miss. Pavani</small>
                                    </div>
                                </div>
                                <div class="moreContent">
                                    <span>
                                        <h5>Email : treater@gmail.com</h5>
                                    </span>
                                    <span>
                                        <h5>Mobile No : 011-1234567</h5>
                                    </span>
                                </div>
                            </div>
                            <div class="detail">
                                <div>
                                    <img src="../../public/img/user.png" alt="user" />
                                    <div class="detail-info">
                                        <h5>Security</h5>
                                        <small>Mr. Raju</small>
                                    </div>
                                </div>
                                <div class="moreContent">
                                    <span>
                                        <h5>Email : security@gmail.com</h5>
                                    </span>
                                    <span>
                                        <h5>Mobile No : 011-1234567</h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php $this->complaints->data_seek(0); ?>
                <div class="complaintsearch">
                    <input type="text" name="search" placeholder="Search.." class="mySearch">
                    <div style="float: right;">
                        <span style="display: inline-block;"> New <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Old <i class="fa fa-square" style="color: #52D29A;"></i></span>
                    </div>
                </div>
                <div>
                    <section class="wrapper">
                        <main class="row title">
                            <ul>
                                <li>Apartment No</li>
                                <li>Resident Name</li>
                                <li>Type</li>
                                <li>Date</li>
                                <li>Time</li>
                            </ul>
                        </main>
                        <?php
                        if ($this->complaints->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->complaints->fetch_assoc()) {
                                if (empty($row["employee_id"])) {
                            ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["apartment_no"] ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <?php
                                                $datetime =  $row["date_time"];
                                                $date = date('Y-m-d', strtotime($datetime));
                                                $time = date('h:i:s A', strtotime($datetime));
                                                ?>
                                                <li><?php echo $date ?></li>
                                                <li><?php echo $time ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li><?php echo $row["description"] ?></li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["apartment_no"] ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <?php
                                                $datetime =  $row["date_time"];
                                                $date = date('Y-m-d', strtotime($datetime));
                                                $time = date('h:i:s A', strtotime($datetime));
                                                ?>
                                                <li><?php echo $date ?></li>
                                                <li><?php echo $time ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li><?php echo $row["description"] ?></li>
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
                        ?>
                            <ul>
                                <li style="text-align: center;">No Complaints</li>
                            </ul>
                        <?php
                        }
                        ?>
                    </section>
                </div>
            </div>

            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Consider Complaint</h2>
                    </div>
                    <form action="#" class="editReservation" onsubmit="considerComplaint(); return false;">
                        <div>
                            <label>Complaint No : </label>
                            <span id="answer2"></span>
                        </div>
                        <div>
                            <label>Recipient Mail : </label><br>
                            <input type="email" id="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="valid emails only" placeholder="example@email.com" required>
                        </div>
                        <div>
                            <label>Enter mail : </label>
                            <textarea name="mailbody" id="mailbody" cols="" rows="3" placeholder="Mail body..." required></textarea>
                        </div>
                        <div>
                            <input class="purplebutton" type="submit" name="submit" value="Done">
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