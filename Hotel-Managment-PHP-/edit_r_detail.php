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

                if ($(this).hasClass('active')) $(this).find('span').php('&#x25B2;')
                else $(this).find('span').php('&#x25BC;')
            })
        });
    </script>
    <script>
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
            <!-- content begins -->

            <div id="cust">
                <h1>Manage Rooms</h1>
                <?php
                $con = mysql_connect('localhost', 'root', '');
                if ($con) {
                    mysql_select_db("hms", $con);

                    echo "<div>";
                    //print_r($_POST);
                    if (isset($_REQUEST['action'])) {
                        $Rn = "";
                        $Rt = "";
                        $bed = "";
                        $price = "";
                        echo '<form id="booking-form" class="booking-form" name="form1" method="POST">';
                        if ($_REQUEST['action'] == 'edit' or $_REQUEST['action'] == 'delete') {
                            $Rno = $_REQUEST['no'];
                            $result = mysql_query("select * from room_detail where Room_no='$Rno'");

                            $row = mysql_fetch_array($result);
                            $Rn = $row['Room_no'];
                            $Rt = $row['Rm_type'];
                            $bed = $row['Rm_No_bed'];
                            $price = $row['Rm_price'];
                        }

                        if (isset($_POST['save'])) {
                            $Rn = $_POST['rn'];
                            $Rt = $_POST['rt'];
                            $bed = $_POST['bed'];
                            $price = $_POST['rp'];

                            if ($_REQUEST['action'] == 'edit') {
                                $Rn = $row['Room_no'];
                                $change = mysql_query("update Room_detail set Rm_No_bed='$bed' ,Rm_price='$price' where Room_no='$Rn'");//Rm_type='$Rt'
                                if ($change > 0) {
                                    echo "Your profile updated successfully...";
                                    header("location:room.php");
                                }
                            } else if ($_REQUEST['action'] == 'new') {
                                $insert = mysql_query("insert into Room_detail values($Rn,'$Rt',$bed ,$price)");
                                if ($insert > 0) {
                                    echo "Your profile inserted successfully...";
                                    header("location:room.php");
                                    /*$rid=mysql_insert_id($con);
                                    echo $rid;*/
                                }

                            } else if ($_REQUEST['action'] == 'delete') {
                                $Rn = $row['Room_no'];
                                $delete = mysql_query("delete from room_detail where Room_no='$Rn'");
                                if ($delete > 0) {
                                    echo "delete successfully..";
                                    header("location:room.php");
                                }
                            }
                        }
                        ?>

                        <div id="form-content">

                            <div class="group">
                                <label for="Room_no">Room No:</label>
                                <div><input id="Room_no" name="rn" value='<?php echo $Rn; ?>' class="form-control"
                                            type="text" placeholder="Room No" onkeypress="return Numbers(event);"
                                            value="<?php ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?> required></div>
                            </div>

                            <div class="group">
                                <label for="Room_type">Room Type:</label>
                                <div>
                                    <?php if ($_REQUEST['action'] == 'delete' or $_REQUEST['action'] == 'edit')
                                    {
                                    $Rno = $_REQUEST['no'];
                                    $result = mysql_query("select * from room_detail where Room_no='$Rno'");
                                    $row = mysql_fetch_array($result);
                                    $Rt = $row['Rm_type'];
                                    ?>
                                    <select name='rt' required disabled class="form-control">
                                        <option value='.<?php echo $Rt; ?>.'> <?php echo $Rt; ?> </option>
                                        <!--<option value='deluxe' >Deluxe</option>
                                        <option value='luxury' >Luxury</option>
                                        <option value='standard' >Standard</option>
                                        <option value='superior' >Superior</option>-->
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <select name='rt' required class="form-control">
                                            <option value='deluxe'>Deluxe</option>
                                            <option value='luxury'>Luxury</option>
                                            <option value='standard'>Standard</option>
                                            <option value='superior'>Superior</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>

                            <div class="group">
                                <label for="Room_bed">Room Bed:</label>
                                <div>
                                    <select name='bed' required class="form-control"
                                    <?php
                                    if ($_REQUEST['action'] == 'delete') {
                                        echo ' disabled ';
                                    }


                                    echo ">
							<option value='1' ";
                                    if ($bed == '1') {
                                        echo " selected ";
                                    }
                                    echo ">1</option>
							<option value='2'";
                                    if ($bed == '2') {
                                        echo " selected ";
                                    }
                                    echo ">2</option>
							<option value='3' ";
                                    if ($bed == '3') {
                                        echo " selected ";
                                    }
                                    echo ">3</option>
							<option value='4'";
                                    if ($bed == '4') {
                                        echo " selected ";
                                    }
                                    echo ">4</option></select>";
                                    ?>
                                </div>
                            </div>

                            <div class="group">
                                <label for="Room_price">Room Price:</label>
                                <div><input id="Room_price" name="rp" value='<?php echo $price; ?>' class="form-control"
                                            type="text" onkeypress="return Numbers(event);" placeholder="Room Price"
                                            value="<?php ?>"
                                        <?php
                                        if ($_REQUEST['action'] == 'delete') {
                                            echo ' disabled  ';
                                        }
                                        ?> required></div>
                            </div>

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
                                    </form>
                                    <form method="POST">
                                        <div style='float:right;width:100px;'><input name="back" type="submit"
                                                                                     value="cancel"/></div>
                                </div>

                            </div>

                        </div>
                        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                        <?php
                        echo "</form>";
                        if (isset($_POST['back'])) {
                            echo "<script language='javascript'>window.open('room.php','_top');</script>";
                        }
                    }                //end action
                }                    //end connection
                ?>

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
