<html>
<head>
    <style type='text/css'>
        body {
            color: #6D6D6D;
            background: #f5f5f5;
            font-family: inherit;
        }

        h1 {
            font-weight: lighter;
            margin: 5px 10px;
            margin-bottom: 20px;
            font-family: inherit;
            font-size: 30px;
            line-height: 40px;
            text-align: center;
        }

        table {
            margin: 15px 15px;
        }

    </style>
    <script>
        function validate() {
            var name = document.form.fn.value;

            if (name == null || name == "") {
                alert("Enter your first name");
                document.form.fn.focus();
                return false;
            }
            var name = document.form.ln.value;

            if (name == null || name == "") {
                alert("Enter your last name");
                document.form.ln.focus();
                return false;
            }
            var name = document.form.qu1.value;

            if (name == null || name == "") {
                alert("Enter your first question");
                document.form.qu1.focus();
                return false;
            }
            var name = document.form.ans1.value;

            if (name == null || name == "") {
                alert("Enter your first answer");
                document.form.ans1.focus();
                return false;
            }
            var name = document.form.qu2.value;

            if (name == null || name == "") {
                alert("Enter your second question");
                document.form.qu2.focus();
                return false;
            }
            var name = document.form.ans2.value;

            if (name == null || name == "") {
                alert("Enter your second answer");
                document.form.ans2.focus();
                return false;
            }
        }
    </script>
</head>
<body bgcolor=#ff6464>
<?php
session_start();
if (isset($_SESSION['A_id']))
{
$con = mysql_connect('localhost', 'root', '');
if ($con)
{
mysql_select_db("hms", $con);
$result = mysql_query("select * from Admin_profile");

$row = mysql_fetch_array($result);
$fn = $row['Ad_fname'];
$ln = $row['Ad_lname'];
$que1 = $row['Ad_que1'];
$que2 = $row['Ad_que2'];
$ans1 = $row['Ad_ans1'];
$ans2 = $row['Ad_ans2'];

echo "<h1>" . "EDIT PROFILE... " . "</h1>";
?>
<form method="POST" name="form" action="<?php $_PHP_SELF ?>" onsubmit="return validate();">
    <table border=0>
        <tr>
            <td>First name :</td>
            <td><input id="fn" type="text" name="fn" value="<?php echo $fn; ?>"></td>
        </tr>
        <tr>
            <td>Last name:</td>
            <td><input id="ln" type="text" name="ln" value="<?php echo $ln; ?>"></td>
        </tr>
        <tr>
            <td>1st question:</td>
            <td><input id="qu1" type="text" name="qu1" value="<?php echo $que1; ?>"></td>
        </tr>
        <tr>
            <td>1st question's answer:</td>
            <td><input id="ans1" type="text" name="ans1" value="<?php echo $ans1; ?>"></td>
        </tr>
        <tr>
            <td>2nd question:</td>
            <td><input id="qu2" type="text" name="qu2" value="<?php echo $que2; ?>"></td>
        </tr>
        <tr>
            <td>2nd question's answer:</td>
            <td><input id="ans2" type="text" name="ans2" value="<?php echo $ans2; ?>"></td>
        </tr>
        <tr>
            <td colspan='2'><input class="submit button" type="submit" name="ans" value="save"></td>
        </tr>
    </table>
    <?php
    //}
    if (isset($_POST['ans']))        //click Go button
    {
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $qu1 = $_POST['qu1'];
        $qu2 = $_POST['qu2'];
        $ans1 = $_POST['ans1'];
        $ans2 = $_POST['ans2'];
        $id = $_SESSION['A_id'];
        $change = mysql_query("update Admin_profile set  Ad_fname='$fn' ,Ad_lname='$ln' , Ad_que1='$qu1' ,Ad_que2='$qu2' ,Ad_ans1='$ans1',Ad_ans2='$ans2' where Ad_Email_id='$id'");
        echo "Your profile updated successfully...";
        echo "<script language='javascript'>window.open('index.html','_top')</script>";
    }
    }
    }
    ?>
</form>
</body>
</html>