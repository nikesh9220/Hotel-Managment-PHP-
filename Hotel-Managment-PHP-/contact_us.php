<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Sunrise</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
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
                                <h2><font size='2px'>The five star hotel</font></h2>
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
            <!-- header begins -->


            <!-- header ends -->

            <!-- content begins -->
            <div id="content" style=" background: #A2A2A2;">
                <div id="left_us">
                    <h1>Find Us</h1>
                    <div style="height:10px"></div>
                    <!-- <img src="images/img51.jpg" alt="" /> -->
                    <iframe style="border: 0;" src="https://www.google.com/maps?q=Toronto,Canada&amp;output=embed" width="276"
                            height="197" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    <div style="height:8px"></div>
                    <a class="a_und" style="color: #972C24" href="map/map.html" target="_TOP">View Larger Map</a>
                    <div style="height:8px"></div>
                    <h1>Our Info</h1>
                    <div style="height:5px"></div>
                    <span class="lh">
            <?php
            $con = mysql_connect('localhost', 'root', '');
            if ($con) {
                mysql_select_db("hms", $con);


                $result = mysql_query("select * from company");
                $row = mysql_fetch_array($result);

                echo "<table><tr><td>The " . $row['H_Name'] . " Hotel</td></tr><tr><td>" . $row['Address'] . "</td></tr><tr><td>" . $row['Email'] . "</td></tr><tr><td>" . $row['Contact'] . "</td></tr></table>";
                $name = $row['H_Name'];
                $address = $row['Address'];
                $email = $row['Email'];
                $contact = $row['Contact'];
                if (isset($_SESSION['A_id'])) {
                    if (!isset($_POST['edit'])) {
                        echo "<center><form method='POST'><p><input type='submit' name='edit' value='Edit'></form></p></center>";
                    } else {

                    }
                }

                if (isset($_POST['edit'])) {
                    echo "<table><form name='form' method='POST' onsubmit='return validate();'>";
                    echo "<tr><td>Hotel Name:</td><td><input type='text' name='name' value='$name'></td></tr>";
                    echo "<tr><td>Address:</td><td><input type='text' name='address' value='$address'></td></tr>";
                    echo "<tr><td>Email:</td><td><input type='text' name='email' value='$email'></td></tr>";
                    echo "<tr><td>Contact no:</td><td><input type='text' name='contact' value='$contact' onkeypress='return Numbers(event);'></td></tr>";
                    echo "<tr><td align='left'><input class='submit button' type='submit' name='submit' value='Submit' ></td>";
                    echo "<td align:right><input type='submit' name='back' value='Back'></td></tr></table>";
                }

                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $edit = $_POST['email'];
                    $contact = $_POST['contact'];
                    $change = mysql_query("update company set Address='$address', Email='$edit', Contact='$contact', H_Name='$name' ");
                    if ($change > 0) {
                        echo "updated";
                        header("location:contact_us.php ");
                    }
                }

                if (isset($_POST['back'])) {
                    echo "<script language='javascript'> window.open('contact_us.php','_top')</script>";
                }
            }
            ?>
            </span>
                    <div style="height:20px"></div>
                </div>
                <div id="right_us">

                    <h1>Contact Us</h1>
                    <div style="height:8px"></div>
                    <b>you can contact us for booking a conferences hall, rooms.It is equipped with the state-of-the-art
                        facilities like LCD projectors and sound & light systems, which are ideal for conferences,
                        corporate meetings, seminars and workshops for up to 20 to 200 people.</b></br><b>If you have
                        require any clarifications about this private policy, kindly contact us at:</b>
                    <div style="height:20px"></div>
                    <form action="" method="post">
                        <div><input class="input_txt2" name="Name2" placeholder="enter your name" type="text"/></div>
                        <div style="height:6px"></div>
                        <div><input class="input_txt2" placeholder="enter your email" name="Name" type="text"/></div>
                        <div style="height:6px"></div>
                        <div><input class="input_txt2" placeholder="enter your subject" name="Name" type="text"/></div>
                        <div style="height:6px"></div>
                        <div><textarea class="text_area2" cols="32" rows="3" name="Message"
                                       placeholder="enter your message for contact us"></textarea></div>
                        <div style="height:10px"></div>
                        <div>
                            <input class="submit2" name="click" type="submit" value="submit"/>
                            <a><input class="submit2" name="Submit2" type="submit" value="reset"/>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['click'])) {
                        echo "<script language='javascript'>window.open('index.php','');</script>";
                    }

                    ?>


                </div>
                <div style="clear: both;"></div>


            </div>
            <!-- content ends -->
            <div style="height:35px; width: 100%;"></div>

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
                                <li><img src="images/fu_i4.png" class=" fu_i" alt=""/><a href="#">Follow us on
                                        Twitter</a></li>
                            </ul>
                        </div>

                        <div id="b_col3">
                            <h1>Contact Us</h1>
                            <div style="height:15px"></div>
                            <div class="lh">
                                The Sunrise<br/>
                                RadheKishan villa,Toronto, Canada<br/>
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
                            It is equipped with the state-of-the-art facilities like LCD projectors and sound & light
                            systems, which are ideal for conferences, corporate meetings, seminars and workshops for up
                            to 20 to 200 people.

                        </div>
                        <div style="clear: both; height:20px;"></div>
                    </div>
                </div>
                <!-- footer begins -->
                <div id="footer">
                    Copyright 2018. Designed by <a href="https://www.facebook.com/munaf.vhora"
                                                   title="Website Templates">Munaf Vhora</a><br/>
                    <a href="policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Use</a>
                </div>
                <!-- footer ends -->


            </div>
        </div>
        <!-- bottom end -->

    </div>


</body>
</html>
