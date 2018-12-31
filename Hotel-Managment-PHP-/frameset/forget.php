<html>
<head>
    <style type="text/css">
        div {
            margin-top: 50px;
            border: 2px solid #d5579c;
            padding: 10px 40px;
            background: #73bf99;
            width: 300px;
            border-radius: 20px;
            box-shadow: 10px 10px 5px #29817e;
        }

        body {
            background: #a6c067;
        }

        a {
            color: red;
        }

        a:hover {
            color: #006CD9;
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
        }
    </script>
</head>
<body>

<?php
$id = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>
<center>
    <h2>Forget password</h2>
    <div>
        <form method="POST" name="form" onsubmit="return validate();">
            Admin id :
            <input type="text" name="id" value="<?php echo $id; ?>">
            <input class="submit button" type="submit" name="go" value="Go">

            <?php
            if (isset($_POST['id']))    //click go button
            {
                $con = mysql_connect('localhost', 'root', '');
                if ($con) {
                    mysql_select_db("hms", $con);
                    $id = $_POST['id'];

                    $result = mysql_query("select * from Admin_profile where Ad_Email_id='$id'");

                    if (mysql_num_rows($result) > 0) {
                        $row = mysql_fetch_array($result);
                        echo "<br>" . "<p>" . $row['Ad_que1'] . " " . "<input type='text' name='ans1'><br></p>";

                        echo "<p>" . $row['Ad_que2'] . " " . "<input type='text' name='ans2'><br>";
                        echo "<p>" . "<input type='submit' name='showpsw' value='show password'></p>";
                    }
                }
            }

            if (isset($_POST['showpsw']))    //click show password button
            {
                $ans1 = $_POST['ans1'];
                $ans2 = $_POST['ans2'];
                $res = mysql_query("select Ad_psw from Admin_profile where Ad_ans1='$ans1' and Ad_ans2='$ans2' and Ad_Email_id='$id'");

                if (mysql_num_rows($res) > 0) {
                    $row = mysql_fetch_array($res);
                    //$pas=$row['Ad_psw'];
                    //$pass_hashed = md5($row['Ad_psw']);
                    echo "<br>" . "Your password is:   " . "<p style='color:red;font-size:20px'>" . $row['Ad_psw'] . "</p>";
                    echo "<a href='login.html'>Login</a>";
                }
            }
            //echo"<p align='right'><input type='submit' name='back' value='back'></p>";
            //if(isset($_POST['back']))
            //{
            //header("location:login.html");/*<p align='right'></p>*/
            //}
            ?>
        </form>
    </div>
</center>
</body>
</html>