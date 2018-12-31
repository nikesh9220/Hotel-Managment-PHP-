<html>
<head>
    <style type='text/css'>
        table.room {
            font-family: verdana, arial, sans-serif;
            font-size: 14px;
            color: #333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;

        }

        table.room th {
            background-color: #AED1D7;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
        }

        table.room tr {
            background-color: #CEDFE1;
        }

        table.room tr:nth-child(even) {
            background: #C5DADA
        }

        table.room tr:nth-child(odd) {
            background: #d4e3e5
        }

        table.room tr:hover {
            background-color: #a9c6c9;
        }

        table.room td {
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
            color: #727272;
            background: #f5f5f5;
            font-family: inherit;
        }

        h2 {
            font-weight: lighter;
            margin: 5px 10px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
        }
    </style>
</head>
<body

<div id="header">
    <div id="buttons">
        <div class="but_r"></div>
        <a href="index.html" class="but but_t" title="">Home</a>
        <div class="but_r"></div>
        <a href="blog.php" class="but" title="">Room info</a>
        <div class="but_r"></div>
        <a href="gallery.html" class="but" title="">Gallery</a>
        <div class="but_r"></div>
        <a href="about_us.html" class="but" title="">About us</a>
        <div class="but_r"></div>
        <a href="contact_us.html" class="but" title="">Contact us</a>
        <div class="but_r"></div>
    </div>


    <?php
    $con = mysql_connect('localhost', 'root', '');
    if ($con) {
        mysql_select_db("hms", $con);

        $sql = mysql_query('select count(Room_no) total_records from Room_detail');


        $rows = mysql_fetch_array($sql);
        $rec_count = $rows['total_records'];

        $rec_limit = 5;
        if (isset($_GET{'page'})) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page;
        } else {
            $page = 0;
            $offset = 0;
        }
        $left_rec = $rec_count - ($page * $rec_limit);


        $result = mysql_query("select * from Room_detail LIMIT $offset, $rec_limit");

        echo "<div><h2><p align='center'>Rooms detail:</p></h2>";
        echo "<table class='room' border=1 align='center' width='100%'><form method='POST'>
			<tr> 
			<th>Room No</th>
			<th>Type</th>
			<th>Bed No</th>
			<th>Price</th>
			</tr>";

        while ($row = mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Room_no'] . "</td>";
            echo "<td>" . $row['Rm_type'] . "</td>";
            echo "<td>" . $row['Rm_No_bed'] . "</td>";
            echo "<td>" . $row['Rm_price'] . "</td>";
            echo "</tr>";
        }
        //echo"<tr bgcolor='white'><td colspan=4><input type='submit' name='back' value='back'></td></tr>";
        echo "</table>";

        if ($page == 0 and $left_rec <= $rec_limit) {
        } else if ($page != 0 and $left_rec <= $rec_limit) {

            $last = $page - 2;
            $first = ($page = -1);
            echo "<p><a href=" . $_SERVER['PHP_SELF'] . "?page=$last>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$first>Go First page</a></p>";
        } else if ($page > 0) {
            $last = $page - 2;
            echo "<p><a href=" . $_SERVER['PHP_SELF'] . "?page=$last>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$page>Next</a></p>";
        } else if ($page == 0) {
            echo "<p><a href=" . $_SERVER['PHP_SELF'] . "?page=$page>Next</a></p>";
        }

    }
    ?>
    </body>
</html>