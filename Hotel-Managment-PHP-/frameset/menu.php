<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margine: 0;
            padding: 0;
        }

        a:link, a:visited {
            display: block;
            font-weight: bold;
            color: #ffffff;
            background-color: #dcbc86;
            width: 190px;
            text-align: center;
            padding: 5px;
            text-decoration: none;
            text-transform: uppercase;
        }

        a:hover, a:active {
            background-color: #D2A05E;
        }

        body {
            background-color: #dcbc86;
        }
    </style>
</head>
<body>
<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    session_start();
    if (isset($_SESSION['A_id'])) {

        echo "<ul>";
        echo "<li><a href='index.html' target='_top'>home</a></li>";
        echo "<li><a href='about.php' target='content'>about us</a></li>";
        echo "<li><a href='v_feed.php' target='content'>feedback</a></li>";
        echo "<li><a href='room.php' target='content'>Rooms</a></li>";
        echo "<li><a href='customer.php' target='content'>customers</a></li>";
        echo "<li><a href='photos.php' target='content'>gallery</a></li>";
        echo "<li><a href='contact_us.php' target='content'>contact us</a></li> ";
        echo "</ul>";
    } else {
        echo "<ul>";
        echo "<li><a href='index.html' target='_top'>home</a></li>";
        echo "<li><a href='about.php' target='content'>about us</a></li>";
        echo "<li><a href='room_info.php' target='content'>room info</a></li>";
        echo "<li><a href='reservation.php' target='content'>check availability</a></li>";
        echo "<li><a href='booking.php' target='content'>booking</a></li>";
        echo "<li><a href='services.html' target='content'>services</a></li>";
        echo "<li><a href='reserve.php' target='content'>reserved room</a></li";
        echo "<li><a href='cancel.php' target='content'>cancellation</a></li>";
        echo "<li><a href='g_feed.php' target='content'>feedback</a></li>";
        echo "<li><a href='photos.php' target='content'>gallery</a></li>";
        echo "<li><a href='contact_us.php' target='content'>contact us</a></li> ";
        echo "</ul>";
    }
}
echo "</body>";
echo "</html>";
?>
	
