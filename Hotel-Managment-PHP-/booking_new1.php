<?php

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    print_r($_POST);

    if (isset($_POST['new'])) {

        $name = $_POST['name'];
        $no = $_POST['no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        $result = mysql_query("insert into Customer_info (Cu_name,Cu_Mo_no,Cu_Email_id,Cu_Address,Cu_City,Cu_State,Cu_Postal_code) values('$name','$no','$email','$address','$city','$state',$postal)");
        if ($result > 0) {
            echo "test";
        }
    }

    if (isset($_POST['book'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $no = $_POST['no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        $result = mysql_query("update Customer_info set Cu_name='$name', Cu_Mo_no='$no', Cu_Email_id='$email', Cu_Address='$address', Cu_City='$city', Cu_State='$state', Cu_Postal_code='$postal' where Cu_id='$id' ");
        echo "welcome " . $name;
    }

    if (isset($_POST['search'])) {
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
        echo "<form method='POST'><fieldset><table border=0>";
        echo "<legend>Your information</legend>";
        echo "<tr><td>Name: </td><td><input type='text' name='name' value='$name'></td></tr>";
        echo "<tr><td>Mobile no: </td><td><input type='text' name='no' value='$no'></td></tr>";
        echo "<tr><td>Email id:</td><td><input type='text' name='email' value='$email'></td></tr>";
        echo "<tr><td>Address:</td><td><input type='text' name='address' value='$address'></td></tr>";
        echo "<tr><td>City: </td><td><input type='text' name='city' value='$city'></td></tr>";
        echo "<tr><td>State:</td><td><input type='text' name='state' value='$state'></td></tr>";
        echo "<tr><td>Postal:</td><td><input type='text' name='postal' value='$postal'></td></tr>";
        echo "<tr><td><input type='hidden' name='id' value='$id'></td></tr>";

        if (mysql_num_rows($result) > 0) {
            echo "<tr><td align='left'><input type='submit' name='back' value='cancel'></td>";
            echo "<td align='right'><input type='submit' name='book' value='ok'></td></tr>";
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