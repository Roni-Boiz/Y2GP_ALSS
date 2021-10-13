<?php 
    include_once 'sidenav.php';
?>

</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">LAUNDRY REQUESTS</h1></div>
    <div id="hb" class="hawlockbody" > 
    <div class="tabs" style="grid-column:1/span3">
        <ul class="tabs-list">
            <li class="active"><a href="#tab1">New</a></li>
            <li ><a href="#tab2">Cleaning</a></li>
            <li ><a href="#tab3">Completed</a></li>
        </ul>
        <div id="tab1" class="tab active">
        <?php    
        if ($this->laundyRequests->num_rows > 0){?>
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Request Id</th>
                            <th>Resident Name</th>
                            <th>Type</th>
                            <th colspan="2">Requested</th>
                            <th>Weight</th>
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
                while($row = $this->laundyRequests->fetch_assoc()){?> 
                            
                            <tr>
                            <div class="rowlink" style="display:inline-block">
                            <td><?php echo $row["request_id"]; ?></td>
                            <td><?php echo $row["resident_id"]; ?></td>
                            <td><?php echo $row["type"]; ?></td>
                            <td><?php echo $row["request_date"]; ?></td>
                            <td><?php echo $row["request_time"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
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
        <!-- </div> -->
        <div id="tab2" class="tab">
        <?php    
        if ($this->laundyRequests->num_rows > 0){?>
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Request Id</th>
                            <th>Resident Name</th>
                            <th>Type</th>
                            <th colspan="2">Requested</th>
                            <th>Weight</th>
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
                while($row1 = $this->laundyRequests->fetch_assoc()){?> 
                            
                            <tr>
                            <div class="rowlink" style="display:inline-block">
                            <td><?php echo $row1["request_id"]; ?></td>
                            <td><?php echo $row1["type"]; ?></td>
                            <td><?php echo $row1["request_date"]; ?></td>
                            <td><?php echo $row1["request_time"]; ?></td>
                            <td><?php echo $row1["resident_id"]; ?></td>
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
        if ($this->laundyRequests->num_rows > 0){?>
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Request Id</th>
                            <th>Resident Name</th>
                            <th>Type</th>
                            <th colspan="2">Requested</th>
                            <th>Weight</th>
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
                while($row1 = $this->laundyRequests->fetch_assoc()){?> 
                            
                            <tr>
                            <div class="rowlink" style="display:inline-block">
                            <td><?php echo $row1["request_id"]; ?></td>
                            <td><?php echo $row1["type"]; ?></td>
                            <td><?php echo $row1["request_date"]; ?></td>
                            <td><?php echo $row1["request_time"]; ?></td>
                            <td><?php echo $row1["resident_id"]; ?></td>
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