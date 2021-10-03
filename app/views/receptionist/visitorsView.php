<?php 
    include_once 'sidenav.php';
?>
<TITLE>Visitor</TITLE>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">VISITOR <span id="city">APPROVAL</span></h1></div>
    <div id="hb" class="hawlockbody" > 
    <div class="tabs" style="grid-column:1/span3">
        <ul class="tabs-list">
            <li class="active"><a href="#tab1">TODAY</a></li>
            <li ><a href="#tab2">PREVIOUS</a></li>
            <!-- <li ><a href="#tab3">OVERDUE VISITORS</a></li> -->
        </ul>
        <div id="tab1" class="tab active">
            <p>
            <div style="overflow-x:auto;grid-column:1/span2">
    
            <table class="table1">
                            <tr style="background-color:#5747b4">
                            <th>Visitor Id</th>
                            <th>Visitor Name</th>
                            <th>Resident Name</th>
                            <th>Approve</th>
                            
                            </tr>
                            
                            
                           
                            <?php
                            
                while($row = mysqli_fetch_assoc($this->visitors)){?> 
                            <tr>
                            <td><a href="#"><i class="fas fa-trash-alt" style="color:black;padding:1px 10px"></i></a></td>
                            <td><?php echo $row["reservation_id"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["start_time"]; ?></td>
                            <td><?php echo $row["end_time"]; ?></td>
                            
                            </tr> 
            <?php
                        }   
                
            ?>
            </table>
            </div>
                    </p>
        </div>
        <div id="tab2" class="tab">
                <p style="color:black">
                    Content...
                </p>
        </div>
        <div id="tab3" class="tab">
                <p style="color:black">
                Content...
                </p>
                </div>
            </div>
    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
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
</body>
</html>