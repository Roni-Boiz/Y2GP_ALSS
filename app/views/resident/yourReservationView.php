<?php 
    include_once 'sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">YOUR <span id="city">RESERVATION</span></h1></div>
    <div id="hb" class="hawlockbody" > 
    <div style="overflow-x:auto;grid-column:1/span2">
        <table>
            <tr>
            <th>Action</th>
            <th>Reservation ID</th>
            <th>Type</th>
            <th colspan="3">Reservation</th>
            <th colspan="2">Reserved Date</th>
            <th>Description</th>
            </tr>
            <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Date</th>
            <th>Time</th>
            <th></th>
            </tr>
            <tr>
            <td><a href="#"><i class="fas fa-trash-alt" style="color:white;padding:1px 10px"></i></a></td>
            <td>F001</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            </tr>
        </table>
    </div>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>