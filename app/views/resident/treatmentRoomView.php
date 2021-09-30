<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">TREATMENT ROOM <br><span id="city">RESERVATION</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <form action="editProfile" class="form1" id="editview" method="post">

                <input type="hidden" name="res_id" class="input-field" value=<?php ?>>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" class="input-field" value=<?php  ?>><br>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" class="input-field" value=<?php  ?>><br>

                <br>
                <input type="submit" onclick="confirmSave()" value="Save" style="float:right"><br>


            </form>

        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

</html>