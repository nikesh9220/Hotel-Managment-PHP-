<html>
<head>
    <style type='text/css'>
        div {
            border: 2px solid #F2F2F2;
            padding: 10px 40px;
            background: #ADADAD;
            width: 400px;
            border-radius: 20px;
            margin: 12px 12px;
        }

        table td {
            width: 110px;

        }

        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

    </style>
    <script>
        function validate() {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form.cid.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form.cid.focus();
                return false;
            }
        }
    </script>
</head>
</html>
<?php

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $cid = "";
    if (isset($_POST['cid'])) {
        $cid = $_POST['cid'];
    }
    echo "<div><form name='form' method='POST'onsubmit='return validate();'><table border=0>";
    echo "<tr><td width='100'>Enter Email id:</td><td><input id='name' type='text' name='cid' value='$cid' placeholder='Email id'></td>";
    echo "<td align='right'><input class='submit button' type='submit' name='search' value='GO'></td></tr>";
    echo "</form>";

    $Cu_id = 0;


    if (isset($_POST['search'])) {

        $cid = $_POST['cid'];
        $result = mysql_query("select Cu_id from customer_info where Cu_Email_id='$cid' ");
        if (mysql_num_rows($result) > 0) {

            $row = mysql_fetch_array($result);
            $Cu_id = $row['Cu_id'];
            echo "<form name='f2' method='POST'>";
            echo "<input type='hidden' name='txt_cu_id' value='$Cu_id'>";
            echo "<tr><td valign='top'>Give Feedback:</td><td><textarea name='comm' rows='5' cols='20' required></textarea></td></tr>";
            echo "<tr><td align='right' colspan='3'><input type='submit' name='submit' value='Submit'></td><tr>";
            echo "</form></div>";

            //print_r($_POST);


        }
    }
    if (isset($_POST['submit'])) {
        //print_r($_POST);
        $com = $_POST['comm'];
        $Cu_id = $_POST['txt_cu_id'];

        $query = "insert into feedback (Cu_id,Comments,Fb_date) values($Cu_id,'$com',sysdate())";


        $insert = mysql_query($query);
        if ($insert > 0) {
            //echo"inserted...";
            echo "<script language='javascript'> alert('submitted');</script>";
            echo "<script language='javascript'>window.open('index.html','_top')</script>";

        } else {
            echo "error";
        }
    }
    //echo"<tr><td align='left'><form name='f3' method='POST'>";
    //echo "<input type='submit' name='back' value='back'></td></tr>";
    //echo "</form>";
    echo "</table>";

    /*if(isset($_POST['back']))
    {
        echo"<script language='javascript'>window.open('index.html','_top')</script>";
    }	*/
}
?>