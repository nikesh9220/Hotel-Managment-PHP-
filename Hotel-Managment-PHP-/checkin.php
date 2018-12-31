<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);

    session_start();
    $check_in = $_SESSION['cin'];
    /*$check=mysql_query("select * from room_detail where room_no not in
    (select rd.room_no from room_detail as rd INNER JOIN reservation_detail AS rm ON rd.Room_no = rm.Room_no )");*/
    $check = mysql_query("select * from room_detail where room_no not in(select room_no from reservation_detail where room_no not in
      (select rd.room_no from reservation_detail as rd inner join re_master as rm on rd.r_id=rm.r_id where rm.Check_out<'$check_in'))");
    if (mysql_num_rows($check) > 0) {
        echo "<tr><td>Below rooms available</td></tr>";
        echo "<form method='POST'><table border=1><tr><th>Room no</th><th>Room type</th><th>No of bed</th><th>Price</th></tr>";
        while ($row = mysql_fetch_array($check)) {
            echo "<tr><td>" . $row['Room_no'] . "</td><td>" . $row['Rm_type'] . "</td><td>" . $row['Rm_No_bed'] . "</td><td>" . $row['Rm_price'] . "</td></tr>";
        }
        //echo "<tr><td><input type='submit' name='back' value='Back'></td></tr>";
        echo "</table></form>";

    } else {
        echo "bye";
    }
    /*if(isset($_POST['back']))
    {
        header("location:reservation.php");
    }*/

}
?>