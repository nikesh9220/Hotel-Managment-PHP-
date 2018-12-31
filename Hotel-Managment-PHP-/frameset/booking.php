<html>
<head>
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
    <style type='text/css'>
        body {
            color: #727272;
            background: #f5f5f5;
            font-family: inherit;
        }

        div {
            margin: 15px;
            margin-top: 30px;
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

    echo "<div><form action='booking_new.php' name='form' onsubmit='return validate();' method='POST'>";
    echo "Enter Email id:<input type='text' name='cid' placeholder=' Enter Email Id'>";
    echo "<input class='submit button' type='submit' name='search'>";
    echo "</form></div>";
}
?>
</body>
</html>