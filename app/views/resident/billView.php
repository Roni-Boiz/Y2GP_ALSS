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


            <i class="fas fa-search" id="model-btn"> Click here for search previous bills... </i><br>
            <div class="invoice-box" style="grid-column:1/span 3">
                <table>
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="../../public/img/image.png" alt="Company logo" style="width: 50%; max-width: 300px" />
                                    </td>

                                    <td>
                                        Resident ID :<?php echo "RA".(rand(100,300)); ?> <br />
                                        Created : <?php echo $this->y ?><br />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        Hawlock City,<br />
                                        Main road,<br />
                                        Colombo 07.
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>Expenses</td>

                        <td>Value(Rs)</td>
                    </tr>
                    <?php
                    $t = 0;
                    if ($this->bill->num_rows > 0) { ?>
                        <?php
                        while ($row = $this->bill->fetch_assoc()) {
                        ?>
                            <tr class="details">
                                <td><?php echo $row["description"] . "<br>" . $row["dateaffect"] ?> </td>
                                <td><?php echo $row["fee"];
                                    $t = $t + $row["fee"] ?></td>

                            </tr>
                    <?php
                        }
                    } ?>
                    <tr class="item last">
                        <td>Total Expenses</td>
                        <td><?php echo $t . ".00" ?></td>
                    </tr>
                    <tr class="heading">
                        <td>Payments of the month</td>

                        <td>Value(Rs)</td>
                    </tr>

                    <?php
                    $t = 0;
                    if ($this->payment->num_rows > 0) { ?>
                        <?php
                        while ($row = $this->payment->fetch_assoc()) {
                        ?>
                            <tr class="item">
                                <td><?php echo $row["paid_date"] ?> </td>
                                <td><?php echo $row["amount"];
                                    $t = $t + $row["amount"] ?></td>
                            </tr>
                    <?php
                        }
                    } ?>

                    <tr class="item last">
                        <td>Total Payments</td>
                        <td><?php echo $t . ".00" ?></td>
                    </tr>
                    <?php if (isset($this->balanceforward)) { ?>
                        <tr class="total">
                            <td>Account Balance (B/F)</td>
                            <td><?php $row2 = $this->balanceforward->fetch_assoc();
                                echo $row2['balance']; ?></td>
                        <?php } ?>
                        </tr>
                </table>
            </div>


            <div class="divPopupModel">
                <p id="answer"></p>

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model" style="left: 60%;width: 300px">

                    <a href="javascript:void(0)" id="closebtn">&times;</a>
                    
                    <h4>Previous Bills</h4>
                    <form action="Bill" class="reservationtime" method="POST">
                        <div id="">
                            <label>Year</label><br>
                            <select required name="year" class="input-field">
                                <option value="">Select Year</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
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