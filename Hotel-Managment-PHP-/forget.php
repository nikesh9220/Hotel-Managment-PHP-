<html>
<head>
    <link rel="stylesheet" href="main.css">
    <!--<style type="text/css">
        #forget div{
            margin-top:50px;
            border:2px solid #d5579c;
            padding:10px 40px;
            background:#73bf99;
            width:300px;
            border-radius:20px;
            box-shadow:10px 10px 5px #29817e;
        }
        #forget body{
        background:#a6c067;
        }
        #forget a{color:red;}
        #forget a:hover{
        color:#006CD9;
        }


    </style>-->
    <script>
        function validate() {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form1.id.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form1.id.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<div id='forget'>
    <?php
    $id = "";
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    ?>

    <!--<form method="POST" name="form" onsubmit="return validate();">-->
    <form id="booking-form" class="booking-form" name="form1" method="post" onsubmit="return validate();">
        <div class="h1">Forget password</div>
        <div id="form-message" class="message hide">
            Thank you for your enquiry!
        </div>
        <div id="form-content">
            <div class="group">
                <label for="id">Admin id</label>
                <div><input id="id" name="id" class="form-control" type="text" placeholder="xyz@gmail.com"
                            value="<?php echo $id; ?>" required></div>
            </div>
            <?php
            if (!isset($_POST['id'])) {
                echo '<div class="group submit">
						<label class="empty"></label>
						<div><input name="go" type="submit" value="Go"/></div>
				</div>';
            }
            ?>


            <!--
	<center>
	<h2>Forget password</h2>
	<div>
	Admin id :
	<input type="text" name="id" value="<?php echo $id; ?>">
	<input  class="submit button" type="submit" name="go" value="Go">
	<br>-->
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

                        echo "<div class='group'>
						<label for='qu1'>" . $row['Ad_que1'] . "</label>
						<div><input id='ans1' name='ans1' class='form-control' type='text' placeholder='Answer First Question'></div>
				</div>";
                        echo "<div class='group'>
						<label for='qu2'>" . $row['Ad_que2'] . "</label>
						<div><input id='ans2' name='ans2' class='form-control' type='text' placeholder='Answer Second Question'></div>
				</div>";
                        /*
                        echo "<br>"."<p>".$row['Ad_que1']." "."<input type='text' name='ans1'><br></p>";
                        echo"<br>";
                        echo "<p>".$row['Ad_que2']." "."<input type='text' name='ans2'><br></p>";
                        echo"<br>";
                        echo "<p>"."<input type='submit' name='showpsw' value='show password'></p*/
                        echo '<div class="group submit">
						<label class="empty"></label>
						<div><input name="showpsw" type="submit" value="show password"/></div>
				</div>';


                    } else {
                        $id = $_POST['id'];

                        $result = mysql_query("select * from customer_info where Cu_id='$id'");

                        if (mysql_num_rows($result) > 0) {
                            $row = mysql_fetch_array($result);

                            echo "<div class='group'>
							<label for='qu1'>Which is your favourite pet?</label>
							<div><input id='ans1' name='ans1' class='form-control' type='text' placeholder='Answer Question'></div>
					</div>";
                            echo '<div class="group submit">
							<label class="empty"></label>
							<div><input name="showpsw1" type="submit" value="show password"/></div>
					</div>';


                        } else {
                            echo '<div class="group submit">
							<label class="empty"></label>
							<div><input name="go" type="submit" value="Go"/></div>
					</div>';
                        }
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
                    //echo "<br><center>"."Your password is:   "."</center>" ;

                    echo '<div class="group">
						<label for="empty">Your password is:</label>
						<label for="empty"><p style="color:red;font-size:20px">' . $row['Ad_psw'] . '</p></label>
				</div>';

                    /*echo "<a href='login.php'>Login</a>";*/
                }
            }
            if (isset($_POST['showpsw1']))    //click show password button
            {
                $ans1 = $_POST['ans1'];
                $res = mysql_query("select Cu_psw from customer_info where Cu_ans='$ans1' and Cu_Email_id='$id'");

                if (mysql_num_rows($res) > 0) {
                    $row = mysql_fetch_array($res);
                    //$pas=$row['Ad_psw'];
                    //$pass_hashed = md5($row['Ad_psw']);
                    //echo "<br><center>"."Your password is:   "."</center>" ;

                    echo '<div class="group">
						<label for="empty">Your password is:</label>
						<label for="empty"><p style="color:red;font-size:20px">' . $row['Cu_psw'] . '</p></label>
				</div>';

                    /*echo "<a href='login.php'>Login</a>";*/
                }
            }
            //echo"<p align='right'><input type='submit' name='back' value='back'></p>";
            //if(isset($_POST['back']))
            //{
            //header("location:login.html");/*<p align='right'></p>*/
            //}
            ?>
        </div>
        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
    </form>
</div>
</center>
</div>
</body>
</html>