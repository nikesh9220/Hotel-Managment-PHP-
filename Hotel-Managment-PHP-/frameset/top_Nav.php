<html>
<head>
    <style type="text/css">
        div {
            background: #C7A17B;
            width: 200px;
            border-radius: 20px;
            box-shadow: 7px 7px 3px #5D4227;
            text-align: center;
            margin: 5px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        a.menu:link, a.menu:visited {
            display: block;
            font-weight: bold;
            color: #ffffff;
            background-color: #876439;
            text-align: center;
            padding: 3px;
            text-decoration: none;
            text-transform: uppercase;
        }

        a.menu:hover, a.menu:active {
            background-color: #b0b1bb;
        }

        a#title {
            text-decoration: none;
        }

        li {
            float: right;
            font-size: 11;
        }

        body {
            color: #6D6D6D;
            background: #876439;
            font-family: inherit;
            margin: 0px;
            padding: 0px;
        }

    </style>
</head>
<body>

<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $sname = mysql_query("select H_Name from company");
    $row1 = mysql_fetch_array($sname);

    echo "<table width=100% >
	<tr>
		<td>
			<div><a id='title' href='index.html' target='_top'>
				<font color=#513C22><h1>" . $row1['H_Name'] . "</h1></font>
			</a></div>
		</td>
	<td align='right'>";


    session_start();
    if (isset($_SESSION['A_id'])) {
        $result = mysql_query("select * from Admin_profile");
        $row = mysql_fetch_array($result);
        echo "<font color=#d9d900>" . "WELCOME " . $row['Ad_fname'] . " " . $row['Ad_lname'] . "..!!" . "</font>" . "<br>";
        ?>
        <ul>
            <li><a class='menu' href='logout.php' target='topNav'>logout</a></li>
            <li><a class='menu' href='hms.php' target='content'>Edit Information</a></li>
            <li><a class='menu' href='view.php' target='content'>View profile</a></li>
            <li><a class='menu' href='edit.php' target='content'>Edit profile</a></li>

        </ul>
        </td>
        </tr>
        <?php
    } else {
        echo "<ul><li><a class='menu' href='login.php' target='_top'>Login</a></li></ul>";
    }
}
?>
</body>
</html>