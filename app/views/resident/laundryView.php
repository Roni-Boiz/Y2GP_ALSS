<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">LAUNDRY <span id="city">REQUEST</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">

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
                    <form action="laundry" class="reservationtime" method="POST">
                        <div id="">
                            <label for="type">Type</label><br>
                            <select name="type" class="input-field" id="select">
                                <option value="">Select Type</option>
                                <option >Quick</option>
                                <option >Regular</option>
                            </select><i class="fas fa-info-circle" id="model-btn"></i><br>
                            <span class="error_form" id="laundrytype" style="font-size:10px;"></span><br>

                        </div>
                        <div id="">
                            </select>
                            <label>Category 1</label><br>
                            <input type="text" name="quantity1" id="quantity1" class="input-field" pattern="^\d{1,2}|$" placeholder="Enter quantity">
                            <select name="catw1"id="catw1" class="input-field">
                                <option value="">Select weight</option>
                                <option >1-5</option>
                                <option >5-10</option>
                                <option >more than 10</option>
                            </select><br>
                            <label>Category 2</label><br>
                            <input type="text" name="quantity2" id="quantity2" class="input-field" pattern="^\d{1,2}|$" placeholder="Enter quantity">
                            <select name="catw2" id="catw2"class="input-field">
                                <option value="">Select weight</option>
                                <option >1-5</option>
                                <option >5-10</option>
                                <option >more than 10</option>
                            </select><br>
                            <label>Category 3</label><br>
                            <input type="text" name="quantity3" id="quantity3" class="input-field" pattern="^\d{1,2}|$" placeholder="Enter quantity">
                            <select name="catw3" id="catw3"class="input-field">
                                <option value="">Select weight</option>
                                <option >1-5</option>
                                <option >5-10</option>
                                <option >more than 10</option>
                            </select><br>
                            <span class="error_form" id="category" style="font-size:10px;"></span><br>
                            <label>Description</label><br>
                            <input type="textarea" name="description" id="description"><br>
                            <input class="purplebutton" id="disablebutton3" type="submit" name="Submit" value="Send Request" style="grid-column:2">
                        </div>

                    </form>
                    <div class="divPopupModel" >
                        <p id="answer"></p>

                        <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                        <div id="model" style="left: 75%;width: 300px">

                            <a href="javascript:void(0)" id="closebtn">&times;</a>
                            <div style="text-align: center;">
                                <h3>Help<i class="fas fa-info-circle"></i></h3>
                            </div>
                            <ul>Category 1</ul>
                            <li>T-Shirt</li>
                            <li>Shorts</li><hr>
                            <ul>Category 2</ul>
                            <li>Bed-sheet</li>
                            <li>Table Cloth</li>
                            <li>Certain</li><hr>
                            <ul>Category 3</ul>
                            <li>Shirts</li>
                            <li>Troushers</li>

                        </div>
                    </div>
                </div>
            </div> <!-- .hawlockbody div closed here -->
        </div> <!-- .expand div closed here -->
</body>

</html>