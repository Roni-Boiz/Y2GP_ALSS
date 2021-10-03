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
            <div class="card">
                <form action="#" class="reservationtime" method="GET">
                    <div id="">
                        <label for="type">Type</label><br>
                        <select name="type" class="input-field">
                            <option value="">Select Type</option>
                            <option value="">Quick</option>
                            <option value="">Regular</option>
                        </select><br>

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
                        <select  name="catw2" class="input-field">
                            <option value="">Select weight</option>
                            <option value="">1-5</option>
                            <option value="">5-10</option>
                            <option value="">more than 10</option>
                        </select><br>
                        <label>Category 3</label><br>
                        <input type="text" name="quantity3" class="input-field" placeholder="Enter quantity">
                        <select  name="catw3" class="input-field">
                            <option value="">Select weight</option>
                            <option value="">1-5</option>
                            <option value="">5-10</option>
                            <option value="">more than 10</option>
                        </select><br>
                        <label>Description</label><br>
                        <input type="textarea"  name="description" id="description"><br>
                        <input class="purplebutton" type="submit" name="Submit" value="Send Request" style="grid-column:2">
                    </div>

                </form>

            </div>
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>