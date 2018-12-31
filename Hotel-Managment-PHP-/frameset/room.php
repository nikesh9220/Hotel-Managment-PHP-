<html>
<head>
    <style type="text/css">
        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

        h1 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
            text-align: center;
        }

        table {
            font-family: verdana, arial, sans-serif;
            font-size: 14px;
            color: #333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th {
            background-color: #AED1D7;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
        }

        table tr {
            background-color: #CEDFE1;
        }

        tr:nth-child(even) {
            background: #C5DADA
        }

        tr:nth-child(odd) {
            background: #d4e3e5
        }

        table tr:hover {
            background-color: #a9c6c9;
        }

        table td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
        }

        a.button {
            border-radius: 10px;
            border: 2px solid #635151;
            color: #ffffff;
            box-shadow: #464C2E 4px 4px 2px;
            background-color: #BBBBBB;
            text-decoration: none;
            text-shadow: #000000 5px 5px 15px;
            font-size: 15px;
            padding: 5px 10px;
        }

        a.button:hover {
            background-color: #A2A2A2;
        }

        a.button:active {
            position: relative;
            top: 2px;
            box-shadow: #B0B690 4px 4px 2px;
        }

        p.button {
            margin-top: 15px;
        }

        table.sec tr {
            background-color: #000000;
        }

        a.new {
            text-decoration: none;
        }

    </style>
</head>
<body>

<h1>Manage rooms</h1>
<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $sql = mysql_query('select count(Room_no) total_records from Room_detail');

    $rows = mysql_fetch_array($sql);
    $rec_count = $rows['total_records'];

    $rec_limit = 7;
    if (isset($_GET{'page'})) {
        $page = $_GET{'page'} + 1;
        $offset = $rec_limit * $page;
    } else {
        $page = 0;
        $offset = 0;
    }
    $left_rec = $rec_count - ($page * $rec_limit);

    $result = mysql_query("select * from room_detail LIMIT $offset, $rec_limit");

    echo "<p align='center'><a href='edit_r_detail.php?action=new'>New create</a></p>";
    echo "<table border=1 bgcolor=#265ad2 align='center' width=100%>
		<tr> 
		<th>Room No</th>
		<th>Type</th>
		<th>Bed No</th>
		<th>Price</th>
		<th>Option</th>
		</tr>";

    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Room_no'] . "</td>";
        echo "<td>" . $row['Rm_type'] . "</td>";
        echo "<td>" . $row['Rm_No_bed'] . "</td>";
        echo "<td>" . $row['Rm_price'] . "</td>";
        echo "<td>" . "<a href='edit_r_detail.php?no={$row['Room_no']}&action=edit' class='new'><input type='button' name='edit' value='Edit'></a>&nbsp
						<a href='edit_r_detail.php?no={$row['Room_no']}&action=delete' class='new'><input type='button' na	me='del' value='delete'></a>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    //echo "left:".$left_rec. " Page:".$page. " Offset:".$offset."  ".$rec_limit;

    if ($page == 0 and $left_rec <= $rec_limit) {
    } else if ($page != 0 and $left_rec <= $rec_limit) {
        $last = $page - 2;
        $first = ($page = -1);
        echo "<p class='button'><a href=" . $_SERVER['PHP_SELF'] . "?page=$last class='button'>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$first class='button'>Go First page</a></p>";
    } else if ($page > 0) {
        $last = $page - 2;
        echo "<p class='button'><a href=" . $_SERVER['PHP_SELF'] . "?page=$last class='button'>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$page class='button'>Next</a></p>";
    } else if ($page == 0) {
        echo "<p class='button'><a href=" . $_SERVER['PHP_SELF'] . "?page=$page class='button'>Next</a></p>";
    }
}
?>
</body>
</html>