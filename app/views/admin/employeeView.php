<?php
include_once 'sidenav.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap');

    

    button {
        padding: 16px 24px;
        min-width: 8rem;
        font-size: 1.25rem;
        text-transform: uppercase;
        border: none;
        outline: none;
        border-radius: 20px;
        background-image: linear-gradient(to right, #605C73, #110B2E);
        /*#ff3c7d, #ff7637*/
        color: #ffffff;
        cursor: pointer;
        transition: transform 0.25s;
        margin-left: 10px;
    }

    #answer {
        margin-top: 1rem;
        font-size: 1.2rem;
    }

    button:hover {
        background-image: linear-gradient(to right, #201C32, #1B1536);
        transform: translate(-0.25rem);
    }

    
</style>

</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>

        </div>

        <div id="hb" class="hawlockbody">
            <h2>Employees</h2>
            <div class="divPopupModel">

                <button id="model-btn">Add New</button>
                <p id="answer"></p>

                <div id="myCanvasNav" class="overlay" style="width: 0%; opacity: 0;"></div>
                <div id="model">
                    
                    <a href="javascript:void(0)" id="closebtn">&times;</a>
                    <div style="text-align: center;">
                        <h1>New Employee<i class="fa fa-user"></i></i></h1>
                    </div>

                    <form action="#" class="formAddEmployee" method="GET">
                        <div id="col1">
                            <label for="type">Type</label><br>
                            <select id="emptype" name="emptype" class="input-field" placeholder="New Announcement">
                                <option value="manager">Select Employee Type...</option>
                                <option value="manager">Manager</option>
                                <option value="manager">Reseptionist</option>
                                <option value="manager">Parking Officer</option>
                                <option value="manager">Trainer</option>
                                <option value="manager">Treater</option>
                                <option value="manager">Other</option>
                            </select>
                        </div>

                        <div class="profile-pic" id="col2">
                            <img src="../../public/img/blank-profile.png" id="photo">
                            <input type="file" id="file">
                            <label for="file" id="uploadBtn">Choose Photo</label>
                        </div>

                        <div id="col1">
                            <label for="fname">First Name</label><br>
                            <input type="text" id="fname" name="fname" class="input-field" placeholder="John">
                        </div>

                        <div id="col2">
                            <label for="lname">Last Name</label><br>
                            <input type="text" id="lname" name="lname" class="input-field" placeholder="Smith">
                        </div>

                        <div id="col1">
                            <label for="email">Email Address</label><br>
                            <input type="email" id="email" name="email" class="input-field" placeholder="example@email.com">
                        </div>

                        <div id="col2">
                            <label for="cno">Contact Number</label><br>
                            <input type="text" id="cno" name="cno" class="input-field" placeholder="071-1234567">
                        </div>

                        <input style="grid-column: 1/span 2;" type="submit" name="Submit" value="submit">
                    </form>
                    <!-- <div id="btn-grp" style="grid-column: 1;">
                        <button id="yes-btn">Yes</button>
                        <button id="no-btn">No</button>
                    </div> -->
                </div>

            </div>

        </div>
    </div> <!-- .hawlockbody div closed here -->
</body>

</html>