<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PAYMENT<span id="city"> </span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card">
                <form action="#" class="reservationtime" method="GET">
                    <div id="">
                        <label>Total Payable</label><br>
                        <input type="text" name="payable" class="input-field" value="10000.00" READONLY><br>
                        <label>Last Payment</label><br>
                        <input type="text" name="lastpay" class="input-field" value="2000.00" READONLY><br>
                        <input class="purplebutton" type="submit" value="Pay Now" id="model-btn" style="grid-column:2">
                    </div>
                </form> <!-- payment form -->
                <div style="display:none" id="gateway">
                    <form action="#" class="reservationtime" method="GET" id="cardpayment" style="">
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
                                <input type="text" name="amt" class="input-field" placeholder="" value="" >
                            </div>

                            <input onclick="" class="purplebutton" style="grid-column: 1/span 2;" type="submit" value="Next">
                        </form>

                        <!-- <div id="btn-grp" style="grid-column: 1;">
<button id="yes-btn">Yes</button>
<button id="no-btn">No</button>
</div> -->
                    </div>
                </div>
            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>