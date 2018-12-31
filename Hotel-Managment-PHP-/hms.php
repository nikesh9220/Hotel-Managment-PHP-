<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Sunrise</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
    <script type='text/javascript' src='loginjquery.min.js'></script>
    <link rel="stylesheet" href="login.css" type="text/css" media="screen"/>
    <script>
        $(document).ready(function () {
            $('#login-trigger').mouseenter(function () {
                $(this).next('#login-content').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                else $(this).find('span').html('&#x25BC;')
            })
        });
    </script>

</head>
<body>

<div id="bg_top">
    <div id="bg_img_bg">
        <div id="bg_img">
            <div id="logo">
                <?php
                session_start();
                $con = mysql_connect('localhost', 'root', '');
                if ($con)
                {
                mysql_select_db("hms", $con);
                $sname = mysql_query("select H_Name from company");
                $row1 = mysql_fetch_array($sname);
                ?>
                <div>
                    <table width=100%>
                        <tr>
                            <td class='no' style="padding-left:600px">
                                <a href="index.php"><h1><?php echo $row1['H_Name']; ?></h1></a>
                                <h2><font size='2px'>The five star hotal</font></h2>
                </div>
                </td>
                <td align="right">
                    <?php
                    if (isset($_SESSION['A_id']))
                    {
                        $result = mysql_query("select * from Admin_profile");
                        $row = mysql_fetch_array($result);
                        echo "<font color=#d9d900>" . "WELCOME " . $row['Ad_fname'] . " " . $row['Ad_lname'] . "..!!" . "</font>" . "<br>";
                        echo "<ul style=list-style-type:none;>
								
								<li style=float:right;margin-left:5px;><a class='menu' href='logout.php' target='_top'>logout</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='hms.php' target='_top'>Edit Information</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='view.php' target='_top'>View profile</a><div class='but_r1'></div></li>
								
							</ul>";
                        echo "<td>";
                    } elseif (isset($_SESSION['U_id'])) {
                        $result = mysql_query("select * from customer_info where Cu_Email_id='" . $_SESSION['U_id'] . "'");
                        $row = mysql_fetch_array($result);
                        echo "<font color=#d9d900>" . "WELCOME " . $row['Cu_name'] . "..!!" . "</font>" . "<br>";
                        echo "<ul style=list-style-type:none;>
								
								<li style=float:right;margin-left:5px;><a class='menu' href='logout.php' target='_top'>Logout</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='hms.php' target='_top'>Edit Information</a><div class='but_r1'></div></li>
								
							</ul>";
                        echo "<td>";
                    }
                    else
                    { ?>
                    <header class='cf'>
                        <nav>
                            <ul>
                                <div class='link'>
                                    <li id='login'><a id='login-trigger' href='#'> Log in <span>&#x25BC;</span> </a>
                                        <div id='login-content'>
                                            <form method='POST' action='hms.php'>
                                                <fieldset id='inputs'><input id='username' type='email' name='id'
                                                                             placeholder='Your email address' required>
                                                    <input id='password' type='password' name='psw'
                                                           placeholder='Password' required></fieldset>
                                                <fieldset id='actions'><input type='submit' id='submit' value='Log in'
                                                                              name='login'>
                                            </form>
                                            <form method="POST" action="signup.php">
                                                <!-- <input type='submit' id='signup1' value='Sign Up' name='signup'> -->
                                                <button id='signup1'>Sign Up</button>
                                            </form>
                                            <label><a href='forget123.php' target='_blank'>Forget
                                                    password</a></label>                                                    </fieldset>
                                            <!-- </form> -->                                            </div>
                                    </li>
                                    <li id='signup'>
                                        <!--<a href=''>Sign up FREE</a>-->                                        </li>
                            </ul>
            </div>
            </nav>                                </header>
            <?php }

            ?>
            </table></div>
    </div>
    <div id="header">
        <div id='buttons' style='padding-left:130px;'>
            <?php

            if (isset($_SESSION['A_id'])) {
                echo "<div class='drop' style='padding-left:100px'>
			<ul>
				<li><a href='index.php' class='but but_t' >Home</a></li>
				<li><a href='about_us.php' class='but'>About us</a></li>
				<li><a href='v_feed.php' class='but'>Feedback</a></li>
				<li><a href='room.php' class='but'>Rooms</a></li>
				<li><a href='customer.php' class='but'>Customers</a></li>
				<li><a href='gallery.php' class='but'>Gallery</a></li>
				<li><a href='contact_us.php' class='but'>Contact us</a></li>
			</ul>
			</div>
			</div>
		";
            } else {
                echo "<div class='drop'>
		<ul>
			<li><a href='index.php' class='but but_t'  title=''>Home</a></li>
			<li><a href='about_us.php'  class='but' title=''>About us</a>
			<li><a href='r_info.php' class='but' title=''>Room info</a></li>
			<li><a href='gallery.php'  class='but' title=''>Gallery</a>
			<li style='width:100px;'><a href='#'>Booking &#9662</a>
				<ul>
					<li class='drop'><a href='booking.php' class='but' title=''>Booking</a></li>
					<li><a href='Avail.php' class='but' title=''>Avaibility</a></li>
					<li><a href='reserve.php' class='but' title=''>Reserve Room</a></li>
				</ul>
			</li>
			<li><a href='service.php' class='but' title=''>Service</a>
			<li><a href='Cancellation.php' class='but' title=''>Cancellation</a>
			<li><a href='g_feed.php' class='but' title=''>Feedback</a>
			
			<li><a href='contact_us.php' class='but' title=''>Contact us</a>
		 </ul></div>
		</div>";
            }
            }
            ?>

        </div>

        <div id="main">
            <?php
            $con = mysql_connect('localhost', 'root', '');
            if ($con)
            {
            mysql_select_db("hms", $con);

            if (isset($_POST['login']))        //click Login button
            {
                $id = $_POST['id'];
                $psw = $_POST['psw'];
                //$pass_hashed = md5($psw);
                /*$result=mysql_query("select * from Admin_profile where Ad_Email_id='".mysql_real_escape_string($id)."' and Ad_psw='".mysql_real_escape_string($pass_hashed)."'");*/

                $result = mysql_query("select * from Admin_profile where Ad_Email_id='" . mysql_real_escape_string($id) . "' and Ad_psw='" . mysql_real_escape_string($psw) . "'");

                if (mysql_num_rows($result) > 0) {
                   // session_start();
                    $_SESSION["A_id"] = $id;
                  //  header("location:index.php");
                    ?>
                    <script language='javascript'>window.location.replace('index.php');</script>
                <?php
                    $row = mysql_fetch_array($result);
                    echo "welcome " . $row['Ad_fname'] . " " . $row['Ad_lname'] . "..!!";
                    echo "hi";
                    ?>

                    <form action="<?php $_PHP_SELF ?>" method="POST">
                        <input type="submit" name="change" value="Change pasword">
                    </form>
                    <form action="edit.php" method="POST">
                        <input type="submit" name="edit" value="Edit profile">
                        <input type="submit" name="show" value="Show profile">
                    </form>
                    <?php
                } else {
                    $result1 = mysql_query("select * from customer_info where Cu_Email_id='" . mysql_real_escape_string($id) . "' and Cu_psw='" . mysql_real_escape_string($psw) . "'");

                    if (mysql_num_rows($result1) > 0) {
                         $_SESSION["U_id"] = $id;
                        //header("location:index.php");
                        ?>
                    <script language='javascript'>window.location.replace('index.php');</script>
            <?php
                    } else {

                        echo "<script language='javascript'>alert('INVALID ID OR PASSWORD');window.open('index.php','_top');</script>";
                    }
                }
            }


            if (isset($_SESSION['A_id']))
            {
            ?>
            <form id="booking-form" class="booking-form" name="form1" method="POST">
                <div class="h1">Change Password</div>
                <div id="form-content">

                    <div class="group">
                        <label for="npsw">Enter new Password</label>
                        <div><input id="npsw" name="npsw" class="form-control" type="password"
                                    placeholder="New Password" minlength=6 required="">
                        </div>
                    </div>

                    <div class="group">
                        <label for="cpsw">Confirm Password</label>
                        <div><input id="cpsw" name="cpsw" class="form-control" type="password"
                                    placeholder="Confirm Password" minlength=6 required="">
                        </div>
                    </div>
                    <div class="group submit">
                        <label class="empty"></label>
                        <div>
                            <div style='float:left;width:100px;'>
                                <input name="chng" type="submit" value="Save" onclick="return validate();"/>
                            </div>
                            <div style='float:right;width:100px;'>
                                <form action="hms.php" method="post"><input name="back" type="submit" value="cancel"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['back'])) {
                    echo "<script language='javascript'>window.open('index.php','_top');</script>";
                }

                if (isset($_POST['chng']))    //click Change button
                {
                    $n_psw = $_POST['npsw'];
                    $c_psw = $_POST['cpsw'];

                    if ($n_psw == $c_psw)        //new psw and conform psw is match or not
                    {

                        $change = mysql_query("update Admin_profile set  Ad_psw='$n_psw' where Ad_psw='$upsw'");
                        if ($change > 0) {
                            echo "<b>" . "your password changed successfully.." . "<b>";
                            header("location:index.php");
                        }
                    } else {
                        ?>
                        <script type="text/javascript">alert("Password doesn't match");</script>
                        <?php
                    }
                }
                }
                if (isset($_SESSION['U_id']))
                { ?>
                <form id="booking-form" class="booking-form" name="form1" method="POST">
                    <div class="h1">Change Information</div>
                    <div id="form-content">

                        <div class="group">
                            <label for="npsw">Name</label>
                            <div><input id="npsw" name="firstName" class="form-control" type="text"
                                        placeholder="First Name"  required="">
                            </div>
                        </div>
                        <div class="group">
                            <label for="npsw">Address</label>
                            <div><input id="npsw" name="address" class="form-control" type="text"
                                        placeholder="Address"  required="">
                            </div>
                        </div>


                        <div class="group">
                            <label for="npsw">Enter new Password</label>
                            <div><input id="npsw" name="npsw1" class="form-control" type="password"
                                        placeholder="New Password" minlength=6 required="">
                            </div>
                        </div>

                        <div class="group">
                            <label for="cpsw">Confirm Password</label>
                            <div><input id="cpsw" name="cpsw1" class="form-control" type="password"
                                        placeholder="Confirm Password" minlength=6 required="">
                            </div>
                        </div>
                        <div class="group submit">
                            <label class="empty"></label>
                            <div>
                                <div style='float:left;width:100px;'>
                                    <input name="chnge1" type="submit" value="Save" onclick="return validate();"/>
                                </div>
                </form>
                <div style='float:right;width:100px;'>
                    <form method="POST" action="hms.php"><input name="back1" type="submit" value="cancel"/></form>
                </div>
        </div>
    </div>

    <?php }

    if (isset($_POST['back1'])) {
        echo "<script language='javascript'>window.open('index.php','_top');</script>";
    }

    if (isset($_POST['chnge1']))    //click Change button
    {
        $n_psw = $_POST['npsw1'];
        $c_psw = $_POST['cpsw1'];
        $firstName=$_POST['firstName'];
        $address=$_POST['address'];

        if ($n_psw == $c_psw)        //new psw and conform psw is match or not
        {

            $change = mysql_query("update customer_info set  Cu_psw='$n_psw',Cu_name='$firstName',Cu_Address='$address' where Cu_Email_id='" . $_SESSION['U_id'] . "'");
            if ($change > 0) {
                echo "<b>" . "your password changed successfully.." . "<b>";
                ?>
                <script type="text/javascript">alert("Details Updated Successfully");
                    window.location.replace("index.php");
                </script>
                <?php
                }
        } else {
            ?>
            <script type="text/javascript">alert("Password doesn't match");</script>
            <?php
        }
    }
    }
    ?>
