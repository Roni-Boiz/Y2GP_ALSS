<?php 
    $type="re";
    $id="Re10023";
    include_once 'include/sidenav.php';
?>
<style>
/* The alert message box */
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

</style>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Hawlock <span id="city">City</span></h1></div>
    <div id="hb" class="hawlockbody" > 

        <!-- form structure -->
        <form action="#" class="form1" id="view">
            <label for="fname">Name</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="ALSS"><br>

            <label for="fname">NIC</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="123456789v"><br>
        </form>
    <br>
    <!-- Alert box -->
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            This is an alert box.
    </div>

    <!-- table structure -->
    <div style="overflow-x:auto;">
        <table>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            </tr>
            <tr>
            <td>Chathura</td>
            <td>Manohara</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            </tr>
            <tr>
            <td>Nishath</td>
            <td>Yashintha</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            </tr>
            <tr>
            <td>Nipuna</td>
            <td>Manujaya</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            </tr>
            <tr>
            <td>Ronila</td>
            <td>Sanjula</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            </tr>
        </table>
    </div>

    <div id="aa" style='opacity:0'>
    Test opacity
    </div>


<button onclick="$('#aa').fadeTo(500,1);">Show</button>
<button onclick="$('#aa').fadeTo(500,0);">Hide</button>

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>

<?php
$receiver = "chathus.1999@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:hawlockrycn@gmail.com";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>

