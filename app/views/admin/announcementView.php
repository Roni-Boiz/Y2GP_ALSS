<?php
include_once 'sidenav.php';
?>

</head>

<body style="background-color: gray; background-image:none;">

    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>

        </div>

        <div id="hb" class="hawlockbody">
            <h2>Announcements</h2>
            <!-- Add Anouncement -->
            <div id="myCanvasNav" class="overlay" onclick="closeOffcanvas()" style="width: 0%; opacity: 0;"></div>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeOffcanvas()">&times;</a>


                <form action="addAnnouncement" class="formAddAnnouncement" method="get" enctype="multipart/form-data">
                    <h1>Add announcement</h1>
                    <br>
                    <label for="topic">Topic</label><br>
                    <input type="text" id="topic" name="topic" class="input-field" placeholder="New Announcement"><br>

                    <label for="fname">Content</label><br>
                    <textarea id="content" name="content" cols="30" rows="7" placeholder="Your content"></textarea><br>

                    <label for="visibility">Visibility</label><br>
                    <div class="visibility">
                        <label for="resient">Resident</label><br>
                        <input type="radio" id="resident" name="visibility" value="resident">
                        <label for="admin">Administration</label><br>
                        <input type="radio" id="administration" name="visibility" value="administration">
                        <label for="both">Both</label><br>
                        <input type="radio" id="both" name="visibility" value="both">
                    </div>

                    <label for="file">Add File</label><br>
                    <input type="file" id="file" name="file" multiple>
                    <br><br>

                    <input type="submit" name="broadcast" value="Broadcast">
                </form>
            </div>

            <div class="btnAddAnnouncement" onclick="openNav(); openOffcanvas()" title="Add Anouncement"><i class="fa fa-plus-square"></i></div>
            <script>
                function openOffcanvas() {
                    document.getElementById("mySidenav").style.width = "400px";
                    document.getElementById("hh").style.marginRight = "410px";
                    document.getElementById("hb").style.marginRight = "410px";
                }

                function openNav() {
                    document.getElementById("myCanvasNav").style.width = "100%";
                    document.getElementById("myCanvasNav").style.opacity = "0.8";
                }

                function closeOffcanvas() {
                    document.getElementById("mySidenav").style.width = "0%";
                    document.getElementById("hh").style.marginRight = "10px";
                    document.getElementById("hb").style.marginRight = "10px";
                    document.getElementById("myCanvasNav").style.width = "0%";
                    document.getElementById("myCanvasNav").style.opacity = "0";
                }
            </script>

            <!-- Loading Announcements -->
            <div class="card">
                <?php
                if ($this->ann->num_rows > 0) {
                    $count = 4;
                    while ($row = $this->ann->fetch_assoc()) {
                ?>
                        <div class="card-body">
                            <div class="detail">
                                <img src="../../public/img/user.png" alt="user" />
                                <div class="detail-info">
                                    <h5><?php echo $row["date"]; ?></h5><small><?php echo $row["time"]; ?></small>
                                </div>
                            </div>
                            <h4><?php echo $row["topic"]; ?></h4>
                            <p><?php echo $row["content"]; ?></p>
                        </div>
                        <div class="card-header">
                            <?php if ($count < 5) $count++;
                            else $count = 2 ?>
                            <img src="../../public/img/<?php echo $count ?>.jpg">
                        </div>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <br>


            </div>
        </div> <!-- .hawlockbody div closed here -->
</body>

</html>