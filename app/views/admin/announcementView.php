<?php
include_once 'sidenav.php';
?>
<style>
    /* new */
    body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 65px;
        right: 0;
        background-color: whitesmoke;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 40px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #hb, #hh{
        transition: margin-right .5s;
        padding: 16px;
    }

    .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.9);
        overflow-y: auto;
        overflow-x: hidden;
        text-align: center;
        opacity: 0;
        transition: opacity 1s;
    }

    .btnAddAnnouncement {
        grid-column: 3;
        font-size: 30px;
        cursor: pointer;
        width: fit-content;
    }

    .formAddAnnouncement {
        grid-column: 2;
        font-size: small;
        background-color: none;
        padding: 10px;
        margin-bottom: 40px;
        border-radius: 5px;
    }

    .formAddAnnouncement >label {
        font-weight: bold;
        font-size: large;
    }

    .formAddAnnouncement .input-field {
        width: 100%;
        background-color: white;
        text-align: left;
    }

    .formAddAnnouncement>textarea {
        min-width: 100%;
        max-width: 100%;
        background-color: white;
        text-align: left;
        border-radius: 5%;
        padding: 5px;
    }

    .formAddAnnouncement>input[type="submit"] {
        margin-bottom: 50px;
    }

    .visibility {
        display: flex;
        flex-direction: row;
        width: 100%;
    }

    .visibility >input{
        width: 20px;
        height: 20px;
        margin-left: 5px;
        margin-right: 20px;
    }

</style>
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