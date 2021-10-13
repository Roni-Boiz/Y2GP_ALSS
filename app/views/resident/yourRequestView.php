<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">YOUR <span id="city">REQUESTS</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="tabs" style="grid-column:1/span3">
                <ul class="tabs-list">
                    <li class="active"><a href="#tab1">Maintenece</a></li>
                    <li><a href="#tab2">Laundry</a></li>
                    <li><a href="#tab3">Visitors</a></li>
                </ul>

                <div id="tab1" class="tab active">
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <?php
                        if ($this->maintenence->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Request ID</th>
                                    <th>Prefered Date</th>
                                    <th colspan="2">Requested</th>
                                    <th>Type</th>
                                    <th>State</th>

                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <?php
                                while ($row = $this->maintenence->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeRequest?hallid=<?php echo $row["request_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["request_id"]; ?></td>
                                        <td><?php echo $row["preferred_date"]; ?></td>
                                        <td><?php echo $row["request_date"]; ?></td>
                                        <td><?php echo $row["request_time"]; ?></td>
                                        <td><?php echo $row["category"]; ?></td>
                                        <td><?php echo $row["state"]; ?></td>
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
                        if ($this->maintenence->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Request ID</th>
                                    <th colspan="2">Requested</th>
                                    <th>Description</th>
                                    <th>Type</th>

                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <?php
                                while ($row = $this->laundry->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeReservation?hallid=<?php echo $row["request_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["request_id"]; ?></td>
                                        <td><?php echo $row["request_date"]; ?></td>
                                        <td><?php echo $row["request_time"]; ?></td>
                                        <td><?php echo $row["description"]; ?></td>
                                        <td><?php echo $row["type"]; ?></td>
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
                    <div style="overflow-x:auto;grid-column:1/span2">

                        <?php
                        if ($this->maintenence->num_rows > 0) { ?>
                            <table class="table1">
                                <tr style="background-color:#5747b4">
                                    <th>Action</th>
                                    <th>Request ID</th>
                                    <th>Name</th>
                                    <th colspan="2">Arrived</th>
                                </tr>
                                <tr style="background-color:#5747b4">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>

                                <?php
                                while ($row = $this->visitor->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="removeReservation?hallid=<?php echo $row["visitor_id"]; ?>">
                                                <i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                                        <td><?php echo $row["visitor_id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["arrive_date"]; ?></td>
                                        <td><?php echo $row["arrive_time"]; ?></td>
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

            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>
<script>
 
</script>

</html>