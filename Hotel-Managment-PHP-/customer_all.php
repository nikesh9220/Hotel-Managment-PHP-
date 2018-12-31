<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <style type='text/css'>

    </style>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>sunrise</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="main.css" type="text/css">
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
    <script>
        function validate() {
            if (document.form1.save.value) {
                var name = document.form1.name.value;
                if (name == null || name == "") {
                    alert("Enter your name");
                    document.form1.name.focus();
                    return false;
                }

                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                var addr = document.form1.email.value;
                if (reg.test(addr) == false) {
                    alert('Invalid E-mail address');
                    document.form1.email.focus();
                    return false;
                }

                var number = document.form1.no.value;
                if (number == null || number == "") {
                    alert("Enter your number");
                    document.form1.no.focus();
                    return false;
                }
                if ((number.length < 10) || (number.length > 10)) {
                    alert("Mobile Number must be 10 Digit");
                    document.form1.no.focus();
                    return false;
                }

                var tname = document.form1.address.value;
                if (tname == null || tname == "") {
                    alert("Enter your address");
                    document.form1.address.focus();
                    return false;
                }
                var tname = document.form1.city.value;
                if (tname == null || tname == "") {
                    alert("Enter your city");
                    document.form1.city.focus();
                    return false;
                }
                var tname = document.form1.state.value;
                if (tname == null || tname == "") {
                    alert("Enter your state");
                    document.form1.state.focus();
                    return false;
                }
                var number = document.form1.postal.value;
                if (number == null || number == "") {
                    alert("Enter your Postal code");
                    document.form1.postal.focus();
                    return false;
                }
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
                                <h2><a href="index.php" id="metamorph">The five star hotal</a></h2>
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
    <div>
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

        <div id="main" style='padding-top:50px'>
            <!-- header begins -->

            <!-- header ends -->
            <!-- content begins -->
            <div id="custo">

                <?php
                //print_r($_REQUEST);
                $con = mysql_connect('localhost', 'root', '');

                if (!$con) {
                    die('database not connect');
                }
                mysql_select_db('hms', $con);

                if (isset($_REQUEST['action'])) {
                    $cu_id = '';
                    $name = '';
                    $num = '';
                    $email = '';
                    $address = '';
                    $city = '';
                    $state = '';
                    $postal = '';

                    if ($_REQUEST['action'] == 'delete' or $_REQUEST['action'] == 'edit') {
                        $cu_id = $_REQUEST['id'];

                        $result = mysql_query("select * from customer_info where Cu_id='$cu_id'");
                        $row = mysql_fetch_array($result);
                        $name = $row['Cu_name'];
                        $num = $row['Cu_Mo_no'];
                        $email = $row['Cu_Email_id'];
                        $address = $row['Cu_Address'];
                        $city = $row['Cu_City'];
                        $state = $row['Cu_State'];
                        $postal = $row['Cu_Postal_code'];

                    }
                    if (isset($_POST['save'])) {
                        //$id=$_POST['id'];
                        $name = $_POST['name'];
                        $num = $_POST['no'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];
                        $state = $_POST['state'];
                        $postal = $_POST['postal'];

                        print_r($_POST);
                        if ($_REQUEST['action'] == 'edit') {
                            $id = $row['Cu_id'];
                            $change = mysql_query("update customer_info set Cu_name='$name' , Cu_Mo_no='$num', Cu_Email_id='$email', Cu_Address='$address', Cu_City='$city', Cu_State='$state', Cu_Postal_code='$postal' where Cu_id=$id");
                            if ($change > 0) {
                                echo "Updates successfully";
                                header("location:customer.php");
                            }
                        } elseif ($_REQUEST['action'] == 'new') {
                            $insert = mysql_query("insert into customer_info (Cu_name,Cu_Mo_no, Cu_Email_id,Cu_Address,Cu_City,Cu_State,Cu_Postal_code) values ('$name','$num','$email','$address','$city','$state',$postal)");
                            if ($insert > 0) {
                                echo "Inserted";
                                header("location:customer.php");
                            }
                        } elseif ($_REQUEST['action'] == 'delete') {
                            $id = $row['Cu_id'];
                            $change = mysql_query("delete from customer_info where Cu_id=$id");
                            if ($change > 0) {
                                echo "Deleted successfully";
                                header("location:customer.php");
                            }
                        }
                    }

                    ?>
                    <form id="booking-form" class="booking-form" name="form1" method="POST">
                        <!--action="" onsubmit='return validate();'-->
                        <!-- <div align="center"><img class="logo" src="img/example_logo.png" title="Example Logo" alt="Example Logo"></div>-->
                        <div class="h1"><?php

                            if ($_REQUEST['action'] == 'new') {
                                echo "Add Customer";
                            } elseif ($_REQUEST['action'] == 'edit') {
                                echo "Customer Edit Form";
                            } elseif ($_REQUEST['action'] == 'delete') {
                                echo "Customer delete Form";
                            }


                            ?></div>
                        <div id="form-message" class="message hide">
                            Thank you for your enquiry!
                        </div>
                        <div id="form-content">

                            <div class="group">
                                <label for="name">Name</label>
                                <div><input id="name" name="name" class="form-control" type="text" placeholder="Name"
                                            value="<?php echo $name; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?> ></div>
                            </div>
                            <div class="group">
                                <label for="email">Email</label>
                                <div><input id="email" name="email" class="form-control" type="email"
                                            placeholder="Email" value="<?php echo $email; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?>></div>
                            </div>
                            <div class="group">
                                <label for="mono">Mobile No.</label>
                                <div><input id="mono" name="no" class="form-control" type="text"
                                            placeholder=' Mobile number' min-length='10'
                                            onkeypress='return Numbers(event);' autocomplete='off'
                                            value="<?php echo $num; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?>></div>
                            </div>

                            <div class="group">
                                <label for="address">Address</label>
                                <div><input id="address" name="address" class="form-control" type="text"
                                            placeholder="Address" value="<?php echo $address; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?>></div>
                            </div>
                            <div class="group">
                                <label for="City">City</label>
                                <div><input id="city" name="city" class="form-control" type="text" placeholder="city"
                                            value="<?php echo $city; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?>></div>
                            </div>
                            <div class="group">
                                <label for="State">State</label>
                                <div><input id="state" name="state" class="form-control" type="text" placeholder="State"
                                            value="<?php echo $state; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?>></div>
                            </div>
                            <div class="group">
                                <label for="postal code">Postal code</label>
                                <div><input id="pc" name="postal" class="form-control" type="text"
                                            placeholder="postal code" onkeypress='return Numbers(event);'
                                            value="<?php echo $postal; ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }

                                        ?>></div>
                            </div>
                            <!-- <div class="group">
                                 <label for="special-requirements">Special requirements</label>
                                 <div><textarea id="special-requirements" name="special-requirements" class="form-control" cols="" rows="5" placeholder="Special requirements"></textarea></div>
                             </div>-->
                            <div class="group submit">
                                <label class="empty"></label>
                                <div>
                                    <div style='float:left;width:100px;'><?php
                                        if ($_REQUEST['action'] == 'new' || $_REQUEST['action'] == 'edit') {
                                            echo '<input name="save" type="submit" value="Save" onclick="return validate();"/>';
                                        } elseif ($_REQUEST['action'] == 'delete') {
                                            echo '<input name="save" type="submit" value="DELETE" onclick="return validate();"/>';
                                        }
                                        ?></div>
                                    <div style='float:right;width:100px;'><input name="cancel" type="submit"
                                                                                 value="cancel"/></div>
                                </div>

                            </div>

                        </div>
                        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                    </form>
                    <?php
                    /*echo"<form method='POST'>";
                    echo "<td align='right'><input type='submit' name='cancel' value='cancel'></td></tr></table>";
                    echo "</form>";*/


                    if (isset($_POST['cancel'])) {
                        echo "<script language='javascript'>window.open('customer.php','_top');</script>";
                    }
                }
                ?>
            </div>
        </div>
        <div style="clear: both;"></div>

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
                            <li><img src="images/fu_i4.png" class=" fu_i" alt=""/><a href="#">Follow us on Twitter</a>
                            </li>
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
                        It is equipped with the state-of-the-art facilities like LCD projectors and sound & light
                        systems, which are ideal for conferences, corporate meetings, seminars and workshops for up to
                        20 to 200 people.

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
