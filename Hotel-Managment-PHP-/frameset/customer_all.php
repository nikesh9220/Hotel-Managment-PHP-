<html>
<head>
    <style type='text/css'>
        a {
            margin: 25px 25px;
        }

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
            text-align: center;
        }

        table {
            margin: 15px 15px;
        }

    </style>
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
            if ((number.length < 10) || (number.length > 10)) {
                alert(" Your Mobile Number must be 1 to 10 Integers");
                document.form.no.focus();
                return false;
            }
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
            var number = document.form.postal.value;
            if (number == null || number == "") {
                alert("Enter your Postal code");
                document.form.postal.focus();
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
</head>
<h1>Manage Customers</h1>
</html>
<?php
print_r($_REQUEST);
$con = mysql_connect('localhost', 'root', '');

if (!$con) {
    die('database not connect');
}
mysql_select_db('hms', $con);

if (isset($_REQUEST['action'])) {
    $cu_id = '';
    $name = '';
    $num = '';
    $email = '';
    $address = '';
    $city = '';
    $state = '';
    $postal = '';

    if ($_REQUEST['action'] == 'delete' or $_REQUEST['action'] == 'edit') {

        $cu_id = $_REQUEST['id'];

        $result = mysql_query("select * from customer_info where Cu_id='$cu_id'");
        $row = mysql_fetch_array($result);
        $name = $row['Cu_name'];
        $num = $row['Cu_Mo_no'];
        $email = $row['Cu_Email_id'];
        $address = $row['Cu_Address'];
        $city = $row['Cu_City'];
        $state = $row['Cu_State'];
        $postal = $row['Cu_Postal_code'];

    }
    if (isset($_POST['save'])) {
        //$id=$_POST['id'];
        $name = $_POST['name'];
        $num = $_POST['no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        print_r($_POST);
        if ($_REQUEST['action'] == 'edit') {
            $id = $row['Cu_id'];
            $change = mysql_query("update customer_info set Cu_name='$name' , Cu_Mo_no='$num', Cu_Email_id='$email', Cu_Address='$address', Cu_City='$city', Cu_State='$state', Cu_Postal_code='$postal' where Cu_id=$id");
            if ($change > 0) {
                echo "Updates successfully";
                header("location:customer.php");
            }
        } elseif ($_REQUEST['action'] == 'new') {
            $insert = mysql_query("insert into customer_info (Cu_name,Cu_Mo_no, Cu_Email_id,Cu_Address,Cu_City,Cu_State,Cu_Postal_code) values ('$name','$num','$email','$address','$city','$state',$postal)");
            if ($insert > 0) {
                echo "Inserted";
                header("location:customer.php");
            }
        } elseif ($_REQUEST['action'] == 'delete') {
            $id = $row['Cu_id'];
            $change = mysql_query("delete from customer_info where Cu_id=$id");
            if ($change > 0) {
                echo "Deleted successfully";
                header("location:customer.php");
            }
        }
    }
    echo "<form method='POST' name='form' onsubmit='return validate();'><table border=0>";


    /*echo "<tr><td>Id</td><td>:&nbsp&nbsp</td><td><input type='text' name='id' value=$cu_id";
    if($_REQUEST['action']=='delete' or $_REQUEST['action']=='edit')
    {

        echo " disabled ";
    }
    echo "></td></tr>";*/


    echo "<tr><td>Name</td><td>:&nbsp&nbsp</td><td><input type='text' name='name' placeholder=' Name' value=$name ";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled ";
    }
    echo "></td></tr>";
    echo "<tr><td>Mobile no</td><td>:&nbsp&nbsp</td><td><input type='text' name='no' placeholder=' Mobile number' min-length='10' onkeypress='return Numbers(event);' autocomplete='off' value=$num";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled  ";
    }
    echo "></td></tr>";
    echo "<tr><td>Email</td><td>:&nbsp&nbsp</td><td><input type='text' name='email' placeholder=' Email id' value=$email ";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled ";
    }
    echo "></td></tr>";
    echo "<tr><td>Address</td><td>:&nbsp&nbsp</td><td><input type='text' name='address' placeholder=' Address' value=$address ";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled ";
    }
    echo "></td></tr>";
    echo "<tr><td>City</td><td>:&nbsp&nbsp</td><td><input type='text' name='city' placeholder=' City' value=$city ";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled ";
    }
    echo "></td></tr>";
    echo "<tr><td>State</td><td>:&nbsp&nbsp</td><td><input type='text' name='state' placeholder=' State' value=$state ";
    if ($_REQUEST['action'] == 'delete') {
        echo " disabled ";
    }
    echo "></td></tr>";
    echo "<tr><td>Postal code</td><td>:&nbsp&nbsp</td><td><input type='text' name='postal' placeholder=' pincode' onkeypress='return Numbers(event);' value=$postal ";
    if ($_REQUEST['action'] == 'delete') echo " disabled ";

    echo "></td></tr>";


    if ($_REQUEST['action'] == 'edit') {
        echo "<tr><td align='left' colspan='2'><input class='submit button' type='submit' name='save' value='Update'></td>";
    }
    if ($_REQUEST['action'] == 'delete') {
        echo "<tr><td align='left' colspan='2'><input type='submit' name='save' value='Delete'></td>";
    }
    if ($_REQUEST['action'] == 'new') {
        echo "<tr><td align='left' colspan='2'><input type='submit' name='save' value='Save'></td>";
    }


    echo "</form>";
    echo "<form method='POST'>";
    echo "<td align='right'><input type='submit' name='cancel' value='cancel'></td></tr>";
    echo "</form>";


    if (isset($_POST['cancel'])) {
        echo "<script language='javascript'>window.open('customer.php','content');</script>";
    }
}
?>