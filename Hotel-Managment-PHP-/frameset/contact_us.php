<html>
<head>
    <style type='text/css'>
        div {
            border: 2px none #F2F2F2;
            padding: 10px 40px;
            background: #f5f5f5;
            width: 400px;
            border-radius: 20px;
            margin: 12px 12px;
        }

        h1 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
        }

        h4 {
            margin-bottom: 10px;
            font-family: inherit;
            font-size: 25px;
            line-height: 0px;
        }

        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

        strong {
            font-weight: bold;

        }

        address {
            display: block;
            margin-bottom: 10px;
            font-style: normal;
            line-height: 20px;
        }

        address span {
            margin-top: 10px;
            display: block;
        }

    </style>
</head>
<body>
<h1>Contact Us</h1>
<p>
<div>
    <?php
    $con = mysql_connect('localhost', 'root', '');
    if ($con) {
        mysql_select_db("hms", $con);
        session_start();

        $result = mysql_query("select * from company");
        $row = mysql_fetch_array($result);

        //echo $row['H_Name']."<br>".$row['Address']."<br>Email:".$row['Email']."<br>Contact no:".$row['Contact'];
        echo "
			<address>
				<strong><h4>The " . $row['H_Name'] . "</h4></strong><br>
				<span>" . $row['Address'] . "</span><br>
				<span>Toronto,Canada.</span><br>
				<span><strong>Phone:</strong>+1-" . $row['Contact'] . "</span><br>
				<span><strong>Email:</strong><a href='#'>&nbsp;" . $row['Email'] . " </a></span><br> 
				<span><strong>Website:</strong><a href='#'></a></span><br>
			</address>";
        $h_name = $row['H_Name'];
        $address = $row['Address'];
        $email = $row['Email'];
        $contact = $row['Contact'];
        if (isset($_SESSION['A_id'])) {
            if (!isset($_POST['edit'])) {
                echo "<form method='POST'><p align='right'><input type='submit' name='edit' value='Edit'></p>";
            } else {

            }
        }

        if (isset($_POST['edit'])) {
            echo "<table><form name=EDIT method='POST'>";
            echo "<tr><td>Hotel Name:</td><td><input type='text' name='h_name' value='$h_name'></td></tr>";
            echo "<tr><td>Address:</td><td><input type='text' name='address' value='$address'></td></tr>";
            echo "<tr><td>Email:</td><td><input type='text' name='email' value='$email'></td></tr>";
            echo "<tr><td>Contact no:</td><td><input type='text' name='contact' value='$contact'></td></tr>";
            echo "<tr><td><input type='submit' name='back' value='Back'></td>";
            echo "<td><input type='submit' name='submit' value='Submit'></td></tr></table>";
        }

        if (isset($_POST['submit'])) {
            $h_name = $_POST['h_name'];
            $address = $_POST['address'];
            $edit = $_POST['email'];
            $contact = $_POST['contact'];
            $change = mysql_query("update company set H_Name='$h_name', Address='$address', Email='$edit', Contact='$contact'");
            if ($change > 0) {
                echo "<script language='javascript'> window.open('index.html','_top')</script>";
            }
        }

        if (isset($_POST['back'])) {
            echo "<script language='javascript'> window.open('index.html','_top')</script>";
        }
    }
    ?>
</div>
</p>
</body>
</html>