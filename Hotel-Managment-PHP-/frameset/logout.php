<?php
session_start();
session_unset();
session_destroy();
echo "<script language='javascript'>window.open('index.html','_top')</script>";
//header("location:top_Nav.php");
?>