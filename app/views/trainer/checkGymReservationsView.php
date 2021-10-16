<?php
include_once 'sidenav.php';
?>

<?php
// Set your timezone!!
date_default_timezone_set('Asia/Colombo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');  // the first day of the 

if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
$idCount= 1;
// $idDate = date('Y-m-d', $timestamp);

// Today (Format:2018-08-8)
$today = date('Y-m-j');

// Title (Format:August, 2018)
$title = date('F, Y', $timestamp);

// Create prev & next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 1:Mon 2:Tue 3: Wed ... 7:Sun
$str = date('N', $timestamp);

// Array for calendar
$weeks = [];
$week = '';

// Add empty cell(s)
$week .= str_repeat('<td></td>', $str - 1);

for ($day = 1; $day <= $day_count; $day++, $str++, $idCount++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td id="'. $idCount.'" class="today" onclick="clickDate('. $idCount.')">';
    } else {
        
        $week .= '<td id="'.$idDate.'" onclick="clickDate('.$idDate.')" >';
    }
    $week .= $day . '</td>';

    // Sunday OR last day of the month
    if ($str % 7 == 0 || $day == $day_count) {

        // last day of the month
        if ($day == $day_count && $str % 7 != 0) {
            // Add empty cell(s)
            $week .= str_repeat('<td></td>', 7 - $str % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
$idDate = date('Y-m', strtotime('-1 month', $timestamp));

}


?>

<style>

    .calenderContainer {
        grid-column: 1 span/3;
            font-family: 'Montserrat', sans-serif;
            margin: 60px auto;
        }
        .list-inline {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-weight: bold;
            font-size: 26px;
        }
        th {
            text-align: center;
        }
        td {
            text-align: center;
            width: 80px;
            height: 80px;
            border: 2px solid #110b2e;
        }
        /* th:nth-of-type(6), td:nth-of-type(6) {
            color: blue;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: red;
        } */
        .today {
            background-color: ghostwhite;
        }

        .canvas{
            grid-column: 1 span/3;
        }

       
</style>
</head>
<body style="background-color: gray; background-image:none;">
<div style="display:grid;grid-template-columns:230px 1fr" id="expand" class="content">

    <div id="hh" class="hawlockhead" ><img src="../../public/img/image.png" alt="" id="logo"/><h1 id="title">Reservations </h1></div>
    <div id="hb" class="hawlockbody" > 

    <?php echo $idDate; ?>
   
    <div class="calenderContainer">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="button btn-link">&lt; prev</a></li>
            <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
            <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="button btn-link">next &gt;</a></li>
        </ul>
        <p class="text-right"><a href="calendar.php">Today</a></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                    <th>S</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="canvas">

    <section class="wrapper">
                            <main class="row title">
                                <ul>
                                    
                                    <li>Reservation ID</li>
                                    <li>Reservation Date</li>
                                    <li>Start Time</li>
                                    <li>End Time</li>
                                </ul>
                            </main>

                            <?php
                            if ($this->reserve->num_rows > 0) { ?>
                                <?php
                                while ($row = $this->reserve->fetch_assoc()) {
                                ?>
                                    <article id="<?php echo $row["date"];?>" class="row mlb">
                                        <ul>
                                            
                                            <li><?php echo $row["reservation_id"]; ?></li>
                                            <li><?php echo $row["date"]; ?></li>
                                            <li><?php echo $row["start_time"] ?></li>
                                            <li><?php echo $row["end_time"]; ?></li>

                                        </ul>
                                        <ul class="more-content">
                                            <li>
                                                <span style="padding-right: 20px;">Reserved Date : <?php echo $row["reserved_time"] ?></span>
                                            </li>
                                        </ul>

                                    </article>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </section>
    </div>


    </div> <!-- .hawlockbody div closed here -->
</div> <!-- .expand div closed here -->
<script>
function clickDate(id) {
    console.log(id);
}

</script>
</body>
</html>

<!-- gfffffffffffffffffffffffffffffffffffff -->


