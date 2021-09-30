<?php
include_once 'sidenav.php';
?>

<body style="background-color: gray">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody">


            <div class="card">
                <?php
                if ($this->slots->num_rows > 0) { ?>

                    <?php
                    while ($row = $this->slots->fetch_assoc()) { ?>
                        <a class="pslots" href="#">
                            <?php
                            if ($row["status"]) { ?>
                                <i class="fas fa-car" style="color:red;font-size:40px"></i>
                            <?php echo $row["slot_no"];
                            } else { ?>
                                <i class="fas fa-car" style="color:green;font-size:40px"></i>
                            <?php
                                echo $row["slot_no"];
                            } ?>
                        </a>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>

                <div class="divPopupModel">

                    <button id="model-btn">Add New</button>
                    <p id="answer"></p>

                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="model">

                        <a href="javascript:void(0)" id="closebtn">&times;</a>
                        <div style="text-align: center;">
                            <h1>New Employee<i class="fa fa-user"></i></i></h1>
                        </div>

                        <form action="#" class="formAddEmployee" method="GET">
                            <div id="col1">
                                <label for="type">Type</label><br>
                                <select id="emptype" name="emptype" class="input-field" placeholder="New Announcement">
                                    <option value="manager">Select Employee Type...</option>
                                    <option value="manager">Manager</option>
                                    <option value="manager">Reseptionist</option>
                                    <option value="manager">Parking Officer</option>
                                    <option value="manager">Trainer</option>
                                    <option value="manager">Treater</option>
                                    <option value="manager">Other</option>
                                </select>
                            </div>

                            <div id="col1">
                                <label for="fname">First Name</label><br>
                                <input type="text" id="fname" name="fname" class="input-field" placeholder="John">
                            </div>

                            <div id="col2">
                                <label for="lname">Last Name</label><br>
                                <input type="text" id="lname" name="lname" class="input-field" placeholder="Smith">
                            </div>

                            <div id="col1">
                                <label for="email">Email Address</label><br>
                                <input type="email" id="email" name="email" class="input-field" placeholder="example@email.com">
                            </div>

                            <div id="col2">
                                <label for="cno">Contact Number</label><br>
                                <input type="text" id="cno" name="cno" class="input-field" placeholder="071-1234567">
                            </div>

                            <input style="grid-column: 1/span 2;" type="submit" name="Submit" value="submit">
                        </form>
                        <!-- <div id="btn-grp" style="grid-column: 1;">
<button id="yes-btn">Yes</button>
<button id="no-btn">No</button>
</div> -->
                    </div>

                </div>

            </div>
        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>