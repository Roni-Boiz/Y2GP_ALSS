<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">

    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Announcements</h1>

        </div>

        <div id="hb" class="hawlockbody animate-bottom">
            <h2>Announcements</h2>
            <div class="btnAddAnnouncement" onclick="openNav(); openOffcanvas()" title="Add Anouncement"><img src="../../public/img/announcement.png"></div><!--<i class="fa fa-plus-square"></i>-->
            <!-- Add Anouncement -->
            <div id="myCanvasNav" class="overlay" onclick="closeOffcanvas()" style="width: 0%; opacity: 0;"></div>

            <div id="mySidenavform" class="sidenavform">
                <a href="javascript:void(0)" class="closebtn" onclick="closeOffcanvas()">&times;</a>

                <form action="addAnnouncement" class="formAddAnnouncement" method="POST" enctype="multipart/form-data">
                    <h1>New Announcement<i class="fa fa-bullhorn"></i></h1>

                    <label for="topic">Topic</label><br>
                    <input type="text" id="topic" name="topic" class="input-field" placeholder="New Announcement" required><br>

                    <label for="content">Content</label><br>
                    <textarea id="content" name="content" cols="30" rows="5" placeholder="Your content" required></textarea><br>

                    <label for="visibility">Visibility</label><br>
                    <div class="visibility">
                        <label for="resient">Resident</label><br>
                        <input type="radio" id="resident" name="visibility" value="resident" required>
                        <label for="admin">Administration</label><br>
                        <input type="radio" id="administration" name="visibility" value="administration" required>
                        <label for="both">Both</label><br>
                        <input type="radio" id="both" name="visibility" value="both" required>
                    </div>

                    <label for="file">Add File</label><br>
                    <input type="file" id="file" name="files[]">
                    <br><br>

                    <input type="submit" name="broadcast" value="Broadcast">
                </form>
            </div>

            <!-- Loading Announcements -->
            <?php
            if ($this->ann->num_rows > 0) {
                $count = 4;
                while ($row = $this->ann->fetch_assoc()) {
            ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="detail">
                                <img src="../../uploads/profile/employee/<?= $row['profile_pic']?>" alt="user" onerror="this.onerror=null; this.src='../../public/img/profile.png'"/>
                                <div class="detail-info">
                                    <?php
                                    $datetime =  $row["date"];
                                    $date = date('F j, Y', strtotime($datetime));
                                    $time = date('h:i A', strtotime($datetime));
                                    ?>
                                    <h3><?= $row["topic"] ?></h3>
                                    <small>by <b><?= $row["name"]?></b> - <?php echo  $date?> <?php echo $time ?></small>
                                </div>
                            </div>
                            <p id="announcementContent"><?php echo $row["content"] ?></p>
                        </div>
                        <?php
                        if ($row["file_name"]) {
                        ?>
                            <div class="card-header">
                                <img src="../../uploads/announcement/<?php echo $row["file_name"] ?>">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
            <br>

        </div> <!-- .hawlockbody div closed here -->
    </div>
</body>

</html>