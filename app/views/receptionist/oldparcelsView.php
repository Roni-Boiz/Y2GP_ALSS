<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">OLD PARCELS</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom;">
            <div style="grid-column: 2/span 3">
                <form method="POST" action="searchOld">
                    <label>Apartment No</label><br>
                    <input type="text" id="apartment_no" name="apartment_no" class="input-field">
                    <input class="purplebutton" type="submit" name="Submit" value="View"><br><br>
                </form>
            </div>
            <br>
            <?php if (isset($this->oldParcels)) { ?>
                <!-- <div class="search" style="padding-top: -200px;">
                    <input type="text" id="mySearch2" placeholder="Search.." style="width:50%;margin: 5px 0px">
                    <a href="searchOld"><i title="click here to search old" class="fa fa-history"></i></a>
                </div> -->
                <div style="overflow-x:auto;grid-column:1/span2; grid-row-start:2">

                    <!-- reach -->
                    <section class="wrapper">
                        <main class="row title">
                            <ul>
                                <li>Parcel ID</li>
                                <li>Apartment ID</li>
                                <li>Recieved Date</li>
                                <li>Recieved Time</li>
                            </ul>
                        </main>
                        <?php
                        if ($this->oldParcels->num_rows > 0) { ?>
                            <?php
                            while ($row1 = $this->oldParcels->fetch_assoc()) {
                            ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                            
                                                <!-- <td><a method="get" href="putReached?parcel=<?php echo $row1["parcel_id"]; ?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td> -->
                                            <li><?php echo $row1["parcel_id"]; ?></li>
                                            <li><?php echo $row1["resident_id"]; ?></li>
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
            <?php } ?>



        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>