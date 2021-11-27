<?php
include_once 'sidenav.php';
?>
</head>

<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead"><img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">REGISTER <span id="city">RESIDENT</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom">
            <!-- <div class="leftPanel" style="margin:30px 0; width: 600px;"> -->
                <div class="signup_container">
                    <div class="signup">


                        <?php
                        if (isset($this->errors) && sizeof($this->errors) > 0) { ?>
                            <center>
                                <div class="red_alert">
                                    <button class="closebtn" onclick="this.parentElement.style.display='none';">&times;</button>
                                    <?php
                                    $error = implode("<br>", $this->errors);
                                    echo $error;
                                    ?>
                                </div>
                            </center>

                        <?php
                        }
                        ?>

                        <form action="registerSuccess" class="sign-up-form" method="POST">
                            <div class="input-field-signup" id="fnameId">
                                <i class="fas fa-user"></i>
                                <input id="form_fname" class="fname" type="text" placeholder="First Name" name="fname" autofocus required>
                                <span class="error_form" id="fname_error_message"></span>
                            </div>

                            <div class="input-field-signup" id="snameId">
                                <i class="fas fa-user"></i>
                                <input id="form_sname" class="lname" type="text" placeholder="Last Name" name="lname" required>
                                <span class="error_form" id="sname_error_message"></span>
                            </div>

                            <div class="input-field-signup" id="emailId">
                                <i class="fas fa-envelope"></i>
                                <input id="form_email" type="email" placeholder="email" name="email" required>
                                <span class="error_form" id="email_error_message"></span>
                            </div>

                            <div class="input-field-signup" id="apartmentId">
                                <i class="fa fa-address-card" aria-hidden="true"></i>

                                <select name="apartmentId" id="form_apartment">
                                    <option value="#">Select a apartment</option>
                                    <?php

                                    while ($row = $this->apartments->fetch_assoc()) {
                                        $apartment = $row['apartment_no'];
                                        echo "<option value='$apartment'>$apartment</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- <div class="input-field-signup" id ="rpasswordId">
                        <i class="fas fa-lock"></i>
                        <input id="form_rpassword" type="password" placeholder="password" name = "rpassword" required>
                        <span class="error_form" id="rpassword_error_message"></span>
                    </div>

                    <div class="input-field-signup" id ="retype_passwordfnameId">
                        <i class="fas fa-lock"></i>
                        <input id="form_retype_password" type="password" placeholder="Confirm Password" name = "retype_password" required>
                        <span class="error_form" id="retype_password_error_message"></span>
                    </div> -->

                            <div class="btn-signup"><input type="submit" name="submit" value="Register" /></div>

                        </form>

                    </div>


                </div>

            <!-- </div> -->
            <!-- <div class="rightPanel" style="margin-top:30px;">
                    <div class="holdAccount">
                        <div class="head">
                            <h3>Apartments.....</h3>
                        </div>
                        <p>
                        <?php
                        $row = $this->count->fetch_assoc();
                        ?>
                        <div class="detail">
                            <div>
                                <div class="detail-info">
                                    <h5><?php echo "Current : ".$row["stat"]; ?></h5>
                                </div>
                            </div>
                        </div>


                    </div> -->
        </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
    <script type="text/javascript" src="../../public/js/register.js"></script>
</body>

</html>