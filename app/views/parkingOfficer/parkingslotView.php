<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">PARKING SLOT <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div id="">
                <label>Vehicle NO</label>
                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php  ?>>
                <input class="purplebutton" type="submit" name="Submit" value="View"><br><br>
            </div>
            <div class="card">
                <form action="#" class="reservationtime" method="GET">
                    <br>Apartment ID : AP001<br>Contact NO : 0712565894<br><br>
                    <br>FROM : 21-10-2021<br>TO : 21-10-2021<br><br><br>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>

                </form>
            </div>
        </div>

    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>