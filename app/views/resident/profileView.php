<?php 
    include_once('sidenav.php');
?>
</head>
<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand">
    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div class="hawlockbody" id="hb"> 
    <i class="fa fa-user-circle" style="font-size: 40px; padding:0"></i>
    <button class="purplebutton" onclick = "funedit()" id="editbtn1" style="grid-column:3;">Edit Profile</button> 
    <button class="purplebutton" onclick = "changePw()" id="editbtn2" style="grid-column:3;">Change Password</button>
        <h4 style="margin-left: 100px;"><?php
        if ($this->users->num_rows > 0){
                //while($row = $this->users->fetch_assoc()){
                        $row = $this->users->fetch_assoc();
                        echo $row["apartment_no"];?></h4>
                            <!-- view -->
                            <form action="#" class="form1" id="view">
                                <label for="fname">First Name</label><br>
                                <input type="text" id="fname" name="firstname" class="input-field" placeholder=<?php echo $row["fname"] ?> READONLY><br>

                                <label for="lname">Last Name</label><br>
                                <input type="text" id="lname" name="lastname" class="input-field" placeholder=<?php echo $row["lname"] ?> READONLY><br>
                                
                                <label for="fname">NIC</label><br>
                                <input type="text" id="nic" name="nic" class="input-field" placeholder=<?php echo $row["nic"] ?> READONLY><br>
                                
                                <label for="fname">Contact</label><br>
                                <input type="text" id="phone_no" name="phone_no" class="input-field" placeholder=<?php echo $row["phone_no"] ?> READONLY><br>
                                
                                <label for="lname">Email</label><br>
                                <input type="text" id="email" name="email" class="input-field" placeholder=<?php echo $row["email"] ?> READONLY><br>

                                <label for="lname">Balance</label><br>
                                <input type="text" id="balance" name="balance" class="input-field" placeholder=<?php echo $row["balance"] ?> READONLY><br>
                                
                                <label for="lname">Vehicle NO</label><br>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" placeholder=<?php echo $row["vehicle_no"] ?> READONLY><br>
                                
                                <label for="lname">Family Members</label><br>
                                <?php while($mem =$this->members->fetch_assoc()){?> 
                                <input type="text" id="fam" name="fam" class="input-field" placeholder=<?php echo $mem["membername"]?> READONLY><br>
                                <?php }?>

                            <!-- end view profile part -->    
                            </form>
                            <!-- edit basic details -->      
                            <form action="editProfile" class="form1" id="editview" style="display:none" method="post">
                            
                                <label for="fname">First Name</label><br>
                                <input type="text" id="fname" name="firstname" class="input-field" value=<?php echo $row["fname"] ?>><br>

                                <label for="lname">Last Name</label><br>
                                <input type="text" id="lname" name="lastname" class="input-field" value=<?php echo $row["lname"] ?>><br>
                                
                                <label for="fname">NIC</label><br>
                                <input type="text" id="nic" name="nic" class="input-field" value=<?php echo $row["nic"] ?>><br>

                                <label for="lname">Contact</label><br>
                                <input type="text" id="phone_no" name="phone_no" class="input-field" value=<?php echo $row["phone_no"] ?>><br>

                                <label for="lname">Email</label><br>
                                <input type="text" id="email" name="email" class="input-field" value=<?php echo $row["email"] ?>><br>
                                
                                <label for="lname">Family Members</label><br>
                                <?php while($row2 =$this->members->fetch_assoc()){?> 
                                <input type="text" id="fam" name="fam" class="input-field" value=<?php echo $row2["membername"]?>>
                                <?php }?>
                                <!-- add new field -->
                                <span class="fas fa-plus" onclick="newmember();"></span>
                                <div id="newElement1"></div>

                                <label for="lname">Vehicle NO</label><br>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php echo $row["vehicle_no"] ?>>
                                <!-- add new field -->
                                <span class="fas fa-plus" onclick="newvehicle();"></span>
                                <div id="newElement2"></div>

                            <!-- end edit basic details part -->  
                                <input type="submit" onclick = "confirm()" value="Save">
                            </form>
                            
                            <!-- change password -->
                            <form action="changePassword" class="form1" id="pw" style="display:none" method="post">
                                <label for="fname">Old Password</label><br>
                                <input type="password" id="opw" name="opw" class="input-field" placeholder="Enter your old password" required><br>
                                <span class="error_form" id="old_password_error_message"></span><br>
                                
                                <label for="lname">New Password</label><br>
                                <input type="password" id="npw" name="npw" class="input-field" placeholder="Enter your new password" required><br>
                                <span class="error_form" id="new_password_error_message"></span><br>
                                
                                <label for="fname">Re-New Password</label><br>
                                <input type="password" id="rnpw" name="rnpw" class="input-field" placeholder="Enter your new password again" required><br>
                                <span class="error_form" id="renew_password_error_message"></span><br>
                                
                                <input type="submit" onclick = "confirm()" value="Save">
                            </form>
                            <!-- end change password -->
                            <?php

        }else{
            echo "0 results";
        }
        ?>
    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
<script type="text/javascript" src="../../public/js/profile.js"></script>
</body>
</html>