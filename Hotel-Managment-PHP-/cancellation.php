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
            <!-- header begins -->
            <?php
            $con = mysql_connect('localhost', 'root', '');
            if (!$con) {
                die('database not connect');
            }
            mysql_select_db("hms", $con);

            $email = '';
            $reserve = '';
            if (isset($_POST['email']) and isset($_POST['reserve'])) {
                $email = $_POST['email'];
                $reserve = $_POST['reserve'];
            }
            if (!isset($_POST['go'])) {
                ?>
                <form id="booking-form" class="booking-form" name="form1" method="post">
                    <div class="h1">Cancel Booking</div>
                    <div id="form-content">
                        <div class="group">
                            <label for="email">Enter Email id</label>
                            <div><input id="email" name="email" class="form-control" type="text"
                                        value='<?php if (isset($_SESSION['U_id'])) {
                                            echo $_SESSION['U_id'];
                                        } ?>' <?php if (isset($_SESSION['U_id'])) { ?> disabled <?php } ?>
                                        placeholder="Email" required></div>
                        </div>
                        <div class="group">
                            <label for="reserve">Enter Reservation id</label>
                            <div><input id="reserve" name="reserve" class="form-control" type="text"
                                        value="<?php echo $reserve; ?>" placeholder="Reservation id" required></div>
                        </div>
                        <div class="group submit">
                            <label class="empty"></label>
                            <div><input name="go" type="submit" value="go"/></div>
                        </div>
                    </div>
                </form><br>
                <?php
            }
            if (isset($_POST['go'])) {

                if (!isset($_SESSION['U_id'])) {
                    ?>
                    <script type="text/javascript">
                        alert("Please Login First");
                        window.location.replace("ndex.php");
                    </script>
                    <?php
                }

                echo "<pre>";
                //print_r($_POST);
                echo "</pre>";
                // $email=$_POST['email'];
                $email = $_SESSION['U_id'];
                $reserve=$_POST['reserve'];

                $result = mysql_query("select rd.R_id,Cu_name,Cu_Mo_no,Cu_Email_id,Check_in,Check_out,Room_no,R_date from
customer_info,reservation_detail as rd,re_master as rm where
rd.r_id='$reserve' and rm.r_id=rd.r_id and rm.r_cu_id=customer_info.cu_id and Cu_Email_id='$email'");
//print_r($reserve);
//exit;
                if (mysql_num_rows($result) > 0) {
                    while (($row = mysql_fetch_array($result)) > 0) {    //$h=$row['Room_no'];
                        //$row=mysql_fetch_array($result);
                        echo "<pre>";
                        //print_r($row);
                        echo "</pre>";
                        $rid = $row['R_id'];
                        $name = $row['Cu_name'];
                        $no = $row['Cu_Mo_no'];
                        $email = $row['Cu_Email_id'];

                        $_SESSION['email'] = $email;
                        $_SESSION['rid'] = $rid;

                        $rdate = $row['R_date'];
                        $room[] = $row['Room_no'];
                        $checkin = $row['Check_in'];
                        $checkout = $row['Check_out'];
                        $_SESSION['Check_in'] = $checkin;
                        $_SESSION['Check_out'] = $checkout;


                    }
                    echo "<center>";
                    echo "<form id='booking-form' class='booking-form' name='form2' method='post'><h2>Your info</h2><table>";
                    echo "<tr><td>Reservation Id:</td><td>" . $rid . "</td></tr>";
                    echo "<tr><td>Name:</td><td>" . $name . "</td></tr>";
                    echo "<tr><td>Mobile no:</td><td>" . $no . "</td></tr>";
                    echo "<tr><td>Email id:</td><td>" . $email . "</td></tr>";
                    echo "<tr><td>Reserve Date:</td><td>" . $rdate . "</td></tr>";
                    echo "<tr><td>Room no:</td><td>";
                    //print_r($room);

                    //print_r($ck1);

                    foreach ($room as $key => $v) {
                        $check = mysql_query("select Room_no from C_detail where R_id='$rid' and room_no='$v' ");

                        $ck = mysql_fetch_array($check);
                        $ck1 = $ck['Room_no'];

                        if ($v != $ck1) {
                            echo $v . "<input style='margin:7px' type='checkbox' value='" . $v . "' name='can[]'>" . "<br>";
                        } else {
                            echo "<font size='5px' color='#123456' >" . "sry " . $v . "No. room already canceled" . "</font><br>";

                        }

                        /*if(msql_num_rows($check)>0)
                        {*/

                        }
                    }
                    /*$row1=mysql_fetch_array($result);
                    do
                    {
                    echo $row['Room_no']."<input type='checkbox' value='".$row['Room_no']."' name='can[]' ><br>";
                    }while(($row1=mysql_fetch_array($result))>0);*/
                    echo "</td></tr>";
                    echo "<tr><td>Check in:</td><td>" . $checkin . "</td></tr>";
                    echo "<tr><td>Check out</td><td>" . $checkout . "</td></tr>";
                    echo "<input type='hidden' name='rid' value={$row['R_id']}>";
                    echo "<input type='hidden' name='mo' value={$row['Cu_Mo_no']}>";
                    echo "<input type='hidden' name='email' value={$row['Cu_Email_id']}>";
                    echo "<input type='hidden' name='rdate' value={$row['R_date']}>";
                    echo "<input type='hidden' name='rno' value={$row['Room_no']}>";


                    echo "<tr><td>";
                    if ($v != $ck1) {
                        echo "<input type='submit' name='cancel' value='Cancel Reservation'>";
                    } else {
                        echo "<td><input type='submit' name='back' value='Back'></td>";
                    }
                    echo "</td></tr>";
                    echo "</table></form>";
                    echo "<div style='height:35px'></div>";
//                }
            }
            if (isset($_POST['back'])) {
                echo "<script language='javascript'>window.open('index.php','_top');</script>";
            }
            if (isset($_POST['cancel']) && isset($_POST['can'])) {
                echo "<pre>";
  //              print_r($_POST);
//                print_r($_SESSION);
                echo "</pre>";

                $rid = $_SESSION['rid'];
              //  print_r($rid);
                $mo = $_POST['mo'];
                $email = $_SESSION['email'];
                $rno = $_POST['rno'];
             //   print_r($rno);
                $cid = mysql_insert_id($con);

                $can = $_POST['can'];

                /*$select1=mysql_query("select last_insert_id() as n_id1 from re_master");
$                $row1=mysql_fetch_array($select1);
                $new_id1=$row1['n_id1'];*/

                $result = mysql_query("INSERT INTO c_master values ('$cid',sysdate())");



                $select1 = mysql_query("SELECT Max(C_id) FROM c_master ");
               // $result = mysql_query($query);
                $rec = mysql_fetch_row($select1);
              //  print(Max($rec['C_id']));

                //print_r($rec);
               // $result1=mysql_query("UPDATE reservation_detail SET C_id=$select1");


                $row1 = mysql_fetch_array($select1);
                $new_id1 = $select1;
                $total = 0;
                foreach ($can as $key => $v) {
                    echo $v . "<br>";

                    $insert_cd = mysql_query("INSERT INTO C_detail(C_id,R_id,Cu_Email_id,Room_no) values($new_id1,$rid,'$email',$v)");
                    $room = mysql_query("select price from reservation_detail where room_no='$v'");
                    $rm = mysql_fetch_array($room);
                    $total = ($total + $rm['price']);
                    $change = mysql_query("update reservation_detail set  C_id=$rec[0]  where Room_no=$v and R_id=$rid");
                    //$row=$rec['C_id'];
                   // echo "C_Id== $rec[0]";
                   // echo "Room_no== $v";

                    //echo "Room_Id== $rid";
                   // exit;
                    if ($insert_cd > 0) {
                       // exit;
                        ?>
                        <script type="text/javascript">
                            alert('cancellation is successful');
                            window.location.replace("reserve.php");
                        </script>
            <?php
                        echo "<br><br>cancellation is successful";
                    }
                }
                //$cr=date_create(timezone_open("Asia/Kolkata"));

                //if ($check_in!=date_format($cr,"Y-m-d"))
                $check_in = $_SESSION['Check_in'];
                if ($check_in != date("Y-m-d")) {
                    $total = $total * 75 / 100;
                    $select = mysql_query("select last_insert_id() as n_id");

                    $row = mysql_fetch_array($select);
                    $new_id = $row['n_id'];

                    $pay = mysql_query("select * from payment where R_id='$rid'");
                    $pays = mysql_fetch_array($pay);

                    $mode = $pays['P_mode'];
                    $c_no = $pays['Card_no'];
                    $c_name = $pays['Card_H_name'];
                    $cvv_no = $pays['Cvv_no'];
                    $month = $pays['Exp_month'];
                    $year = $pays['Exp_year'];

                    $result = mysql_query("insert into payment(P_type,P_date,C_id,P_mode,Card_no,Card_H_name,Cvv_no,Exp_month,Exp_year,Total_amt) values('Refund',sysdate(),'$new_id1','$mode','$c_no','$c_name','$cvv_no','$month','$year','$total')");

                    if ($result > 0) {
                        echo "<br><br>refund is successful";
                    }
                } else {
                    echo "<br>" . "no money refunded";
                }
            }

            //$result1=mysql_query("INSERT INTO c_detail values('$new_id','$new_id1,'$email',");

            ?>
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
</div>
</body>
</html>