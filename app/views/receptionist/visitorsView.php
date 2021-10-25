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
                            <li class="active"><a href="#tab1">IN-COMING</a></li>
                            <li><a href="#tab2">PREVIOUS</a></li>
                            <!-- <li ><a href="#tab3">OVERDUE VISITORS</a></li> -->
                        </ul><br><br>
                        <div class="search">
                            <input type="text" id="mySearch" placeholder="Search.." style="width:50%;margin: 5px 20px"><i class="fa fa-search"></i>
                        </div>
                        <div id="tab1" class="tab active">

                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- today -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Action</li>
                                            <li>Visitor Id</li>
                                            <li>Apartment No</li>
                                            <li>Visitor Name</li>
                                            <!-- <li>Description</li> -->
                                        </ul>
                                    </main>

                                    <?php
                                    if ($this->todayVisitors->num_rows > 0) { ?>
                                        <?php
                                        while ($row = $this->todayVisitors->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">

                                                <article class="row mlb">
                                                    <ul>
                                                        <li><a method="get" href="markVisited?visitor=<?php echo $row["visitor_id"]; ?>"><i class="far fa-check-circle" style="color:white;padding:1px 10px"></i></a></li>
                                                        <li><?php echo $row["visitor_id"]; ?></li>
                                                        <li><?php echo $row["apartment_no"]; ?></li>
                                                        <li><?php echo $row["name"]; ?></li>

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

                        <div id="tab2" class="tab">

                            <p>
                            <div style="overflow-x:auto;grid-column:1/span2">
                                <!-- pre -->
                                <section class="wrapper">
                                    <main class="row title">
                                        <ul>
                                            <li>Vistor ID</li>
                                            <li>Visitor Name</li>
                                            <li>Resident Id</li>
                                        </ul>
                                    </main>

                                    <?php
                                    if ($this->previousVisitors->num_rows > 0) { ?>
                                        <?php
                                        while ($row = $this->previousVisitors->fetch_assoc()) {
                                        ?>
                                            <span id="searchrow">
                                                <article class="row mlb">
                                                    <ul>
                                                        <li><?php echo $row["visitor_id"]; ?></li>
                                                        <li><?php echo $row["name"]; ?></li>
                                                        <li><?php echo $row["resident_id"]; ?></li>

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
                            </p>
                        </div>
                    </div>
                </div>
                <div class="rightPanel" style="margin-top:30px">
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