<?php
session_start();
$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('database not connect');
}
mysql_select_db("hms", $con);

$email = '';
$reserve = '';
if (isset($_POST['email']) and isset($_POST['reserve'])) {
    $email = $_POST['email'];
    $reserve = $_POST['reserve'];
}
echo "<form method='POST'>";
echo "<fieldset><legend>Enter Email id</legend><input type='text'  value='$email' name='email' plceholder='Email id'><br>";
echo "<legend>Enter Reservation id</legend><input type='text'  value='$reserve' name='reserve' plceholder='Reservation id'>";
echo "<input type='submit' name='go' value='go'>";
echo "</form><br>";

if (isset($_POST['go'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $email = $_POST['email'];
    $result = mysql_query("select rd.R_id,Cu_name,Cu_Mo_no,Cu_Email_id,Check_in,Check_out,Room_no,R_date from
customer_info,reservation_detail as rd,re_master as rm where
rd.r_id='$reserve' and rm.r_id=rd.r_id and rm.r_cu_id=customer_info.cu_id and Cu_Email_id='$email'");
    if (mysql_num_rows($result) > 0) {

        while (($row = mysql_fetch_array($result)) > 0) {    //$h=$row['Room_no'];
            //$row=mysql_fetch_array($result);
            echo "<pre>";
            print_r($row);
            echo "</pre>";
            $rid = $row['R_id'];
            $name = $row['Cu_name'];
            $no = $row['Cu_Mo_no'];
            $email = $row['Cu_Email_id'];

            $_SESSION['email'] = $email;
            $_SESSION['rid'] = $rid;

            $rdate = $row['R_date'];
            $room[] = $row['Room_no'];
            $checkin = $row['Check_in'];
            $checkout = $row['Check_out'];
            $_SESSION['Check_in'] = $checkin;
            $_SESSION['Check_out'] = $checkout;


        }
        echo "<form method='POST'>Your info<table>";
        echo "<tr><td>Reservation Id:</td><td>" . $rid . "</td></tr>";
        echo "<tr><td>Name:</td><td>" . $name . "</td></tr>";
        echo "<tr><td>Mobile no:</td><td>" . $no . "</td></tr>";
        echo "<tr><td>Email id:</td><td>" . $email . "</td></tr>";
        echo "<tr><td>Reserve Date:</td><td>" . $rdate . "</td></tr>";
        echo "<tr><td>Room no:</td><td>";
        foreach ($room as $key => $v) {
            echo $v . "<input type='checkbox' value='" . $v . "' name='can[]' >" . "<br>";
        }
        /*$row1=mysql_fetch_array($result);
        do
        {
        echo $row['Room_no']."<input type='checkbox' value='".$row['Room_no']."' name='can[]' ><br>";
        }while(($row1=mysql_fetch_array($result))>0);*/
        echo "</td></tr>";
        echo "<tr><td>Check in:</td><td>" . $checkin . "</td></tr>";
        echo "<tr><td>Check out</td><td>" . $checkout . "</td></tr>";
        echo "<input type='hidden' name='rid' value={$row['R_id']}>";
        echo "<input type='hidden' name='mo' value={$row['Cu_Mo_no']}>";
        echo "<input type='hidden' name='email' value={$row['Cu_Email_id']}>";
        echo "<input type='hidden' name='rdate' value={$row['R_date']}>";
        echo "<input type='hidden' name='rno' value={$row['Room_no']}>";


        echo "<tr><td></td><td><input type='submit' name='cancel' value='cancel reservation'></td></tr>";
        echo "</table></form>";

    }
}
if (isset($_POST['cancel']) && isset($_POST['can'])) {
    echo "<pre>";
    print_r($_POST);
    print_r($_SESSION);
    echo "</pre>";

    $rid = $_SESSION['rid'];
    $mo = $_POST['mo'];
    $email = $_SESSION['email'];
    $rno = $_POST['rno'];
    $cid = mysql_insert_id($con);

    $can = $_POST['can'];

    /*$select1=mysql_query("select last_insert_id() as n_id1 from re_master");
    $row1=mysql_fetch_array($select1);
    $new_id1=$row1['n_id1'];*/

    $result = mysql_query("INSERT INTO c_master values ('$cid',sysdate())");


    $select1 = mysql_query("select last_insert_id() as n_id1");
    $row1 = mysql_fetch_array($select1);
    $new_id1 = $row1['n_id1'];
    $total = 0;
    foreach ($can as $key => $v) {
        echo $v . "<br>";

        $insert_cd = mysql_query("INSERT INTO C_detail(C_id,R_id,Cu_Email_id,Room_no) values($new_id1,$rid,'$email',$v)");
        $room = mysql_query("select price from reservation_detail where room_no='$v'");
        $rm = mysql_fetch_array($room);
        $total = ($total + $rm['price']);

        if ($insert_cd > 0) {
            echo "<br><br>cancellation is successful";
        }
    }
    //$cr=date_create(timezone_open("Asia/Kolkata"));

    //if ($check_in!=date_format($cr,"Y-m-d"))
    $check_in = $_SESSION['Check_in'];
    if ($check_in != date("Y-m-d")) {
        $total = $total * 75 / 100;
        $select = mysql_query("select last_insert_id() as n_id");

        $row = mysql_fetch_array($select);
        $new_id = $row['n_id'];

        $pay = mysql_query("select * from payment where R_id='$rid'");
        $pays = mysql_fetch_array($pay);

        $mode = $pays['P_mode'];
        $c_no = $pays['Card_no'];
        $c_name = $pays['Card_H_name'];
        $cvv_no = $pays['Cvv_no'];
        $month = $pays['Exp_month'];
        $year = $pays['Exp_year'];

        $result = mysql_query("insert into payment(P_type,P_date,C_id,P_mode,Card_no,Card_H_name,Cvv_no,Exp_month,Exp_year,Total_amt) values('Refund',sysdate(),'$new_id1','$mode','$c_no','$c_name','$cvv_no','$month','$year','$total')");

        if ($result > 0) {
            echo "<br><br>refund is successful";
        }
    } else {
        echo "<br>" . "no money refunded";
    }
}

//$result1=mysql_query("INSERT INTO c_detail values('$new_id','$new_id1,'$email',");

?>