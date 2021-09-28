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
/* card----------------------------------------1 */
/* .recipe,
.pizza-box {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.pizza-box {
  flex: 3 1 30ch;
  height: calc(282px + 5vw);
  overflow: hidden;
}
.pizza-box img {
  max-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  -o-object-fit: cover;
     object-fit: cover;
  -o-object-position: 50% 50%;
     object-position: 50% 50%;
}

.recipe {
  border: 2px solid #F2F2F2;
  border-radius: 8px;
  overflow: hidden;
}
.recipe-content {
  padding: 16px 32px;
  flex: 4 1 40ch;
}
.recipe-tags {
  margin: 0 -8px;
}
.recipe-tag {
  display: inline-block;
  margin: 8px;
  font-size: 0.875em;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 0.02em;
  color: var(--primary);
}
.recipe-title {
  margin: 0;
  font-size: clamp(1.4em, 2.1vw, 2.1em);
  font-family: "Roboto Slab", Helvetica, Arial, sans-serif;
}
.recipe-title a {
  text-decoration: none;
  color: inherit;
}
.recipe-datadata {
  margin: 0;
}
.recipe-rating {
  font-size: 1.2em;
  letter-spacing: 0.05em;
  color: var(--primary);
}
.recipe-rating span {
  color: var(--grey);
}
.recipe-votes {
  font-size: 0.825em;
  font-style: italic;
  color: var(--lightgrey);
}
.recipe-save {
  display: flex;
  align-items: center;
  padding: 6px 14px 6px 12px;
  border-radius: 4px;
  border: 2px solid currentColor;
  color: var(--primary);
  background: none;
  cursor: pointer;
  font-weight: bold;
}
.recipe-save svg {
  margin-right: 6px;
} */
/* card------------------------------------2 */
.card1 {
  display: flex;
  flex-direction: column;
  box-shadow: 0 3px 7px -1px #110b2e;
  background: #fff;
  line-height: 1.4;
  border-radius: 5px;
  overflow: hidden;
  margin: 10px;
  width:100%;
  min-height:400px;
}
.card1:hover .photo {
  transform: scale(1.3) rotate(3deg);
}
.card1 .data {
  position: relative;
  z-index: 0;
}
.card1 .photo {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-size: cover;
  background-position: center;
  transition: transform 0.2s;
}
.card1 .details ul {
  margin: auto;
  padding: 0;
  list-style: none;
}
.card1 .details {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -100%;
  margin: auto;
  transition: left 0.2s;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 10px;
  width: 100%;
  font-size: 0.9rem;
}
.card1 .details:before {
  margin-right: 10px;
  content: "";
}
.card1 .description {
  padding: 1rem;
  background: #fff;
  position: relative;
  z-index: 1;
  /* background:linear-gradient(to right,white,#927ffc); */
}
.card1 .description h1 {
  line-height: 1;
  margin: 0;
  font-size: 1.2rem;
}
.card1 .description h2 {
  font-size: 0.8rem;
  font-weight: 300;
  color: #a2a2a2;
  margin-top: 5px;
}
.card1 .description .read-more {
  text-align: right;
}
.card1 .description .read-more a {
  color: #110b2e;
  display: inline-block;
  position: relative;
}
.card1 .description .read-more a:after {
  content: "...";
  margin-left: -10px;
  opacity: 0;
  vertical-align: middle;
  transition: margin 0.3s, opacity 0.3s;
}
.card1 .description .read-more a:hover:after {
  margin-left: 5px;
  opacity: 1;
}
.card1 p {
  position: relative;
  margin: 1rem 0 0;
}
.card1:hover .details {
  left: 0%;
}
@media (min-width: 640px) {
  .card1 {
    flex-direction: row;
    max-width: 700px;
  }
  .card1 .data {
    flex-basis: 40%;
    height: auto;
  }
  .card1 .description {
    flex-basis: 60%;
  }
  .card1 .description:before {
    transform: skewX(-3deg);
    content: "";
    background: #fff;
    width: 30px;
    position: absolute;
    left: -10px;
    top: 0;
    bottom: 0;
    z-index: -1;
  }
}
/*  */


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
    <div style="overflow-x:auto;grid-column:1/span2">
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

<div class="card1" style="grid-column:2">
	<div class="data">
		<div class="photo" style="background-image:url(../../public/img/1.jpg);"></div>
		<ul class="details">
			<li class="author">12.10</li>
			<li class="date">Aug. 24, 2015</li>
		</ul>
	</div>
	<div class="description">
		<h1 style="color:indigo;font-weight:bold;font-size:3rem;text-align:center">Login</h1>
    <form action="#" class="form1" id="view" style="margin:20%">
            <label for="fname">USERNAME</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="ALSS"><br>

            <label for="fname">PASSWORD</label><br>
            <input type="text" id="fname" name="firstname" class="input-field" placeholder="123456789v"><br>
            <input type="submit" class="purplebutton" value="login">
          </form>		<p class="read-more">
			<a href="#">Forgot password</a>
		</p>
	</div>
</div>
<!--  -->


<!--  -->

    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
</body>
</html>

<!-- <?php
$receiver = "chathus.1999@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:hawlockrycn@gmail.com";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?> -->



