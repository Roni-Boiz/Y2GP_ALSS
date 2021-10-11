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

    .myDoList {
        display: inline-block;
        border: 1px solid #eee;
        width: 100%;
    }

    .myDoList .head{
        background-color: #1d2f4c;
        color: white;
        text-align: left;
        align-items: center;
        justify-content: center;
        padding: 10px;
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
        font-size: 15px;
        border: 1px solid #adadad;
    }

    /* Style the "Add" button */
    .myDoList .addBtn {
        padding: 11px;
        background: #d9d9d9;
        color: #555;
        float: left;
        text-align: center;
        font-size: 15px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
        width: 20%;
    }

    .myDoList .addBtn:hover {
        background-color: #bbb;
        display: block;
    }

    .myDiList {
        position: relative;
    }

    .doListAdd {
        height: 50px;
        display: block;
    }

    .doListAdd i {
        font-size: 15px;
        padding: 0;
    }

    /* .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active,
    .collapsible:hover {
        background-color: #555;
    }

    .collapsible:after {
        content: '\002B';
        color: white;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    } */

    .chart-three {
        width: 200px;
        height: 200px;
        margin: 0;
        position: relative;
    }

    .chart-three.animate svg .circle-foreground {
        -webkit-animation: offset 3s ease-in-out forwards;
        animation: offset 3s ease-in-out forwards;
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    .chart-three.animate figcaption:after {
        -webkit-animation: chart-three-label 3s steps(90) forwards;
        animation: chart-three-label 3s steps(90) forwards;
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    .chart-three svg {
        width: 100%;
        height: 100%;
    }

    .chart-three svg .circle-background,
    .chart-three svg .circle-foreground {
        r: 87.5px;
        cx: 50%;
        cy: 50%;
        fill: none;
        stroke: #305556;
        stroke-width: 25px;
    }

    .chart-three svg .circle-foreground {
        stroke: #389967;
        stroke-dasharray: 494.55px 549.5px;
        stroke-dashoffset: 494.55px;
        stroke-linecap: round;
        transform-origin: 50% 50%;
        transform: rotate(-90deg);
    }

    .chart-three figcaption {
        display: inline-block;
        width: 100%;
        height: 2.5rem;
        overflow: hidden;
        text-align: center;
        color: #c6e8d7;
        position: absolute;
        top: calc(50% - 1.25rem);
        left: 0;
        font-size: 0;
    }

    .chart-three figcaption:after {
        display: inline-block;
        content: "0%\a 1%\a 2%\a 3%\a 4%\a 5%\a 6%\a 7%\a 8%\a 9%\a 10%\a 11%\a 12%\a 13%\a 14%\a 15%\a 16%\a 17%\a 18%\a 19%\a 20%\a 21%\a 22%\a 23%\a 24%\a 25%\a 26%\a 27%\a 28%\a 29%\a 30%\a 31%\a 32%\a 33%\a 34%\a 35%\a 36%\a 37%\a 38%\a 39%\a 40%\a 41%\a 42%\a 43%\a 44%\a 45%\a 46%\a 47%\a 48%\a 49%\a 50%\a 51%\a 52%\a 53%\a 54%\a 55%\a 56%\a 57%\a 58%\a 59%\a 60%\a 61%\a 62%\a 63%\a 64%\a 65%\a 66%\a 67%\a 68%\a 69%\a 70%\a 71%\a 72%\a 73%\a 74%\a 75%\a 76%\a 77%\a 78%\a 79%\a 80%\a 81%\a 82%\a 83%\a 84%\a 85%\a 86%\a 87%\a 88%\a 89%\a 90%\a 91%\a 92%\a 93%\a 94%\a 95%\a 96%\a 97%\a 98%\a 99%\a 100%\a";
        white-space: pre;
        font-size: 2.5rem;
        line-height: 2.5rem;
    }

    @keyframes chart-three-label {
        100% {
            transform: translateY(-225rem);
        }
    }

    @keyframes offset {
        100% {
            stroke-dashoffset: 0;
        }
    }

    #serverstatus {
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #serverstatus>div {
        margin: 0px 10px;
        text-align: center;
    }

    #serverstatus h4 {
        padding: 10px;
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
        <div id="hb" class="hawlockbody animate-bottom">
            <div class="card" id="homeCard" style="grid-column:1/span 3">
                <div class="leftPanel">
                    <div>
                        <h3>Server Status</h3>
                        <div class="card" id="serverstatus">
                            <div>
                                <h4>Performance</h4>
                                <figure class="chart-three animate">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle-background" />
                                        <circle class="circle-foreground" />
                                    </svg>
                                    <figcaption></figcaption>
                                </figure>
                            </div>

                            <div>
                                <h4>Storage</h4>
                                <figure class="chart-three animate">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle-background" />
                                        <circle class="circle-foreground" />
                                    </svg>
                                    <figcaption></figcaption>
                                </figure>
                            </div>

                            <div>
                                <h4>Bandwidth</h4>
                                <figure class="chart-three animate" style="display: inline-block;">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle-background" />
                                        <circle class="circle-foreground" />
                                    </svg>
                                    <figcaption></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rightPanel">
                    <div class="myDoList">
                        <div>
                            <div class="head">
                                <h3>To Do List</h3>
                            </div>
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
        // var myVar;

        // function myFunction() {
        //     myVar = setTimeout(showPage, 3000);
        // }

        // function showPage() {
        //     document.getElementById("loader").style.display = "none";
        //     document.getElementsByClassName("hb").style.display = "block";
        // }
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

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
</body>



</html>