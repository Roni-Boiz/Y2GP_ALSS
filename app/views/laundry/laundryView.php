<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div id="hb" class="hawlockbody">
            <h2>Announcements</h2>
            <!-- Loading Announcements -->
            <?php
            if ($this->ann->num_rows > 0) {
                $count = 4;
                while ($row = $this->ann->fetch_assoc()) {
            ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="detail">
                                <img src="../../uploads/profile/employee/<?= $row['profile_pic'] ?>" alt="user" onerror="this.onerror=null; this.src='../../public/img/profile.png'" />
                                <div class="detail-info">
                                    <?php
                                    $datetime =  $row["date"];
                                    $date = date('F j, Y', strtotime($datetime));
                                    $time = date('h:i A', strtotime($datetime));
                                    ?>
                                    <h3><?= $row["topic"] ?></h3>
                                    <small>by <b><?= $row["name"] ?></b> - <?php echo  $date ?> <?php echo $time ?></small>
                                </div>
                            </div>
                            <div class="announcementContent"><?php echo $row["content"] ?></div>
                        </div>
                        <?php
                        if ($row["file_name"]) {
                        ?>
                            <div class="card-header">
                                <?php
                                if (pathinfo($row['file_name'], PATHINFO_EXTENSION) == "pdf") {
                                ?>
                                    <div class="pdfFiles">
                                        <img src="../../public/img/pdf-icon.png" alt="pdf">
                                        <a href="../../uploads/announcement/<?php echo $row['file_name'] ?>"><?php echo substr($row['file_name'], 11) ?></a>
                                    </div>
                                <?php
                                } elseif (pathinfo($row['file_name'], PATHINFO_EXTENSION) == "doc" || pathinfo($row['file_name'], PATHINFO_EXTENSION) == "docx") {
                                ?>
                                    <div class="pdfFiles">
                                        <img src="../../public/img/doc-icon.jpg" alt="docx">
                                        <a href="../../uploads/announcement/<?php echo $row['file_name'] ?>"><?php echo substr($row['file_name'], 11) ?></a>
                                    </div>
                                <?php
                                } elseif (pathinfo($row['file_name'], PATHINFO_EXTENSION) == "xlsx") {
                                ?>
                                    <div class="pdfFiles">
                                        <img src="../../public/img/xlsx-icon.png" alt="xlsx">
                                        <a href="../../uploads/announcement/<?php echo $row['file_name'] ?>"><?php echo substr($row['file_name'], 11) ?></a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <img src="../../uploads/announcement/<?php echo $row['file_name'] ?>">
                                <?php
                                }
                                ?>
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
    </div> <!-- .expand div closed here -->
</body>

</html>