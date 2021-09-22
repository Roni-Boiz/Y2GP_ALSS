<?php 
    include_once 'sidenav.php';
?>
<style>
.announcement{
    grid-column: 1/span 3;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 100%;
    margin: auto;
    margin-top: 10px;
    text-align: center;
    font-family: arial;
}
.announcement .title{
    color: grey;
    font-size: 15px;
}
</style>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div id="hb" class="hawlockbody" > 
    <h2>Announcements</h2>

    <?php
        if ($this->ann->num_rows > 0){
                while($row = $this->ann->fetch_assoc()){?> 
                        <div class="announcement">
                            <h3>By <?php echo ($row["employee_id"] == 1) ? $row["employee_id"] : $row["admin_id"];?></h3>
                            <p class="title"><?php echo $row["topic"]; ?></p>
                            <p><?php echo $row["content"]; ?> </p>
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