<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">BILLS <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

            <div id="employeeCard" style="grid-column:1/span 3">
                <div class="staffDetails">
                    <h4>Your Bill - <?php echo $this->y ?></h4>
                    <div class="card" id="employeeSummary">
                        
                        <section class="wrapper" style="margin:auto">
                            <main class="row title">
                                <ul>
                                    <li>Description</li>
                                    <li>Fee (LKR)</li>
                                    <li>Date Added</li>
                                </ul>
                            </main>

                            <?php
                            if ($this->bill->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->bill->fetch_assoc()) {
                                ?>
                                <span id="searchrow">
                                    <article class="row mlb">
                                        <ul>
                                            <li><?php echo $row["description"]; ?></li>
                                            <li><?php echo $row["fee"]; ?></li>
                                            <li><?php echo $row["dateaffect"]?></li>
                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Other : </span>
                                            </li>
                                        </ul>
                                    </article>
                                </span>
                                <?php
                                }
                            if(isset($this->billtotal) && isset($this->balanceforward)){
                            $row1 = $this->billtotal->fetch_assoc();
                            $row2 = $this->balanceforward->fetch_assoc()?>
                            <main class="row title">
                                <ul>
                                    <li>Total</li>
                                    <li><?php echo $row1["total"]?></li>
                                </ul>
                            </main>
                            <main class="row title">
                                <ul>
                                    <li>B/F</li>
                                    <li><?php echo $row2["balance"]?></li>
                                </ul>
                                <ul>
                                    <li><?php echo date('Y-m-d');?></li>
                                </ul>
                            </main>
                            <main class="row title">
                                <ul>
                                    <?php if($row2["balance"]-$row1["total"]>0){?>
                                        <li>B/F</li>
                                        <li><?php echo $row2["balance"]-$row1["total"]?></li>
                                    <?php }else{?>
                                        <li>Total Payable</li>
                                        <li><?php echo $row1["total"]-$row2["balance"]?></li>
                                    <?php } ?>
                                </ul>
                            </main>
                        <?php } ?>
                        </section>
                        <?php
                            }else{
                                echo "No bills";
                            }?>
                    </div>
                </div>

                <div class="staffPlotDetaills card">
                <h4>Previous Bills</h4>
                    <form action="Bill" class="reservationtime" method="POST">
                        <div id="">
                            <label>Year</label><br>
                            <select required name="year" class="input-field">
                                <option value="">Select Year</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                            </select><br>
                            <label for="type">Month</label><br>
                            <select required name="month" class="input-field">
                                <option value="">Select Month</option>
                                <!-- to get time slots -->
                                <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%02d months', $i));
                                    $label = date('F', $time);
                                    $value = date('n', $time); ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <input class="purplebutton" type="submit" name="Submit" value="View" style="grid-column:1">
                        </div>
                    </form>
                </div>


            </div>

        </div> <!-- .hawlockbody div closed here -->
    </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>