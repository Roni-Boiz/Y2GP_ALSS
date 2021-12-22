<?php
include_once 'sidenav.php';
?>
<style>

    .reservation_search{
        padding-left:25px;
    }
    .reservation_search input[type=text]{
        
        width: 350px;
  max-width: 100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('../../public/img/searchicon.png');
  background-position: 7px 15px;
  background-repeat: no-repeat;
  padding: 10px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  align-items: center;
  justify-content: center;
    }

    .reservation_search .addBtn {
  background: #d9d9d9;
  color: #555;
  float: right;
  text-align: center;
  font-size: 14px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 10px;
  box-shadow: 0 4px 8px 0 rgb(0 0 0 / 45%);
}

.reservation_search .addBtn i {
  padding: 11px;
  font-size: 30px;
  color: #110B2E;
}

.reservation_search .addBtn:hover {
  background-color: #bbb;
  display: block;
}


</style>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">FITNESS CENTER <span id="city">RESERVATIONS</span></h1>
        </div>

        <div id="hb" class="hawlockbody animate-bottom">



            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Reservation History</a></li>
                    <li><a href="#tab2">Today Reservations</a></li>
                    <li><a href="#tab3">Upcoming Reservations</a></li>
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="reservation_search">
                        <input type="text" name="search" placeholder="Search.." id="searchUser" class="mySearch">
                        <div style="float: right; padding-right:75px;">
                            <span onclick="openModel('model','addBtn')" class="addBtn" id="addUser" title="Add User"><i class="fas fa-user-plus"></i></span>
                        </div>
                    </div>


                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- History -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->history->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->history->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["trainer_fname"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Resident Name : <?php echo $row["resident_fname"]; echo " "; echo $row["resident_lname"]; ?> ,</span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
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
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- Today -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->today->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->today->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["trainer_fname"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                        <li>
                                                <span style="padding-right: 20px;">Resident Name : <?php echo $row["resident_fname"]; echo " "; echo $row["resident_lname"]; ?> ,</span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No reservations today";
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">

<section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Reservation ID</li>
                                    <li>Coach</li>
                                    <li>Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->upcoming->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->upcoming->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                        <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["trainer_fname"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"]; ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                        <li>
                                                <span style="padding-right: 20px;">Resident Name : <?php echo $row["resident_fname"]; echo " "; echo $row["resident_lname"]; ?> ,</span>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                </span>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "No upcoming reservations";
                            }
                            ?>
                        </section>
                    </div>
                </div>

                <div class="divPopupModel">

                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model">

                            <a href="javascript:void(0)" class="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <h1>Add Schedule<i class="fa fa-user"></i></i></h1>
                            </div>

                            <form action="#" class="formAddEmployee" method="POST" enctype="multipart/form-data">
                                <div id="col1">
                                    <label for="type">Select Resident</label><br>
                                    <select name="" id="">
                                        <option value="#">Select Resident</option>
                                        <?php

                                    while ($rowR = $this->Residents->fetch_assoc()) {
                                        $Residents = $rowR['fname'].' '.$rowR['lname'];
                                        $ResId = $rowR['resident_id'];
                                        echo "<option value=$ResId>$Residents</option>";
                                    }
                                    ?>
                                    </select>
                                    <!-- <input type="text" id="eid" name="eid" class="input-field" placeholder="Resident ID" required autofocus> -->
                                </div>

                                <!-- <div class="profile-pic" id="col2">
                                    <img src="../../public/img/blank-profile.png" id="photo">
                                    <input type="file" id="file" name="file">
                                    <label for="file" id="uploadBtn" onclick="uploadPhoto('photo','file')">Choose Photo</label>
                                </div> -->
                                <div id="col2">
                                    <label for="cno">Coach</label><br>
                                    <select name="" id="">
                                        <option value="#">Select Coach</option>
                                        <?php

                                    while ($rowT = $this->Trainers->fetch_assoc()) {
                                        $Trainers = $rowT['fname'].' '.$rowT['lname'];
                                        $TraId = $rowR['trainer_id'];
                                        echo "<option value='$TraId'>$Trainers</option>";
                                    }
                                    ?>
                                    </select>
                                    <!-- <input type="text" id="cno" name="cno" class="input-field"  readonly> -->
                                </div>

                                <div id="col1">
                                    <label for="fname">Date</label><br>
                                    <input type="date" id="fname" name="fname" class="input-field" >
                                </div>

                                <div id="col1">
                                    <label for="stime">Start time</label><br>
                                    <input type="time" id="stime" name="stime" class="input-field"  >
                                </div>

                                <div id="col2">
                                    <label for="etime">End time</label><br>
                                    <input type="time" id="etime" name="etime" class="input-field"  >
                                </div>

                                

                                <input style="grid-column: 1/span 2;" type="submit" name="AddSchedule" value="Add">
                            </form>
                        </div>
                    </div>

            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
        
</body>

</html>