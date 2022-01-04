<?php
include_once 'sidenav.php';
?>

</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">HANDLE LAUNDRY</h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">New</a></li>
                    <li><a href="#tab2">Cleaning</a></li>
                    <li><a href="#tab3">Completed</a></li>
                </ul>
                <div id="tab1" class="tab active">
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyNewRequests->num_rows > 0) { ?>
                                <?php
                                while ($row1 = $this->laundyNewRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <a href="Requests?reqId=<?php $row1['request_id'];?>"><span class="newMode" >
                                            <article class="row mlb">
                                                <ul>
                                                    <li id="<?php echo $row1['request_id']; ?>"><?php echo $row1["request_id"]; ?></li>
                                                    <!-- <td><a method="get" href="putReached?parcel=<?php echo $row1["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                    <li><?php echo $row1["apartment_no"]; ?></li>
                                                    <li><?php echo $row1["type"]; ?></li>
                                                    <li><?php echo $row1["request_date"]; ?></li>
                                                    <li><?php echo $row1["request_time"]; ?></li>
                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="padding-right: 20px;">Description: <?php echo $row1["description"] ?></span>
                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
                                        </a>
                                    </span>
                                    <!-- <button id="model-btn" class="purplebutton">Reserve Now</button> -->
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
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyCleaningRequests->num_rows > 0) { ?>
                                <?php
                                while ($row2 = $this->laundyCleaningRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <span class="comModel" onclick="openModel('deleteModel','comModel')">
                                        <!-- <span class="comModel" onclick="openModel('completeModel','comModel')"> -->
                                            <article class="row mlb">
                                                <ul>
                                                    <li id="<?php echo $row2['request_id']; ?>"><?php echo $row2["request_id"]; ?></li>
                                                    <!-- <td><a method="get" href="putReached?parcel=<?php echo $row2["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                    <li><?php echo $row2["apartment_no"]; ?></li>
                                                    <li><?php echo $row2["type"]; ?></li>
                                                    <li><?php echo $row2["request_date"]; ?></li>
                                                    <li><?php echo $row2["request_time"]; ?></li>
                                                </ul>
                                                <ul class="more-content">
                                                    <li>
                                                        <span style="padding-right: 20px;">Description: <?php echo $row2["description"] ?></span>
                                                    </li>
                                                </ul>
                                            </article>
                                        </span>
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
                <div id="tab3" class="tab">
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <!-- reach -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Request Id</li>
                                    <li>Apartment No</li>
                                    <li>Type</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyCompletedRequests->num_rows > 0) { ?>
                                <?php
                                while ($row3 = $this->laundyCompletedRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li id="<?php echo $row3['request_id']; ?>"><?php echo $row3["request_id"]; ?></li>
                                                <!-- <td><a method="get" href="putReached?parcel=<?php echo $row3["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                <li><?php echo $row3["apartment_no"]; ?></li>
                                                <li><?php echo $row3["type"]; ?></li>
                                                <li><?php echo $row3["request_date"]; ?></li>
                                                <li><?php echo $row3["request_time"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Fee: <?php echo $row3["fee"] ?></span>
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
            <?php
            if(isset($this->reqSelected)){
            ?>
            <div class="divPopupModel">
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel" class="open" >

                    <a onclick="closePopup()">&times;</a>
                    <div style="text-align: center;">
                        <h1>L00233434</h1>
                    </div>

                    <form action="addEmployee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Regular</label><br>
                        </div>
                        <div id="col2">
                            <h4 style="padding:0px">2021-10-12<br>10:34</h4>
                        </div>
                        <h2><b>Categories:</b></h2>
                        <br>
                        <div id="col1">
                            <label for="categories">Category 1</label>
                            <input type="text" name="quantiy1" id="quantiy1" value="5" readonly>
                            
                        </div>
                        <div id="col2">
                            <input type="checkbox" id="category1" name="category1">
                            <input type="text" name="quantiy1" id="quantiy1" value="1-5Kg" readonly>
                        </div>
                        <div id="col1">
                            <label for="Categories">Category 2</label><br>
                            <input type="text" name="quantiy1" id="quantiy1" value="8" readonly>
                        </div>
                        <div id="col2">
                            <input type="checkbox" id="category2" name="category2">
                            <input type="text" name="quantiy1" id="quantiy1" value="5-10Kg" readonly>
                        </div>
                        <div id="col1">
                            <label for="Categories">Category 3</label><br>
                            <input type="text" name="quantiy1" id="quantiy1" value="5" readonly>
                        </div>
                        <div id="col2">
                            <input type="checkbox" id="category3" name="category3">
                            <input type="text" name="quantiy1" id="quantiy1" value="1-5Kg" readonly>
                        </div>
                        <div id="col1">
                            <label for="Categories">Description</label><br>
                            
                        </div>
                        <textarea style="border-radius:5px;grid-column: 1/span 2 ; width:80%;"  name="description" id="description" cols="60" rows="3" readonly>category 1 dry only</textarea>
                        <br><br>
                        <div id="col1">
                            <input style="grid-column: 1/span 2; background-color:red" type="submit" name="submit" value="Decline">
                        </div>
                        <div id="col2">
                            <input style="grid-column: 1/span 2;" type="submit" name="submit" value="Accept">
                        </div>
                    </form>
                </div>
            </div>
            <?php }
            ?>
            <div class="divPopupModel">

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="deleteModel">

                    <a href="requests">&times;</a>
                    <div style="text-align: center;">
                        <h1>L00233434</h1>
                    </div>

                    <form action="addEmployee" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                        <div id="col1">
                            <label for="type">Regular</label><br>
                        </div>
                        <div id="col2">
                            <h4 style="padding:0px">2021-10-12<br>10:34</h4>
                        </div>
                        <h2><b>Add Fees:</b></h2>
                        <br>
                        <div id="col1">
                            <label for="categories">Category 1</label>
                            <input type="text" name="quantiy1" id="quantiy1" placeholder="Kg">
                        </div>
                        <div id="col2">
                            <br>
                            <input type="text" name="quantiy1" id="quantiy1" placeholder="LKR">
                        </div>
                        <div id="col1">
                            <label for="Categories">Category 2</label>
                            <input type="text" name="quantiy1" id="quantiy1" placeholder="Kg">
                        </div>
                        <div id="col2">
                            <br>
                            <input type="text" name="quantiy1" id="quantiy1" value="" placeholder="LKR">
                        </div>
                        <div id="col1">
                            <label for="Categories">Category 3</label>
                            <input type="text" name="quantiy1" id="quantiy1" placeholder="Kg" >
                        </div>
                        <div id="col2">
                            <br>
                            <input type="text" name="quantiy1" id="quantiy1" placeholder="LKR">
                            <br><br>
                        </div>

                        <div id="col2">
                            <input style="grid-column:2;" type="submit" name="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
            <?php
                if (0) { ?>
                    <div class='b'></div>
                    <div class='bb'></div>
                    <div class='message'>
                        <div class='check'>
                            &#10004;
                        </div>
                        <p>
                            Reservation Success!
                        </p>
                        <p>
                            Check your email for a booking confirmation. We'll see you soon!
                        </p>
                        <button id='ok' onclick='window.location = "fitness" '>
                            OK
                        </button>
                    </div>
                <?php
                }; ?>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>