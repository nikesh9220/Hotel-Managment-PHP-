<html>
<head>
    <style type='text/css'>
        div.rsrv {
            width: 350px;
            border-radius: 20px;
            float: left;
            margin: 0px;
        }

        div.rm {
            width: 500px;
            float: left;
            border-radius: 20px;
            margin-left: 200px;
        }

        body {
            color: #727272;
            background: #f5f5f5;
            font-family: inherit;
        }

        table {
            margin: 15px;
            margin-top: 30px;
        }
    </style>
    <script>
        function Numbers(event) {
            var e = event || evt; // for trans-browser compatibility
            var charCode = e.which || e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;

            return true;
        }
        function validate() {
            var number = document.form.rno.value;
            if (number == null || number == "") {
                alert("Enter Room number");
                document.form.rno.focus();
                return false;
            }
        }
    </script>
</head>
</html>

<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $rno = "";
    if (isset($_POST['rno'])) {
        $rno = $_POST['rno'];
    }
    //echo"<div id='main' style='border:2px solid black'>";
    echo "<div class='rsrv'><form method='POST'><table border=0>";
    echo "<tr>
						<td>Enter Room No:<td>
						<td><input type='text' id='Mobile' name='rno' value='$rno' autocomplete='off' onkeypress='return Numbers(event);'></td>
				</tr>";

    /*echo"<tr><td><select>";
    $select=mysql_query("select room_no from room_detail");
    while($rn=mysql_fetch_array($select))
    {
        echo"<option name='rno'>".$rn['room_no']."</option>";
    }
    echo"</select></td></tr>";*/
    echo "<tr><td><input class='submit button' type='submit' name='ok' value='ok'></td></tr>";
    echo "</table></form>";
    //echo "</div>";

    if (isset($_POST['ok']) and !empty($_POST['rno'])) {
        $rno = $_POST['rno'];

        $select = mysql_query("select room_no from room_detail where room_no=$rno");

        if (mysql_num_rows($select)) {
            $room = mysql_query("select r_id from reservation_detail where room_no=$rno");

            if (mysql_num_rows($room)) {

                $row = mysql_fetch_array($room);
                $rid = $row['r_id'];
                $check = mysql_query("select check_out from re_master where r_id=$rid");
                $rows = mysql_fetch_array($check);
                $cout = $rows['check_out'];
                echo "<h4>" . $rno . " Rooms's check out date is " . $cout . "</h4>";
            } else {
                echo "<h4>" . $rno . " Room is available</h4>";
            }
        } else {
            echo "bye";
        }

    }
    echo "</div>";

    echo "<div class='rm'>";

    include_once('room_info.php');
    if (isset($_GET{'page'})) {
        $page = $_GET{'page'} + 1;
        $offset = $rec_limit * $page;
    } else {
        $page = 0;
        $offset = 0;
    }

    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Room_no'] . "</td>";
        echo "<td>" . $row['Rm_type'] . "</td>";
        echo "<td>" . $row['Rm_No_bed'] . "</td>";
        echo "<td>" . $row['Rm_price'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    //echo "left:".$left_rec. " Page:".$page. " Offset:".$offset."  ".$rec_limit;

    echo "</div>";
    //echo"</div>";
}
?>