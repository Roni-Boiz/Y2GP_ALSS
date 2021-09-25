<?php 
    include_once 'sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div id="hb" class="hawlockbody" > 
    <h2>Announcements</h2>
    <?php
        if ($this->ann->num_rows > 0){
            $count=4;
                while($row = $this->ann->fetch_assoc()){?> 
                        <div class="card" >
           
                            <div class="card-body">
                                <div class="detail">
                                    <img src="../../public/img/user.png"alt="user" />
                                    <div class="detail-info"><h5><?php echo $row["date"]; ?></h5><small><?php echo $row["time"]; ?></small></div>
                                </div>                    
                            <h4><?php echo $row["topic"]; ?></h4>
                                <p><?php echo $row["content"]; ?></p>
                            </div> 
                            <div class="card-header">
                                <?php if($count<5) $count++; else $count=2?>
                                <img src="../../public/img/<?php echo $count?>.jpg">
                        </div>
   </div>
    <?php
                }   
        }else{
            echo "0 results";
        }
    ?>
    <br>


    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>