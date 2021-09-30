<?php
include_once 'sidenav.php';
?>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Hall</a></li>
                    <li><a href="#tab2">Fitness Centre</a></li>
                    <li><a href="#tab3">Treatment Room</a></li>
                </ul>
                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <?php

                        if ($this->hall->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Reservation ID</th>
                                    <th colspan="3">Reservation</th>
                                    <th>Reserved Date</th>
                                    <th>Member</th>
                                    <th>Type</th>
                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <?php
                                while ($row = $this->hall->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeReservation?hallid=<?php echo $row["reservation_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["reservation_id"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row["start_time"]; ?></td>
                                        <td><?php echo $row["end_time"]; ?></td>
                                        <td><?php echo $row["reserved_time"]; ?></td>
                                        <td><?php echo $row["no_of_members"]; ?></td>
                                        <td><?php echo "\n" . $row["type"]; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </table>
                    </div>
                </div>
                <div id="tab2" class="tab">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <?php
                        if ($this->fitness->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Reservation ID</th>
                                    <th colspan="3">Reservation</th>
                                    <th>Reserved Date</th>
                                    <th>Coach</th>

                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <?php
                                while ($row = $this->fitness->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeReservation?fitid=<?php echo $row["reservation_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["reservation_id"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row["start_time"]; ?></td>
                                        <td><?php echo $row["end_time"]; ?></td>
                                        <td><?php echo $row["reserved_time"]; ?></td>
                                        <td><?php echo $row["employee_id"]; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </table>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <p style="color:black">
                    <div style="overflow-x:auto;grid-column:1/span2">
                        <?php

                        if ($this->treatment->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Reservation ID</th>
                                    <th colspan="3">Reservation</th>
                                    <th>Reserved Date</th>
                                    <th>Type</th>
                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <?php
                                while ($row = $this->treatment->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeReservation?treatid=<?php echo $row["reservation_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["reservation_id"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row["start_time"]; ?></td>
                                        <td><?php echo $row["end_time"]; ?></td>
                                        <td><?php echo $row["reserved_time"]; ?></td>
                                        <td><?php echo "\n" . $row["type"]; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </table>
                    </div>
                    </p>
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