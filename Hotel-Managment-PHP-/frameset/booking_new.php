<html>
<head>
    <script>
        function validate() {
            var name = document.form.name.value;
            if (name == null || name == "") {
                alert("Enter your name");
                document.form.name.focus();
                return false;
            }
            var number = document.form.no.value;
            if (number == null || number == "") {
                alert("Enter your number");
                document.form.no.focus();
                return false;
            }
            var number = document.form.postal.value;
            if (number == null || number == "") {
                alert("Enter your Postal code");
                document.form.postal.focus();
                return false;
            }
            /*	if((number.length < 10) || (number.length > 10))
             {
             alert(" Your Mobile Number must be 1 to 10 Integers");
             document.form.number.select();
             return false;
             }*/
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form.email.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form.email.focus();
                return false;
            }
            var tname = document.form.address.value;
            if (tname == null || tname == "") {
                alert("Enter your address");
                document.form.address.focus();
                return false;
            }
            var tname = document.form.city.value;
            if (tname == null || tname == "") {
                alert("Enter your city");
                document.form.city.focus();
                return false;
            }
            var tname = document.form.state.value;
            if (tname == null || tname == "") {
                alert("Enter your state");
                document.form.state.focus();
                return false;
            }
        }
        function Numbers(event) {
            var e = event || evt; // for trans-browser compatibility
            var charCode = e.which || e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
    <style type="text/css">
        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

        table {
            margin: 15px 15px;
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


    </style>
</head>
<body>
<h1>Reservation</h1>
<?php

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    /*echo "<pre>";
    print_r($_POST);
    //print_r($_SESSION);
    echo "</pre>";*/

    /*session_start();

    $_SESSION['name']=$_POST['name'];
    $_SESSION['no']=$_POST['no'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['address']=$_POST['address'];
    $_SESSION['city']=$_POST['city'];
    $_SESSION['state']=$_POST['state'];
    $_SESSION['postal']=$_POST['postal'];
}*/

    if (isset($_POST['search'])) {

        /*$_SESSION['cid']=$_POST['cid'];
        $sid=$_SESSION['cid'];*/

        $id = '';
        $name = '';
        $no = '';
        $email = '';
        $address = '';
        $city = '';
        $state = '';
        $postal = '';

        $cid = $_POST['cid'];
        $result = mysql_query("select * from customer_info where Cu_Email_id='$cid' ");
        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            $id = $row['Cu_id'];
            $name = $row['Cu_name'];
            $no = $row['Cu_Mo_no'];
            $email = $row['Cu_Email_id'];
            $address = $row['Cu_Address'];
            $city = $row['Cu_City'];
            $state = $row['Cu_State'];
            $postal = $row['Cu_Postal_code'];
        }

        echo "<body >";
        echo "<form method='POST' onsubmit='return validate();' name='form' action='reservation.php'><table border=0>";
        echo "<tr><td>Name: </td><td><input type='text' name='name' value='$name' placeholder=' Name'></td></tr>";
        echo "<tr><td>Mobile no: </td><td><input type='text' name='no' value='$no' placeholder=' Mobile NO.' onkeypress='return Numbers(event);'></td></tr>";
        echo "<tr><td>Email id:</td><td><input type='text' name='email' value='$email' placeholder=' Email id'></td></tr>";
        echo "<tr><td>Address:</td><td><input type='text' name='address' value='$address' placeholder=' Address'></td></tr>";
        echo "<tr><td>City: </td><td><input type='text' name='city' value='$city' placeholder=' City'></td></tr>";
        echo "<tr><td>State:</td><td><input type='text' name='state' value='$state' placeholder=' State'></td></tr>";
        echo "<tr><td>Postal:</td><td><input type='text' name='postal' value='$postal' placeholder=' pincode'></td></tr>";
        echo "<tr><td><input type='hidden' name='id' value='$id'></td></tr>";

        if (mysql_num_rows($result) > 0) {
            echo "<tr><td align='left'><input type='submit' name='back' value='cancel'></td>";
            echo "<td align='right'><input class='submit button' type='submit' name='ok' value='Ok'></td></tr>";
            echo "</form>";
        } else {
            echo "<tr><td align='left'><input type='submit' name='back' value='cancel'></td>";
            echo "<td align='right'><input type='submit' name='new' value='new'></td></tr>";
            echo "</form>";
        }
        echo "</table>";
    }
    if (isset($_POST['back'])) {
        header("location:booking.php");
    }
}
?>
</body>
</html>