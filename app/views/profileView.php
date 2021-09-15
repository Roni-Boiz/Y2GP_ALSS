<?php 
    $type="re";
    $id="Re10023";
    include_once 'sidenav.php';
?>
</head>
<body style="background-color: gray; background-image:none;">
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand">
    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div class="hawlockbody" id="hb"> 
    <i class="fa fa-user-circle" style="font-size: 75px; padding:0"></i>
    <input type="submit" onclick = "funedit()" value="Edit Profile">       
        <h4 style="margin-left: 100px;"><?php
        if ($this->users->num_rows > 0){
                while($row = $this->users->fetch_assoc()){
                        echo $row["apartment_no"];?></h4>
                            <!-- view -->
                            <!-- for all -->
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
                                <!-- for resident -->
                                <?php if($type=="re"){?>
                                <label for="lname">Vehicle NO</label><br>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" placeholder=<?php echo $row["vehicle_no"] ?> READONLY><br>
                                
                                <label for="lname">Family Members</label><br>
                                <input type="text" id="fam" name="fam" class="input-field" placeholder=<?php echo ""?> READONLY><br>

                                <label for="lname">Balance</label><br>
                                <input type="text" id="balance" name="balance" class="input-field" placeholder=<?php echo $row["balance"] ?> READONLY><br>
                                <?php
                                }?>
                                <!-- end view profile part -->    
                            </form>
                            <!-- edit basic details -->      
                            <form action="#" class="form1" id="edit" style="display:none">
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
                                <!-- for resident -->
                                <?php if($type=="re"){?>
                                <label for="lname">Family Members</label><br>
                                <input type="text" id="fam" name="fam" class="input-field" value=<?php echo ""?>>
                                <!-- add new field -->
                                <span class="fas fa-plus" onclick="newmember();"></span>
                                <div id="newElement1"></div>

                                <label for="lname">Vehicle NO</label><br>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" value=<?php echo $row["vehicle_no"] ?>>
                                <!-- add new field -->
                                <span class="fas fa-plus" onclick="newvehicle();"></span>
                                <div id="newElement2"></div>

                                <?php
                                }?>
                                <!-- end edit basic details part -->  
                                <input type="submit" onclick = "" value="Save">
                                <input type="submit" onclick = "ChangePw()" value="Change Password">
                            </form>
                           
                            <?php
                }
        }else{
            echo "0 results";
        }
        ?>
    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->

</body>
</html>