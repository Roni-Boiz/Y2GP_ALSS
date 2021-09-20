<?php 
    include_once('sidenav.php');
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

                                <label for="lname">Vehicle NO</label><br>
                                <input type="text" id="vehicle_no" name="vehicle_no" class="input-field" placeholder=<?php echo $row["vehicle_no"] ?> READONLY><br>
                                
                                <label for="lname">Family Members</label><br>
                                <input type="text" id="fam" name="fam" class="input-field" placeholder=<?php echo ""?> READONLY><br>

                                <label for="lname">Balance</label><br>
                                <input type="text" id="balance" name="balance" class="input-field" placeholder=<?php echo $row["balance"] ?> READONLY><br>
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

                            <!-- end edit basic details part -->  
                                <input type="submit" onclick = "confirm()" value="Save">
                                <input type="submit" onclick = "ChangePw()" value="Change Password">
                            </form>
                            <!-- change password -->
                            <form action="#" class="form1" id="pw" style="display:none">
                                <label for="fname">Old Password</label><br>
                                <input type="password" id="opw" name="opw" class="input-field" placeholder="Enter your old password"><br>

                                <label for="lname">New Password</label><br>
                                <input type="password" id="npw" name="npw" class="input-field" placeholder="Enter your new password"><br>
                                
                                <label for="fname">Re-New Password</label><br>
                                <input type="password" id="rnpw" name="wnpw" class="input-field" placeholder="Enter your new password again"><br>

                                <input type="submit" onclick = "confirm()" value="Save">
                            </form>
                            <!-- end change password -->
                            <?php
                }
        }else{
            echo "0 results";
        }
        ?>
    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
<script>  
    function funedit() { 
        document.getElementById("view").style.display = "none"; 
        document.getElementById("edit").style.display = "block";
        document.getElementById("pw").style.display = "none";
    }  
    function ChangePw() { 
        document.getElementById("edit").style.display = "none"; 
        document.getElementById("view").style.display = "none"; 
        document.getElementById("pw").style.display = "block";
    } 
    function confirm(){
        alert("Are your sure?")
    }
    // add new field
    function newvehicle() {
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.innerHTML = "<input type='text' id='vehicle_no' name='vehicle_no' class='input-field'><br>";
        document.getElementById("newElement2").appendChild(txtNewInputBox);
    }
    function newmember() {
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.innerHTML = "<input type='text' id='fam' name='fam' class='input-field'><br>";
        document.getElementById("newElement1").appendChild(txtNewInputBox);
    }
</script>
</body>
</html>