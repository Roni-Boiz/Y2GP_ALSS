<?php
include_once 'sidenav.php';
?>
<TITLE>Visitor</TITLE>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">VISITOR <span id="city">APPROVAL</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div class="tabs" style="grid-column:1/span3">
                        <ul class="tabs-list">
                            <li class="active"><a href="#tab0">ADD VISITOR</a></li>
                            <li><a href="#tab1">IN-COMING</a></li>
                            <li><a href="#tab2">OUT-GOING</a></li>
                            <li><a href="#tab3">PREVIOUS</a></li>
                            <!-- <li ><a href="#tab3">OVERDUE VISITORS</a></li> -->
                        </ul><br><br>
                        <div class="search" id="visitorSearch">
                            <input type="text" id="mySearch" placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                        </div>
                        <div id="tab0" class="tab active">
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
                                    <form action="addVisitors" class="reservationtime" method="POST">
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
                                        <label> Add <span id="answer2"></span> Visitor of </label>
                                        <span id="answer1"></span>
                                    </div>
                                    <div>
                                        <input class="btnRed" type="button" onclick="addvisitor()" name="submit" value="Add">
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
                                            <label> <span id="answer2"></span>Visitor added
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
                        <div id="tab1" class="tab">

                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- today -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Action</li>
                                            <li>Visitor Id</li>
                                            <li>Visitor Name</li>
                                            <li>Apartment No</li>
                                            <!-- <li>Description</li> -->
                                        </ul>
                                    </main>

                                    <?php
                                    if ($this->todayVisitors->num_rows > 0) { ?>
                                        <?php
                                        while ($row1 = $this->todayVisitors->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">

                                                <article class="row mlb">
                                                    <ul>
                                                        <li><a method="GET" href="markIn?visitor=<?php echo $row1["visitor_id"]; ?>"><i class="far fa-check-circle" style="color:white;padding:1px 10px"></i></a></li>
                                                        <!-- <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><i class="fas fa-trash-alt"></i></span></li> -->
                                                        <li><?php echo $row1["visitor_id"]; ?></li>
                                                        <li><?php echo $row1["name"]; ?></li>
                                                        <li><?php echo $row1["apartment_no"]; ?></li>


                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <span style="padding-right: 20px;">Description: <?php echo $row1["description"] ?></span>
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
                            <div class="divPopupModel">
                                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                                <div id="deleteModel">
                                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                                    <div style="text-align: center; margin-bottom: 10px;">
                                        <h2>Are You Sure ?</h2>
                                    </div>
                                    <form action="#" class="formDelete" method="POST">
                                        <div>
                                            <label> Delete User With User ID </label>
                                            <span><?= "UID1234" ?></span>
                                        </div>
                                        <div>
                                            <input class="btnRed" type="submit" name="submit" value="Delete">
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div id="tab2" class="tab">

                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- today -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Action</li>
                                            <li>Visitor Id</li>
                                            <li>Visitor Name</li>
                                            <li>Apartment No</li>
                                            <li>Arrived Time</li>
                                            <!-- <li>Description</li> -->
                                        </ul>
                                    </main>

                                    <?php
                                    if ($this->outgoingVisitors->num_rows > 0) { ?>
                                        <?php
                                        while ($row2 = $this->outgoingVisitors->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">

                                                <article class="row mlb">
                                                    <ul>
                                                        <li><a method="GET" href="markOut?visitor=<?php echo $row2["visitor_id"]; ?>"><i class="far fa-check-circle" style="color:white;padding:1px 10px"></i></a></li>
                                                        <!-- <li><span onclick="openModel('deleteModel','model-Btn1')" class="model-Btn1"><i class="fas fa-trash-alt"></i></span></li> -->
                                                        <li><?php echo $row2["visitor_id"]; ?></li>
                                                        <li><?php echo $row2["name"]; ?></li>
                                                        <li><?php echo $row2["apartment_no"]; ?></li>
                                                        <li><?php echo $row2["arrive_time"]; ?></li>

                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <span style="padding-right: 20px;">Description: <?php echo $row2["description"] ?></span>
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
                            <!-- <div class="divPopupModel">
                                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                                <div id="deleteModel">
                                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                                    <div style="text-align: center; margin-bottom: 10px;">
                                        <h2>Are You Sure ?</h2>
                                    </div>
                                    <form action="#" class="formDelete" method="POST">
                                        <div>
                                            <label> Delete User With User ID </label>
                                            <span><?= "UID1234" ?></span>
                                        </div>
                                        <div>
                                            <input class="btnRed" type="submit" name="submit" value="Delete">
                                        </div>

                                    </form>
                                </div>
                            </div> -->
                        </div>
                        <div id="tab3" class="tab">


                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- pre -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Vistor ID</li>
                                            <li>Visitor Name</li>
                                            <li>Apartment No</li>
                                            <li>Visited Date</li>
                                            <li>Visited time</li>
                                        </ul>
                                    </main>

                                    <?php
                                    if ($this->previousVisitors->num_rows > 0) { ?>
                                        <?php
                                        while ($row3 = $this->previousVisitors->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">
                                                <article class="row mlb">
                                                    <ul>
                                                        <li><?php echo $row3["visitor_id"]; ?></li>
                                                        <li><?php echo $row3["name"]; ?></li>
                                                        <li><?php echo $row3["apartment_no"]; ?></li>
                                                        <li><?php echo $row3["arrive_date"]; ?></li>
                                                        <li><?php echo $row3["arrive_time"]; ?></li>


                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <?php if ($row3["description"]) { ?><span style="padding-right: 20px;">Description: <?php echo $row3["description"] ?></span><?php } ?>
                                                            <span style="padding-right: 20px;">Departure time: <?php echo $row3["departure_time"] ?></span>
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
                <!-- <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Upcoming Activities . . .</h3>
                        </div>
                        
                        <?php
                        if ($this->todayVisitors->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->todayVisitors->fetch_assoc()) {
                            ?>
                                <!-- <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["preferred_date"]; ?></h5>
                                            <small><?php echo $row["category"]; ?></small><br>
                                            <small><?php echo $row["description"]; ?></small>
                                        </div>
                                    </div>
                                </div> -->
            <?php
                            } ?>

        <?php
                        } else {
                            echo "No Activities";
                        } ?>

            </div>
        </div>
    </div>
    </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
    <script>
        $(document).ready(function() {
            $(".tabs-list li a").click(function(e) {
                e.preventDefault();
            });

            $(".tabs-list li").click(function() {
                var tabid = $(this).find("a").attr("href");
                $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab and tab content
                $(".tab").hide(); // hiding open tab
                $(tabid).show(); // show tab
                $(this).addClass("active"); //  adding active class to clicked tab
            });
        });
    </script>

</body>

</html>