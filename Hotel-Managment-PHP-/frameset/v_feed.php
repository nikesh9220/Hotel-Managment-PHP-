<html>
<head>
    <style type='text/css'>
        table {
            font-family: verdana, arial, sans-serif;
            font-size: 14px;
            color: #333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;

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

        a {
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

        a:hover {
            background-color: #A2A2A2;
        }

        a:active {
            position: relative;
            top: 2px;
            box-shadow: #B0B690 4px 4px 2px;
        }

        p {
            margin-top: 15px;
        }

        table.sec tr {
            background-color: #000000;
        }

        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

        h2 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $sql = mysql_query('select count(comments) total_records from feedback');


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

    $result = mysql_query("select ci.Cu_id,fd.comments,ci.Cu_name,ci.Cu_Mo_no,ci.Cu_Email_id,ci.Cu_Address,ci.Cu_City,ci.Cu_state,ci.Cu_postal_code, date_format(fd.Fb_date,'%d-%m-%Y') AS Fb_date from customer_info as ci INNER JOIN feedback AS fd ON ci.Cu_id = fd.Cu_id order by date_format(fd.Fb_date,'%d-%m-%Y') desc LIMIT $offset, $rec_limit ");
    if (mysql_num_rows($result)) {
        echo "<h2>Feedback</h2>";
        echo "<table border=1 width='100%'>";
        echo "<tr>
				<th>Customer Comments</th>
				<th>Feedback date</th>
				<th>Customer Name</th>
				<th>Customer contact</th>
				<th>Customer Address</th></tr>";
        while ($row = mysql_fetch_array($result)) {
            echo "<tr>
				<td>" . $row['comments'] . "</td>
				<td>" . $row['Fb_date'] . "</td>
				<td>" . $row['Cu_name'] . "</td>
				<td>" . $row['Cu_Email_id'] . " , " . $row['Cu_Mo_no'] . "</td>
				<td>" . $row['Cu_Address'] . " , " . $row['Cu_City'] . " , " . $row['Cu_state'] . " , " . $row['Cu_postal_code'] . "</td></tr>";

        }
        echo "</table>";

        //echo "left:".$left_rec. " Page:".$page. " Offset:".$offset;
        if ($page == 0 and $left_rec <= $rec_limit) {
        } else if ($page != 0 and $left_rec <= $rec_limit) {
            $last = $page - 2;
            $first = ($page = -1);
            echo "<p class='button'><a href=" . $_SERVER['PHP_SELF'] . "?page=$last class='button'>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$first class='button'>Go First page</a></p>";
        } else if ($page > 0) {
            $last = $page - 2;
            echo "<p><a href=" . $_SERVER['PHP_SELF'] . "?page=$last>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$page>Next</a></p>";
        } else if ($page == 0) {
            echo "<p><a href=" . $_SERVER['PHP_SELF'] . "?page=$page>Next</a></p>";
        }
    }
}
?>
</body>
</html>