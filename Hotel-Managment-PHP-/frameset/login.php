<!DOCTYPE html>
<head>
    <title>Login form</title>
    <style type="text/css">
        div#log {
            border: 2px solid #F2F2F2;
            padding: 10px 40px;
            background: #ADADAD;
            width: 400px;
            border-radius: 20px;
            margin: 12px 12px;
        }

        div#hname {
            background: #C7A17B;
            width: 200px;
            border-radius: 20px;
            box-shadow: 7px 7px 3px #5D4227;
            text-align: center;
            margin: 5px;
        }

        a {
            text-decoration: none;
        }

        div#header {
            color: #6D6D6D;
            background: #876439;
            font-family: inherit;
            height: 102px;
        }

        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
            margin: 0px;
            padding: 0px;
        }

        h2 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 25px;
            line-height: 40px;
            text-align: center;
        }
    </style>
    <script>
        function validate() {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form.id.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form.id.focus();
                return false;
            }

            var name = document.form.psw.value;
            if (name == null || name == "") {
                alert("Enter your password");
                document.form.psw.focus();
                return false;
            }


        }
    </script>
</head>

<body>

<?php
$con = mysql_connect('localhost', 'root', '');
if ($con) {
    mysql_select_db("hms", $con);
    $sname = mysql_query("select H_Name from company");
    $row1 = mysql_fetch_array($sname);

    echo "<div id='header'><table width=100%>
		<tr>
			<td>
				<a id='title' href='index.html' target='_top'><div id='hname'>
					<font color=#513C22><h1>" . $row1['H_Name'] . "</h1></font>
				</div></a>
			</td></tr>
		</table></div>";
}
?>

<center>
    <h2>Login</h2>
    <br>
    <div id='log'>
        <form method="post" name="form" action="hms.php" onsubmit="return validate();">
            <p>Admin id : <input name="id" value="" type="text" autocomplete="off" placeholder="Abc@gmail.com"><br></p>
            <p>Password : <input type="password" name="psw" placeholder="Password"><br></p>
            <input class="submit button" type="submit" value="LOGIN" name="login"> <a href="forget.php">forget
                password</a>
        </form>
    </div>
</center>

</body>

</html>