<?php 
    $type="re";
    $id="Re10023";
    include_once 'include/sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div id="hb" class="hawlockbody" > 

        <!-- form structure -->
        <form action="#" class="form1" id="view">
            <label for="fname">Name</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="ALSS"><br>

            <label for="fname">NIC</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="123456789v"><br>
        </form>
    <br>

    <!-- table structure -->
    <table class="table1">
        <thead>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Fee</th>
            <th>Description</th>
            </tr>
            <tr>
            <td data-column="First Name">Chathura</td>
            <td data-column="Last Name">Manohara</td>
            <td data-column="Fee">100</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
            <tr>
            <td data-column="First Name">Nipunar</td>
            <td data-column="Last Name">Manujaya</td>
            <td data-column="Fee">200</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
            <tr>
            <td data-column="First Name">Ronila</td>
            <td data-column="Last Name">Sanjula</td>
            <td data-column="Fee">300</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
            <tr>
            <td data-column="First Name">Nishath</td>
            <td data-column="Last Name">Yashintha</td>
            <td data-column="Fee">500</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
            <tr>
            <td data-column="First Name">Ronila</td>
            <td data-column="Last Name">Sanjula</td>
            <td data-column="Fee">300</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
            <tr>
            <td data-column="First Name">Nishath</td>
            <td data-column="Last Name">Yashintha</td>
            <td data-column="Fee">500</td>
            <td data-column="Description">Lorem ipsum dolor sit</td>
            </tr>
    </table>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>