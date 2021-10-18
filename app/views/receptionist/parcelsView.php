<?php
include_once 'sidenav.php';
?>

</head>

<script>
    function confirmation() {
        confirm("Press OK or Cancel");
    }
</script>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARCELS</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">New</a></li>
                    <li><a href="#tab2">In-Locker</a></li>
                    <li><a href="#tab3">Reached</a></li>
                </ul>
                <div id="tab1" class="tab active" style="padding-top: 20px;">
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
                            <div class="signup_container">
                                <form action="parcels" method="post">
                                    <div>
                                        <!-- <input type="text" class="input-field-signup" name="apartmentId" placeholder="          Apartment Id" id="apartmentId"> -->
                                        <div class="input-field-signup" id="apartmentId">
                                            <i class="fa fa-address-card" aria-hidden="true"></i>
                                            <select name="apartmentId" id="form_apartment">
                                                <option value="#">Apartment No</option>
                                                <?php

                                                while ($row0 = $this->presentApartments->fetch_assoc()) {
                                                    $apartment = $row0['apartment_no'];
                                                    echo "<option value='$apartment'>$apartment</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <br><br> -->
                                        <div class="input-field-signup">
                                            <i class="fas fa-paper-plane"></i>
                                            <input type="text" name="sender" id="sender" placeholder="Sender" required>
                                        </div>
                                        <div class="input-field-signup">
                                            <i class="fas fa-pen-square"></i>
                                            <input type="text" name="description" placeholder="Description">
                                        </div>
                                        <input class="purplebutton" onclick="confirmation()" value="Save" type="submit" style="float:right">save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
            <div class="signup_container">
                <form action="parcels" method="post" >
                <div>
                <label for="Apartment ID">Apartment Id</label><br>
                <input type="text" class="input-field-signup" name="apartmentId" id="apartmentId">
                
                <label for="Sender">Sender</label><br>
                <input type="text" class="input-field-signup" name="sender" id="sender">
                
                <label for="Description">Description</label><br>
                <textarea 
                name="description" cols="30" rows="10" class="input-field-signup"></textarea><br>
                <input class="purplebutton" value="Save" type="submit" style="float:right">save</button>
                </div>
            </form>-->

                <!-- </div>
        </div> -->

                <!-- </div> -->


                <div id="tab2" class="tab">
                    <br>
                    <div class="search">
                        <input type="text" id="mySearch" placeholder="Search.." style="width:50%;margin: 5px 0px"><i class="fa fa-search"></i>
                    </div>
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
                                                <li><?php echo $row["resident_id"]; ?></li>
                                                <li><?php echo $row["receive_date"]; ?></li>
                                                <li><?php echo $row["receive_time"]; ?></li>
                                                <li><?php echo $row["sender"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Description: <?php echo $row["description"] ?></span>
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
                                                <li><?php echo $row1["resident_id"]; ?></li>
                                                <li><?php echo $row1["receive_date"]; ?></li>
                                                <li><?php echo $row1["receive_time"]; ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li>
                                                    <span style="padding-right: 20px;">Reached Time: <?php echo $row1["reached_time"] ?></span>
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
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>