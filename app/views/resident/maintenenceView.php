<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">MAINTENENCE AND TECHNICAL<br> <span id="city">SERVICES</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card">
                <form action="#" class="reservationtime" method="GET">

                    <label for="type">Type</label><br>
                    <select name="type" class="input-field">
                        <option>Select Type</option>
                        <option>Electricity</option>
                        <option>Painting</option>
                        <option>AC</option>
                        <option>Other</option>
                    </select><br>
                    <div id="">
                        <label>Prefered Date</label><br>
                        <input type="date" name="date" class="input-field"><br>
                        <label>Description</label><br>
                        <input type="textarea" name="description" id="description"><br>
                        <input class="purplebutton" type="submit" name="Submit" value="Send Request" style="grid-column:2">
                    </div>
                </form>
            </div>




        </div>
    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>