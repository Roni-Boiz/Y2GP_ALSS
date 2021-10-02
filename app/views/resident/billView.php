<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Bill <span id="city"></span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <div class="card">
                <form action="#" class="reservationtime" method="GET">
                    <div id="">
                        <label for="type">Year</label><br>
                        <select id="starttime" name="endtime" class="input-field">
                            <option value="">Select Year</option>
                            <option value="">2019</option>
                            <option value="">2020</option>
                            <option value="">2021</option>
                        </select><br>
                        <label for="type">Month</label><br>
                        <select id="starttime" name="endtime" class="input-field">
                            <option value="">Select Month</option>

                            <?php
                            for ($i = 0; $i < 12; $i++) {
                                $time = strtotime(sprintf('%d months', $i));
                                $label = date('F', $time);
                                $value = date('n', $time); ?>
                                <option value=""><?php echo $value; ?></option>
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
    </div> <!-- .expand div closed here -->
</body>

</html>