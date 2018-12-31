<?php

session_start();
$con = mysql_connect("localhost", "root", "");

if ($con) {
    mysql_select_db("hms", $con);

    $result = mysql_query("select * from admin_profile");
    //$row=mysql_fetch_array($result);

    if (mysql_num_rows($result) > 0) {
        echo "\nHello" . $result['Ad_psw'] . "Hi";
        $_SESSION['id'] = $result['Ad_id'];
    }

    $result = mysql_query("insert into admin_profile(Ad_id) values (3)");
    $result = mysql_query("delete from admin_profile where Ad_id='3'");

    echo $_SESSION['id'];

    setcookie("id1", "123", time() + (86400 * 30), "/");

    if (isset($_COOKIE['id1'])) {
        echo "cookie";
        setcookie("id1", "1", time() - 0, "");
    }
    if (isset($_COOKIE['id1'])) {
        echo "Deleted";
    }
}

class demo
{
    public $var1 = "var1";

    //	demo $d=new demo();

echo $var1;
}

?>