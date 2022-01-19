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
                    <li id="1" class="active"><a href="#tab1">New</a></li>
                    <li id="2" ><a href="#tab2">Cleaning</a></li>
                    <li id="3"><a href="#tab3">Completed</a></li>
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
                                    <li>Preferred Date</li>
                                    <!-- <li>Requested Time</li> -->
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyNewRequests->num_rows > 0) { ?>
                                <?php
                                while ($row1 = $this->laundyNewRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <a style="color:white" href="requests?reqId=<?php echo $row1['request_id']; ?>&tab=0"><span class="newMode">
                                                <article class="row mlb">
                                                    <ul>
                                                        <li id="<?php echo $row1['request_id']; ?>"><?php echo $row1["request_id"]; ?></li>
                                                        <li><?php echo $row1["apartment_no"]; ?></li>
                                                        <li><?php echo $row1["type"]; ?></li>
                                                        <li><?php echo $row1["preferred_date"]; ?></li>
                                                    </ul>
                                                    <ul class="more-content">
                                                        <li>
                                                            <span style="padding-right: 20px;">Requested Date & Time: <?php echo $row1["request_date"] ?></span>
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
                                    <li>Requested Date & Time</li>
                                    <!-- <li>Requested Time</li> -->
                                </ul>
                            </main>
                            <?php
                            if ($this->laundyCleaningRequests->num_rows > 0) { ?>
                                <?php
                                while ($row2 = $this->laundyCleaningRequests->fetch_assoc()) {
                                ?>
                                    <span id="searchrow">
                                        <!-- <span class="comModel" onclick="openModel('deleteModel','comModel')"> -->
                                        <a onclick="addPopup" style="color:white" href="requests?reqId=<?php echo $row2['request_id']; ?>&tab=1"><span class="newMode">

                                                <!-- <span class="comModel" onclick="openModel('completeModel','comModel')"> -->
                                                <article class="row mlb">
                                                    <ul>
                                                        <li id="<?php echo $row2['request_id']; ?>"><?php echo $row2["request_id"]; ?></li>
                                                        <!-- <td><a method="get" href="putReached?parcel=<?php echo $row2["request_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                                        <li><?php echo $row2["apartment_no"]; ?></li>
                                                        <li><?php echo $row2["type"]; ?></li>
                                                        <li><?php echo $row2["request_date"]; ?></li>

                                                    </ul>
                                                    <ul class="more-content">
                                                        <!-- <li>
                                                            <span style="padding-right: 20px;">Description: <?php echo $row2["description"] ?></span>
                                                        </li> -->
                                                    </ul>
                                                </article>
                                            </span>
                                        </a>
                                        <!-- </span> -->
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
                                    <li>Requested Date & Time</li>
                                    <li>Total Fee</li>
                                    <!-- <li>Requested Time</li> -->
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
                                                <li><?php echo $row3["fee"]; ?></li>

                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    
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
            <!-- delete confirmation -->
            <div class="divPopupModel" >
                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="editModel"   >
                    <a href="javascript:void(0)" class="closebtn">&times;</a>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Are You Sure ?</h2>
                    </div>
                    <form class="formDelete" onsubmit="deleterequest() ;return false;">
                        <div>
                            <label> Delete <span id="answer2"></span> reservation with reservation ID </label>
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
                <div class="divPopupModel" id="close">
                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="editModel"  class="open">
                    <a onclick="closePopup()" class="closebtn">&times;</a>
                        <!-- <a onclick="closePopup()">&times;</a> -->
                        <div style="text-align: center;">
                            <h1><?php $row4 = $this->requestInfo->fetch_assoc();
                                echo $row4["request_id"] ;
                                $id=$row4["request_id"];?>
                                
                        </div>

                        <form action="laundryresponse" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                            <div id="col1">
                                <label for="type"><?php echo $row4["type"] ?></label><br>
                            </div>
                            
                            <h2><b>Categories:</b></h2>
                            <br>
                            <?php if ($this->selectedNewCat->num_rows > 0) { ?>
                                <?php
                                while ($row4 = $this->selectedNewCat->fetch_assoc()) {
                                ?>
                                    <div id="col1">
                                        <label for="categories"><?php echo "Category  " . $row4["category_no"] ?> </label>
                                        <input type="text" name="quantiy1" id="quantiy1" value="<?php echo $row4["qty"] ?>" readonly>

                                    </div>

                                    <div id="col2">
                                        <?php if($row4["category_no"]==1){?> 
                                        <input type="checkbox" id="category1" value="1" name="<?php echo "category".$row4["category_no"] ?>"><?php 
                                        } ;?>
                                        <?php if($row4["category_no"]==2){?> 
                                        <input type="checkbox" id="category2" value="1" name="<?php echo "category".$row4["category_no"] ?>"><?php 
                                        } ;?>
                                        <?php if($row4["category_no"]==3){?> 
                                        <input type="checkbox" id="category3" value="1" name="<?php echo "category".$row4["category_no"] ?>"><?php 
                                        } ;?>
                                        <input type="text" name="quantiy1" id="quantiy1" value="<?php echo $row4["weight"] ?>" readonly>
                                    </div>


                                <?php } ?>
                                <input type="hidden" name="requestId1" id="requestId1" value="<?php echo $id; ?>" readonly>
                            <?php } ?>
                            <div id="col1">
                                <label for="Categories">Description</label><br>

                            </div>
                            <textarea style="border-radius:5px;grid-column: 1/span 2 ; width:80%;" name="description" id="description" cols="60" rows="3" readonly><?php echo $row4["description"] ?></textarea>
                            <br><br>
                            
                            <div id="col1">
                            <span onclick="openModel('editModel','model-Btn1', '<?= $id; ?>')" class="model-Btn1" title="Decline Request"><input type="button" style="grid-column: 1/span 2; background-color:red" id="declineBtn" name="action" title="Decline all categories" value="Decline"></span>

                                
                            </div>
                            <div id="col2">
                                <input style="grid-column: 1/span 2;" id="acceptBtn" type="submit" name="action" value="Accept">
                            </div>

                        </form>
                    </div>
                </div>
            <?php }

            if (isset($this->reqSelectedClean)) {
            ?>
                <div class="divPopupModel" id="close">

                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="deleteModel" class="open">
                    <a onclick="closePopup()" class="closebtn">&times;</a>

                        <!-- <a onclick="closePopup2()">&times;</a> -->
                        
                        <?php
                        $row5 = $this->selectedCleaningCat->fetch_assoc();
                        ?>
                        <div style="text-align: center;">
                            <h1><?php echo $row5["request_id"]?></h1>
                            
                        </div>

                        <form action="addFees" class="formAddEmployee" id="addTotal" method="POST" enctype="multipart/form-data">
                            <div id="col1">
                                <label for="type"><?php echo $row5["type"]?></label><br>
                                <input type="hidden" name="requestId2" id="requestId" value="<?php echo $row5["request_id"]; ?>" readonly>
                            </div>
                            <div id="col2">
                            <h4 style="padding:0px"><?php $d = explode(" ", $row5["request_date"]);
                                                        echo $d[0] . "<br>" . $d[1] ?></h4>
                            </div>
                            <h2><b>Add Fees:</b></h2>
                            <br>
                            <div id="col1">
                                <label for="categories">Category 1</label>
                                <input type="text" name="qty1" id="qty1" placeholder="Kg">
                            </div>
                            <div id="col2">
                                <br>
                                <input type="text" name="amt1" id="amt1" placeholder="LKR">
                            </div>
                            <div id="col1">
                                <label for="Categories">Category 2</label>
                                <input type="text" name="qty2" id="qty2" placeholder="Kg">
                            </div>
                            <div id="col2">
                                <br>
                                <input type="text" name="amt2" id="amt2" value="" placeholder="LKR">
                            </div>
                            <div id="col1">
                                <label for="Categories">Category 3</label>
                                <input type="text" name="qty3" id="qty3" placeholder="Kg">
                            </div>
                            <div id="col2">
                                <br>
                                <input type="text" name="amt3" id="amt3" placeholder="LKR">
                                <br><br>
                            </div>
                            <div class="col1">
                            <span class="error_form" id="error_msg" style="font-size:10px;"></span><br>
                            </div>
                            <div id="col2">
                                
                                <input style="grid-column:2;" id="add" type="submit" name="action2" value="Add">
                                
                            </div>
                        </form>
                    </div>
                </div>

               

            <?php }
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