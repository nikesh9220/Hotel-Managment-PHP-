<html>
<head>
    <style type='text/css'>
        h1 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
            text-align: center;
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
</head>

<?php
session_start();
/*echo "<pre>";
print_r($_POST);
print_r($_SESSION);
echo "</pre>";*/
$con = mysqli_connect('localhost', 'root', '', 'hms');
if ($con) {

    mysqli_select_db($con, "hms");

    $cin = '';
    $cout = '';
    $nroom = '';
    echo "<h1>Check Availability</h1>";
    if (isset($_POST['new'])) {

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['no'] = $_POST['no'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['postal'] = $_POST['postal'];


        $name = $_POST['name'];
        $no = $_POST['no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        $result = mysqli_query($con, "insert into Customer_info (Cu_name,Cu_Mo_no,Cu_Email_id,Cu_Address,Cu_City,Cu_State,Cu_Postal_code) values('$name','$no','$email','$address','$city','$state',$postal)");
        if ($result > 0) {
            echo "test";
        }
    }

    if (isset($_POST['ok'])) {

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['no'] = $_POST['no'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['postal'] = $_POST['postal'];


        $id = $_POST['id'];
        $name = $_POST['name'];
        $no = $_POST['no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        $result = mysqli_query($con, "update Customer_info set Cu_name='$name', Cu_Mo_no='$no', Cu_Email_id='$email', Cu_Address='$address', Cu_City='$city', Cu_State='$state', Cu_Postal_code='$postal' where Cu_id='$id' ");
        echo "welcome " . $name;
    }

    /*$sname=$_SESSION['name'];
    $sno=$_SESSION['no'];
    $semail=$_SESSION['email'];
    $saddress=$_SESSION['address'];
    $scity=$_SESSION['city'];
    $sstate=$_SESSION['state'];
    $spostal=$_SESSION['postal'];*/

    if (isset($_POST['back'])) {
        header("location:booking.php");
    }
    if (isset($_POST['cin']) and isset($_POST['cout']) and isset($_POST['nroom'])) {
        //SESSION_START();
        //$_SESSION['cin']=$_POST['cin'];
        //$_SESSION['cout']=$_POST['cout'];
        //$_SESSION['nroom']=$_POST['nroom'];
        $cin = $_POST['cin'];
        $cout = $_POST['cout'];
        $nroom = $_POST['nroom'];
    }

    echo "<table><form method='POST'>";
    echo "<tr><td>Checked in:</td>";
    echo "<td>Checked out:</td>";
    echo "<td>No of rooms:</td></tr>";

    echo "<tr><td><input type='date' name='cin' placeholder=' dd-mm-yyyy' value='$cin'></td>
			<td><input type='date' name='cout' placeholder=' dd-mm-yyyy' value='$cout'></td>
			<td><input type='text' name='nroom' placeholder=' room no.' value='$nroom'></td>";
    echo "<td><input type='submit' name='check' value='Check'></td></tr></form>";
    if (isset($_POST['check']) and (strtotime($cin) == true) and !empty($_POST['cin']) and (strtotime($cout) == true) and !empty($_POST['cout']) and !empty($_POST['nroom'])) {
        $_SESSION['cin'] = $_POST['cin'];
        $_SESSION['cout'] = $_POST['cout'];
        $nroom = $_POST['nroom'];

        /*$_SESSION['name']=$_POST['name'];
        $_SESSION['no']=$_POST['no'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['address']=$_POST['address'];
        $_SESSION['city']=$_POST['city'];
        $_SESSION['state']=$_POST['state'];
        $_SESSION['postal']=$_POST['postal'];*/

        $check = mysqli_query($con, "select count(room_no) as R_no from room_detail where room_no not in
			(select rd.room_no from room_detail as rd INNER JOIN reservation_detail AS rm ON rd.Room_no = rm.Room_no)");

        if (mysqli_num_rows($check) > 0) {
            $row = mysqli_fetch_array($check);
            echo "<tr><td></td><td></td><td><a href='checkin.php' target='_blank'>" . $row['R_no'] . " rooms</a> available...</td></tr>";

        }
        $query = mysqli_query($con, "select * from room_detail where room_no not in
				(select rd.room_no from room_detail as rd INNER JOIN reservation_detail AS rm ON rd.Room_no = rm.Room_no)");
        if (mysqli_num_rows($query) > 0) {
            echo "<tr><td>Below rooms available</td></tr>";
            echo "<table><form method='POST'>
						<tr><th></th><th>Room no</th>
						<th>Room type</th><th>No of bed</th>
						<th>Price</th><th>Number of Person:</th></tr>";
            while ($row = mysqli_fetch_array($query)) {
                $_SESSION['rno'] = $row['Room_no'];
                echo "<tr><td><input type='checkbox' multiple='true' name='rno' value=''" . $row['Room_no'] . "></td><td>" . $row['Room_no'] . "</td><td>" . $row['Rm_type'] . "</td><td>" . $row['Rm_No_bed'] . "</td><td>" . $row['Rm_price'] . "</td>
						<td><input type='textbox' name='person'></td></tr>";
            }
            echo "<tr><td><input type='submit' name='book' value='Book'></td></tr>";
            echo "</form></table>";

        }
    }
    if (isset($_POST['book'])) {
        $id = $_SESSION['id'];
        /*$sname=$_SESSION['name'];
        $sno=$_SESSION['no'];
        $semail=$_SESSION['email'];
        $saddress=$_SESSION['address'];
        $scity=$_SESSION['city'];
        $sstate=$_SESSION['state'];
        $spostal=$_SESSION['postal'];*/
        $pno = $_POST['person'];
        $rno = $_SESSION['rno'];
        $cin = $_SESSION['cin'];
        $cout = $_SESSION['cout'];

        //foreach($_POST as $key => $v)
        //{
        $insert = mysqli_query($con, "insert into re_master(R_cu_id,Check_in,Check_out) values('$id','$cin','$cout')");
        $rid = mysqli_insert_id($con);
        //echo $rid;
        if ($insert > 0) {
            echo $pno;
            //echo "hiii naeem vhora"."<br>";

            $row = mysqli_query($con, "insert into reservation_detail values('$rid','$rno','$pno') ");
            if ($row > 0) {
                echo "hello naeem ";
            }
        }
    }
}
?>