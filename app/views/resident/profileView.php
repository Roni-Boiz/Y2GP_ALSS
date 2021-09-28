<?php 
    include_once('sidenav.php');
?>

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
                            <form class="form1" id="view" style="background-color:purple;padding:20px">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="input-field" placeholder=<?php echo $row["fname"] ?> READONLY><br>

                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" class="input-field" placeholder=<?php echo $row["lname"] ?> READONLY><br>
                                
                                <label for="fname">NIC</label>
                                <input type="text" id="nic" class="input-field" placeholder=<?php echo $row["nic"] ?> READONLY><br>
                                
                                <label for="fname">Contact</label>
                                <input type="text" id="phone_no" class="input-field" placeholder=<?php echo $row["phone_no"] ?> READONLY><br>
                                
                                <label for="lname">Email</label>
                                <input type="text" id="email" class="input-field" placeholder=<?php echo $row["email"] ?> READONLY><br>

                                <label for="lname">Balance</label>
                                <input type="text" id="balance" class="input-field" placeholder=<?php echo $row["balance"] ?> READONLY><br>
                                
                                <label for="lname">Vehicle NO</label>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" placeholder=<?php echo $row["vehicle_no"] ?> READONLY><br>
                                
                                <label for="lname">Family Members</label>
                                <i class="fas fa-chevron-circle-down" style="padding:0" onclick="showmembers();"></i><br>
                            
                            </form>
                            <!-- end view profile part -->  

                            <!-- edit basic details -->      
                            <form action="editProfile" class="form1" id="editview" style="display:none" method="post">
                                    
                                <input type="hidden" name="res_id" class="input-field" value=<?php echo $row["resident_id"]?>>
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="firstname" class="input-field" value=<?php echo $row["fname"] ?>><br>

                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lastname" class="input-field" value=<?php echo $row["lname"] ?>><br>
                                
                                <label for="fname">NIC</label>
                                <input type="text" id="nic" name="nic" class="input-field" value=<?php echo $row["nic"] ?>><br>

                                <label for="lname">Contact</label>
                                <input type="text" id="phone_no" name="phone_no" class="input-field" value=<?php echo $row["phone_no"] ?>><br>

                                <label for="lname">Email</label>
                                <input type="text" id="email" name="email" class="input-field" value=<?php echo $row["email"] ?>><br>
                                
                                <label for="lname">Vehicle NO</label>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php echo $row["vehicle_no"] ?>><br>

                                <label for="lname">New Member</label>
                                <!-- add new field -->
                                <i class="fas fa-plus-circle" style="padding:0" onclick="newMember();"></i><br>
                                <span id="newmem" style="display:none">
                                
                                <label for="lname">new member</label>
                                <input type="text" id="fam" name="fam" class="input-field" placeholder="add new member"></i>
                                </span>
                                <br>
                                <input type="submit" onclick = "confirmSave()" value="Save" style="float:right"><br>
                                <label for="lname">Family Members</label>
                                <i class="fas fa-chevron-circle-down" style="padding:0" onclick="showmembers();"></i><br>
                                <!-- <label for="lname">New Vehicle</label>
                                add new field
                                <i class="fas fa-plus-circle" style="padding:0" onclick="newVehicle();"></i><br>
                                <span id="newveh" style="display:none">
                                <label for="lname">vehicle<?php echo " ".$v++?></label>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" placeholder="add new vehicle">
                                </span>
                                <br> -->

                            <!-- end edit basic details part -->  
                                
                            </form>

                            <!-- member part -->                         
                                <!-- view family members on click showmembers() -->
                                <div id="showmem" style="display:none;grid-column:2/span3">
                                <?php $m=1; while($mem =$this->members->fetch_assoc()){?>
                                <form action="removeMember" method="post" class="form1" id="removedmem">   
                                <label for="lname">member<?php echo " ".$m++?></label>
                                <input type="text" id="fam" name="removedmem" class="input-field" value=<?php echo $mem["membername"]?> READONLY>
                                <button type="submit" onclick = "confirmDelete()" style="background-color: transparent;border:none;"><i id="removeicon" class="fas fa-minus-circle" style="display:visible;padding:0"></i></button><br>
                                </form>
                                <?php }?>
                                </div> 
                            <!-- member part -->   
                            <?php $m=1; while($mem =$this->members->fetch_assoc()){?>
                                <form action="removeMember" method="post" class="form1" id="removedmem">   
                                <label for="lname">member<?php echo " ".$m++?></label>
                                <input type="text" id="fam" name="removedmem" class="input-field" value=<?php echo $mem["membername"]?> READONLY>
                                <button type="submit" onclick = "confirmDelete()" style="background-color: transparent;border:none;"><i id="removeicon" class="fas fa-minus-circle" style="display:visible;padding:0"></i></button><br>
                                </form>
                                <?php }?>
                            
                            <!-- change password -->
                            <form action="changePassword" class="form1" id="pw" style="display:none" method="post">
                                <label for="fname">Old Password</label>
                                <input type="password" id="opw" name="opw" class="input-field" placeholder="old password" ><br>
                                <span class="error_form" id="old_password_error_message"></span><br>
                                
                                <label for="lname">New Password</label>
                                <input type="password" id="npw" name="npw" class="input-field" placeholder="new password" ><br>
                                <span class="error_form" id="new_password_error_message"></span><br>
                                
                                <label for="fname">Re-New Password</label>
                                <input type="password" id="rnpw" name="rnpw" class="input-field" placeholder="new password again" ><br>
                                <span class="error_form" id="renew_password_error_message"></span><br>
                                
                                <input type="submit" onclick = "confirm()" value="Save" style="float:right">
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