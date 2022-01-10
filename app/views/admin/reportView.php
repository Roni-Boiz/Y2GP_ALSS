<?php
include_once 'sidenav.php';
?>
<style>
    .announcement {
        grid-column: 1/span 3;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 100%;
        margin: auto;
        margin-top: 10px;
        text-align: center;
        font-family: arial;
    }

    .announcement .title {
        color: grey;
        font-size: 15px;
    }
</style>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <h2>Reports</h2>
            <div>
                <h3>Export Data Tables Data To Excel CSV PDF</h3>
            </div>
            <!-- <div>
                <table id="residentData" class="residentTable">
                    <thead>
                        <tr>
                            <th>Resident Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>NIC</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                </table>
            </div> -->
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
</body>

<script>
    $(document).ready(function() {
        $('#').DataTable({
            "processing": true,
            "serverside": true,
            "ajax": {
                url: "getResidentData",
                type: "POST",
            }
        });
    });
</script>

</html>