</div>
<!-- bottom begin -->
<div id="bottom_bot">
    <div id="bottom">
        <div id="bottom_all">
            <div id="bottom_all_bot">
                <div id="b_col1">
                    <h1>Services</h1>
                    <div style="height:10px"></div>
                    <ul class="spis_bot">
                        <li><a href="#">Airport pick-up and drop available</a></li>
                        <li><a href="#">Travel Assistance</a></li>
                        <li><a href="#">Room service </a></li>
                        <li><a href="#">Spice Garden Restaurant</a></li>
                        <li><a href="#">Safety lockers in rooms</a></li>
                        <li><a href="#">Wi-Fi connectivity</a></li>
                        <li><a href="#">Valet parking</a></li>
                    </ul>
                </div>
                <div id="b_col2">
                    <h1>Follow Us</h1>
                    <div style="height:15px"></div>
                    <ul class="spis_fu">

                        <li><img src="images/fu_i2.png" class=" fu_i" alt=""/><a
                                    href="http://www.facebook.com/Munaf.Vhora">Be a fan on Facebook</a></li>
                        <li><img src="images/fu_i3.png" class=" fu_i" alt=""/><a href="#">RSS Feed</a></li>
                        <li><img src="images/fu_i4.png" class=" fu_i" alt=""/><a href="#">Follow us on Twitter</a></li>
                    </ul>
                </div>

                <div id="b_col3">
                    <h1>Contact Us</h1>
                    <div style="height:15px"></div>
                    <div class="lh">
                        The Sunrise<br/>
                        RadheKishan villa,Toronto<br/>
                        Phone:+1(647)248-6145<br/>
                        Fax: +1(647)248-6145<br/>
                        E-mail: munafvhora28@hotmail.com
                    </div>

                </div>
                <div id="b_col4">
                    <h1>About Us</h1>
                    <div style="height:15px"></div>
                    <b>The Sunrise Hotel is a boutique hotel located on Toronto, Canada.</b><br/>
                    The Hotel is within ideal proximity to corporate houses, business parks as well as malls,
                    multiplexes and shopping arcades. <br/><br/>
                    <b>The Sunrise Hotel offers you a Futuristic Conference Hall and Business Center</b><br/>
                    It is equipped with the state-of-the-art facilities like LCD projectors and sound & light systems,
                    which are ideal for conferences, corporate meetings, seminars and workshops for up to 20 to 200
                    people.

                </div>
                <div style="clear: both; height:20px;"></div>
            </div>
        </div>
        <!-- footer begins -->
        <div id="footer">
            Copyright 2018. Designed by <a href="https://www.facebook.com/munaf.vhora" title="Website Templates">Munaf
                Vhora</a><br/>
            <a href="policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Use</a>
        </div>
        <!-- footer ends -->


    </div>
</div>
<!-- bottom end -->

</body>
</html>
