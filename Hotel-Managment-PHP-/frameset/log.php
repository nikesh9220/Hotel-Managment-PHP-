<?php
session_start();
$_SESSION["user_id"] = 'Naeem';
header("location:test.php");
//print_r($_SESSION);
echo "login";
?>