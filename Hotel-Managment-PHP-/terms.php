<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>sunrise</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
    <script type='text/javascript' src='loginjquery.min.js'></script>
    <link rel="stylesheet" href="login.css" type="text/css" media="screen"/>
    <style type="text/css">
        div.background {
            width: 100%;
            height: 100%;
            background: url(klematis.jpg) repeat;

        }

        div.padd {
            padding-left: 20px;
        }

        div.transbox {
            align: center;
            width: 100%;
            height: 100%;
            margin: 30px 50px;
            background-color: #FFFFFF;
            border: 1px solid black;
            /* for IE */
            filter: alpha(opacity=60);
            /* CSS3 standard */
            opacity: 0.7;
        }

        div.transbox b {
            padding-left: 15px;
            font-weight: bold;
            color: #FF5604;
        }

    </style>

    <script>
        function validate() {
            var name = document.form.address.value;

            if (name == null || name == "") {
                alert("Enter Address");
                document.form.address.focus();
                return false;
            }

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form.email.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form.email.focus();
                return false;
            }
            var number = document.form.contact.value;
            if (number == null || number == "") {
                alert("Enter your number");
                document.form.contact.focus();
                return false;
            }

            if ((number.length < 10) || (number.length > 10)) {
                alert(" Your Mobile Number must be 1 to 10 Integers");
                document.form.number.select();
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
    <!-- header begins -->
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

        <div id="main"><!-- header ends -->

            <div class="background">
                <div class="transbox">

                    <h1><b>
                            <center>Terms & Conditions</center>
                        </b></h1>
                    <br>
                    <div class="padd">
                        <font color="#A85400"><b>General</b><br>

                            <div class="padd">Please take time to read these terms and conditions governing the
                                "www.sunrise.com" website. By accessing this website, you agree to accept, without
                                limitation or criterion, all of these terms and conditions of use. If you do not agree
                                to these terms, please do not use the site.
                            </div>
                            <br><br>
                            <b>Site Availability</b><br>

                            <div class="padd">The Site is accessible worldwide to anyone with Internet access. However,
                                the Site may not be continuously available due to maintenance or repairs or due to
                                computer problems or crashes, disruption in Internet service or other unforeseen
                                circumstances.
                            </div>
                            <br><br>
                            <b>Use of www.sunrise.com</b><br>

                            <div class="padd">You may only use this website to make genuine and valid reservations or
                                purchases. You may not use this website to make any fraudulent, false and exploratory
                                reservation. You will be financially liable for all uses of this website. You will be
                                responsible to keep your passwords, login and account information in confidentiality.
                            </div>
                            <br>
                            <b>Reservations, Amendent and Canellation</b><br>

                            <div class="padd">All reservations are subject to availability. Reservations made on this
                                site are considered conditional until a confirmation number is given to the guest to
                                substantiate the reservations by email or fax. The hotel may, from time to time,
                                communicate with the guests, to re-confirm the reservations and to prevent any simulated
                                bookings.
                            </div>
                            <br>

                            <div class="padd">Should the guests wish to amend any reservations, modifications may be
                                made on the website at the earliest convenience. The Hotel will not be liable should it
                                fail to provide its products and services due to unavailability.
                            </div>
                            <br>

                            <div class="padd">In the event that the hotel, for reasons beyond its control, need to
                                reject or change a confirmed reservations it will use all reasonable attempt to
                                facilitate the circumstances however if no alternative is provided to the Client, the
                                hotel will return any deposit made and considered it cancelled. This is the limit of the
                                hotel's liability.
                            </div>
                            <br>

                            <div class="padd">The Sunrise hotel reserves the right to impose a cancellation fee of per
                                room per night in the event of a late cancellation notice or a no-show at the hotel.
                            </div>
                            <br>

                            <div class="padd">Royal Orchid Hotels does not guarantee acknowledgement of reservations or
                                transactions made on this site arising from unforeseen circumstances, omissions or
                                errors that may sometimes occur.
                            </div>
                            <br>
                            <b>Charges and Payment Terms?</b><br>

                            <div class="padd">Sunrise Hotel reserves the right to charge a deposit, where applicable, on
                                confirmation of a reservation. If the payment are not complied with, we hold the right
                                to cancel the booking without liability and retain the deposit. Where a deposit is
                                required, payment can be settled by major credit card or in the event where no credit
                                card is available, settlement in cash is necessary to facilitate the booking procedures.
                            </div>
                            <br>
                            <b>Internet Rates</b><br>

                            <div class="padd">Sunrise Hotel reserves the right to change, modify and adjust the rates
                                with or without prior notice. The rates are governed and subjected by terms and
                                conditions stipulated by hotel.
                            </div>
                            <br>
                            <b>Special Offers and Promotions</b><br>

                            <div class="padd">Offers and Promotions are subject to specific terms, conditions and
                                restrictions listed on the site. We reserve the right to modify or alter any program,
                                offer or promotion at any time.
                            </div>
                            <br>
                            <b>Limitation of Liability and Disclaimer</b><br>

                            <div class="padd">Sunrise Hotel does not warrant that errors or omissions may sometimes
                                occur. Sunrise Hotel does not warrant the accuracy, timeliness, currency and
                                completeness of the contents, including without limitation, any information relating to
                                rates and room availability. Royal Orchid Hotels disclaims any warranty of any kind,
                                whether express or implied, as to any matter whatsoever relating to this web site and
                                other worldwide web links including without limitation, as to the merchantability or
                                fitness for any particular purpose.
                            </div>
                            <br>

                            <div class="padd">Sunrise Hotel will not be responsible for any damages including without
                                limitation, damages for loss of profits arising in contract or from your use or
                                inability to use this site.
                            </div>
                            <br>

                            <div class="padd">Sunrise Hotel does not guarantee that this site is free from infection by
                                viruses and shall not be liable for any damages or loss.
                            </div>
                            <br>

                            <div class="padd">In no event shall Royal Orchid Hotels nor its subsidiaries, agents,
                                divisions, affiliates, representatives or licensors be liable to any indirect,
                                incidental or consequential damages whatsoever (including, without limitation, damages
                                for loss of profits or loss of information) arising from use or inability to use the
                                contents, even if Royal Orchid Hotels has been informed of the possibility of such
                                damages.
                            </div>
                            <br>

                            <div class="padd">The Site may contain links to other World Wide Web sites, either directly
                                or indirectly and, where possible, we will make clear where such links are being made.
                                Those sites are provided by independent third parties and Royal Orchid Hotels is not
                                responsible for their availability or content.
                            </div>
                        </font></div>

                </div>
            </div>

            <!-- content begins -->


        </div>

    </div>
    <div style="clear: both;"></div>
</div>
<!-- content ends -->
<div style="height:35px"></div>

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
