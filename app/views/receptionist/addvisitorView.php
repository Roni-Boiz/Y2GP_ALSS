<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">ADD <span id="city">VISITORS</span></h1>
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
                    <form action="markIn" class="reservationtime" method="POST">
                        <div>
                            <label>Name</label><br>
                            <input type="text" name="name" id="name" class="input-field" required><br>
                            <span class="error_form" id="nameerr" style="font-size:10px;"></span><br>
                            <label>Apartment No</label><br>
                            <select class="input-field" name="apartmentId" id="selectapartment" required>
                                <option value="">Apartment No</option>
                                <?php

                                while ($row0 = $this->presentApartments->fetch_assoc()) {
                                    $apartment = $row0['apartment_no'];
                                    echo "<option value='$apartment'>$apartment</option>";
                                }
                                ?>
                            </select>
                            <br>

                            <span class="error_form" id="apartmenterr" style="font-size:10px;"></span><br>

                            <label>Description</label><br>
                            <input type="textarea" style="width: 80%;" name="description" id="description"><br>
                            <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><input class="purplebutton" type="button" id="disablebutton2" name="Submit" value="Add" style="grid-column:2;cursor:not-allowed;padding:10 10; width:25%"></span>
                        </div>

                    </form>
                </div>
            </div>
            <!-- reservation success message -->
            <?php
            if (isset($this->error)) { ?>

                <div class="divPopupModel">
                    <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                    <div id="deleteModel" class="open">

                        <div style="text-align: center; margin-bottom: 10px;">
                            <h2>Request Failed!</h2>
                        </div>
                        <form class="formDelete">
                            <div>
                                <label> <span id="answer2"></span><?php echo $this->error; ?></label>
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
                            <h2>Successfull!</h2>
                        </div>
                        <form class="formDelete">
                            <div>
                                <label> <span id="answer2"></span>Request Done!
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
            <a href="visitors">to proceed further</a>
            <!-- add confirmation -->
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Are You Sure ?</h2>
                    </div>
                    <form class="formDelete">
                        <div>
                            <label> Add <span id="answer2"></span> Visitor of </label>
                            <span id="answer1"></span>
                        </div>
                        <div>
                            <input class="btnRed" type="submit" onclick="addvisitor()" name="submit" value="Add">
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>