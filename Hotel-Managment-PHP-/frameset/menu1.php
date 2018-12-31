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
            background-color: #424741;
            width: 80px;
            text-align: center;
            padding: 3px;
            text-decoration: none;
            text-transform: uppercase;
        }

        a:hover, a:active {
            background-color: #b0b1bb;
        }

        li {
            float: right;
            font-size: 11;
        }
    </style>
</head>
<body bgcolor=#424741>
<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    session_start();
    if (isset($_SESSION['A_id'])) {
        ?>
        <ul>
            <li><a href='logout.php' target='topNav'>logout</a></li>
            <li><a href='hms.php' target='content'>Edit Information</a></li>
            <li><a href='view.php' target='content'>View profile</a></li>
            <li><a href='edit.php' target='content'>Edit profile</a></li>

        </ul>
        <?php
    } else {
        echo "<ul><li><a href='login.html' target='_top'>Login</a></li></ul>";
    }
}
?>
</body>
</html>