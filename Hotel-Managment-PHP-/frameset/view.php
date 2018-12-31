<html>
<head>
    <style type='text/css'>
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
            font-size: 25px;
            line-height: 40px;
            text-align: left;
        }

        table {
            margin: 15px 15px;

        }

        strong {
            font-weight: bold;
        }

        div {
            border: 2px solid #F2F2F2;
            padding: 10px 40px;
            background: #f5f5f5;
            width: 550px;
            border-radius: 20px;
            margin: 12px 12px;
        }

        div {
            display: block;
            margin-bottom: 10px;
            font-style: normal;
            line-height: 20px;
        }

        div span {
            margin-top: 10px;
            display: block;
        }

    </style>
<body>

<?php
session_start();
if (isset($_SESSION['A_id'])) {
    $con = mysql_connect('localhost', 'root', '');
    if ($con) {
        mysql_select_db("hms", $con);

        $result = mysql_query("select * from Admin_profile");

        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);

            /*echo"<div><table>";
            echo "<h1>"."<b>".$row['Ad_fname'].$row['Ad_lname']."</b>"."</h1>";
            echo "<tr><td>Admin Id </td><td>:&nbsp&nbsp</td><td>"."<b>".$row['Ad_Email_id']."</b>"."</td></tr>";
            echo "<tr><td>First name</td><td>:&nbsp&nbsp</td><td>"."<b>".$row['Ad_fname']."</b>"."</td></tr>";
            echo "<tr><td>Last name</td><td>:&nbsp&nbsp </td><td>"."<b>".$row['Ad_lname']."</b>"."</td></tr>";
            echo "<tr><td>1st question</td><td>:  &nbsp&nbsp</td><td> "."<b>".$row['Ad_que1']."</b>"."</td></tr>";
            echo "<tr><td>1st question's answer</td><td>:  &nbsp&nbsp</td><td>"."<b>".$row['Ad_ans1']."</b>"."</td></tr>";
            echo "<tr><td>2nd question</td><td>:  &nbsp&nbsp</td><td>"."<b>".$row['Ad_que2']."</b>"."</td></tr>";
            echo "<tr><td>2nd question's answer</td><td>:&nbsp&nbsp  </td><td>"."<b>".$row['Ad_ans2']."</b>"."</td></tr>";
            echo"</table></div>";*/

            echo "<div>";
            echo "<span>" . "<h1>" . "<b>" . $row['Ad_fname'] . $row['Ad_lname'] . "</b>" . "</h1>";
            echo "<span>" . "<strong>Admin Id :&nbsp&nbsp</strong></td><td>" . $row['Ad_Email_id'] . "</span>";
            echo "<span>" . "<strong>First name:&nbsp&nbsp</strong>" . $row['Ad_fname'] . "</span>";
            echo "<span>" . "<strong>Last name:&nbsp&nbsp </strong>" . $row['Ad_lname'] . "</span>";
            echo "<span>" . "<strong>1st question:  &nbsp&nbsp</strong> " . $row['Ad_que1'] . "</span>";
            echo "<span>" . "<strong>1st question's answer:  &nbsp&nbsp</strong>" . $row['Ad_ans1'] . "</span>";
            echo "<span>" . "<strong>2nd question:  &nbsp&nbsp</strong>" . $row['Ad_que2'] . "</span>";
            echo "<span>" . "<strong>2nd question's answer:&nbsp&nbsp </strong>" . $row['Ad_ans2'] . "</span>";


            echo "</div>";
        }
    }
}
?>
</body>
</html>