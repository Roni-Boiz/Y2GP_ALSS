<?php 
    include_once 'sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Notifications</span></h1></div>
    <div id="hb" class="hawlockbody"> 

    <?php
        if ($this->notification->num_rows > 0){
                while($row = $this->notification->fetch_assoc()){?> 
                    <div class="card3">
                    <div class="card__icon"><i class="fas fa-bolt"></i></div><?php echo $row['date']." ".$row['time']; ?>
                    <p class="card__exit"><i class="fas fa-times"></i></p>
                    <h2 class="card__title"><?php echo $row['description']; ?>
                    </h2>
                    <?php
                    if($row['view']>5){ ?>
                    <p class="card__apply">
                        <a class="card__link" method="get" href="markReached?notification=<?php echo $row["notification_id"];?>">Marks as Reached</a>
                    </p>
                    <?php } ?>
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