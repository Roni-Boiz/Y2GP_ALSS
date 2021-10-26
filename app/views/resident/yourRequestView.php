<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">REQUESTS</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Maintenece</a></li>
                    <li><a href="#tab2">Laundry</a></li>
                    <li><a href="#tab3">Visitors</a></li>
                </ul>
                <br>
                <!-- for search row --><br>
                <div class="search">
                    <input type="text" id="mySearch"  placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                </div>

                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <!-- maintenence -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Prefered Date</li>
                                    <li>Type</li>
                                    <li>State</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->maintenence->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->maintenence->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                            <li id="<?php echo $row['request_id']; ?>"><a onclick="deleteRes(<?php echo $row['request_id']; ?>,'treat')">
                                                    <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                            <li><?php echo $row["request_id"]; ?></li>
                                            <li><?php echo $row["preferred_date"]; ?></li>
                                            <li><?php echo $row["category"]; ?></li>
                                            <li><?php echo $row["state"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Requested Date : <?php echo $row["request_date"] ?></span>
                                                <span style="padding-right: 20px;">Description : <?php echo $row["description"]  ?></span>
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
                        <!-- laundry -->
                        <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Requested Date</li>
                                    <li>Requested Time</li>
                                    <li>Type</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->laundry->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->laundry->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                            <li id="<?php echo $row['request_id']; ?>"><a onclick="deleteRes(<?php echo $row['request_id']; ?>,'treat')">
                                                    <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                            <li><?php echo $row["request_id"]; ?></li>
                                            <li><?php echo $row["request_date"]; ?></li>
                                            <li><?php echo $row["request_time"]; ?></li>
                                            <li><?php echo $row["type"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Description : <?php echo $row["description"] ?></span>
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
                    <div style="overflow-x:auto;grid-column:1/span2">
<!-- laundry -->
<section class="wrapper">
                            <main class="row title">
                                <ul>
                                    <li>Action</li>
                                    <li>Request ID</li>
                                    <li>Name</li>
                                    <li>Arrived Date</li>
                                    <li>Arrived Time</li>
                                </ul>
                            </main>
                            <?php
                            if ($this->visitor->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->visitor->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                            <li id="<?php echo $row['visitor_id']; ?>"><a onclick="deleteRes(<?php echo $row['visitor_id']; ?>,'treat')">
                                                    <i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></li>
                                            <li><?php echo $row["visitor_id"]; ?></li>
                                            <li><?php echo $row["name"]; ?></li>
                                            <li><?php echo $row["arrive_date"]; ?></li>
                                            <li><?php echo $row["arrive_date"]; ?></li>

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

            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>