<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock City Complaints</h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div id="complaint">
                <div>
                    <h2>New Complaints</h2>
                    <div class="card" id="newcomplaints">
                        <?php
                        if ($this->complaints->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->complaints->fetch_assoc()) {
                                if (empty($row["employee_id"])) {
                            ?>
                                    <div>
                                        <div>
                                            <div>
                                                <h3><i style="padding: 5px;" class="fa fa-building" aria-hidden="true"></i> <?= $row["apartment_no"] ?></h3>
                                                <h4><i style="padding: 5px;" class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row["fname"][0] . ". " . $row["lname"] ?> <small>(<?php echo $row["resident_id"] ?>)</small></h4>
                                                <h4><?php echo $row["type"] ?></h4>
                                            </div>

                                            <div>
                                                <?php
                                                $datetime =  $row["date_time"];
                                                $date = date('Y-m-d', strtotime($datetime));
                                                $time = date('h:i:s A', strtotime($datetime));
                                                ?>
                                                <h5><?php echo  $date ?></h5>
                                                <dd><?php echo $time ?></dd>
                                            </div>
                                        </div>
                                        <p><?= $row["description"] ?></p>
                                        <input type="submit" value="Consider">
                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <h4>No complaints</h4>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <?php $this->complaints->data_seek(0); ?>
                <div class="complaintsearch">
                    <input type="text" name="search" placeholder="Search.." class="mySearch">
                    <div style="float: right;">
                        <span style="display: inline-block;"> New <i class="fa fa-square" style="color: #EB7655;"></i></span>
                        <span style="display: inline-block;"> Old <i class="fa fa-square" style="color: #52D29A;"></i></span>
                    </div>
                </div>
                <div>
                    <section class="wrapper">
                        <main class="row title">
                            <ul>
                                <li>Apartment No</li>
                                <li>Resident Name</li>
                                <li>Type</li>
                                <li>Date</li>
                                <li>Time</li>
                            </ul>
                        </main>
                        <?php
                        if ($this->complaints->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->complaints->fetch_assoc()) {
                                if (empty($row["employee_id"])) {
                            ?>
                                    <span id="searchrow">
                                        <article class="row pga">
                                            <ul>
                                                <li><?php echo $row["apartment_no"] ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <?php
                                                $datetime =  $row["date_time"];
                                                $date = date('Y-m-d', strtotime($datetime));
                                                $time = date('h:i:s A', strtotime($datetime));
                                                ?>
                                                <li><?php echo $date ?></li>
                                                <li><?php echo $time ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li><?php echo $row["description"] ?></li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span id="searchrow">
                                        <article class="row mlb">
                                            <ul>
                                                <li><?php echo $row["apartment_no"] ?></li>
                                                <li><?php echo $row["fname"] . " " . $row["lname"] ?></li>
                                                <li><?php echo $row["type"] ?></li>
                                                <?php
                                                $datetime =  $row["date_time"];
                                                $date = date('Y-m-d', strtotime($datetime));
                                                $time = date('h:i:s A', strtotime($datetime));
                                                ?>
                                                <li><?php echo $date ?></li>
                                                <li><?php echo $time ?></li>
                                            </ul>
                                            <ul class="more-content">
                                                <li><?php echo $row["description"] ?></li>
                                            </ul>
                                        </article>
                                    </span>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <ul>
                                <li style="text-align: center;">No Complaints</li>
                            </ul>
                        <?php
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>