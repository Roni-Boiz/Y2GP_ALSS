<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <!-- <link rel="stylesheet" href="../../public/css/body.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" classorigin="anonymous" />
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

    <link rel="manifest" href="../../manifest.json">
    <meta name="theme-color" content="white">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../../public/img/android/android-launchericon-144-144.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="ALSS">
    <meta name="msapplication-TileImage" content="../../public/img/windows10/SmallTile.scale-400.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url(../img/bg_3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .box {
            background-color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            /* grid-template-columns: 200px 200px 1fr; */
            /* grid-template-rows: 100px 1fr; */
            border-radius: 5px;
            border: gray solid 1px;
            min-height: 600px;
            width: 90%;
            margin: 5%;
            position: relative;
        }

        nav {
            margin: 0;
        }

        nav ul {
            float: right;
        }

        #logo {
            height: 200px;
            width: 200px;
            object-fit: cover;
            margin: -60px auto;
        }

        #title {
            color: #2a225a;
            font-size: 40px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        #city {
            font-weight: lighter;
        }

        .header {
            font-weight: 5px;
            font-size: 20px;
            position: absolute;
            right: 25px;
        }

        nav ul li {
            list-style: none;
            display: inline-block;
            padding: 30px 20px 0 0;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
        }

        nav ul li a:hover {
            font-weight: bold;
        }

        .header nav ul li button {
            border-radius: 20px;
            background-color: #211a49;
            border-style: none;
            padding: 8px 40px;
            font-size: 15px;
            font-weight: 5px;
        }

        .header nav ul li button span {
            color: white;
        }

        #title {
            font-size: 50px;
        }

        .footer {
            height: 25px;
            width: 100%;
            background: linear-gradient(to right, #211a49, #927ffc);
            text-align: center;
            font-size: 10px;
            padding-top: 20px;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            position: absolute;
            top: 50px;
            left: 0px;
            right: 20px;
        }

        .heading h1 {
            margin: -50px 0px !important;
            padding: 0px !important;
        }

        .heading img {
            margin: -50px 0px !important;
            padding: 0px !important;
        }

        #contactusImg {
            width: 100%;
        }

        #contactusImg img {
            width: 100%;
        }

        .contactBanner {
            position: absolute;
            top: 200px;
            font-size: 35px;
            font-weight: 500;
            color: #2a225a;
            opacity: 0.95;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .contactBanner:hover {
            opacity: 1;
        }

        .contactBanner span {
            grid-column: 1/span 2;
            text-align: center;
        }

        #map {
            height: 400px;
            width: 100%;
        }

        #contactusform {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            margin: 10px;
        }

        #contactusform div:nth-child(1) {
            grid-column: 1;
        }

        #contactusform div:nth-child(2) {
            grid-column: 2;
        }

        .contactusMethods {
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
        }

        .contactusMethods div {
            padding: 10px;
            margin: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid #eaf0f6;
        }

        .mapContent {
            display: grid;
            grid-template-columns: 2fr 1fr;
        }

        .getInTouch {
            display: grid;
            grid-template-columns: 60% 40%;
            height: 120px;
            padding: 10px
        }

        .getInTouch div:nth-child(2) {
            position: relative;
            top: -14px;
            left: 11px;
        }

        .getInTouch div:nth-child(2) img {
            position: relative;
            border-radius: 25px 0px 0px 25px;
            width: 100%;
            height: 140px;
        }

        .mapContent #content {
            padding: 10px 0px 0px 20px;
        }

        .mapContent #content div {
            margin-bottom: 20px;
        }

        .contactusMethods div>i {
            font-size: 50px;
        }

        .contactusMethods div>i,
        h2,
        p {
            margin-bottom: 15px;
        }

        .contactusMethods div>p {
            padding: 0px 10px;
        }

        #contactusform div:nth-child(2){
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="center">
        <div class="box">
            <div class="header">
                <nav>
                    <ul>
                        <li><button><a href="home"><span>HOME</span></a></button></li>
                    </ul>
                </nav>
            </div>
            <div class="heading">
                <img src="../../public/img/image.png" alt="" id="logo">
                <h1 id="title">Hawlock <span id="city">City</span></h1>
            </div>

            <div id="contactusImg">
                <img src="../../public/img/2.jpg" alt="">
            </div>

            <div class="contactBanner">
                <span>Contact US</span>
            </div>

            <div class="getInTouch">
                <div>
                    <h1>Get in touch</h1>
                    <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
                </div>
                <div>
                    <img src="../../public/img/contactus2.jpg" alt="">
                </div>

            </div>
            <div class="mapContent">
                <div id="map"></div>
                <div id="content">
                    <div>
                        <h2>Head Office</h2>
                        <p>Address</p>
                    </div>
                    <div>
                        <h2>Phone / Fax</h2>
                        <p>Number</p>
                    </div>
                    <div>
                        <h2>Our Apartment Selling page</h2>
                        <a href="#">Visit our apartment selling page</a>
                    </div>
                </div>
            </div>

            <div id="contactusform">
                <div>
                    <h2>Ask how we can help you:</h2>
                    <div class="contactusMethods">
                        <div>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h2>Talk to Manager</h2>
                            <p>
                                Interestent in hawlock apartment complex or have an issue? Just pick up the phone
                                to state you problem to one of our manages.
                            </p>
                            <h3>+94 71x 0x0 x0x</h3>
                        </div>
                        <div>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <h2>Contact Customer Support</h2>
                            <p>
                                Sometimes you need a little help from your friends. Or a Hawlock support rep. Don’t worry… we’re here for you.
                            </p>
                            <button>Contact Support</button>
                        </div>
                    </div>
                    <div>
                        <h2>Office Location</h2>
                        <p>Address</p>
                    </div>
                </div>

                <div>
                    <div>
                        <h4>Please note: all feilds are required</h4>
                    </div>
                    <form action="" method="POST">
                        <label for="fname">First Name</label><br>
                        <input type="text" id="name" name="name" class="input-field" placeholder="First Name" required><br>

                        <label for="email">Last Name</label><br>
                        <input type="text" id="email" name="email" class="input-field" placeholder="Last Name"><br>

                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email" class="input-field" placeholder="Email"><br>

                        <label for="email">Contact Number</label><br>
                        <input type="text" id="email" name="email" class="input-field" placeholder="Contact Number"><br>

                        <label for="content">Content</label><br>
                        <textarea id="content" name="content" cols="30" rows="5" placeholder="Your content" required></textarea><br>

                        <input type="submit" value="Send Message">
                    </form>
                </div>
            </div>



        </div>
    </div>

    <script>
        function initMap() {
            //Map options
            var options = {
                zoom: 16,
                center: {
                    lat: 6.8824,
                    lng: 79.8664
                }
            }
            //New Map
            var map = new google.maps.Map(document.getElementById('map'), options);

            //Add marker
            var marker = new google.maps.Marker({
                position: {
                    lat: 6.8824,
                    lng: 79.8664
                },
                map: map
            });

            var infoWindow = new google.maps.InfoWindow({
                content: '<h2>HawlockCity</h2>',
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCudsoZfYzlJXN8nzd3vTc4z2tQfgfDYKw&callback=initMap"></script>
    <script src="../../main.js"></script>
    <div class="footer">
        <p>&COPY; 2021,All rights reserved by Hawlock City</p>
    </div>
</body>

</html>