<?php

$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('database not connect');
}
mysql_select_db("hms", $con);

$email = '';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
echo "<form method='POST'>";
echo "<fieldset><legend>Enter Email id</legend><input type='text'  value='$email' name='email' plceholder='Email id'>";
echo "<input type='submit' name='go' value='go'>";
echo "</form><br>";

if (isset($_POST['go'])) {
    $email = $_POST['email'];
    $result = mysql_query("select rm.R_id,rd.No_person,rm.R_date,rm.Check_in,Check_out,rd.Room_no from re_master as rm 
			inner join 
			reservation_detail as rd on rm.R_id=rd.R_id where R_cu_id=(select Cu_id from customer_info where Cu_Email_id='$email')");
    if (mysql_num_rows($result) > 0) {
        $result1 = mysql_query("select Cu_name,Cu_Mo_no,Cu_Email_id from customer_info where Cu_Email_id='$email'");
        if ($row = mysql_fetch_array($result)) {
            if ($row1 = mysql_fetch_array($result1)) {
                echo "<form method='POST'>Your info<table>";
                echo "<tr><td>Reservation Id:</td><td>" . $row['R_id'] . "</td></tr>";
                echo "<tr><td>Name:</td><td>" . $row1['Cu_name'] . "</td></tr>";
                echo "<tr><td>Mobile no:</td><td>" . $row1['Cu_Mo_no'] . "</td></tr>";
                echo "<tr><td>Email id:</td><td>" . $row1['Cu_Email_id'] . "</td></tr>";
                echo "<tr><td>Reserve Date:</td><td>" . $row['R_date'] . "</td></tr>";
                echo "<tr><td>Room no:</td><td>" . $row['Room_no'] . "</td></tr>";
                echo "<tr><td>No of person:</td><td>" . $row['No_person'] . "</td></tr>";
                echo "<tr><td>Check in:</td><td>" . $row['Check_in'] . "</td></tr>";
                echo "<tr><td>Check out</td><td>" . $row['Check_out'] . "</td></tr>";
                echo "<input type='hidden' name='rid' value={$row['R_id']}>";
                echo "<input type='hidden' name='mo' value={$row1['Cu_Mo_no']}>";
                echo "<input type='hidden' name='email' value={$row1['Cu_Email_id']}>";
                echo "<input type='hidden' name='rdate' value={$row['R_date']}>";
                echo "<input type='hidden' name='rno' value={$row['Room_no']}>";


                echo "<tr><td></td><td><input type='submit' name='cancel' value='cancel reservation'></td></tr>";
                echo "</table></form>";
            }
        }

    }
}
if (isset($_POST['cancel'])) {
    print_r($_POST);
    $rid = $_POST['rid'];
    $mo = $_POST['mo'];
    $email = $_POST['email'];
    $rdate = $_POST['rdate'];
    $rno = $_POST['rno'];

    $result = mysql_query("INSERT INTO cancellation(R_id,Cu_Mo_no,Cu_Email_id,Reserved_date,Room_no) VALUES ($rid,$mo,'$email','$rdate',$rno)");

    if ($result > 0) {
        echo "hello";
        $que = mysql_query("update  re_master set C_id=(select C_id from cancellation where Cu_Email_id='$email')  where R_id='$rid'");
    }

    echo "<br><br>cancellation is successful";
}
?>