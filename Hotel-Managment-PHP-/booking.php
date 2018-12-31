<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>sunrise</title>
    <script>
        function validate() {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form1.cid.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form1.cid.focus();
                return false;
            }
        }
    </script>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
    <script type='text/javascript' src='loginjquery.min.js'></script>
    <link rel="stylesheet" href="login.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="main.css">
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
    <!--<style type='text/css'>
                #gfeed div{
                    border:2px solid #F2F2F2;
                    padding:10px 40px;
                    background:#ADADAD ;
                    width:400px;
                    border-radius:20px;
                    margin:12px 12px;
                    }
                #gfeed table td{
                    width:110px;

                }
                <!#gfeed body{
                    color: #6D6D6D;
                    background: #f5f5f5;
                    font-family: inherit;
                }

        </style>
    -->
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
				<li><a href='photos.php' class='but'>Gallery</a></li>
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


            <form action='booking_new.php' name='form' class='booking-form' method='POST' onsubmit='return validate();'>
                <div class="h1">Booking</div>
                <div id="form-content">

                    <div class="group">
                        <label for="cid">Enter Email id:</label>
                        <div><input id="cid" name="cid" class="form-control" type="email"
                                    value='<?php if (isset($_SESSION['U_id'])) {
                                        echo $_SESSION['U_id'];
                                    } ?>' <?php if (isset($_SESSION['U_id'])) { ?> disabled <?php } ?>
                                    placeholder="Email" autofocus></div>
                    </div>

                    <div class="group submit">
                        <div><input name="search" type="submit" value="search"/></div>
                    </div>
                </div>
            </form>

            <div style="padding-top: 70px;"></div>

            <!-- content ends -->
            <div style="height:35px"></div>

        </div>
    </div>
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

</div>


</body>

</html>