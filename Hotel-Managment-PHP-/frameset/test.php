<?php
session_start();
//session_unset();
//$_SESSION["user_id"]='Naeem';
//print_r($_SESSION);

if (isset($_SESSION['user_id'])) {
    echo "welcome" . $_SESSION['user_id'];

    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='log.php'>Login</a>";
}
?>