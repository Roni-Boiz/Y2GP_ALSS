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
            <div class="signup_container">
                <form action="parcels" method="post" >
                <div>
                <label for="Apartment ID">Apartment Id</label><br>
                <input type="text" class="input-field-signup" name="apartmentId" id="apartmentId">
                <!-- <br><br> -->
                <label for="Sender">Sender</label><br>
                <input type="text" class="input-field-signup" name="sender" id="sender">
                <!-- <br><br> -->
                <label for="Description">Description</label><br>
                <textarea 
                name="description" cols="30" rows="10" class="input-field-signup"></textarea><br>
                <input class="purplebutton" value="Save" type="submit" style="float:right">save</button>
                </div>
            </form>
            </div>    
                
        </div>
        </div>
        <!-- </div> -->
        <div id="tab2" class="tab">
        <?php    
        if ($this->inLocker->num_rows > 0){?>
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Parcel ID</th>
                            <th>Apartment ID</th>
                            <th colspan="2">Received</th>
                            <th>Sender</th>
                            </tr>
                            <tr style="background-color:#5747b4">
                            <th></th>
                            <th></th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                            </tr>
                          
            <?php
                while($row = $this->inLocker->fetch_assoc()){?> 
                            
                            <tr>
                            <div class="rowlink" style="display:inline-block">
                            <td><?php echo $row["parcel_id"]; ?></td>
                            <td><?php echo $row["resident_id"]; ?></td>
                            <td><?php echo $row["receive_date"]; ?></td>
                            <td><?php echo $row["receive_time"]; ?></td>
                            <td><?php echo $row["sender"]; ?></td>
                            </div>
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
                            <td><a method="get" href="putReached?parcel=<?php echo $row1["parcel_id"];?>"><i class="fas fa-microchip" style="color:black;padding:1px 10px"></i></a></td>
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