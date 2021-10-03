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
        <div class="card">
                <form action="parcels" class="reservationtime" method="post" >
                <div>
                <label for="Apartment ID">Apartment Id</label><br>
                <input type="text" class="input-field" name="apartmentId" id="apartmentId">
                <br><br>
                <label for="Sender">Sender</label><br>
                <input type="text" class="input-field" name="sender" id="sender">
                <br><br>
                <label for="Description">Description</label><br>
                <textarea style="margin:10px 0;width:100%;min-height:60px; border-radius: 15px; border:1px black solid; background-color: #f0f0f0;"
                name="description" id="" cols="30" rows="10">Your text...</textarea><br>
                <input class="purplebutton" value="Save" type="submit" style="float:right">save</button>
                </div>
            </form>
                
        </div>
        </div>
        <!-- </div> -->
        <div id="tab2" class="tab">
        <?php    
        if ($this->inLocker->num_rows > 0){?>
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
                while($row = $this->inLocker->fetch_assoc()){?> 
                            
                            <tr>
                            <td><a href="#"><i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                            <a method="get" href="parcels?parcel=<?php echo $row["parcel_id"];?>">
                            <div class="rowlink" style="display:inline-block">
                            <td><?php echo $row["parcel_id"]; ?></td>
                            <td><?php echo $row["resident_id"]; ?></td>
                            <td><?php echo $row["receive_date"]; ?></td>
                            <td><?php echo $row["receive_time"]; ?></td>
                            <td><?php echo $row["sender"]; ?></td>
                            </div>
                            </a>
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
        <?php    
        if ($this->reached->num_rows > 0){?>
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
                while($row1 = $this->reached->fetch_assoc()){?> 
                            <tr>
                            <td><a href="#"><i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                            <td><?php echo $row1["parcel_id"]; ?></td>
                            <td><?php echo $row1["resident_id"]; ?></td>
                            <td><?php echo $row1["receive_date"]; ?></td>
                            <td><?php echo $row1["receive_time"]; ?></td>
                            <td><?php echo $row1["sender"]; ?></td>
                            </tr> 
            <?php
                        }   
                }else{
                    echo "0 results";
                }
            ?>
            </table>
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