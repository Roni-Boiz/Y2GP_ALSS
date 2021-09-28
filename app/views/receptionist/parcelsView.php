<?php 
    include_once 'sidenav.php';
?>

</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">PARCELS</h1></div>
    <div id="hb" class="hawlockbody" > 
    <div class="tabs" style="grid-column:1/span3">
        <ul class="tabs-list">
            <li class="active"><a href="#tab1">New</a></li>
            <li ><a href="#tab2">In-Locker</a></li>
            <li ><a href="#tab3">Reached</a></li>
        </ul>
        <div id="tab1" class="tab active">
            <p style="color:black">content
            </p>
        </div>
        <div id="tab2" class="tab">
        <?php    
        if ($this->parcel->num_rows > 0){?>
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Action</th>
                            <th>Parcel ID</th>
                            <th>Apartment ID</th>
                            <th colspan="2">Received</th>
                            <th>Sender</th>
                            </tr>
                            <tr style="background-color:#5747b4">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                            </tr>
                            
            <?php
                while($row = $this->parcel->fetch_assoc()){?> 
                            <tr>
                            <td><a href="#"><i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                            <td><?php echo $row["parcel_id"]; ?></td>
                            <td><?php echo $row["resident_id"]; ?></td>
                            <td><?php echo $row["receive_date"]; ?></td>
                            <td><?php echo $row["receive_time"]; ?></td>
                            <td><?php echo $row["sender"]; ?></td>
                            </tr> 
            <?php
                        }   
                }else{
                    echo "0 results";
                }
            ?>
            </table>
        </div>
        <div id="tab3" class="tab">
                <p style="color:black">
                Content...
                </p>
                </div>
            </div>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>
<script>
        $(document).ready(function(){
            $(".tabs-list li a").click(function(e){
                e.preventDefault();
            });

            $(".tabs-list li").click(function(){
                var tabid = $(this).find("a").attr("href");
                $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab and tab content
                $(".tab").hide();   // hiding open tab
                $(tabid).show();    // show tab
                $(this).addClass("active"); //  adding active class to clicked tab
            });
        });
    </script>