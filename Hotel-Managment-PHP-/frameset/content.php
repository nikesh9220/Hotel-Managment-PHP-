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
            font-size: 40px;
            line-height: 40px;
            text-transform: uppercase;
            text-align: center;
        }

    </style>

</head>
<body>
</body>
<?php
session_start();
echo "<h1>welcome to the sunrise hotel</h1>";
echo "<center><img src='hms img/i2.jpg' width='700' height='350'></center>";
if (isset($_SESSION['A_id'])) {
    /*?>
                <form action="hms.php" method="POST">
                <input type="submit" name="change" value="Change pasword">
                </form>
                <form action="edit.php" method="POST">
                <input type="submit" name="edit" value="Edit profile">
                <input type="submit" name="show" value="Show profile">
                </form>
    <?php*/
} ?>
</html>