<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">VISITOR <span id="city">APPROVAL</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div class="card1" style="grid-column:1/span2;margin:auto">
                <div class="data">
                    <div class="photo" style="background-image:url(../../public/img/visitor.jpg);"></div>
                    <ul class="details">
                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                        <li class="author"><?php echo date("H:i"); ?> </li>
                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                    </ul>
                </div>
                <div class="description">
                    <form action="visitor" class="reservationtime" method="POST">
                        <div>
                            <label>Name</label><br>
                            <input type="text" name="name" class="input-field" required><br>
                            <label>Visiting Date</label><br>
                            <input type="date" min="<?= date("Y-m-d") ?>" name="vdate" id="datepicker" class="input-field" required><br>
                            <span class="error_form" id="datetodayup" style="font-size:10px;"></span><br>
                            <label>Description</label><br>
                            <input type="textarea" name="description" id="description"><br>
                            <input class="purplebutton" type="submit" name="Submit" value="Send" style="grid-column:2">
                        </div>

                    </form>
                </div>
            </div>
           <!-- request success message -->
           <?php
            if (isset($this->error)) { ?>

                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Unsuccessfull!</h2>
                        </div>
                        <form class="formDelete" onsubmit="hall ;return false;">
                            <div>
                                <label> <span id="answer2"></span>please try again</label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnRed" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>

            <?php
            }; ?>
            <!-- success popup -->
            <?php
            if (isset($this->success)) { ?>

                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Sent!</h2>
                        </div>
                        <form class="formDelete" onsubmit="">
                            <div>
                                <label> <span id="answer2"></span>Re
                                </label>
                                <span id="answer1"></span>
                            </div>
                            <div>
                                <input class="btnBlue" type="submit" name="submit" value="  OK  ">
                            </div>

                        </form>
                    </div>
                </div>
            <?php
            }; ?>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>