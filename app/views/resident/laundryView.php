<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">LAUNDRY <span id="city">REQUEST</span></h1>
        </div>
        <div id="hb" class="hawlockbody">

            <div class="card1" style="grid-column:1/span2;margin:auto;max-width:100%">
                <div class="data">
                    <div class="photo" style="background-image:url(../../public/img/laundry.jpg);"></div>
                    <ul class="details">
                        <?php date_default_timezone_set("Asia/Colombo"); ?>
                        <li class="author"><?php echo date("H:i"); ?> </li>
                        <li class="date"><?php echo  date("F j, Y");  ?></li>
                    </ul>
                </div>
                <div class="description">
                    <form action="#" class="reservationtime" method="GET">
                        <div id="">
                            <label for="type">Type</label><br>
                            <select name="type" class="input-field">
                                <option value="">Select Type</option>
                                <option value="">Quick</option>
                                <option value="">Regular</option>
                            </select><i class="fas fa-info-circle" id="model-btn"></i><br>

                        </div>
                        <div id="">
                            </select>
                            <label>Category 1</label><br>
                            <input type="text" name="quantity1" class="input-field" placeholder="Enter quantity">
                            <select name="catw1" class="input-field">
                                <option value="">Select weight</option>
                                <option value="">1-5</option>
                                <option value="">5-10</option>
                                <option value="">more than 10</option>
                            </select><br>
                            <label>Category 2</label><br>
                            <input type="text" name="quantity2" class="input-field" placeholder="Enter quantity">
                            <select name="catw2" class="input-field">
                                <option value="">Select weight</option>
                                <option value="">1-5</option>
                                <option value="">5-10</option>
                                <option value="">more than 10</option>
                            </select><br>
                            <label>Category 3</label><br>
                            <input type="text" name="quantity3" class="input-field" placeholder="Enter quantity">
                            <select name="catw3" class="input-field">
                                <option value="">Select weight</option>
                                <option value="">1-5</option>
                                <option value="">5-10</option>
                                <option value="">more than 10</option>
                            </select><br>
                            <label>Description</label><br>
                            <input type="textarea" name="description" id="description"><br>
                            <input class="purplebutton" type="submit" name="Submit" value="Send Request" style="grid-column:2">
                        </div>

                    </form>
                    <div class="divPopupModel">
                        <p id="answer"></p>

                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model" style="left: 75%;">

                            <a href="javascript:void(0)" id="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <h3>Help<i class="fas fa-info-circle"></i></h3>
                            </div>
                            <ul>____Category 1____</ul>
                            <li>T-Shirt</li>
                            <li>Shorts</li>
                            <ul>____Category 2____</ul>
                            <li>Bed-sheet</li>
                            <li>Table Cloth</li>
                            <li>Certain</li>
                            <ul>____Category 3____</ul>
                            <li>Shirts</li>
                            <li>Troushers</li>


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