<?php
include_once 'sidenav.php';
?>

</head>



<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARCELS</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="tabs" style="grid-column:1/span3">
                        <ul class="tabs-list">
                            <li class="active"><a href="#tab0">New</a></li>
                            <li><a href="#tab1">In-Locker</a></li>
                            <li><a href="#tab2">Delivered</a></li>
                        </ul>
                        <div class="search" id="filterParcel">

                            <input type="text" id="mySearch" placeholder="Type to filter rows.." style="width:50%;margin:25px 15px 0 22px">
                            <a href="searchOld"><i title="Click to Search old delivered" class="fa fa-history"></i></a>
                        </div>
                        <div id="tab0" class="tab active" style="padding-top: 20px;">
                            <div class="card1" style="grid-column:1/span2;margin:auto">
                                <div class="data">
                                    <div class="photo" style="background-image:url(../../public/img/parcel.jpg);"></div>
                                    <ul class="details">
                                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                                        <li class="author"><?php echo date("H:i"); ?> </li>
                                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                                    </ul>
                                </div>
                                <div class="description">

                                    <form action="parcels" class="reservationtime" method="post">
                                        <div>
                                            <!-- <input type="text" class="input-field-signup" name="apartmentId" placeholder="          Apartment Id" id="apartmentId"> -->
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
                                            <!-- <br><br> -->

                                            <label>Sender</label><br>
                                            <input class="input-field" type="text" name="sender" id="sender" placeholder="Sender" required><br>

                                            <span class="error_form" id="sendererr" style="font-size:10px;"></span><br>

                                            <label>Description</label><br>
                                            <input type="textarea" name="description" id="description"><br>
                                            <br>
                                            <span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><input class="purplebutton" type="button" name="submit" id="disablebutton2" value="Add" style="grid-column:2;cursor:not-allowed;padding:10 10; width:25%" /></span>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div id="tab1" class="tab">
                            <br>

                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- inlocker -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Parcel ID</li>
                                            <li>Apartment ID</li>
                                            <li>Recieved Date</li>
                                            <li>Recieved Time</li>
                                            <li>Sender</li>
                                        </ul>
                                    </main>
                                    <?php
                                    if ($this->inLocker->num_rows > 0) { ?>
                                        <?php
                                        while ($row = $this->inLocker->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">
                                                <article class="row mlb">
                                                    <ul>
                                                        <li><?php echo $row["parcel_id"]; ?></li>
                                                        <li><?php echo $row["apartment_no"]; ?></li>
                                                        <li><?php echo $row["receive_date"]; ?></li>
                                                        <li><?php echo $row["receive_time"]; ?></li>
                                                        <li><?php echo $row["sender"]; ?></li>
                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <span style="padding-right: 20px;">Description: <?php echo $row["description"] ?></span>
                                                            <span> Phone no: <?php echo $row["phone_no"] ?></span>
                                                        </li>
                                                    </ul>
                                                </article>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </section>

                            </div>
                        </div>
                        <div id="tab2" class="tab">
                            <br>

                            <!-- reach -->
                            <section class="wrapper">
                                <main class="row title">
                                    <ul>
                                        <li>Action</li>
                                        <li>Parcel ID</li>
                                        <li>Apartment ID</li>
                                        <li>Recieved Date</li>
                                        <li>Recieved Time</li>
                                    </ul>
                                </main>
                                <?php
                                if ($this->reached->num_rows > 0) { ?>
                                    <?php
                                    while ($row1 = $this->reached->fetch_assoc()) {
                                    ?>
                                        <span id="searchrow">
                                            <article class="row mlb">
                                                <ul>
                                                    <li id="<?php echo $row1['parcel_id']; ?>"><a onclick="deleteparcel(<?php echo $row1['parcel_id']; ?>)"><i class="fas fa-microchip" style="color:white;padding:1px 10px"></i></a></td>
                                                        <!-- <td><a method="get" href="putReached?parcel=<?php echo $row1["parcel_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                    <li><?php echo $row1["parcel_id"]; ?></li>
                                                    <li><?php echo $row1["apartment_no"]; ?></li>
                                                    <li><?php echo $row1["receive_date"]; ?></li>
                                                    <li><?php echo $row1["receive_time"]; ?></li>
                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="padding-right: 20px;">Delivered Time : <?php echo $row1["reached_time"] ?></span>
                                                        <span style="padding-right: 20px;">Description : <?php echo $row1["description"] ?>

                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                <?php
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <label> Parcel from <span id="answer2"></span> to </label>
                        <span id="answer1"></span>
                    </div>
                    <div>
                        <input class="btnRed" style="background-color: #211a49 !important;color: white;border-radius: 10px" type="button" onclick="addparcel()" name="submit" value="Add" >

                    </div>

                </form>
            </div>
        </div>
        <!--Failed popup -->

        <div class="error" style="display: none;">
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 100%; opacity: 0.8;"></div>
                <div id="deleteModel" class="open">

                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Unsuccessfull!</h2>
                    </div>
                    <form class="formDelete">
                        <div>
                            <label> <span id="answer2">Unable to add.Get technical support</span> </label>
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

        <div class="success" style="display: none;">
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 100%; opacity:0.8 "></div>
                <div id="deleteModel" class="open">

                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Success!</h2>
                    </div>
                    <form class="formDelete">
                        <div>
                            <label> <span id="answer2"></span>Parcel added to locker
                            </label>
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