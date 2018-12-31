<html>
<head>
    <style type="text/css">

        div {
            border: 2px solid #F2F2F2;
            padding: 10px 40px;
            background: #ADADAD;
            width: 400px;
            border-radius: 20px;
            margin: 12px 12px;
        }

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
        <!-- text-transform: uppercase;
        --> text-align: center;
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
    </script>

</head>
<body>
</body>
<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    echo "<h1>Manage rooms</h1>";
    echo "<div>";
    //print_r($_POST);
    if (isset($_REQUEST['action'])) {
        $Rn = "";
        $Rt = "";
        $bed = "";
        $price = "";

        if ($_REQUEST['action'] == 'edit' or $_REQUEST['action'] == 'delete') {
            $Rno = $_REQUEST['no'];
            $result = mysql_query("select * from room_detail where Room_no='$Rno'");

            $row = mysql_fetch_array($result);
            $Rn = $row['Room_no'];
            $Rt = $row['Rm_type'];
            $bed = $row['Rm_No_bed'];
            $price = $row['Rm_price'];
        }

        if (isset($_POST['save'])) {
            $Rn = $_POST['rn'];
            $Rt = $_POST['rt'];
            $bed = $_POST['bed'];
            $price = $_POST['rp'];

            if ($_REQUEST['action'] == 'edit') {
                $Rn = $row['Room_no'];
                $change = mysql_query("update Room_detail set  Rm_type='$Rt' , Rm_No_bed='$bed' ,Rm_price='$price' where Room_no='$Rn'");
                if ($change > 0) {
                    echo "Your profile updated successfully...";
                    header("location:room.php");
                }
            } else if ($_REQUEST['action'] == 'new') {
                $insert = mysql_query("insert into Room_detail values($Rn,'$Rt',$bed ,$price)");
                if ($insert > 0) {
                    echo "Your profile inserted successfully...";
                    header("location:room.php");
                    /*$rid=mysql_insert_id($con);
                    echo $rid;*/
                }

            } else if ($_REQUEST['action'] == 'delete') {
                $Rn = $row['Room_no'];
                $delete = mysql_query("delete from room_detail where Room_no='$Rn'");
                if ($delete > 0) {
                    echo "delete successfully..";
                    header("location:room.php");
                }
            }
        }

        echo "<form method='POST' name='form'>";
        echo "<table border=0><tr>
					<td>Room no: </td>
					<td><input type='text' name='rn' value='$Rn' placeholder=' Room no.' onkeypress='return Numbers(event);'";
        if ($_REQUEST['action'] == 'delete' or $_REQUEST['action'] == 'edit') {
            echo " disabled ";
        }
        echo "required></td></tr>";
        if ($_REQUEST['action'] == 'delete' or $_REQUEST['action'] == 'edit') {
            echo "<tr>
					<td>Room type: </td>
					<td><select name='rt' disabled>
					<option value='deluxe' >Deluxe</option>
					<option value='luxury' >Luxury</option>
					<option value='standard' >Standard</option>
					";
        } else {
            echo "<tr>
				<td>Room type: </td>
				<td><select name='rt'>
				<option value='deluxe' >Deluxe</option>
				<option value='luxury' >Luxury</option>
				<option value='standard' >Standard</option>
				";
        }
        echo "</select></td></tr>";
        echo "<tr>
					<td>Room bed: </td>
					<td><input type='text' name='bed' value='$bed' placeholder=' No of bed' required";
        if ($_REQUEST['action'] == 'delete') {
            echo " disabled ";
        }
        echo "></td></tr>";
        echo "<tr>
					<td>Room price: </td>
					<td><input type='text' name='rp' value='$price' placeholder=' Price' required";
        if ($_REQUEST['action'] == 'delete') {
            echo " disabled ";
        }
        echo "></td></tr>";
        if ($_REQUEST['action'] == 'delete') {
            echo "<tr>
					<td align='left'><input type='submit' name='save' value='Delete'></td>
				";
        }
        if ($_REQUEST['action'] == 'new') {
            echo "<tr>
					<td align='left'><input type='submit' name='save' value='Save'></td>
				";
        }
        if ($_REQUEST['action'] == 'edit') {
            echo "<tr>
					<td align='left'><input type='submit' name='save' value='Ok'></td>
				";
        }
        echo "</form></div>";
        echo "<form method='post'>";
        echo "<td align='right'><input type='submit'  name='back' value='cancel'></td>";
        echo "</tr></form>";

        if (isset($_POST['back'])) {
            echo "<script language='javascript'>window.open('room.php','content');</script>";
        }
    }
}                    //end connection
?>
</html>