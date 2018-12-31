<?php
session_start();

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);

    if (isset($_POST['pay1'])) {
        $mode = $_POST['mode'];
        $c_no = $_POST['c_no'];
        $c_name = $_POST['c_name'];
        $cvv_no = $_POST['cvv_no'];
        $month = $_POST['month'];
        $year = $_POST['year'];

        $id = $_SESSION['id'];
        $cin = $_SESSION['cin'];
        $cout = $_SESSION['cout'];
        $rno = $_SESSION['rno'];
        $person = $_SESSION['person'];
        $total = $_SESSION['total'];
        $count = 0;
        foreach ($_SESSION['rno'] as $key => $v) {
            $count++;
        }


        $insert = mysql_query("insert into re_master(R_cu_id,R_date,Check_in,Check_out,No_of_rooms,Total_price) values('$id',sysdate(),'$cin','$cout','$count','$total')");

        $select = mysql_query("select last_insert_id() as n_id");
        $row1 = mysql_fetch_array($select);
        $new_id = $row1['n_id'];


        foreach ($_SESSION['rno'] as $key => $v) {
            $select = mysql_query("select rm_price from room_detail where room_no='$v'");
            $sel = mysql_fetch_array($select);
            $price = $sel['rm_price'];
            $rid = mysql_insert_id($con);

            foreach ($_SESSION['person'] as $key1 => $v1) {
                if ($key1 == $v) {
                    $row = mysql_query("insert into reservation_detail values('$new_id','$key1','$v1','$price','')");
                }
            }
        }
        $pid = mysql_insert_id($con);

        /*$query=mysql_query("select R_id from re_master where R_cu_id='$id'");
        $row1=mysql_fetch_array($query);*/

        $select1 = mysql_query("select last_insert_id() as n_id1");
        $row1 = mysql_fetch_array($select1);
        $new_id1 = $row1['n_id1'];

        $result = mysql_query("insert into payment(P_type,P_date,R_id,P_mode,Card_no,Card_H_name,Cvv_no,Exp_month,Exp_year,Total_amt) values('Received',sysdate(),'$new_id1','$mode','$c_no','$c_name','$cvv_no','$month','$year','$total')");
        if ($result > 0) {
            echo "<script language='javascript'>alert('Booked');window.open('booking.php','_top');</script>";
            // session_unset();
            // session_destroy();
        }
    }
}
?>