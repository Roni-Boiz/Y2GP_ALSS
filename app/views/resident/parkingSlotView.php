<?php 
    include_once 'sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">PARKING SLOT <span id="city">RESERVATION</span></h1></div>
    <div id="hb" class="hawlockbody" >
    <div class="card">
    <?php 
    if ($this->slots->num_rows > 0){?>
         
            <?php
                while($row = $this->slots->fetch_assoc()){?>
                        <a class="pslots" href="#">
                        <?php 
                        if($row["status"]){?>
                        <i class="fas fa-car" style="color:red;font-size:40px"></i>
                        <?php echo $row["slot_no"];
                        }else{?>
                        <i class="fas fa-car" style="color:green;font-size:40px"></i>
                        <?php
                        echo $row["slot_no"];
                        }?>    
                        </a>             
            <?php
                        }   
                }else{
                    echo "0 results";
                }
                ?>
        </div> 
    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>