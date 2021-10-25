<?php
include_once 'sidenav.php';
?>

<style>
    .addSceduleBody{
        grid-column: 1/span3;
        display: grid;
    }
    
#addScedule{
    padding: 50px;
    display: flex;
    flex-wrap:wrap;
    align-items:center;
    color: #545d7a;
}
.addSceduleSig{
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 30%;
    max-width: 300px;
    min-width: 200px;
    margin: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 66%);
    border: 1px solid #898484;
}
.addSceduleList{
    grid-column:2;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 65%;
    max-width: 1000px;
    margin: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 66%);
    border: 1px solid #898484;
    display:grid;
    grid-template: 1fr 1fr;
}
.addSceduleSig i {
    font-size: 80px;
}
.addSceduleList .title{
    grid-column: 1 / span 2 ;
    font-size:1.17em;
}
.addSceduleList .leftList{
    grid-column:1;
    padding:20px;
    text-align:left;
}
.addSceduleList .rightList{
    grid-column:2;
    padding:20px;
}
.addSceduleList p{
    font-weight: 900;
    
    padding:10px;
    margin-right: 60px;
}

</style>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">ADD SCHEDULE</h1></div>
    <div id="hb" class="hawlockbody" > 

    <div class="addSceduleBody">
    <div class="addScheduleButton">
    <button>Add Schedule</button>
</div>
    <div class="card" id="addScedule">

<div class="addSceduleSig">
    <div>
        <span><i class="fas fa-briefcase"></i></span>
        <h3>Today Reservations</h3>
    </div>
    <div style="font-size: 40px;">
        100
    </div>
</div>

<div class="addSceduleList">
    <div class="title">
        <h3>
            Reservations
        </h3>
    </div>
    <!-- hkjljlklkjlkj -->

    <section class="wrapper">
                        <main class="row title">
                            <ul>
                                <li>User ID</li>
                                <li>User Name</li>
                                <li>Type</li>
                                <li>Hold</li>
                                <li>Remove User</li>
                            </ul>
                        </main>
                        <?php
                        if ($this->users->num_rows > 0) { ?>
                            <?php
                            while ($row = $this->users->fetch_assoc()) {
                                if ($row["type"] == 'resident') {
                            ?>
                                    <article class="row pga">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i onclick="openModel('model')" class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php

                                } else if ($row["type"] == 'admin') {
                                ?>
                                    <article class="row nhl">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php
                                } else {
                                ?>
                                    <article class="row mlb">
                                        <ul>
                                            <li><a href="#"><?php echo $row["user_id"] ?></a><span class="small">(update)</span></li>
                                            <li><?php echo $row["user_name"] ?></li>
                                            <li><?php echo $row["type"] ?></li>
                                            <li><?php echo $row["hold"] ?></li>
                                            <li><i class="fa fa-trash"></i></li>
                                        </ul>
                                        <!-- <ul class="more-content">
                                        <li>This 1665-player contest boasts a $300,000.00 prize pool and pays out the top 300 finishing positions. First place wins $100,000.00. Good luck!</li>
                                    </ul> -->
                                    </article>
                                <?php
                                }
                                ?>

                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </section>

    <!-- jkjkhkhjkhj -->
    <div class="leftList">
        <p>08:00-09:00 - 0</p>
        <p>09:00-10:00 - 1</p>
        <p>10:00-11:00 - 5</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        
    </div>
    <div class="rightList">
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        <p>08:00-09:00 - 4</p>
        <p>09:00-10:00 - 3</p>
        <p>10:00-11:00 - 1</p>
        
    </div>
</div>

</div>

    </div>
                        

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
<script>
function clickDate(id) {
    console.log(id);
}

</script>
</body>
</html>

