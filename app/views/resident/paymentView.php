<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PAYMENT<span id="city"> </span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <!-- payment form -->
            <div class="card" id="userCard" style="z-index:0">
                <div class="leftPanel" style="margin-top:30px">
                    <div>
                        <div class="card1" style="grid-column:1/span2;margin:auto">
                            <div class="data">
                                <div class="photo" style="background-image:url(../../public/img/payment.jpg);"></div>
                                <ul class="details">
                                    <?php date_default_timezone_set("Asia/Colombo"); ?>
                                    <li class="author"><?php echo date("H:i"); ?> </li>
                                    <li class="date"><?php echo  date("F j, Y");  ?></li>
                                </ul>
                            </div>
                            <div class="description">
                                <form action="#" class="reservationtime" method="GET">
                                    <div>
                                        <label>Total Payable</label><br>
                                        <input type="text" name="payable" class="input-field" value="2000.00" READONLY><br>
                                        <label>Last Payment</label><br>
                                        <input type="text" name="lastpay" class="input-field" value="5000.00" READONLY><br>
                                        <input class="purplebutton" type="submit" value="Pay Now" id="model-btn" style="grid-column:2">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="rightPanel" style="margin-top:30px">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Last Payments . . . . .</h3>
                        </div>
                        <?php
                        if ($this->pay->num_rows > 0) { 
                            while ($row = $this->pay->fetch_assoc()) {
                        ?>
                                <div class="detail">
                                    <div>
                                        <div class="detail-info">
                                            <h5><?php echo $row["amount"]." LKR"; ?></h5>
                                            <small><?php echo $row["dateaffect"]; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                            echo "0 results";
                        }
                        ?>



                    </div>
                </div>

                <div style="display:none" id="gateway">
                    <form action="#" class="reservationtime" method="GET" id="cardpayment">
                        <h3>Payment</h3>
                        <label>Accepted Cards</label>
                        <div class="payicon">
                            <i class="fab fa-cc-visa" style="color:navy;"></i>
                            <i class="fab fa-cc-amex" style="color:blue;"></i>
                            <i class="fab fa-cc-mastercard" style="color:red;"></i>
                            <i class="fab fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" class="input-field" name="cardname" placeholder="John More Doe">
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" class="input-field" name="cardnumber" placeholder="1111-2222-3333-4444">
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" class="input-field" name="expmonth" placeholder="September">
                        <label for="expyear">Exp Year</label>
                        <input type="text" id="expyear" class="input-field" name="expyear" placeholder="2018">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" class="input-field" name="cvv" placeholder="352">
                    </form>
                </div>
                <div class="divPopupModel">
                    <p id="answer"></p>

                    <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                    <div id="model">

                        <a href="javascript:void(0)" id="closebtn">&times;</a>
                        <div style="text-align: center;">
                            <h3>Pay Bill<i class="fa fa-credit-card"></i></i></h3>
                        </div>

                        <form action="#" class="reservationtime" method="GET">
                            <div id="col1">
                                <label>Apartment ID</label><br>
                                <input type="text" name="apartmentid" class="input-field" value="AP0001" READONLY>
                            </div>
                            <br>
                            <div id="col2">
                                <label for="lname">Amount(LKR)</label><br>
                                <input type="text" name="amt" class="input-field" placeholder="" value="">
                            </div>

                            <input onclick="" class="purplebutton" style="grid-column: 1/span 2;" type="submit" value="Next">
                        </form>


                    </div>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>