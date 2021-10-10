<?php
include_once 'sidenav.php';
?>

<style>
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 120px;
        height: 120px;
        margin: -76px 0 0 -76px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }

    .hawlockbody {
        align-items: baseline;

    }

    .leftPanel {
        grid-column: 1/span 2;
    }

    .righrPanel {
        grid-column: 3;
    }

    #homeCard {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
    }

    .myDoList .list-group-item {
        font-size: 26;
    }

    .myDoList ul {
        margin: 0;
        padding: 0;
    }

    /* Style the list items */
    .myDoList ul li {
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 40px;
        list-style-type: none;
        background: #eee;
        font-size: 15px;
        transition: 0.2s;

        /* make the list items unselectable */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    .myDoList ul li:nth-child(odd) {
        background: #f9f9f9;
    }

    /* Darker background-color on hover */
    .myDoList ul li:hover {
        background: #ddd;
    }

    /* When clicked on, add a background color and strike out text */
    .myDoList ul li.checked {
        background: #888;
        color: #fff;
        text-decoration: line-through;
    }

    /* Add a "checked" mark when clicked on */
    .myDoList ul li.checked::before {
        content: '';
        position: absolute;
        border-color: #fff;
        border-style: solid;
        border-width: 0 2px 2px 0;
        top: 10px;
        left: 16px;
        transform: rotate(45deg);
        height: 15px;
        width: 7px;
    }

    /* Style the close button */
    .myDoList .close {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }

    .myDoList .close:hover {
        background-color: #f44336;
        color: white;
    }

    /* Style the input */
    .myDoList input {
        margin: 0;
        border: none;
        border-radius: 0;
        width: 80%;
        padding: 10px;
        float: left;
        font-size: 16px;
    }

    /* Style the "Add" button */
    .myDoList .addBtn {
        padding: 10px;
        background: #d9d9d9;
        color: #555;
        float: left;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
        width: 20%;
    }

    .myDoList .addBtn:hover {
        background-color: #bbb;
        display: block;
    }

    .leftPanel {
        padding: 10px;
        border-right: 1px solid #eee;
    }

    .myDiList {
        position: relative;
    }

    .rightPanel {
        padding: 10px;
    }

    .doListAdd {
        height: 50px;
        display: block;
    }

    .doListAdd i {
        font-size: 15px;
        padding: 0;
    }
</style>


</head>

<body style="background-color: gray; background-image:none;">
    <!-- <div id="loader"></div> -->
    <div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

        <div id="hh" class="hawlockhead">
            <img src="../../public/img/image.png" alt="" id="logo" />
            <h1 id="title">Hawlock <span id="city">City</span></h1>
        </div>
        <div id="hb" class="hawlockbody animate-bottom" onload="myFunction();">
            <div class="card" id="homeCard" style="grid-column:1/span 3">
                <div class="leftPanel">Server Status</div>
                <div class="rightPanel">
                    <div class="myDoList">
                        <div>
                            <h2 style="margin:5px">To Do List</h2>
                            <div class="doListAdd">
                                <input type="text" id="myInput" placeholder="Title...">
                                <span onclick="newElement()" class="addBtn"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div>
                            <ul id="myUL">
                                <li>Update Services</li>
                                <li class="checked">Make Announcement</li>
                            </ul>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>


    </div> <!-- .hawlockbody div closed here -->
    </div> <!-- .expand div closed here -->
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementsByClassName("hb").style.display = "block";
        }
        ///////////////////////////////////////////////

        // Create a "close" button and append it to each list item
        var myDoList = document.getElementById("myUL");
        var myNodelist = myDoList.getElementsByTagName("LI");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }

        // Add a "checked" symbol when clicking on a list item
        var list = document.getElementById('myUL');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
            }
        }, false);

        // Create a new list item when clicking on the "Add" button
        function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var t = document.createTextNode(inputValue);
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                document.getElementById("myUL").appendChild(li);
            }
            document.getElementById("myInput").value = "";

            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            li.appendChild(span);

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
        }
    </script>
</body>



</html>